@extends('layouts.superadmin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            
            <div class="row justify-content-center">
            <form action="" method="POST">
                        <div class="form-group">
                            <label for="" class="col-form-label">Jenis Report</label>
                            <select name="" class="form-control">
                                <option>BC 2.3</option>
                                <option>BC 2.5</option>
                                <option>Mutasi Barang</option>
                            </select>
                        </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                          <label for=""
                              class="col-form-label">Tanggal</label>
                          <input type="date" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                          <label for=""
                              class="col-form-label">Tanggal</label>
                          <input type="date" class="form-control">
                      </div>
                    </div>            
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="submit" class="btn btn-info">Export</button>
                    </form>
                            
            </div> 
            <hr>


            </div>
        </div>
    </div>
  
@endsection
