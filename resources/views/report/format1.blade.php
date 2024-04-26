<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <img class="responsive" src="{{ url('assets/images/kop_surat.JPG') }}" alt="kop_surat">
    <table class="customTable">
        <thead>
            <tr style="background-color: #FFFFFF">
                <th colspan="7">PERKEMBANGAN HARGA RATA-RATA BEBERAPA BAHAN POKOK</th>
            </tr>
            <tr style="background-color: #e8e808">
                <th colspan="2">Lokasi Pantauan : {{ strtoupper($pasar->nama) }}</th>
                <th colspan="5">Waktu : {{ Carbon\Carbon::parse($tgl)->isoFormat('dddd, D MMMM Y') }}</th>
            </tr>
            <tr style="background-color: #d1d3ff">
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Bahan Pokok</th>
                <th colspan="2">Harga</th>
                <th colspan="2">Perubahan</th>
                <th rowspan="2">Ket</th>
            </tr>
            <tr style="background-color: #d1d3ff">
                <th>Sebelumnya <br>{{ $tglmin }}</th>
                <th>Hari Ini <br>{{ $tgl }}</th>
                <th>Rp</th>
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
</body>

</html>
