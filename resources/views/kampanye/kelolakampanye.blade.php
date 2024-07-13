@extends('layout.master')

@section('title', 'Kelola Kampanye')

@section('content')
<div class="container mt-4">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h1>Kelola Kampanye</h1>
        </div>
    </div>

    <!-- Filter and View Request Section -->
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <!-- View Request Button -->
            <div class="col-10"></div>
            <div>
                <button class="btn btn-light d-flex align-items-center" style="box-shadow: 3px 3px black" data-bs-toggle="modal" data-bs-target="#requestModal" id="viewRequestButton">
                    <i class="bi bi-pencil" style="font-size: 1.5rem; margin-right: 10px;"></i>
                    View Request
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive" style="border-radius: 10px; filter: drop-shadow(3px 3px 3px black)">
        <table class="table text-center" style="border-radius: 10px">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Judul Kampanye</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Pohon</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kampanyes as $kampanye)
                <tr>
                    <th scope="row">{{ $kampanye->id }}</th>
                    <td>{{ $kampanye->user_name }}</td>
                    <td>{{ $kampanye->nama_kampanye }}</td>
                    <td>{{ $kampanye->lokasi_kampanye }}</td>
                    <td>{{ $kampanye->pohon_nama }}</td>
                    <td>
                        @if($kampanye->status == 0)
                            <span class="badge bg-success">Completed</span>
                        @elseif($kampanye->status == 1)
                            <span class="badge bg-primary">Processing</span>
                        @elseif($kampanye->status == 2)
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="requestModalLabel">Request Kampanye</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="requestKampanyeContent"></div>
      </div>

    </div>
  </div>
</div>

@endsection


@section('more_files')
<style>
    .card-body {
        padding: 10px;
    }
    .form-label {
        margin-bottom: 0.5rem;
    }
    .form-select {
        min-width: 120px;
    }
    .text-danger {
        color: #dc3545 !important;
    }
    .badge {
        font-size: 1rem;
        padding: 0.5em 1em;
        border-radius: 0.25em;
    }
    /* .badge.bg-success {
        background-color: #d4f7dc;
        color: #0a9d58;
    }
    .badge.bg-primary {
        background-color: #e0e8ff;
        color: #5b21b6;
    }
    .badge.bg-danger {
        background-color: #ffe1e1;
        color: #d70000;
    } */
</style>

@endsection

@section('js')
document.getElementById('viewRequestButton').addEventListener('click', function() {
    fetch("{{ route('fetchPendingKampanyes') }}")
        .then(response => response.json())
        .then(data => {
            let content = '<table class="table table-hover"><thead><tr><th>ID</th><th>Nama</th><th>Judul Kampanye</th><th>Lokasi</th><th>Pohon</th><th>Status</th><th>Info</th></tr></thead><tbody>';
            data.forEach(kampanye => {
                content += `<tr>
                    <td>${kampanye.id}</td>
                    <td>${kampanye.user_name}</td>
                    <td>${kampanye.nama_kampanye}</td>
                    <td>${kampanye.lokasi_kampanye}</td>
                    <td>${kampanye.pohon_nama}</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td><a href="/detailkampanye/${kampanye.id}" class="btn btn-sm"><h4>i</h4></a></td>
                </tr>`;
            });
            content += `
            </tbody></table>
            <div class="d-flex justify-content-end mt-4">
                <form id="terimaSemuaForm" action="{{ route('terimaSemua') }}" method="POST" class="me-2">
                    @csrf
                    <button type="submit" class="btn btn-success me-5">Terima Semua</button>
                </form>
                <form id="tolakSemuaForm" action="{{ route('tolakSemua') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger me-4">Tolak Semua</button>
                </form>
            </div>`;
            document.getElementById('requestKampanyeContent').innerHTML = content;
            
            document.getElementById('terimaSemuaForm').addEventListener('submit', function(event) {
                event.preventDefault();
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    if (response.ok) {
                        window.location.href = '{{ route('kelolakampanye') }}';
                    }
                });
            });

            document.getElementById('tolakSemuaForm').addEventListener('submit', function(event) {
                event.preventDefault();
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    if (response.ok) {
                        window.location.href = '{{ route('kelolakampanye') }}';
                    }
                });
            });
        });
});
@endsection