@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class=" card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary">DataTables {{ $title }}</h6>
          <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm ml-auto" id="add"><i
              class="fas fa-plus mr-2"></i>Tambah Barang</a>
        </div>      

      <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width: 8%">No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Brand</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Stock</th>
              <th class="w-25">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barangs as $barang )
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $barang->kode_barang }}</td>
              <td>{{ $barang->nama_barang }}</td>
              <td>{{ $barang->kategori->nama_kategori }}</td>
              <td>{{ $barang->brand->nama_brand }}</td>
              <td>@_currency($barang->harga_beli)</td>
              <td>
                @if ($barang->diskon != 0)
                <del>@_currency($barang->harga_jual)</del>
                @_currency($barang->harga_jual - ($barang->diskon/100 * $barang->harga_jual))
                @else
                @_currency($barang->harga_jual)
                @endif
              </td>
              <td>{{ $barang->stock }}</td>
              <td>
                {{ Form::open(['route' => ['barang.destroy', $barang->id], 'method' => 'delete', 'id' => 'form']) }}
                <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>
                  Detail</a>
                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-success"><i
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