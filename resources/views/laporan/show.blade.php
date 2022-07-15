@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card shadow">
      <div class="card-body">
        <table class="table table-borderless">
          <tr>
            <th>Invoice</th>
            <td>{{ $checkout->invoice }}</td>
          </tr>
          <tr>
            <th>Nama Kasir</th>
            <td>{{ $checkout->nama_kasir }}</td>
          </tr>
          <tr>
            <th>Grand Total</th>
            <td>@_currency($checkout->grand_total)</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class=" card shadow mb-4">
      <div class="card-header py-3 d-flex align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">DataTables {{ $title }}</h6>
      </div>

      <div class="card-body">
        <div class="table-responsive">
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
              @foreach ($checkout->details as $detail )
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $detail->kode_barang }}</td>
                <td>{{ $detail->nama_barang }}</td>
                <td>@_currency($detail->harga)</td>
                <td>{{ $detail->jumlah }}</td>
                <td>{{ $detail->diskon }}%</td>
                <td>
                  @_currency($detail->harga - ($detail->diskon/100 * $detail->harga))
                </td>
                <td>
                  @_currency(($detail->harga - ($detail->diskon/100 * $detail->harga)) * $detail->jumlah)
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>

<div class="row">

</div>
@endsection