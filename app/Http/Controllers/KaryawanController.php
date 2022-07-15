<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Pegawai';
        $url = 'karyawan';
        $karyawans = User::where('role', 'karyawan')->get();

        return view('karyawan.index', compact('title', 'url', 'karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Pegawai';
        $url = 'karyawan';

        return view('karyawan.create', compact('title', 'url'));
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
            'nik' => 'required|unique:users,nik',
            'username' => 'required|unique:users,username',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'alamat' => 'required|string',
            'password' => 'confirmed'
        ]);

        $data = $request->all();
        $data['role'] = 'karyawan';
        if($data['password'] == null) {
            $data['password'] = $data['username'];
            $data['password_confirmation'] = $data['username'];
        }

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('karyawan.index')->with('status', 'Pegawai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Pegawai';
        $url = 'karyawan';
        $karyawan = User::find($id);

        return view('karyawan.edit', compact('title', 'url', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik' => 'required|unique:users,nik,' . $id . ',id',
            'username' => 'required|unique:users,username,' . $id . ',id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id . ',id',
            'alamat' => 'required|string',
            'password' => 'confirmed'
        ]);

        $data = $request->all();
        if($data['password'] == null) {
            unset( $data['password']);
            unset( $data['password_confirmation']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        User::findOrFail($id)
            ->update($data);

        return redirect()->route('karyawan.index')->with('status', 'Pegawai berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        
        return redirect()->route('karyawan.index')->with('status', 'Pegawai berhasil dihapus!');
    }
}
