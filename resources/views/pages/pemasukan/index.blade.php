@extends('layouts.superadmin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('superadmin.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_pemasukan">Tambah Pemasukan</button>
                <a href="#" class="btn btn-success btn-sm">Cetak Laporan</a>
                <br><br>

                <table class="table table-striped table-hover table-sm table-bordered" style="font-size:11px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No.Pengajuan</th>
                            <th>No.Pendaftaran</th>
                            <th>Pemasok</th>
                            <th>Invoice</th>
                            <th>B/L</th>
                            <th>Valuta</th>
                            <th>Kurs</th>
                            <th>Nilai CIF</th>
                            <th>Nilai Barang</th>
                            <th>Barang</th>
                            <th>Tgl Masuk (Start)</th>
                            <th>Tgl Masuk (Finish)</th>
                            <th>Jumlah Barang</th>
                            <th>Jumlah Kemasan</th>
                            <th>Merk Kemasan</th>
                            <th>Berat Bruto</th>
                            <th>Berat Netto</th>
                            <th>Volume</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>27-06-2021</td>
                                <td>Dadang</td>
                                <td>27-06-2021</td>
                                <td>27-06-2021</td>
                                <td>USD</td>
                                <td>Rp.14.000</td>
                                <td>5 USD</td>
                                <td>Rp.10.000</td>
                                <td>Rokok</td>
                                <td>27-06-2021</td>
                                <td>27-06-2021</td>
                                <td>1</td>
                                <td>1</td>
                                <td>sampoerna</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <button class="btn btn-info btn-sm edit-user" data-toggle="modal" data-target="#edit-barang">x</button>
                                    <form action="" method="POST"
                                        style="display: inline;">
                                      
                                        <button type="submit" class="btn btn-danger btn-sm">x</button>
                                    </form>

                                </td>
                            </tr>
                       
                            <tr>
                                <td colspan="20" class="text-center">
                                    Tidak ada data
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
@endsection
