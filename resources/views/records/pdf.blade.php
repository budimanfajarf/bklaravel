<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kegitatan {{ $record->id }} | {{ now()->format('Ymd') }}</title>
    <link href="{{ asset('images/logo.png') }}" rel="icon" type="image/png">     
    <style>
        table {
            width: 100%;
        }

        .report {
            /*font-family: arial;*/
            font-size: 15px;
            /*background-color: red;
            border: 1px solid green;*/
        }

        .report-header {
            border-bottom: 2px solid black;
            width: 100%;
        }
        .report-header td {
            text-align: center;
            /*border: 1px solid green;*/
        }
        .head1 {
            font-size: 20px;
            letter-spacing: 2px;
        }
        .head2 {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 3px;
        }
        .head3 {
            font-size: 12px;
            letter-spacing: 1px;
            /*font-size: 11px;*/
        }

        .report-rincian td {
            height: 26px;
            /*line-height: 1px;*/
            vertical-align: top;
            text-align: justify;
        }
        .report-siswa {
            border-collapse: collapse;
        }
        .report-siswa td, .report-siswa th {
            text-align: center;
            /* height: 30px; */
            padding: 5px 10px;
            border: 1px solid #333;
        }

        .text-right {
            text-align: right;
        } 
        .text-left, td.text-left {
            text-align: left;
        }
        .text-center {
            text-align: center;
        }                       
    </style>
</head>
<body>
    <table class="report report-header">
        <tr>
            <td style="width: 15%;"><img src="images/logo.png" style="width: 70px;"></td>
            <td style="width: 85%;">
              <div class="head1">LAPORAN KEGIATAN BIMBINGAN KONSELING</div>
              <div class="head2">SMK NEGERI 1 MAJALAYA</div>
              <div class="head3">JL.Idris No.99 Rancajigang Kec. Majalaya Kab.Bandung Telp. (021) 52725477</div>
            </td>
        </tr>
    </table>
    <br>
    <table class="report report-rincian">
        <tr>
            <td style="width: 20%;">Tanggal</td>
            <td style="width: 2%;">:</td>
            <td>{{ $record->date }}</td>
        </tr>
        <tr>
            <td>Layanan</td>
            <td>:</td>
            <td>{{ $record->subservice->service->name }}</td>
        </tr>
        <tr>
            <td>Nama Kegiatan</td>
            <td>:</td>
            <td>{{ $record->subservice->name }}</td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td>{{ $record->place }}</td>
        </tr>
        <tr>
            <td>Uraian Kegiatan</td>
            <td>:</td>
            <td>{{ $record->desc }}</td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>{{ $record->info }}</td>
        </tr>
    </table>
    <br>

    <h4>SISWA YANG BERSANGKUTAN</h4>
    <table class="report-siswa">
        <tr>
            <th style="width: 21%;">NIS</th>
            <th style="width: 30%;">Nama</th>
            <th style="width: 13%;">KK</th>
            <th style="width: 13%;">Tingkat</th>
            <th style="width: 13%;">Kelas</th>
        </tr>
        @foreach ($record->students as $student)
            <tr>
                <td class="text-left">{{ $student->code }}</td>
                <td class="text-left">{{ $student->name }}</td>
                <td>{{ $student->program }}</td>
                <td>{{ $student->level }}</td>
                <td>{{ $student->room }}</td>
            </tr>
        @endforeach
    </table>    
    
    <p class="text-right" style="font-size: 13px">Dicetak Pada: {{ now()->format('d-m-Y H:i') }}</p>   
</body>
</html>