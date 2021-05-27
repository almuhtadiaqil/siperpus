@extends('layouts.superadmin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('superadmin.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_barang">Tambah Barang</button>
                <a href="#" class="btn btn-success btn-sm">Cetak Laporan</a>
                <br><br>

                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>HS Code</th>
                            <th>Kategori</th>
                            <th>Kondisi</th>
                            <th>Jenis Satuan</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->hs_code}}</td>
                                <td>{{$item->category}}</td>
                                <td>{{$item->kondisi}}</td>
                                <td>{{$item->jenis_satuan}}</td>
                                <td>{{$item->stok}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm edit-user" data-toggle="modal" data-target="#edit-barang-{{$item->id}}">Edit</button>
                                    <form action="{{ route('item.destroy', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                </td>
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
    {{-- awal modal tambah barang --}}
    <div id="tambah_barang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="{{route('item.store')}}" method="POST">
                    @method('POST')
                      @csrf
                      <div class="form-group">
                          <label for="name"
                              class="col-form-label">Nama Barang</label>
                          <input type="text" class="form-control" name="name">
                      </div>

                      <div class="form-group">
                          <label for="hs_code"
                              class="col-form-label">HS Code</label>
                          <input type="text" class="form-control" name="hs_code">
                      </div>

                      <div class="form-group">
                          <label for="category" class="col-form-label">Kategori</label>
                          <select name="category" class="form-control">
                              <option value="1">1</option>
                              <option value="2">2</option>
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="kondisi" class="col-form-label">Kondisi</label>
                        <select name="kondisi" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_satuan" class="col-form-label">Jenis Satuan</label>
                        <select name="jenis_satuan" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="stok" value="0">
                    </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
              </div>
          </div>
    </div>
    </div>
    {{-- akhir modal tambah barang --}}

      {{-- awal modal edit barang --}}
      @foreach ($items as $item)
      <div id="edit-barang-{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
  
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('item.update', $item->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name"
                                class="col-form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="name" value="{{$item->name}}">
                        </div>
  
                        <div class="form-group">
                            <label for="hs_code"
                                class="col-form-label">HS Code</label>
                            <input type="text" class="form-control" style="text-transform:uppercase" name="hs_code" value="{{$item->hs_code}}"">
                        </div>
  
                        <div class="form-group">
                            <label for="category" class="col-form-label">Kategori</label>
                            <select name="category" class="form-control">
                                <option @if($item->category == '1') selected ="selected" @endif   value="1">1</option>
                                <option @if($item->category == '2') selected ="selected" @endif  value="2">2</option>
                            </select>
                        </div>
  
                        <div class="form-group">
                          <label for="kondisi" class="col-form-label">Kondisi</label>
                          <select name="kondisi" class="form-control">
                            <option @if($item->kondisi == '1') selected ="selected" @endif   value="1">1</option>
                            <option @if($item->kondisi == '2') selected ="selected" @endif  value="2">2</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="jenis_satuan" class="col-form-label">Jenis Satuan</label>
                          <select name="jenis_satuan" class="form-control">
                            <option @if($item->jenis_satuan == '1') selected ="selected" @endif   value="1">1</option>
                            <option @if($item->jenis_satuan == '2') selected ="selected" @endif  value="2">2</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <input type="hidden" name="stok" value="{{$item->stok}}">
                      </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
      @endforeach

    {{-- akhir modal edit barang --}}
@endsection
