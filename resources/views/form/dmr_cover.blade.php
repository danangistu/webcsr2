<div class="form-group">
    <label class="control-label">Cover</label>
    <textarea class="ckeditor" name="dmr_cover" id="dmr_cover" name="editor">
      <table width="100%" border="0">
        <tr>
          <th rowspan="2"><img src="{{ asset('contents/'.$lapset->left_logo) }}" width="100" height="50"></th>
          <th>{{ $lapset->header1 }}</th>
          <th rowspan="2"><img src="{{ asset('contents/'.$lapset->right_logo) }}" width="100" height="50"></th>
        </tr>
        <tr>
          <th style="background-color:#ecf0f1">{{ $lapset->header2 }}</th>
        </tr>
        <tr>
          <th colspan="3" text-align="center">
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <h1>DMR ( DOKUMEN MANAJEMEN RESIKO )</h1>
            <h3>{{ strtoupper($judul) }}</h3>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <h1>{{ strtoupper($lapset->footer) }}</h1>
            <br/><br/><br/><br/>
          </td>
        </th>
      </table>
    </textarea>
</div>
