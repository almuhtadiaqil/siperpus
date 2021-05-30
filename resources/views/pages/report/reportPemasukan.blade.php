<table class="table table-striped table-hover table-sm table-bordered mt-5" style="font-size:11px;">
    <thead>
        <tr>
            <th colspan="21" style="text-align: center">Laporan Pemasukan</th>
        </tr>
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
        </tr>
    </thead>
    <tbody>
        @foreach ($data_pemasukan as $pemasukan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pemasukan->no_pengajuan }}</td>
                <td>{{ $pemasukan->no_pendaftaran }}</td>
                <td>{{ $pemasukan->pemasok }}</td>
                <td>{{ $pemasukan->invoice }}</td>
                <td>{{ $pemasukan->bl }}</td>
                <td>{{ $pemasukan->valuta }}</td>
                <td>{{ $pemasukan->kurs }}</td>
                <td>{{ $pemasukan->nilai_cif }}</td>
                <td>{{ $pemasukan->nilai_barang }}</td>
                <td>{{ $pemasukan->barang }}</td>
                <td>{{ $pemasukan->tgl_msk_start }}</td>
                <td>{{ $pemasukan->tgl_msk_finish }}</td>
                <td>{{ $pemasukan->jumlah_brg }}</td>
                <td>{{ $pemasukan->jumlah_kemasan }}</td>
                <td>{{ $pemasukan->jenis_kemasan }}</td>
                <td>{{ $pemasukan->merk_kemasan }}</td>
                <td>{{ $pemasukan->bruto }}</td>
                <td>{{ $pemasukan->netto }}</td>
                <td>{{ $pemasukan->volume }}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    <a href="{{ url('/export_masuk') }}" class="btn btn-info">Export</a>
</div>