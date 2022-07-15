<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\User;
use PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Laporan';
        $url = 'laporan';
        $checkouts = Checkout::all();
        $kasir = User::pluck('name', 'name');

        $checkouts = Checkout::all();
        if (isset($request->range)) {
            $id = $request->get('id');
            $range = [$request->get('from'), $request->get('to')];


            $checkouts = Checkout::query()
                ->when($id, function ($checkouts) use ($id) {
                    $checkouts->where('nama_kasir', $id);
                })
                ->when($range, function ($checkouts) use ($range) {
                    if($range[0] != '' && $range[1] != '') {
                        $checkouts->whereBetween('tanggal', [$range[0], $range[1]]);
                    }
                })
                ->get();
        }

        if (isset($request->pdf)) return redirect()->route('laporan.pdf');
        return view('laporan.index', compact('title', 'url', 'checkouts', 'kasir'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Laporan';
        $url = 'laporan';
        $checkout = Checkout::find($id);

        return view('laporan.show', compact('title', 'url', 'checkout'));
    }

    public function pdf(Request $request)
    {
        $data = [];
        if ($request->get('range')) {
            $checkouts = Checkout::whereBetween('tanggal', [$request->get('from'), $request->get('to')])->get();
            $data['from'] = $request->get('from');
            $data['to'] = $request->get('to');
        } else {
            $checkouts = Checkout::all();
        }

        $pdf = PDF::loadView('pdf', compact('checkouts', 'data'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
