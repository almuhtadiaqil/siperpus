@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark align-center">PT. Hanil Jaya Steel</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <img src="{{ asset('image/hanil.png') }}" class="img-thumbnail rounded mx-auto d-block"
                            style="width:400px">
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-9 col-6">
                        <h2>Pendahuluan</h2>
                        <p align="justify">Seiring dengan pertumbuhan ekonomi yang cukup tinggi dan pesatnya perkembangan
                            sektor konstruksi, khususnya pembangunan infrastruktur. PT. Hanil Jaya Steel ikut berpartisipasi
                            melalui usaha penyediaan produk-produk Deformed Bars dan Plain Bars.</p>
                        <p align="justify">Dengan didukung staf dan karyawan yang berpengalaman di bidang besi baja,
                            peralatan-peralatan yang tepat serta fasilitas group, perusahaan senantiasa mengutamakan
                            kepuasan dan kepercayaan pelanggan, dengan menjamin bahwa produk yang dihasilkan dapat memenuhi
                            mutu yang dipersyaratkan, penyerahan produk tepat waktu serta harga yang bersaing.</p>

                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                </div>
                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
