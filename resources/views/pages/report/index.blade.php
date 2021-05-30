@extends('layouts.superadmin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <form action="{{ route('report.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="" class="col-form-label">Jenis Report</label>
                            <select name="jenis_dokumen" class="form-control">
                                @if ($dokumen = '')
                                    <option value=""></option>
                                    <option value="pemasukan">BC 2.3</option>
                                    <option value="pengeluaran">BC 2.5</option>
                                    <option value="mutasi">Mutasi Barang</option>
                                @elseif ($dokumen = 'pemasukan')
                                    <option value="pemasukan" selected>BC 2.3</option>
                                    <option value="pengeluaran">BC 2.5</option>
                                    <option value="mutasi">Mutasi Barang</option>
                                @elseif ($dokumen = 'pengeluaran')
                                    <option value="pemasukan">BC 2.3</option>
                                    <option value="pengeluaran" selected>BC 2.5</option>
                                    <option value="mutasi">Mutasi Barang</option>
                                @elseif ($dokumen = 'mutasi')
                                    <option value="pemasukan">BC 2.3</option>
                                    <option value="pengeluaran">BC 2.5</option>
                                    <option value="mutasi" selected>Mutasi Barang</option>
                                @endif
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="" class="col-form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_start">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="col-form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_finish">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    @if ($dokumen == 'pemasukan')
                        @include('pages.report.reportPemasukan')
                    @elseif($dokumen == 'pengeluaran')
                        @include('pages.report.reportPengeluaran')
                    @elseif($dokumen == 'mutasi')
                        @include('pages.report.reportMutasi')
                    @else

                    @endif

                </div>
                <hr>


            </div>
        </div>
    </div>

@endsection
