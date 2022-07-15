@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class=" card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary">DataTables {{ $title }}</h6>
          <a href="{{ route('brand.create') }}" class="btn btn-primary btn-sm ml-auto" id="add"><i
              class="fas fa-plus mr-2"></i>Tambah Brand</a>
        </div>

      <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width: 8%">No</th>
              <th>Nama Brand</th>
              <th class="w-25">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($brands as $brand)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $brand->nama_brand }}</td>
              <td>
                {{ Form::open(['route' => ['brand.destroy', $brand->id], 'method' => 'delete', 'id' => 'form']) }}
                <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Ubah</a>
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