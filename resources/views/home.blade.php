@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Content Row -->
<h2 class="h5">Total Penjualan Brand</h2>

<div class="row align-items-center mb-5">
  <div class="col-md-4">
    @php
    $barang_dougnuts = DB::table('detail_checkouts')
    ->select('brand', DB::raw('count(*) as total'))
    ->orderBy('total', 'desc')
    ->groupBy('brand')
    ->get();

    if(Request::get('range') != null) {
    $barang_dougnuts = DB::table('detail_checkouts')
    ->select('brand', DB::raw('count(*) as total'))
    ->orderBy('total', 'desc')
    ->groupBy('brand')
    ->whereDate('created_at', '>', Request::get('from'))->whereDate('created_at', '<', Request::get('to')) ->
      limit(5)
      ->get();
      }

      $brand_dougnut = [];
      $total_dougnut = [];
      $color_dougnut = [];

      foreach ($barang_dougnuts as $key => $barang_dougnut) {
      array_push($brand_dougnut, $barang_dougnut->brand);
      array_push($total_dougnut, $barang_dougnut->total);
      array_push($color_dougnut, 'rgba(' . rand(0,255) . ', ' . rand(0,255) . ', ' . rand(0,255) . ', 0.5)');
      }
      @endphp

      <canvas id="myChart">
        <script>
          var ctx = document.getElementById("myChart").getContext("2d");
                // tampilan chart
                var piechart = new Chart(ctx,{type: 'pie',
                  data : {
                // label nama setiap Value
                labels:{!! json_encode($brand_dougnut) !!},
                datasets: [{
                  // Jumlah Value yang ditampilkan
                  data:{!! json_encode($total_dougnut) !!},
                  backgroundColor:{!! json_encode($color_dougnut) !!}
                  }],
                }
                });
        </script>
      </canvas>
  </div>
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Karyawan</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-tie fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                  Barang</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barang }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-boxes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Kategori</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kategori }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Brand
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $brand }}</div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-archive fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  Pendapatan Kotor Tahun {{ date('Y') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">@_currency($pendapatan_kotor)</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  Pendapatan Bersih Tahun {{ date('Y') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">@_currency(($pendapatan_kotor - $harga_beli) - ($pendapatan_kotor - $harga_beli) * 20 / 100)</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header py-3 d-flex align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Pendapatan Kotor Tahun {{ date('Y') }}</h6>
      </div>
      <div class="card-body">
        <canvas id="chart_line_kotor"></canvas>
        <script>
          var ctx = document.getElementById('chart_line_kotor').getContext('2d');
          var chart_line_kotor = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                  datasets: [{
                      label: 'Pendapatan Kotor',
                      data: [
                        {{ $data['januari']->pendapatan_kotor ?? 0 }},
                        {{ $data['februari']->pendapatan_kotor ?? 0 }},
                        {{ $data['maret']->pendapatan_kotor ?? 0 }},
                        {{ $data['april']->pendapatan_kotor ?? 0 }},
                        {{ $data['mei']->pendapatan_kotor ?? 0 }},
                        {{ $data['juni']->pendapatan_kotor ?? 0 }},
                        {{ $data['juli']->pendapatan_kotor ?? 0 }},
                        {{ $data['agustus']->pendapatan_kotor ?? 0 }},
                        {{ $data['september']->pendapatan_kotor ?? 0 }},
                        {{ $data['oktober']->pendapatan_kotor ?? 0 }},
                        {{ $data['november']->pendapatan_kotor ?? 0 }},
                        {{ $data['desember']->pendapatan_kotor ?? 0 }},
                      ],
                      fill: false,
                      borderColor: 'rgb(75, 192, 192)',
                      tension: 0.1
                  }]
              },
              options: {
                scales: {
                  y: {
                    max: {{ $pendapatan_kotor + 5000 }},
                  }
                }
              }
          });
        </script>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header py-3 d-flex align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Pendapatan Bersih Tahun {{ date('Y') }}</h6>
      </div>
      <div class="card-body">
        <canvas id="chart_line_bersih"></canvas>
        <script>
          var ctx = document.getElementById('chart_line_bersih').getContext('2d');          
          var myChart = new Chart(ctx, {
           //chart akan ditampilkan sebagai bar chart
              type: 'line',
              data: {
               //membuat label chart
                  labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                  datasets: [{
                      label: 'Pendapatan Bersih',
                      data: [
                        {{ ($data['januari']->pendapatan_kotor - $data['januari']->harga_beli) - (($data['januari']->pendapatan_kotor - $data['januari']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['februari']->pendapatan_kotor - $data['februari']->harga_beli) - (($data['februari']->pendapatan_kotor - $data['februari']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['maret']->pendapatan_kotor - $data['maret']->harga_beli) - (($data['maret']->pendapatan_kotor - $data['maret']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['april']->pendapatan_kotor - $data['april']->harga_beli) - (($data['april']->pendapatan_kotor - $data['april']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['mei']->pendapatan_kotor - $data['mei']->harga_beli) - (($data['mei']->pendapatan_kotor - $data['mei']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['juni']->pendapatan_kotor - $data['juni']->harga_beli) - (($data['juni']->pendapatan_kotor - $data['juni']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['juli']->pendapatan_kotor - $data['juli']->harga_beli) - (($data['juli']->pendapatan_kotor - $data['juli']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['agustus']->pendapatan_kotor - $data['agustus']->harga_beli) - (($data['agustus']->pendapatan_kotor - $data['agustus']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['september']->pendapatan_kotor - $data['september']->harga_beli) - (($data['september']->pendapatan_kotor - $data['september']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['oktober']->pendapatan_kotor - $data['oktober']->harga_beli) - (($data['oktober']->pendapatan_kotor - $data['oktober']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['november']->pendapatan_kotor - $data['november']->harga_beli) - (($data['november']->pendapatan_kotor - $data['november']->harga_beli) * 0.2 ) ?? 0 }},
                        {{ ($data['desember']->pendapatan_kotor - $data['desember']->harga_beli) - (($data['desember']->pendapatan_kotor - $data['desember']->harga_beli) * 0.2 ) ?? 0 }},
                      ],
                      fill: false,
                      borderColor: 'rgb(75, 192, 192)',
                      tension: 0.1
                  }]
              },
              options: {
                scales: {
                  y: {
                    max: {{ $pendapatan_kotor + 5000 }},
                  }
                }
              }
          });
        </script>
      </div>
    </div>
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-12">
    <div class="row">
      @foreach ($brands as $index => $brand)

      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header py-3 d-flex align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">{{ $brand->nama_brand }}</h6>
          </div>
          <div class="card-body">
            @php
            $barangs = DB::table('detail_checkouts')
            ->select('nama_barang', DB::raw('count(*) as total'))
            ->where('brand', $brand->nama_brand)
            ->orderBy('total', 'desc')
            ->groupBy('nama_barang')
            ->limit(5)
            ->get();

            if(Request::get('range') != null) {
            $barangs = DB::table('detail_checkouts')
            ->select('nama_barang', DB::raw('count(*) as total'))
            ->where('brand', $brand->nama_brand)
            ->orderBy('total', 'desc')
            ->groupBy('nama_barang')
            ->whereDate('created_at', '>=', Request::get('from'))->whereDate('created_at', '<=', Request::get('to')) ->
              limit(5)
              ->get();
              }

              $nama = [];
              $total = [];

              foreach ($barangs as $key => $barang) {
              array_push($nama, $barang->nama_barang);
              array_push($total, $barang->total);
              }

              @endphp

              <div>
                <canvas id="myChart{{ $index }}"></canvas>
              </div>
          </div>
        </div>
      </div>

      <script>
        var ctx{{ $index }} = document.getElementById("myChart{{ $index }}").getContext('2d');
    
                var myChart{{ $index }} = new Chart(ctx{{ $index }}, {
                    type: 'bar',
                    data: {
                      labels: {!! json_encode($nama) !!},
                      datasets: [{
                        label: '',
                        data: {!! json_encode($total) !!},
                        backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                        'rgba(54, 162, 235, 1)',
                        ],
                      borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        yAxes: [{
                          ticks: {
                            beginAtZero:true
                          }
                        }]
                      }
                    }
                  });
      </script>
      @endforeach
    </div>
  </div>
</div>

<!-- Content Row -->
<div class="row">
  <div class="col-md-12">
      <div class=" card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary">Stock menipis</h6>
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
            </tr>
          </thead>
          <tbody>
            @foreach ($barang_stocks as $barang_stock )
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $barang_stock->kode_barang }}</td>
              <td>{{ $barang_stock->nama_barang }}</td>
              <td>{{ $barang_stock->kategori->nama_kategori }}</td>
              <td>{{ $barang_stock->brand->nama_brand }}</td>
              <td>@_currency($barang_stock->harga_beli)</td>
              <td>
                @if ($barang_stock->diskon != 0)
                <del>@_currency($barang_stock->harga_jual)</del>
                @_currency($barang_stock->harga_jual - ($barang_stock->diskon/100 * $barang_stock->harga_jual))
                @else
                @_currency($barang_stock->harga_jual)
                @endif
              </td>
              <td>{{ $barang_stock->stock }}</td>
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