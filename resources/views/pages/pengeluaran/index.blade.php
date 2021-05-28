@extends('layouts.superadmin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('superadmin.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_pengeluaran">Tambah Pemasukan</button>
                <a href="#" class="btn btn-success btn-sm">Cetak Laporan</a>
                <br><br>

                <table class="table table-striped table-hover table-sm table-bordered" style="font-size:11px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No.Aju</th>
                            <th>No.Pendaftaran</th>
                            <th>No.Aju</th>
                            <th>No.Pendaftaran</th>
                            <th>Penerima</th>
                            <th>Invoice</th>
                            <th>Packing List</th>
                            <th>Valuta</th>
                            <th>Kurs</th>
                            <th>Nilai CIF</th>
                            <th>Nilai Barang</th>
                            <th>Barang</th>
                            <th>Get Out</th>
                            <th>Jumlah Barang</th>
                            <th>Jumlah Kemasan</th>
                            <th>Jenis Kemasan</th>
                            <th>Merk Kemasan</th>
                            <th>Berat Bruto</th>
                            <th>Berat Netto</th>
                            <th>Volume</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengeluarans as $pengeluaran)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pengeluaran->no_aju_bc23}}</td>
                                <td>{{$pengeluaran->no_pendaftaran_23}}</td>
                                <td>{{$pengeluaran->no_aju_bc25}}</td>
                                <td>{{$pengeluaran->no_pendaftaran_25}}</td>
                                <td>{{$pengeluaran->penerima}}</td>
                                <td>{{$pengeluaran->invoice}}</td>
                                <td>{{$pengeluaran->packing_list}}</td>
                                <td>{{$pengeluaran->valuta}}</td>
                                <td>{{$pengeluaran->kurs}}</td>
                                <td>{{$pengeluaran->nilai_cif}}</td>
                                <td>{{$pengeluaran->nilai_barang}}</td>
                                <td>{{$pengeluaran->barang}}</td>
                                <td>{{$pengeluaran->get_out}}</td>
                                <td>{{$pengeluaran->jumlah_brg}}</td>
                                <td>{{$pengeluaran->jumlah_kemasan}}</td>
                                <td>{{$pengeluaran->jenis_kemasan}}</td>
                                <td>{{$pengeluaran->merk_kemasan}}</td>
                                <td>{{$pengeluaran->bruto}}</td>
                                <td>{{$pengeluaran->netto}}</td>
                                <td>{{$pengeluaran->volume}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm edit-user" data-toggle="modal" data-target="#edit-barang-{{$pengeluaran->id}}">Edit</button>
                                    <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="20" class="text-center">
                                    Tidak ada data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- awal modal tambah pengeluaran --}}
    <div id="tambah_pengeluaran" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah PEMASUKAN</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="{{route('pengeluaran.store')}}" method="POST">
                    @method('POST')
                      @csrf
                      <div class="form-group">
                          <label for="no_aju_bc23"
                              class="col-form-label">No Pengajuan</label>
                          <input type="text" class="form-control" name="no_aju_bc23">
                      </div>

                      <div class="form-group">
                          <label for="no_pendaftaran_23"
                              class="col-form-label">No Pendaftaran</label>
                          <input type="date" class="form-control" name="no_pendaftaran_23">
                      </div>

                      <div class="form-group">
                          <label for="no_aju_bc25"
                              class="col-form-label">No Pengajuan</label>
                          <input type="text" class="form-control" name="no_aju_bc25">
                      </div>

                      <div class="form-group">
                          <label for="no_pendaftaran_25"
                              class="col-form-label">No Pendaftaran</label>
                          <input type="date" class="form-control" name="no_pendaftaran_25">
                      </div>

                      <div class="form-group">
                          <label for="penerima"
                              class="col-form-label">Pemasok</label>
                          <input type="text" class="form-control" name="penerima">
                      </div>

                      <div class="form-group">
                          <label for="invoice"
                              class="col-form-label">Invoice</label>
                          <input type="date" class="form-control" name="invoice">
                      </div>

                      <div class="form-group">
                          <label for="packing_list"
                              class="col-form-label">BL</label>
                          <input type="date" class="form-control" name="packing_list">
                      </div>

                      <div class="form-group">
                          <label for="valuta"
                              class="col-form-label">Valuta</label>
                          <input type="text" class="form-control" name="valuta">
                      </div>

                      <div class="form-group">
                          <label for="kurs"
                              class="col-form-label">Kurs</label>
                          <input type="text" class="form-control" name="kurs">
                      </div>

                      <div class="form-group">
                          <label for="nilai_cif"
                              class="col-form-label">Nilai CIF</label>
                          <input type="text" class="form-control" name="nilai_cif">
                      </div>

                      <div class="form-group">
                          <label for="nilai_barang"
                              class="col-form-label">Nilai Barang</label>
                          <input type="text" class="form-control" name="nilai_barang">
                      </div>

                      <div class="form-group">
                          <label for="barang"
                              class="col-form-label">Barang</label>
                          <input type="text" class="form-control" name="barang">
                      </div>

                      <div class="form-group">
                          <label for="get_out"
                              class="col-form-label">Tanggal Masuk Start</label>
                          <input type="date" class="form-control" name="get_out">
                      </div>

                      <div class="form-group">
                          <label for="jumlah_brg"
                              class="col-form-label">Jumlah Barang</label>
                          <input type="text" class="form-control" name="jumlah_brg">
                      </div>

                      <div class="form-group">
                          <label for="jumlah_kemasan"
                              class="col-form-label">Jumlah Kemasan</label>
                          <input type="text" class="form-control" name="jumlah_kemasan">
                      </div>

                      <div class="form-group">
                          <label for="jenis_kemasan"
                              class="col-form-label">Jenis Kemasan</label>
                          <input type="text" class="form-control" name="jenis_kemasan">
                      </div>

                      <div class="form-group">
                          <label for="merk_kemasan"
                              class="col-form-label">Merk Kemasan</label>
                          <input type="text" class="form-control" name="merk_kemasan">
                      </div>

                      <div class="form-group">
                          <label for="bruto"
                              class="col-form-label">Bruto</label>
                          <input type="text" class="form-control" name="bruto">
                      </div>

                      <div class="form-group">
                          <label for="netto"
                              class="col-form-label">Netto</label>
                          <input type="text" class="form-control" name="netto">
                      </div>

                      <div class="form-group">
                          <label for="volume"
                              class="col-form-label">Volume</label>
                          <input type="text" class="form-control" name="volume">
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
              </div>
          </div>
    </div>
    </div>
    {{-- akhir modal tambah pengeluaran --}}

      {{-- awal modal edit pengeluaran --}}
      @foreach ($pengeluarans as $pengeluaran)
      <div id="edit-barang-{{$pengeluaran->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
  
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('pengeluaran.update', $pengeluaran->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label for="no_aju_bc23"
                              class="col-form-label">No Pengajuan</label>
                          <input type="text" class="form-control" style="text-transform:uppercase" name="no_aju_bc23" value="{{$pengeluaran->no_aju_bc23}}">
                      </div>

                      <div class="form-group">
                          <label for="no_pendaftaran_23"
                              class="col-form-label">No Pendaftaran</label>
                          <input type="date" class="form-control" name="no_pendaftaran_23" value="{{$pengeluaran->no_pendaftaran_23}}">
                      </div>

                      <div class="form-group">
                          <label for="no_aju_bc25"
                              class="col-form-label">No Pengajuan</label>
                          <input type="text" class="form-control" style="text-transform:uppercase" name="no_aju_bc25" value="{{$pengeluaran->no_aju_bc25}}">
                      </div>

                      <div class="form-group">
                          <label for="no_pendaftaran_25"
                              class="col-form-label">No Pendaftaran</label>
                          <input type="date" class="form-control" name="no_pendaftaran_25" value="{{$pengeluaran->no_pendaftaran_25}}">
                      </div>

                      <div class="form-group">
                          <label for="penerima"
                              class="col-form-label">Pemasok</label>
                          <input type="text" class="form-control" name="penerima" value="{{$pengeluaran->penerima}}">
                      </div>

                      <div class="form-group">
                          <label for="invoice"
                              class="col-form-label">Invoice</label>
                          <input type="date" class="form-control" name="invoice" value="{{$pengeluaran->invoice}}">
                      </div>

                      <div class="form-group">
                          <label for="packing_list"
                              class="col-form-label">BL</label>
                          <input type="date" class="form-control" name="packing_list" value="{{$pengeluaran->packing_list}}">
                      </div>

                      <div class="form-group">
                          <label for="valuta"
                              class="col-form-label">Valuta</label>
                          <input type="text" class="form-control" name="valuta" value="{{$pengeluaran->valuta}}">
                      </div>

                      <div class="form-group">
                          <label for="kurs"
                              class="col-form-label">Kurs</label>
                          <input type="text" class="form-control" name="kurs" value="{{$pengeluaran->kurs}}">
                      </div>

                      <div class="form-group">
                          <label for="nilai_cif"
                              class="col-form-label">Nilai CIF</label>
                          <input type="text" class="form-control" name="nilai_cif" value="{{$pengeluaran->nilai_cif}}">
                      </div>

                      <div class="form-group">
                          <label for="nilai_barang"
                              class="col-form-label">Nilai Barang</label>
                          <input type="text" class="form-control" name="nilai_barang" value="{{$pengeluaran->nilai_barang}}">
                      </div>

                      <div class="form-group">
                          <label for="barang"
                              class="col-form-label">Barang</label>
                          <input type="text" class="form-control" name="barang" value="{{$pengeluaran->barang}}">
                      </div>

                      <div class="form-group">
                          <label for="get_out"
                              class="col-form-label">Tanggal Masuk Start</label>
                          <input type="date" class="form-control" name="get_out" value="{{$pengeluaran->get_out}}">
                      </div>

                      <div class="form-group">
                          <label for="jumlah_brg"
                              class="col-form-label">Jumlah Barang</label>
                          <input type="text" class="form-control" name="jumlah_brg" value="{{$pengeluaran->jumlah_brg}}">
                      </div>

                      <div class="form-group">
                          <label for="jumlah_kemasan"
                              class="col-form-label">Jumlah Kemasan</label>
                          <input type="text" class="form-control" name="jumlah_kemasan" value="{{$pengeluaran->jumlah_kemasan}}">
                      </div>

                      <div class="form-group">
                          <label for="jenis_kemasan"
                              class="col-form-label">Jenis Kemasan</label>
                          <input type="text" class="form-control" name="jenis_kemasan" value="{{$pengeluaran->jenis_kemasan}}">
                      </div>

                      <div class="form-group">
                          <label for="merk_kemasan"
                              class="col-form-label">Merk Kemasan</label>
                          <input type="text" class="form-control" name="merk_kemasan" value="{{$pengeluaran->merk_kemasan}}">
                      </div>

                      <div class="form-group">
                          <label for="bruto"
                              class="col-form-label">Bruto</label>
                          <input type="text" class="form-control" name="bruto" value="{{$pengeluaran->bruto}}">
                      </div>

                      <div class="form-group">
                          <label for="netto"
                              class="col-form-label">Netto</label>
                          <input type="text" class="form-control" name="netto" value="{{$pengeluaran->netto}}">
                      </div>

                      <div class="form-group">
                          <label for="volume"
                              class="col-form-label">Volume</label>
                          <input type="text" class="form-control" name="volume" value="{{$pengeluaran->volume}}">
                      </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
      @endforeach

    {{-- akhir modal edit pengeluaran --}}
   
@endsection