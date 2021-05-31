@extends('layouts.superadmin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                @if (Auth::user()->role !== 'visitor')
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_pengeluaran">Tambah
                        Pengeluaran</button>
                @endif
                <h1 class="text-center">Tabel Rekap Pengeluaran</h1>
                <br><br>

                <table class="table table-striped table-hover table-sm table-bordered" style="font-size:11px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No.Aju BC 2.3</th>
                            <th>Daftar BC 2.3</th>
                            <th>No.Aju BC 2.5</th>
                            <th>Daftar BC 2.5</th>
                            <th>Penerima</th>
                            <th>Invoice</th>
                            <th>Packing List</th>
                            <th>Valuta</th>
                            <th>Kurs</th>
                            <th>Nilai CIF</th>
                            <th>Nilai Barang</th>
                            <th>Barang</th>
                            <th>Get Out Start</th>
                            <th>Get Out Finish</th>
                            <th>Jumlah Barang</th>
                            <th>Jumlah Kemasan</th>
                            <th>Jenis Kemasan</th>
                            <th>Merk Kemasan</th>
                            <th>Berat Bruto</th>
                            <th>Berat Netto</th>
                            <th>Volume</th>
                            @if (Auth::user()->role !== 'visitor')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengeluarans as $pengeluaran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengeluaran->no_aju_bc23 }}</td>
                                <td>{{ date('d-m-Y', strtotime($pengeluaran->no_pendaftaran_23)) }}</td>
                                <td>{{ $pengeluaran->no_aju_bc25 }}</td>
                                <td>{{ date('d-m-Y', strtotime($pengeluaran->no_pendaftaran_25)) }}</td>
                                <td>{{ $pengeluaran->penerima }}</td>
                                <td>{{ date('d-m-Y', strtotime($pengeluaran->invoice)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($pengeluaran->packing_list)) }}</td>
                                <td>{{ $pengeluaran->valuta }}</td>
                                <td>{{ $pengeluaran->kurs }}</td>
                                <td>{{ $pengeluaran->nilai_cif }}</td>
                                <td>{{ $pengeluaran->nilai_barang }}</td>
                                <td>{{ $pengeluaran->barang }}</td>
                                <td>{{ date('d-m-Y', strtotime($pengeluaran->get_out_start)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($pengeluaran->get_out_finish)) }}</td>
                                <td>{{ $pengeluaran->jumlah_brg }}</td>
                                <td>{{ $pengeluaran->jumlah_kemasan }}</td>
                                <td>{{ $pengeluaran->jenis_kemasan }}</td>
                                <td>{{ $pengeluaran->merk_kemasan }}</td>
                                <td>{{ $pengeluaran->bruto }}</td>
                                <td>{{ $pengeluaran->netto }}</td>
                                <td>{{ $pengeluaran->volume }}</td>
                                @if (Auth::user()->role !== 'visitor')
                                    <td>
                                        <button class="btn btn-info btn-sm edit-user fas fa-edit" data-toggle="modal"
                                            data-target="#edit-barang-{{ $pengeluaran->id }}"></button>
                                        <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm fas fa-trash-alt"></button>
                                        </form>
                                    </td>
                                @endif
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
    <div id="tambah_pengeluaran" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah PEMASUKAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pengeluaran.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="no_aju_bc23" class="col-form-label">No Pengajuan BC 2.3</label>
                            <input type="text" class="form-control" name="no_aju_bc23" placeholder="123213" required>
                        </div>

                        <div class="form-group">
                            <label for="no_pendaftaran_23" class="col-form-label">No Pendaftaran BC 2.3</label>
                            <input type="date" class="form-control" name="no_pendaftaran_23" placeholder="1-05-2021"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="no_aju_bc25" class="col-form-label">No Pengajuan BC 2.5</label>
                            <input type="text" class="form-control" name="no_aju_bc25" placeholder="1234421" required>
                        </div>

                        <div class="form-group">
                            <label for="no_pendaftaran_25" class="col-form-label">No Pendaftaran BC 2.5</label>
                            <input type="date" class="form-control" name="no_pendaftaran_25" placeholder="31-05-2021"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="penerima" class="col-form-label">Penerima</label>
                            <input type="text" class="form-control" name="penerima" placeholder="Ujang" required>
                        </div>

                        <div class="form-group">
                            <label for="invoice" class="col-form-label">Invoice</label>
                            <input type="date" class="form-control" name="invoice" required>
                        </div>

                        <div class="form-group">
                            <label for="packing_list" class="col-form-label"></label>
                            <input type="date" class="form-control" name="packing_list" required>
                        </div>

                        <div class="form-group">
                            <label for="valuta" class="col-form-label">Valuta</label>
                            <input type="text" class="form-control" name="valuta" placeholder="seribu" required>
                        </div>

                        <div class="form-group">
                            <label for="kurs" class="col-form-label">Kurs</label>
                            <input type="text" class="form-control" name="kurs" placeholder="12" required>
                        </div>

                        <div class="form-group">
                            <label for="nilai_cif" class="col-form-label">Nilai CIF</label>
                            <input type="text" class="form-control" name="nilai_cif" placeholder="123" required>
                        </div>

                        <div class="form-group">
                            <label for="nilai_barang" class="col-form-label">Nilai Barang</label>
                            <input type="text" class="form-control" name="nilai_barang" placeholder="12" required>
                        </div>

                        <div class="form-group">
                            <label for="barang" class="col-form-label">Barang</label>
                            <select name="barang" class="form-control" required>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="get_out_start" class="col-form-label">Tanggal Keluar Start</label>
                            <input type="date" class="form-control" name="get_out_start" required>
                        </div>

                        <div class="form-group">
                            <label for="get_out_finish" class="col-form-label">Tanggal Keluar Start</label>
                            <input type="date" class="form-control" name="get_out_finish" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_brg" class="col-form-label">Jumlah Barang</label>
                            <input type="text" class="form-control" name="jumlah_brg" placeholder="12" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_kemasan" class="col-form-label">Jumlah Kemasan</label>
                            <input type="text" class="form-control" name="jumlah_kemasan" placeholder="12" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kemasan" class="col-form-label">Jenis Kemasan</label>
                            <input type="text" class="form-control" name="jenis_kemasan" placeholder="Plastik" required>
                        </div>

                        <div class="form-group">
                            <label for="merk_kemasan" class="col-form-label">Merk Kemasan</label>
                            <input type="text" class="form-control" name="merk_kemasan" placeholder="sidu" required>
                        </div>

                        <div class="form-group">
                            <label for="bruto" class="col-form-label">Bruto</label>
                            <input type="text" class="form-control" name="bruto" placeholder="12" required>
                        </div>

                        <div class="form-group">
                            <label for="netto" class="col-form-label">Netto</label>
                            <input type="text" class="form-control" name="netto" placeholder="12" required>
                        </div>

                        <div class="form-group">
                            <label for="volume" class="col-form-label">Volume</label>
                            <input type="text" class="form-control" name="volume" placeholder="12" required>
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
        <div id="edit-barang-{{ $pengeluaran->id }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="no_aju_bc23" class="col-form-label">No Pengajuan</label>
                                <input type="text" class="form-control" style="text-transform:uppercase" name="no_aju_bc23"
                                    value="{{ $pengeluaran->no_aju_bc23 }}">
                            </div>

                            <div class="form-group">
                                <label for="no_pendaftaran_23" class="col-form-label">No Pendaftaran</label>
                                <input type="date" class="form-control" name="no_pendaftaran_23"
                                    value="{{ $pengeluaran->no_pendaftaran_23 }}">
                            </div>

                            <div class="form-group">
                                <label for="no_aju_bc25" class="col-form-label">No Pengajuan</label>
                                <input type="text" class="form-control" style="text-transform:uppercase" name="no_aju_bc25"
                                    value="{{ $pengeluaran->no_aju_bc25 }}">
                            </div>

                            <div class="form-group">
                                <label for="no_pendaftaran_25" class="col-form-label">No Pendaftaran</label>
                                <input type="date" class="form-control" name="no_pendaftaran_25"
                                    value="{{ $pengeluaran->no_pendaftaran_25 }}">
                            </div>

                            <div class="form-group">
                                <label for="penerima" class="col-form-label">Pemasok</label>
                                <input type="text" class="form-control" name="penerima"
                                    value="{{ $pengeluaran->penerima }}">
                            </div>

                            <div class="form-group">
                                <label for="invoice" class="col-form-label">Invoice</label>
                                <input type="date" class="form-control" name="invoice"
                                    value="{{ $pengeluaran->invoice }}">
                            </div>

                            <div class="form-group">
                                <label for="packing_list" class="col-form-label">BL</label>
                                <input type="date" class="form-control" name="packing_list"
                                    value="{{ $pengeluaran->packing_list }}">
                            </div>

                            <div class="form-group">
                                <label for="valuta" class="col-form-label">Valuta</label>
                                <input type="text" class="form-control" name="valuta" value="{{ $pengeluaran->valuta }}">
                            </div>

                            <div class="form-group">
                                <label for="kurs" class="col-form-label">Kurs</label>
                                <input type="text" class="form-control" name="kurs" value="{{ $pengeluaran->kurs }}">
                            </div>

                            <div class="form-group">
                                <label for="nilai_cif" class="col-form-label">Nilai CIF</label>
                                <input type="text" class="form-control" name="nilai_cif"
                                    value="{{ $pengeluaran->nilai_cif }}">
                            </div>

                            <div class="form-group">
                                <label for="nilai_barang" class="col-form-label">Nilai Barang</label>
                                <input type="text" class="form-control" name="nilai_barang"
                                    value="{{ $pengeluaran->nilai_barang }}">
                            </div>

                            <div class="form-group">
                                <label for="barang" class="col-form-label">Barang</label>
                                <select name="barang" class="form-control" required>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $pengeluaran->barang == $item->id ? 'selected' : '' }}>
                                            {{ $item->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="get_out_start" class="col-form-label">Tanggal Masuk Start</label>
                                <input type="date" class="form-control" name="get_out_start"
                                    value="{{ $pengeluaran->get_out_start }}">
                            </div>

                            <div class="form-group">
                                <label for="get_out_finish" class="col-form-label">Tanggal Masuk Start</label>
                                <input type="date" class="form-control" name="get_out_finish"
                                    value="{{ $pengeluaran->get_out_finish }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_brg" class="col-form-label">Jumlah Barang</label>
                                <input type="text" class="form-control" name="jumlah_brg"
                                    value="{{ $pengeluaran->jumlah_brg }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_kemasan" class="col-form-label">Jumlah Kemasan</label>
                                <input type="text" class="form-control" name="jumlah_kemasan"
                                    value="{{ $pengeluaran->jumlah_kemasan }}">
                            </div>

                            <div class="form-group">
                                <label for="jenis_kemasan" class="col-form-label">Jenis Kemasan</label>
                                <input type="text" class="form-control" name="jenis_kemasan"
                                    value="{{ $pengeluaran->jenis_kemasan }}">
                            </div>

                            <div class="form-group">
                                <label for="merk_kemasan" class="col-form-label">Merk Kemasan</label>
                                <input type="text" class="form-control" name="merk_kemasan"
                                    value="{{ $pengeluaran->merk_kemasan }}">
                            </div>

                            <div class="form-group">
                                <label for="bruto" class="col-form-label">Bruto</label>
                                <input type="text" class="form-control" name="bruto" value="{{ $pengeluaran->bruto }}">
                            </div>

                            <div class="form-group">
                                <label for="netto" class="col-form-label">Netto</label>
                                <input type="text" class="form-control" name="netto" value="{{ $pengeluaran->netto }}">
                            </div>

                            <div class="form-group">
                                <label for="volume" class="col-form-label">Volume</label>
                                <input type="text" class="form-control" name="volume" value="{{ $pengeluaran->volume }}">
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
