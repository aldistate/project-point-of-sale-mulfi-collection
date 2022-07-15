<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Report</title>
</head>

<body>
  <div class="my-5">
    <div class="text-center mb-5">
      <h1 class="h3">Laporan</h1>
      <h2 class="h4 font-weight-normal">Mulfi Collection</h2>
      @if (isset($data['from']) && isset($data['to']))
      <h2 class="h5 font-weight-normal">{{ date('M d, Y', strtotime($data['from'])) }} -
        {{ date('M d, Y', strtotime($data['to'])) }}</h2>
      @else
      <h2 class="h5 font-weight-normal">Semua Periode</h2>
      @endif
    </div>

    <table class="table table-bordered mb-5">
      <thead>
        <tr>
          <th class="text-center align-middle" style="width: 8%;">No</th>
          <th class="text-center align-middle">Invoice</th>
          <th class="text-center align-middle">Tanggal</th>
          <th class="text-center align-middle">Nama Kasir</th>
          <th class="text-center align-middle">Grand Total</th>
        </tr>
      </thead>
      <tbody>
        @php
          $keuntungan_kotor = 0;
          $harga_beli = 0;
        @endphp
        @foreach ($checkouts as $checkout )
        <tr>
          <td class="text-center">{{ $loop->iteration }}</td>
        
<td>{{ $checkout->invoice }}</td>

 <td>{{ $checkout->tanggal }}</td>
          <td>{{ $checkout->nama_kasir }}</td>
          <td>@_currency($checkout->grand_total)</td>
        </tr>
        @foreach ($checkout->details as $detail)
            {{ $detail->harga_beli }}
            {{ $harga_beli += $detail->harga_beli * $detail->jumlah }}
        @endforeach
        @php
            $keuntungan_kotor += $checkout->grand_total
        @endphp
        @endforeach
        <tr>
          <td colspan="4">Pendapatan Kotor</td>
          <td>@_currency($keuntungan_kotor)</td>
        </tr>
        <tr>
          <td colspan="4">Pendapatan Bersih</td>
          <td>@_currency(($keuntungan_kotor - $harga_beli) - ($keuntungan_kotor - $harga_beli) * 20 / 100)</td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
</body>

</html>