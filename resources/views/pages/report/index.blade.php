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
                                <option value=""></option>
                                <option @if($dokumen=='pemasukan') selected @endif value="pemasukan">BC 2.3</option>
                                <option @if($dokumen=='pengeluaran') selected @endif value="pengeluaran">BC 2.5</option>
                                <option @if($dokumen=='mutasi') selected @endif value="mutasi">Mutasi Barang</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="" class="col-form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_start" @if ($request!=null)
                                    value='{{$request->tgl_start}}'
                                @endif>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="col-form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tgl_finish" @if ($request!=null)
                                value='{{$request->tgl_finish}}'
                            @endif>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>

                    </form>
                    <br>
                    @if ($dokumen == 'pemasukan')
                        @include('pages.report.reportPemasukan')
                    @elseif($dokumen == 'pengeluaran')
                        @include('pages.report.reportPengeluaran')
                    @elseif($dokumen == 'mutasi')
                        @include('pages.report.reportMutasi')
                    @else

                    @endif
                    @if($dokumen!='' && $request!=null)
                        <div>
                            <a href="{{ url('/export_'.$dokumen.'/'.$request->tgl_start.'/'.$request->tgl_finish) }}" class="btn btn-info">Export</a>
                        </div>
                    @endif
                </div>
                <hr>


            </div>
        </div>
    </div>

@endsection
