@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">DataTables {{ $title }}</h6>
      </div>

      <div class="card-body">
        <div class="row mb-3">
          {{ Form::open(['route' => 'history', 'method' => 'get', 'class' => 'col-md-10']) }}
          {{ Form::hidden('range', true, ['id' => 'range1']) }}
          <div class="row">
            <div class="col-md-5">
              {{ Form::date('from', Request::get("from"), ['placeholder' => 'masukan nama barang', 'class' => $errors->has('date-from-1') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'date-from-1']) }}
            </div>
            <div class="col-md-5">
              {{ Form::date('to', Request::get("to"), ['placeholder' => 'masukan nama barang', 'class' => $errors->has('date-from-2') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'date-from-2']) }}
            </div>
            <div class="col-md-2">
              {{ Form::button('Filter', ['type' => 'submit', 'class' => 'btn btn-block btn-primary ', 'id' => 'filter']) }}
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
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Harga Satuan</th>
              <th>Jumlah</th>
              <th>Diskon</th>
              <th>Harga Diskon</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            @php
                $grandtotal = 0;
            @endphp
            @foreach ($histories as $history )
            @php
                $grandtotal += ($history->harga - ($history->diskon/100 * $history->harga)) * $history->jumlah;
            @endphp
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $history->kode_barang }}</td>
              <td>{{ $history->nama_barang }}</td>
              <td>@_currency($history->harga)</td>
              <td>{{ $history->jumlah }}</td>
              <td>{{ $history->diskon }}%</td>
              <td>
                @_currency($history->harga - ($history->diskon/100 * $history->harga))
              </td>
              <td>
                @_currency(($history->harga - ($history->diskon/100 * $history->harga)) * $history->jumlah)
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-10 text-right">
            Total
          </div>
          <div class="col-md-2 text-right">
            @_currency($grandtotal)
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection