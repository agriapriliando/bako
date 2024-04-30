<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    @vite('resources/js/app.js')
</head>
<style>
    table.customTable {
        width: 100%;
        background-color: #FFFFFF;
        border-collapse: collapse;
        border-width: 1px;
        border-color: #0a0a0a;
        border-style: solid;
        color: #000000;
    }

    table.customTable td,
    table.customTable th {
        border-width: 1px;
        border-color: #0a0a0a;
        border-style: solid;
        padding: 5px;
    }

    table.customTable thead {
        background-color: #b8b8b8;
    }

    .responsive {
        width: 100%;
        height: auto;
    }
</style>

<body>
    <div>
        <img class="responsive" src="{{ asset('images/kop_surat.JPG') }}" alt="kop_surat">
    </div>
    <table class="customTable" style="width:100%">
        <thead>
            <tr style="background-color: #FFFFFF">
                <th colspan="7">PERKEMBANGAN HARGA RATA-RATA BEBERAPA BAHAN POKOK</th>
            </tr>
            <tr style="background-color: #e8e808">
                <th colspan="2">Lokasi Pantauan : {{ strtoupper($pasar->nama) }}</th>
                <th colspan="5">Waktu : {{ Carbon\Carbon::parse($tgl)->isoFormat('dddd, D MMMM Y') }}</th>
            </tr>
            <tr style="background-color: #d1d3ff">
                <th rowspan="2" style="width: 4%">No</th>
                <th rowspan="2" style="width: 30%">Nama Bahan Pokok</th>
                <th colspan="2" style="width: 30%">Harga</th>
                <th colspan="2" style="width: 21%">Perubahan</th>
                <th rowspan="2" style="width: 15%">Ket</th>
            </tr>
            <tr style="background-color: #d1d3ff">
                <th style="width: 15%">Sebelumnya <br>{{ $tglmin }}</th>
                <th style="width: 15%">Hari Ini <br>{{ $tgl }}</th>
                <th style="width: 15%">Rp</th>
                <th>%</th>
            </tr>
        </thead>
        <tbody>
            @if (count($prices) == 0)
                <tr>
                    <td colspan="7">Data Tidak Tersedia</td>
                </tr>
            @else
                @foreach ($prices as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_item }}</td>
                        <td>@currency($item->hargakemarin)</td>
                        <td>@currency($item->hargahariini)</td>
                        <td>{{ $item->hargahariini > $item->hargakemarin ? '+' : '' }} @currency($item->hargaselisih)</td>
                        <td>{{ $item->hargakemarin == 0 ? 0 : round((($item->hargahariini - $item->hargakemarin) / $item->hargakemarin) * 100, 2) }}%</td>
                        <td>-</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div style="margin-top: 15px">
        <img class="responsive" src="{{ asset('images/kop_surat_ttd.JPG') }}" alt="kop_surat">
    </div>
</body>

</html>
