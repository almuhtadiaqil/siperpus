<table class="table table-striped table-hover table-sm table-bordered mt-5" style="font-size:11px;">
    <thead>
        <tr>
            @if ($for_export)
                <td colspan="20" class="text-center">
                    Laporan Pengeluaran Barang {{ date('d-m-Y', strtotime($request->tgl_start)) }} s/d
                    {{ date('d-m-Y', strtotime($request->tgl_finish)) }}
                </td>
            @else
                <td colspan="20" class="text-center">
                    Laporan Pengeluaran Barang <br> {{ date('d-m-Y', strtotime($request->tgl_start)) }} s/d
                    {{ date('d-m-Y', strtotime($request->tgl_finish)) }}
                </td>
            @endif
        </tr>
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
            <th>Get Out Start</th>
            <th>Get Out Finish</th>
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
        @foreach ($data_pengeluaran as $pengeluaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengeluaran->no_aju_bc23 }}</td>
                <td>{{ $pengeluaran->no_pendaftaran_23 }}</td>
                <td>{{ $pengeluaran->no_aju_bc25 }}</td>
                <td>{{ $pengeluaran->no_pendaftaran_25 }}</td>
                <td>{{ $pengeluaran->penerima }}</td>
                <td>{{ $pengeluaran->invoice }}</td>
                <td>{{ $pengeluaran->packing_list }}</td>
                <td>{{ $pengeluaran->valuta }}</td>
                <td>{{ $pengeluaran->kurs }}</td>
                <td>{{ $pengeluaran->nilai_cif }}</td>
                <td>{{ $pengeluaran->nilai_barang }}</td>
                <td>{{ App\Models\Item::where('id', $pengeluaran->barang)->value('name') }}</td>
                <td>{{ date('d-m-Y', strtotime($pengeluaran->get_out_start)) }}</td>
                <td>{{ date('d-m-Y', strtotime($pengeluaran->get_out_finish)) }}</td>
                <td>{{ $pengeluaran->jumlah_brg }}</td>
                <td>{{ $pengeluaran->jumlah_kemasan }}</td>
                <td>{{ $pengeluaran->jenis_kemasan }}</td>
                <td>{{ $pengeluaran->merk_kemasan }}</td>
                <td>{{ $pengeluaran->bruto }}</td>
                <td>{{ $pengeluaran->netto }}</td>
                <td>{{ $pengeluaran->volume }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
