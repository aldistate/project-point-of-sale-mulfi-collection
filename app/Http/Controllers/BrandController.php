<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Brand';
        $url = 'brand';
        $brands = Brand::all();

        return view('brand.index', compact('title', 'url', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Brand';
        $url = 'brand';

        return view('brand.create', compact('title', 'url'));
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
            'nama_brand' => 'required|string|max:255',
        ]);

        $data = $request->all();
        Brand::create($data);

        return redirect()->route('brand.index')->with('status', 'Brand berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $title = 'Ubah Brand';
        $url = 'brand';

        return view('brand.edit', compact('title', 'url', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'nama_brand' => 'required|string|max:255',
        ]);

        $data = $request->all();
        Brand::findOrFail($brand->id)
            ->update($data);

        return redirect()->route('brand.index')->with('status', 'Brand berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Brand::destroy($brand->id);  
        return redirect()->route('brand.index')->with('status', 'Brand berhasil dihapus!');
    }
}
