<h4 class="text-thin">Evaluasi</h4>
<table class="table table-striped table-hover table-bordered">
    <tbody>
        <tr>
            <td width="30%">Laporan Kegiatan Pemberdayaan Masyarakat</td>
            <td>{{ $evaluasi->laporan }}</td>
        </tr>
        <tr>
            <td>Saran</td>
            <td>{{ $evaluasi->ringkasan }}</td>
        </tr>
        <tr>
            <td>Manfaat Bantuan</td>
            <td>{{ $evaluasi->manfaat }}</td>
        </tr>
        <tr>
            <td>Tanggapan Pejabat (Internal)</td>
            <td>{{ $evaluasi->tangg_int }}</td>
        </tr>
        <tr>
            <td>Tanggapan Pejabat (External)</td>
            <td>{{ $evaluasi->tangg_ext }}</td>
        </tr>
    </tbody>
</table>
