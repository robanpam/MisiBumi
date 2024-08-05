@extends('profile.profile_layout')

@section('active_kampanye', 'active-tab')

@section('ins')
    <div class="row">
        <table class="table-striped table">
            <tr>
                <th>Nama Kampanye</th>
                <th>Progres</th>
                <th>Deadline Kampanye</th>
                <th>Status</th>
            </tr>
            @forelse ($kampanyes as $kampanye)
            <tr>
                    <td>{{ $kampanye->nama_kampanye }}</td>
                    <td>{{ $kampanye->jumlah_pohon }} / {{ $kampanye->total_pohon }}</td>
                    <td>{{ \Carbon\Carbon::parse($kampanye->batas_donasi)->format('d-m-Y') }}</td>
                    @if ($kampanye->status == 3)
                        <td><span class="badge bg-warning">Pending</span></td>
                    @elseif ($kampanye->status == 1)
                        <td><span class="badge bg-primary">Processing</span></td>
                    @elseif ($kampanye->status == 2)
                        <td><span class="badge bg-danger">Rejected</span></td>
                    @elseif ($kampanye->status == 0)
                        <td><span class="badge bg-success">Completed</span> </td>
                    @endif
                @empty
                    <td colspan="5">Anda belum membuat kampanye</td>
            </tr>
            @endforelse
        </table>
        {{ $kampanyes->links('pagination::bootstrap-5') }}
    </div>
@endsection('ins')   