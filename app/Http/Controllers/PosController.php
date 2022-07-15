<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Brand;
use App\Checkout;
use App\DetailCheckout;
use App\Kategori;
use App\Keranjang;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Transaksi';
        $url = 'pos';

        $kategori = Kategori::pluck('nama_kategori', 'id');
        $brand = Brand::pluck('nama_brand', 'id');
        $query = Barang::orderBy('stock', 'desc')->get();
        $keranjangs = Keranjang::where('id_user', auth()->user()->id)->get();

        $filter = $request->get('filter');
        if ($filter == 'true') {
            $s = $request->get('s');
            $k = $request->get('k');
            $b = $request->get('b');

            $query = Barang::query()
                ->when($s, function ($query) use ($s) {
                    $query->where('nama_barang', 'LIKE', '%' . $s . '%');
                })
                ->when($k, function ($query) use ($k) {
                    $query->where('id_kategori', $k);
                })
                ->when($b, function ($query) use ($b) {
                    $query->where('id_brand', $b);
                })
                ->orderBy('stock', 'desc')
                ->get();
        }

        return view('pos', compact('title', 'url', 'kategori', 'brand', 'query', 'keranjangs'));
    }

    public function cart(Request $request, $id)
    {
        $barang = Barang::find($id);
        $data = $request->all();
        $data['id_user'] = auth()->user()->id;
        $data['kode_barang'] = $barang->kode_barang;
        $data['nama_barang'] = $barang->nama_barang;
        $data['kategori'] = $barang->kategori->nama_kategori;
        $data['brand'] = $barang->brand->nama_brand;

        $keranjang = Keranjang::where('kode_barang', $barang->kode_barang)->first();
        if ($keranjang) {
            $data['jumlah'] += 1;
            Keranjang::findOrFail($keranjang->id)
                ->update($data);

            return redirect()->route('pos');
        }

        Keranjang::create($data);
        return redirect()->route('pos');
    }

    public function delete_cart($id) {
        Keranjang::destroy($id);
        
        return redirect()->route('pos');
    }

    public function qty(Request $request, $id)
    {
        $button = $request->all();
        if (array_key_exists('minus', $button)) {
            if ($request->jumlah == 1) return redirect()->route('pos');
            $data['jumlah'] = $request->jumlah - 1;
        };

        if (array_key_exists('plus', $button)) {
            if ($request->jumlah + 1 > $button['stock']) return redirect()->route('pos');
            $data['jumlah'] = $request->jumlah + 1;
        };

        Keranjang::findOrFail($id)
            ->update($data);

        return redirect()->route('pos');
    }

    public function checkout(Request $request)
    {
        $data = $request->all();
        $keranjangs = Keranjang::where('id_user', auth()->user()->id)->get();

        $data['nama_kasir'] =  auth()->user()->name;
        $data['tanggal'] = date('Y-m-d');
        
        $checkout = Checkout::create($data);

        foreach ($keranjangs as $key => $keranjang) {
            $barang = Barang::where('kode_barang', $keranjang->kode_barang)->first();

            $data = [
                'id_checkout' => $checkout->id,
                'kode_barang' => $keranjang->kode_barang,
                'nama_barang' => $keranjang->nama_barang,
                'kategori' => $keranjang->kategori,
                'brand' => $keranjang->brand,
                'harga_beli' => $barang->harga_beli,
                'harga' => $barang->harga_jual,
                'jumlah' => $keranjang->jumlah,
                'diskon' => $barang->diskon,
            ];

            DetailCheckout::create($data);

            Barang::findOrFail($barang->id)
                ->update([
                    'stock' => $barang->stock - $keranjang->jumlah
                ]);

            Keranjang::where('id_user', auth()->user()->id)->delete();
        }

        return redirect()->route('pos.struk', $checkout->id)->with('status', 'Checkout berhasil dilakukan!');
    }

    public function struk($id){
        $checkout = Checkout::find($id);

        return view('struk', compact('checkout'));
    }
}
