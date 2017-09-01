<h4 class="text-thin">Ringkasan Kegiatan</h4>
<p>{{ $latar->latar_belakang }}</p>
<table class="table table-striped table-hover table-bordered">
    <tbody>
        <?php for($i=1; $i<7; $i++){  $foto = 'foto_'.$i;?>
        <tr>
            <td with="10%" class="text-center">{{ ucwords($foto) }}</td>
            <td><img src="{{ asset('contents/'.$path.'/foto/'.$latar->$foto) }}" alt="No Image" height="200"></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
