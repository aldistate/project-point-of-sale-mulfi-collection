<!DOCTYPE html>
<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Nota</title>
  <style>
    .content {
      width: 80mm;
      font-size: 12px;
      padding: 5px;
    }

    .title {
      text-align: center;
      font-size: 13px;
      padding-bottom: 5px;
      border-bottom: 1px dashed;
    }

    .head {
      margin-top: 5px;
      margin-bottom: 10px;
      padding-bottom: 10px;
      border-bottom: 1px solid;
    }

    table {
      width: 100%;
      font-size: 12px;
    }

    .thanks {
      margin-top: 10px;
      padding-top: 10px;
      text-align: center;
      border-bottom: 1px dashed;
    }

    @media print {
      @page {
        width: 80mm;
        margin: 0mm;
      }

      .back {
        display: none !important;
      }
    }
  </style>
</head>

<body onload="window.print()">
  <div class="content" style="margin-bottom: 30px">
    <div class="title">
      <strong>Mulfi Collection</strong>
      <br>
      Jl. Sayabulu Link. Tower No. 3 Ciracas, Kota Serang, Banten.
      <br>
      np hp/telp: 082299950890
    </div>

    <div class="head">
      <table cellspacing="0" cellpadding="0">
        <tr>
          <td style="width:200px">
            {{ $checkout->tanggal }}
          </td>
          <td>Kasir</td>
          <td style="text-align:center; width:10px"></td>
          <td style="text-align:right;">
            {{ $checkout->nama_kasir }}
          </td>
        </tr>
        <tr>
          <td>
            {{ $checkout->invoice }}
          </td>
          <td>Customer</td>
          <td style="text-align:center;"></td>
          <td style="text-align:right;">
            Umum
          </td>
        </tr>
      </table>
    </div>

    <div class="transaction">
      <table class="transaction-table" cellspacing="0" cellpadding="0">
        <?php $arr_diskons = []; ?>
        <?php foreach ($checkout->details as $detail) : ?>
        <tr>
          <td style="width:155px;">{{ $detail->nama_barang }}</td>
          <td>{{ $detail->jumlah }}</td>
          <td style="text-align:right; width:200px">
            @if ($detail->diskon != 0)
            <del style="margin-right: 5px">@_currency($detail->harga)</del>
            @_currency($detail->harga - ($detail->diskon/100 * $detail->harga))
            ({{ $detail->diskon }}%)
            @else
            @_currency($detail->harga)
            @endif
          </td>
          <td style="text-align:right; width:200px">
            @if ($detail->diskon != 0)
            @_currency(($detail->harga - ($detail->diskon/100 * $detail->harga)) * $detail->jumlah)
            @else
            @_currency($detail->harga * $detail->jumlah)
            @endif
          </td>
        </tr>
        <?php endforeach; ?>

        <tr>
          <td colspan="4" style="border-bottom:1px dashed; padding-top:5px;"></td>
        </tr>
        <tr>
          <td colspan="2" style="text-align:center; padding-top:10px; "></td>
          <td style="text-align: right; padding-bottom:5px">Sub Total</td>
          <td style="text-align: right; padding-bottom:5px">
            @_currency($checkout->grand_total)
          </td>
        </tr>

        <tr>
          <td colspan="2"></td>
          <td style="border-top:1px dashed; text-align:right; padding-top:5px 0;">Grand Total</td>
          <td style="border-top:1px dashed; text-align:right; padding-top:5px 0;">
            @_currency($checkout->grand_total)
          </td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td style="border-top:1px dashed; text-align:right; padding-top:5px;">Cash</td>
          <td style="border-top:1px dashed; text-align:right; padding-top:5px;">
            @_currency($checkout->uang_customer)
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center;"></td>
          <td style="border-top:1px dashed; text-align:right; padding-top:5px;">Change</td>
          <td style="border-top:1px dashed; text-align:right; padding-top:5px;">
            @_currency($checkout->uang_customer - $checkout->grand_total)
          </td>
        </tr>
      </table>
    </div>
    <div class="thanks">
      Barang yang sudah dibeli tidak bisa dikembalikan
      <br>
      --- Thank You ---
      <br>
      Banten Outdoor
    </div>
  </div>

  <a class="back" href="{{ route('pos') }}">kembali</a>
</body>

</html>