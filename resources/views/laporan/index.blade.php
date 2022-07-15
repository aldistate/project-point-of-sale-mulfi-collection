@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class=" card shadow mb-4">
      <div class="card-header py-3 d-flex align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">DataTables {{ $title }}</h6>
      </div>

      <div class="card-body">
        <div class="row mb-3">
          {{ Form::open(['route' => 'laporan', 'method' => 'get', 'class' => 'col-md-10']) }}
          {{ Form::hidden('range', true, ['id' => 'range1']) }}
          <div class="row">
            <div class="col-md-4">
              {{ Form::date('from', Request::get("from"), ['placeholder' => 'masukan nama barang', 'class' => $errors->has('date-from-1') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'date-from-1']) }}
            </div>
            <div class="col-md-4">
              {{ Form::date('to', Request::get("to"), ['placeholder' => 'masukan nama barang', 'class' => $errors->has('date-from-2') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'date-from-2']) }}
            </div>
            <div class="col-md-2">
              {{ Form::button('Filter', ['type' => 'submit', 'class' => 'btn btn-block btn-primary ', 'id' => 'filter']) }}
            </div>
            <div class="col-md-2">
              <a class="btn btn-block btn-danger"
                href="{{ route('laporan.pdf') }}?range={{ Request::get("range") }}&from={{ Request::get("from") }}&to={{ Request::get("to") }}"
                target="_blank">PDF</a>
            </div>
          </div>
          {{ Form::close() }}
          <div class="col-md-2">
            <a class="btn btn-block btn-success" href="{{ route('laporan') }}">Reset</a>
          </div>

        </div>
        <table id="datatable-normal" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width: 8%">No</th>
              <th>Invoice</th>
              <th>Nama Kasir</th>
              <th>Grand Total</th>
              <th>tanggal</th>
              <th class="w-25">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($checkouts as $checkout )
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $checkout->invoice }}</td>
              <td>{{ $checkout->nama_kasir }}</td>
              <td>@_currency($checkout->grand_total)</td>
              <td>{{ $checkout->tanggal }}</td>
              <td>
                <a href="{{ route('laporan.show', $checkout->id) }}" class="btn btn-sm btn-info"><i
                    class="fas fa-eye"></i>
                  Detail</a>
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