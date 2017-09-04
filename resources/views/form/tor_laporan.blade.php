<div class="form-group">
    <textarea class="ckeditor" name="tor_laporan" id="tor_laporan" name="editor">
      <ol>
        <li>
           <h3>LATAR BELAKANG</h3>
           <p>{!! $latar->latar_belakang !!}<br/></p>
        </li>
        <li>
           <h3>MAKSUD DAN TUJUAN</h3>
           <p>Deskripsi Maksud dan Tujuan<br/></p>
        </li>
        <li>
           <h3>JADWAL RENCANA PELAKSANAAN</h3>
           <p>Deskripsi Jadwal Rencana Pelaksanaan<br/></p>
        </li>
        <li>
           <h3>ANGGARAN TERSEDIA</h3>
           <p>Deskripsi Anggaran Tersedia<br/></p>
        </li>
        <li>
           <h3>PELAKSANAAN KEGIATAN</h3>
           <p>Deskripsi Pelaksanaan Kegiatan<br/></p>
        </li>
        <li>
           <h3>MANFAAT</h3>
           {!! $evaluasi->manfaat !!}<br/>
        </li>
        <li>
           <h3>RENCANA ANGGARAN BIAYA</h3>
           <table width="100%" border="1">
             <tr>
               <th>No.</th>
               <th>Uraian</th>
               <th>Volume</th>
               <th>Satuan</th>
               <th>Harga Satuan (Rp)</th>
               <th>Jumlah</th>
             <tr>
             <tr>
               <td> &nbsp </td>
               <td> &nbsp </td>
               <td> &nbsp </td>
               <td> &nbsp </td>
               <td> &nbsp </td>
               <td style="text-align:right"> &nbsp </td>
             </tr>
             <tr>
               <td> &nbsp </td>
               <td> &nbsp </td>
               <td> &nbsp </td>
               <td> &nbsp </td>
               <td> Total </td>
               <td style="text-align:right"> <b>{{ 'Rp. '.number_format($model->anggaran,2,',','.') }}</b> </td>
             </tr>
           </table>
        </li>
        <li>
           <h3>RINGKASAN</h3>
           {!! $evaluasi->ringkasan !!}<br/>
        </li>
      </ol>
    </textarea>
</div>
