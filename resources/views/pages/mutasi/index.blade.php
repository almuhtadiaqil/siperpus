@extends('layouts.superadmin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <br>
                <h1 class="text-center">Tabel Rekap Mutasi</h1>
                <br>
                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Saldo Akhir</th>
                            <th>Selisih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($results as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->pemasukan }}</td>
                                <td>{{ $item->pengeluaran }}</td>
                                <td>{{ $item->saldo_akhir }}</td>
                                <td>{{ $item->selisih }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">
                                    Tidak ada data
                                </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
