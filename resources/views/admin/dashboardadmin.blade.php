@extends('layout.admin')

@section('title', 'Dashboard')

@section('dashboard_aktif', 'active')

@section('content')
<div class="container mt-5">
    <div class="row text-center">
        
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total User</h5>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="display-6">{{ number_format($totalUsers) }}</span>
                        <i class="bi bi-person-circle" style="font-size: 1.5rem; margin-left: 10px; color: #7C4DFF;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Kampanye</h5>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="display-6">{{ number_format($totalKampanye) }}</span>
                        <i class="bi bi-box-seam" style="font-size: 1.5rem; margin-left: 10px; color: #FFD700;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Donasi</h5>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="display-6 smaller-text">Rp{{ number_format($totalDonasi) }}</span>
                        <i class="bi bi-graph-up" style="font-size: 1.5rem; margin-left: 10px; color: #00C851;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Pending</h5>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="display-6">{{ number_format($totalPending) }}</span>
                        <i class="bi bi-clock-history" style="font-size: 1.5rem; margin-left: 10px; color: #FF8800;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chart Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Donation Details</h5>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="selectedYear">{{ $startYear }}</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach(range($startYear, $endYear) as $year)
                                    <a class="dropdown-item" href="#" data-year="{{ $year }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <canvas id="donationChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
</div>
@endsection

@section('chart')
<script>
    const donasiTahunan = @json($donasiTahunan);

    console.log(donasiTahunan);

    const formattedData = {};
    Object.keys(donasiTahunan).forEach(year => {
        formattedData[year] = new Array(12).fill(0);
        donasiTahunan[year].forEach(item => {
            formattedData[year][item.bulan - 1] = item.total_donasi;
        });
    });

    const ctx = document.getElementById('donationChart').getContext('2d');
    const donationChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Donations',
                data: formattedData['{{ $startYear }}'] || [],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 5000000
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.formattedValue;
                        }
                    }
                }
            }
        }
    });

    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            const selectedYear = this.getAttribute('data-year');
            document.getElementById('selectedYear').innerText = selectedYear;
            donationChart.data.datasets[0].data = formattedData[selectedYear] || [];
            donationChart.update();
        });
    });
</script>
@endsection

@section('more_files')
<style>
    .smaller-text {
        font-size: 1.5rem; /* Adjust the size as needed */
    }
    .display-6 {
        font-size: 2.5rem;
    }
</style>
@endsection
