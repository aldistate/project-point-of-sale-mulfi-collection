@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">DataTables {{ $title }}</h6>
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-sm ml-auto" id="add"><i
            class="fas fa-plus mr-2"></i>Tambah Karyawan</a>
      </div>

      <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width: 8%">No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Nama Pengguna</th>
              <th class="w-25">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($karyawans as $karyawan)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $karyawan->nik }}</td>
              <td>{{ $karyawan->name }}</td>
              <td>{{ $karyawan->alamat }}</td>
              <td>{{ $karyawan->username }}</td>
              <td>
                {{ Form::open(['route' => ['karyawan.destroy', $karyawan->id], 'method' => 'delete', 'id' => 'form']) }}
                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-sm btn-success"><i
                    class="fas fa-edit"></i> Ubah</a>
                <button type="submit" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i> Hapus</button>
                {{ Form::close() }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
@endsection