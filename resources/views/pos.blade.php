@extends('layouts.app')

@push('style')
<style>
  /* card shadow */
  .dress-card-img-top {
    width: 100%;
    border-radius: 7px 7px 0 0;
  }

  .dress-card-body {
    padding: 1rem !important;
    background: #fff;
    border-radius: 0 0 7px 7px;
  }

  .dress-card-title {
    line-height: 0.5rem;
  }

  .dress-card-crossed {
    text-decoration: line-through;
  }

  .dress-card-price {
    font-size: 1rem;
    font-weight: bold;
  }

  .dress-card-off {
    color: #E06C9F;
  }

  .dress-card-para {
    margin-bottom: 0.2rem;
    font-size: 1.0rem;
    margin-bottom: 0rem;
  }

  .dress-card shadow {
    border-radius: 14px;
  }

  .dress-card-heart {
    font-size: 1em;
    color: #007bff;
    margin: 4.5px;
    position: absolute;
    left: 2px;
    top: 0px;

  }

  .card-button {
    text-align: center;
    text-transform: uppercase;
    font-size: 15px;
    padding: 9px;
  }

  .card-button a {
    text-decoration: none;
  }

  .card-button-inner {
    padding: 10px;
    border-radius: 3px;
  }

  .bag-button {
    background: #E06C9F;
    color: white;
  }

  .bag-button :hover {
    background: #e299b9;
  }

  .wish-button {
    border: 1px solid #E06C9F;
    color: #E06C9F;
  }

  .qty-input {
    color: #000;
    background: #fff;
    display: flex;
    align-items: center;
    overflow: hidden;
  }

  .qty-input .product-qty,
  .qty-input .qty-count {
    background: transparent;
    color: inherit;
    font-weight: bold;
    font-size: inherit;
    border: none;
    display: inline-block;
    min-width: 0;
    height: 2.5rem;
    line-height: 1;
  }

  .qty-input .product-qty:focus,
  .qty-input .qty-count:focus {
    outline: none;
  }

  .qty-input .product-qty {
    width: 50px;
    min-width: 0;
    display: inline-block;
    text-align: center;
    appearance: textfield;
  }

  .qty-input .product-qty::-webkit-outer-spin-button,
  .qty-input .product-qty::-webkit-inner-spin-button {
    appearance: none;
    margin: 0;
  }

  .qty-input .qty-count {
    padding: 0;
    cursor: pointer;
    width: 2.5rem;
    font-size: 1.25em;
    text-indent: -100px;
    overflow: hidden;
    position: relative;
  }

  .qty-input .qty-count:before,
  .qty-input .qty-count:after {
    content: "";
    height: 2px;
    width: 10px;
    position: absolute;
    display: block;
    background: #000;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
  }

  .qty-input .qty-count--minus {
    border-right: 1px solid #e2e2e2;
  }

  .qty-input .qty-count--add {
    border-left: 1px solid #e2e2e2;
  }

  .qty-input .qty-count--add:after {
    transform: rotate(90deg);
  }

  .qty-input .qty-count:disabled {
    color: #ccc;
    background: #f2f2f2;
    cursor: not-allowed;
    border-color: transparent;
  }

  .qty-input .qty-count:disabled:before,
  .qty-input .qty-count:disabled:after {
    background: #ccc;
  }
</style>
@endpush

@section('content')
@php
$grandtotal = 0;
foreach($keranjangs as $keranjang) {
$grandtotal += $keranjang->harga * $keranjang->jumlah;
}
@endphp

