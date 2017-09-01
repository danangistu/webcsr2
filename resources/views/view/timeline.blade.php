@php $bulans = ['jan','feb','mar','apr','mei','jun','jul','agu','sep','okt','nov','des'] @endphp
<h4 class="text-thin">Timeline</h4>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th width="10%" class="text-center">Bulan</th>
            <th class="text-center">Event</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bulans as $bulan)
        <tr>
            <td class="text-center">{{ ucwords($bulan) }}</td>
            <td>{{ $timeline->$bulan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
