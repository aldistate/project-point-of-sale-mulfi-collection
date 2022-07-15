<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Brand;
use App\Checkout;
use App\Kategori;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Dashboard';
        $url = 'dashboard';

        $data['januari'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-01-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-01-01'))
            ->first();

        $data['februari'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-02-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-02-01'))
            ->first();

        $data['maret'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-03-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-03-01'))
            ->first();

        $data['april'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-04-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-04-01'))
            ->first();

        $data['mei'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-05-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-05-01'))
            ->first();

        $data['juni'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-06-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-06-01'))
            ->first();

        $data['juli'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-07-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-07-01'))
            ->first();

        $data['agustus'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-08-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-08-01'))
            ->first();

        $data['september'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-09-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-09-01'))
            ->first();

        $data['oktober'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-10-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-10-01'))
            ->first();

        $data['november'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-11-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-11-01'))
            ->first();

        $data['desember'] = DB::table('detail_checkouts')
            ->select(DB::raw('sum((harga - (harga * diskon / 100)) * jumlah) as pendapatan_kotor, sum(harga_beli * jumlah) as harga_beli'))
            ->whereDate('created_at', '>=', date('Y') . '-12-01')->whereDate('created_at', '<=', $this->_lastMonth(date('Y') . '-12-01'))
            ->first();

        $pendapatan_kotor = $data['januari']->pendapatan_kotor + $data['februari']->pendapatan_kotor + $data['maret']->pendapatan_kotor + $data['april']->pendapatan_kotor + $data['mei']->pendapatan_kotor + $data['juni']->pendapatan_kotor + $data['juli']->pendapatan_kotor + $data['agustus']->pendapatan_kotor + $data['september']->pendapatan_kotor + $data['oktober']->pendapatan_kotor + $data['november']->pendapatan_kotor + $data['desember']->pendapatan_kotor;

        $harga_beli = 0;
        $checkouts = Checkout::whereYear('created_at', date('Y'))->get();
        foreach ($checkouts as $checkout) {
            foreach ($checkout->details as $detail) {
                $harga_beli += $detail->harga_beli * $detail->jumlah;
            }
        }

        $brands = Brand::all();

        $user = User::where('role', 'karyawan')->count();
        $barang = Barang::all()->count();
        $kategori = Kategori::all()->count();
        $brand = Brand::all()->count();
        $barang_stocks = Barang::where('stock', '<=', 5)->get();

        return view('home', compact('title', 'url', 'user', 'barang', 'barang_stocks', 'kategori', 'brand', 'brands', 'pendapatan_kotor', 'harga_beli', 'data'));
    }

    public function _lastMonth($month)
    {
        $date = Carbon::createFromFormat('Y-m-d', $month)
            ->lastOfMonth()
            ->format('Y-m-d');

        return $date;
    }
}
