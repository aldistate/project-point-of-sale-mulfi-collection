<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Brand;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Barang';
        $url = 'barang';
        $barangs = Barang::all();

        return view('barang.index', compact('title', 'url', 'barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Barang';
        $url = 'barang';
        $kategori = Kategori::pluck('nama_kategori', 'id');
        $brand = Brand::pluck('nama_brand', 'id');

        return view('barang.create', compact('title', 'url', 'kategori', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required|integer|exists:kategoris,id',
            'id_brand' => 'required|integer|exists:brands,id',
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'gambar' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'diskon' => 'integer',
        ]);

        $data = $request->all();
        if (isset($data['gambar'])) {
            $data['gambar'] = Storage::disk('public')->putFile(
                'assets/barang/gambar',
                $request->file('gambar')
            );
        }

        Barang::create($data);
        return redirect()->route('barang.index')->with('status', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        $title = 'Detail Barang';
        $url = 'barang';

        return view('barang.show', compact('title', 'url', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $title = 'Ubah Barang';
        $url = 'barang';
        $kategori = Kategori::pluck('nama_kategori', 'id');
        $brand = Brand::pluck('nama_brand', 'id');

        return view('barang.edit', compact('title', 'url', 'kategori', 'brand', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $data = $request->all();
        if (isset($data['gambar'])) {
            $data['gambar'] = Storage::disk('public')->putFile(
                'assets/barang/gambar',
                $request->file('gambar')
            );

            if ($barang->gambar != 'default.jpg') Storage::delete('public/' . $barang->gambar);
        }

        Barang::findOrFail($barang->id)
            ->update($data);

        return redirect()->route('barang.index')->with('status', 'Barang berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        if ($barang->gambar != 'default.jpg') Storage::delete('public/' . $barang->gambar);
        Barang::destroy($barang->id);
        
        return redirect()->route('barang.index')->with('status', 'Barang berhasil dihapus!');
    }
}