<div class="row">
  <div class="col-md-12">
    <div class="card shadow text-left p-3 h-100">
      <div class="form-group row">
        <label for="jual_tanggal" class="col-sm-4 col-form-label">Invoice</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" value="BO{{ time() }}"
            readonly="">
        </div>
      </div>
      <div class="form-group row">
        <label for="jual_tanggal" class="col-sm-4 col-form-label">Date</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" id="jual_tanggal" name="jual_tanggal" value="{{ date('Y-m-d') }}"
            readonly="">
        </div>
      </div>
      <div class="form-group row">
        <label for="jual_user_nama" class="col-sm-4 col-form-label">Pegawai</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="jual_user_nama" name="jual_user_nama"
            value="{{ auth()->user()->name }}" readonly="">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-md-6">
    <div class="card shadow h-75 mb-5" style="max-height: 75%; overflow-y: auto;">
      <div class="card-body">
        <table id="datatable-simple" class="table">
          <thead>
            <tr>
              <th>Barang</th>
              <th>Harga</th>
              <th class="text-center">Jumlah</th>
              <th>Subtotal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($keranjangs as $keranjang)
            @php
            $stock = \App\Barang::where('kode_barang', $keranjang->kode_barang)->first()->stock;
            @endphp
            <tr>
              <td>{{ $keranjang->nama_barang }}</td>
              <td>
                @_currency($keranjang->harga)
              </td>
              <td class="qty-input">
                {{ Form::open(['route' => ['pos.qty', $keranjang->id], 'method' => 'put', 'class' => 'd-flex w-100', 'id' => 'form-search']) }}
                <button class="qty-count qty-count--minus" data-action="minus" type="submit" name="minus">-</button>
                <input type="hidden" name="stock" value="{{ $stock }}">
                <input class="product-qty" type="number" name="jumlah" min="1" max="{{ $stock }}"
                  value="{{ $keranjang->jumlah }}">
                <button class="qty-count qty-count--add" data-action="add" type="submit" name="plus">+</button>
                {{ Form::close() }}
              </td>
              <td>@_currency($keranjang->harga * $keranjang->jumlah)</td>
              <td>
                {{ Form::open(['route' => ['pos.delete_cart', $keranjang->id], 'method' => 'delete', 'id' => 'form-delete-cart']) }}
                <button type="submit" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i></button>
                {{ Form::close() }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="card shadow text-left p-3">
      <p class="text-black-50 text-right">GRAND<span class="text-dark">TOTAL</span></p>
      <h2 class="text-right" style="font-size: 55px;">@_currency($grandtotal)</h2>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      {{ Form::open(['route' => 'pos', 'class' => 'd-flex w-100', 'method' => 'get', 'id' => 'form-search']) }}
      {{ Form::hidden('filter', 'true') }}
      <div class="col-md-4">
        {{ Form::label('kategori', 'Kategori', ['class' => 'col-form-label']) }}
        {{ Form::select('k', $kategori, Request::get("k"), ['placeholder' => 'Pilih Kategori', 'class' => $errors->has('id_kategori') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'kategori']) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('brand', 'Brand', ['class' => 'col-form-label']) }}
        {{ Form::select('b', $brand, Request::get("b"), ['placeholder' => 'Pilih Brand', 'class' => $errors->has('id_brand') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'brand']) }}
      </div>
      <div class="col-md-4">
        {{ Form::label('search', 'Cari barang', ['class' => 'col-form-label']) }}
        <div class="d-flex">
          {{ Form::text('s', Request::get("s"), ['placeholder' => 'cari barang', 'class' => $errors->has('search') ? 'form-control b-left is-invalid' : 'form-control b-left mr-2', 'id' => 'search']) }}
          {{ Form::button('Filter', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'save']) }}
        </div>
      </div>
      {{ Form::close() }}

      <div class="col-md-12 mt-3">
        <div class="card shadow" style="min-height:100vh; max-height: 100vh; overflow-y: auto;">
          <div class="card-body">
            <div class="row">
              @foreach ($query as $barang)
              <div class="col-md-6 mb-2">
                <div class="dress-card shadow shadow">
                  <div class="dress-card-head">
                    <img class="dress-card-img-top" src="{{ asset("storage/{$barang->gambar}") }}"
                      alt="{{ $barang->nama_barang }}" style="width: 100%; height: 170px; object-fit:cover">
                  </div>
                  <div class="dress-card-body">
                    <h4 class="dress-card-title mb-3" style="line-height: 1.5">{{ $barang->nama_barang }}</h4>
                    <p class="dress-card-para">{{ $barang->kategori->nama_kategori }} | {{ $barang->brand->nama_brand }}
                    </p>
                    <small class="text-muted">stock {{ $barang->stock }}</small>
                    @if ($barang->diskon != 0)
                    <p class="dress-card-para"><del><span>@_currency($barang->harga_jual)</span></del><span
                        class="dress-card-off">&ensp;({{ $barang->diskon }}% OFF)</span></p>
                    @else
                    <p class="dress-card-para"><span>@_currency($barang->harga_jual)</span></p>
                    @endif

                    {{ Form::open(['route' => ['pos.cart', $barang->id], 'method' => 'post', 'id' => 'form-cart']) }}
                    <div class="row mt-3">
                      {{-- <div class="col-md-6"> --}}
                      {{ Form::hidden('harga', $barang->harga_jual - ($barang->diskon/100 * $barang->harga_jual), ['placeholder' => 'harga', 'class' => $errors->has('harga') ? 'form-control b-left is-invalid' : 'form-control b-left mr-2', 'id' => 'harga', $barang->stock == 0 ? 'disabled' : '']) }}
                      {{-- </div> --}}
                      <div class="col-md-12">
                        {{ Form::number('jumlah', 1, ['placeholder' => 'jumlah', 'class' => $errors->has('jumlah') ? 'form-control b-left is-invalid' : 'form-control b-left mr-2', 'id' => 'jumlah', $barang->stock == 0 ? 'disabled' : '', 'min' => '1', 'max' => $barang->stock]) }}
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-12">
                        {{ Form::button('Pilih', ['type' => 'submit', 'class' => 'btn btn-block btn-primary', 'id' => 'save', $barang->stock == 0 ? 'disabled' : '']) }}
                      </div>
                    </div>
                    {{ Form::close() }}
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3 mb-5">
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-body">
        <div class="col-md-12">
          {{ Form::open(['route' => 'pos.checkout', 'method' => 'post', 'id' => 'form-search']) }}
          <input type="hidden" name="invoice" value="BO{{ time() }}">
          <input type="hidden" name="grand_total" id="grandtotal" value="{{ $grandtotal }}">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Rp</div>
            </div>
            {{ Form::number('uang_customer', null, ['placeholder' => 'masukan uang customer', 'class' => $errors->has('payment') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'uang-customer', 'required' => 'required', 'min' => $grandtotal]) }}
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Rp</div>
            </div>
            {{ Form::number('kembalian', 0, ['placeholder' => 'kembalian', 'class' => $errors->has('payment') ? 'form-control b-left is-invalid' : 'form-control b-left', 'id' => 'kembalian', 'disabled' => 'disabled']) }}
          </div>
          {{ Form::button('Checkout', ['type' => 'submit', 'class' => 'btn btn-block btn-primary mt-2', 'id' => 'checkout']) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script>
  let grandtotal = $('#grandtotal').val();
    let uang_customer = $('#uang-customer');
    let kembalian = $('#kembalian');

    uang_customer.on('keyup', function(){
      if(uang_customer.val() == '') {
      kembalian.val(0);
      } else {
      kembalian.val(uang_customer.val() - grandtotal);
      }
    })
</script>
@endpush