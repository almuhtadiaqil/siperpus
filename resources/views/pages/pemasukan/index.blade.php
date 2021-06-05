@extends('layouts.superadmin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                @if (Auth::user()->role !== 'visitor')
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_pemasukan">Tambah
                        Pemasukan</button>
                @endif
                <h1 class="text-center">Tabel Rekap Pemasukan</h1>
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
                        @forelse($pemasukans as $pemasukan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemasukan->no_pengajuan }}</td>
                                <td>{{ date('d-m-Y', strtotime($pemasukan->no_pendaftaran)) }}</td>
                                <td>{{ $pemasukan->pemasok }}</td>
                                <td>{{ date('d-m-Y', strtotime($pemasukan->invoice)) }}</td>
                                <td>{{ $pemasukan->bl }}</td>
                                <td>{{ $pemasukan->valuta }}</td>
                                <td>{{ $pemasukan->kurs }}</td>
                                <td>{{ $pemasukan->nilai_cif }}</td>
                                <td>{{ $pemasukan->nilai_barang }}</td>
                                <td>{{ App\Models\Item::where('id', $pemasukan->barang)->value('name') }}</td>
                                <td>{{ date('d-m-Y', strtotime($pemasukan->tgl_msk_start)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($pemasukan->tgl_msk_finish)) }}</td>
                                <td>{{ $pemasukan->jumlah_brg }}</td>
                                <td>{{ $pemasukan->jumlah_kemasan }}</td>
                                <td>{{ $pemasukan->jenis_kemasan }}</td>
                                <td>{{ $pemasukan->merk_kemasan }}</td>
                                <td>{{ $pemasukan->bruto }}</td>
                                <td>{{ $pemasukan->netto }}</td>
                                <td>{{ $pemasukan->volume }}</td>
                                @if (Auth::user()->role !== 'visitor')
                                    <td>
                                        <button class="btn btn-info btn-sm edit-user fas fa-edit d-inline"
                                            data-toggle="modal" data-target="#edit-barang-{{ $pemasukan->id }}"></button>
                                        <form action="{{ route('pemasukan.destroy', $pemasukan->id) }}" method="POST"
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

    {{-- awal modal tambah pemasukan --}}
    <div id="tambah_pemasukan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pemasukan.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="no_pengajuan" class="col-form-label">No Pengajuan</label>
                            <input type="text" class="form-control" name="no_pengajuan" placeholder="Contoh : 1" required>
                        </div>

                        <div class="form-group">
                            <label for="no_pendaftaran" class="col-form-label">No Pendaftaran</label>
                            <input type="date" class="form-control" name="no_pendaftaran" required>
                        </div>

                        <div class="form-group">
                            <label for="pemasok" class="col-form-label">Pemasok</label>
                            <input type="text" class="form-control" name="pemasok" placeholder="Contoh : Yusuf" required>
                        </div>

                        <div class="form-group">
                            <label for="invoice" class="col-form-label">Invoice</label>
                            <input type="date" class="form-control" name="invoice" required>
                        </div>

                        <div class="form-group">
                            <label for="bl" class="col-form-label">BL</label>
                            <input type="text" class="form-control" name="bl" placeholder="Contoh : 31-05-2021" required>
                        </div>

                        <div class="form-group">
                            <label for="valuta" class="col-form-label">Valuta</label>
                            <input type="text" class="form-control" name="valuta" placeholder="Contoh : Rupiah" required>
                        </div>

                        <div class="form-group">
                            <label for="kurs" class="col-form-label">Kurs</label>
                            <input type="number" step="any" class="form-control" name="kurs" placeholder="Contoh : 123.21"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="nilai_cif" class="col-form-label">Nilai CIF</label>
                            <input type="number" step="any" class="form-control" name="nilai_cif"
                                placeholder="Contoh : 123.21" required>
                        </div>

                        <div class="form-group">
                            <label for="nilai_barang" class="col-form-label">Nilai Barang</label>
                            <input type="number" step="any" class="form-control" name="nilai_barang"
                                placeholder="Contoh : 123.21" required>
                        </div>

                        <div class="form-group">
                            <label for="barang" class="col-form-label">Barang</label>
                            <select name="barang" class="form-control" required>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tgl_msk_start" class="col-form-label">Tanggal Masuk Start</label>
                            <input type="date" class="form-control" name="tgl_msk_start" required>
                        </div>

                        <div class="form-group">
                            <label for="tgl_msk_finish" class="col-form-label">Tanggal Masuk Finish</label>
                            <input type="date" class="form-control" name="tgl_msk_finish" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_brg" class="col-form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" name="jumlah_brg" placeholder="Contoh : 10" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_kemasan" class="col-form-label">Jumlah Kemasan</label>
                            <input type="number" class="form-control" name="jumlah_kemasan" placeholder="Contoh : 10"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kemasan" class="col-form-label">Jenis Kemasan</label>
                            <input type="text" class="form-control" name="jenis_kemasan" placeholder="Contoh : Plastik"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="merk_kemasan" class="col-form-label">Merk Kemasan</label>
                            <input type="text" class="form-control" name="merk_kemasan" placeholder="Contoh : Baja"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="bruto" class="col-form-label">Bruto</label>
                            <input type="number" step="any" class="form-control" name="bruto" placeholder="Contoh : 11.11"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="netto" class="col-form-label">Netto</label>
                            <input type="number" step="any" class="form-control" name="netto" placeholder="Contoh : 12.12"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="volume" class="col-form-label">Volume</label>
                            <input type="number" step="any" class="form-control" name="volume" placeholder="Contoh : 13.13"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- akhir modal tambah pemasukan --}}

    {{-- awal modal edit pemasukan --}}
    @foreach ($pemasukans as $pemasukan)
        <div id="edit-barang-{{ $pemasukan->id }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pemasukan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="no_pengajuan" class="col-form-label">No Pengajuan</label>
                                <input type="text" class="form-control" style="text-transform:uppercase" name="no_pengajuan"
                                    value="{{ $pemasukan->no_pengajuan }}">
                            </div>

                            <div class="form-group">
                                <label for="no_pendaftaran" class="col-form-label">No Pendaftaran</label>
                                <input type="date" class="form-control" name="no_pendaftaran"
                                    value="{{ $pemasukan->no_pendaftaran }}">
                            </div>

                            <div class="form-group">
                                <label for="pemasok" class="col-form-label">Pemasok</label>
                                <input type="text" class="form-control" name="pemasok" value="{{ $pemasukan->pemasok }}">
                            </div>

                            <div class="form-group">
                                <label for="invoice" class="col-form-label">Invoice</label>
                                <input type="date" class="form-control" name="invoice" value="{{ $pemasukan->invoice }}">
                            </div>

                            <div class="form-group">
                                <label for="bl" class="col-form-label">BL</label>
                                <input type="text" class="form-control" name="bl" value="{{ $pemasukan->bl }}">
                            </div>

                            <div class="form-group">
                                <label for="valuta" class="col-form-label">Valuta</label>
                                <input type="text" class="form-control" name="valuta" value="{{ $pemasukan->valuta }}">
                            </div>

                            <div class="form-group">
                                <label for="kurs" class="col-form-label">Kurs</label>
                                <input type="number" step="any" class="form-control" name="kurs"
                                    value="{{ $pemasukan->kurs }}">
                            </div>

                            <div class="form-group">
                                <label for="nilai_cif" class="col-form-label">Nilai CIF</label>
                                <input type="number" step="any" class="form-control" name="nilai_cif"
                                    value="{{ $pemasukan->nilai_cif }}">
                            </div>

                            <div class="form-group">
                                <label for="nilai_barang" class="col-form-label">Nilai Barang</label>
                                <input type="number" step="any" class="form-control" name="nilai_barang"
                                    value="{{ $pemasukan->nilai_barang }}">
                            </div>

                            <div class="form-group">
                                <label for="barang" class="col-form-label">Barang</label>
                                <select name="barang" class="form-control" required>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $pemasukan->barang == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tgl_msk_start" class="col-form-label">Tanggal Masuk Start</label>
                                <input type="date" class="form-control" name="tgl_msk_start"
                                    value="{{ $pemasukan->tgl_msk_start }}">
                            </div>

                            <div class="form-group">
                                <label for="tgl_msk_finish" class="col-form-label">Tanggal Masuk Finish</label>
                                <input type="date" class="form-control" name="tgl_msk_finish"
                                    value="{{ $pemasukan->tgl_msk_finish }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_brg" class="col-form-label">Jumlah Barang</label>
                                <input type="number" class="form-control" name="jumlah_brg"
                                    value="{{ $pemasukan->jumlah_brg }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_kemasan" class="col-form-label">Jumlah Kemasan</label>
                                <input type="number" class="form-control" name="jumlah_kemasan"
                                    value="{{ $pemasukan->jumlah_kemasan }}">
                            </div>

                            <div class="form-group">
                                <label for="jenis_kemasan" class="col-form-label">Jenis Kemasan</label>
                                <input type="text" class="form-control" name="jenis_kemasan"
                                    value="{{ $pemasukan->jenis_kemasan }}">
                            </div>

                            <div class="form-group">
                                <label for="merk_kemasan" class="col-form-label">Merk Kemasan</label>
                                <input type="text" class="form-control" name="merk_kemasan"
                                    value="{{ $pemasukan->merk_kemasan }}">
                            </div>

                            <div class="form-group">
                                <label for="bruto" class="col-form-label">Bruto</label>
                                <input type="number" step="any" class="form-control" name="bruto"
                                    value="{{ $pemasukan->bruto }}">
                            </div>

                            <div class="form-group">
                                <label for="netto" class="col-form-label">Netto</label>
                                <input type="number" step="any" class="form-control" name="netto"
                                    value="{{ $pemasukan->netto }}">
                            </div>

                            <div class="form-group">
                                <label for="volume" class="col-form-label">Volume</label>
                                <input type="number" step="any" class="form-control" name="volume"
                                    value="{{ $pemasukan->volume }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- akhir modal edit pemasukan --}}

@endsection
