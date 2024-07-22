@extends('layout.master')

@section('title', 'Dashboard')

@section('dashboard_aktif', 'nav-active')

@section('content')
<div class="container mt-5 redcolor">
    <div class="row text-center  ">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4 bluecolor">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total User</h5>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="display-6">{{ number_format(40000) }}</span>
                        <i class="bi bi-person-circle" style="font-size: 1.5rem; margin-left: 10px; color: #7C4DFF;"></i>
                    </div>
                    <p class="text-success mt-3"><i class="bi bi-arrow-up"></i> {{ 27000 }}% Up from yesterday</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Kampanye</h5>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="display-6">{{ number_format(7000) }}</span>
                        <i class="bi bi-box-seam" style="font-size: 1.5rem; margin-left: 10px; color: #FFD700;"></i>
                    </div>
                    <p class="text-success mt-3"><i class="bi bi-arrow-up"></i> {{ 60 }}% Up from past week</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Donasi</h5>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="display-6 smaller-text">Rp{{ number_format(14000000) }}</span>
                        <i class="bi bi-graph-up" style="font-size: 1.5rem; margin-left: 10px; color: #00C851;"></i>
                    </div>
                    <p class="text-danger mt-3"><i class="bi bi-arrow-down"></i> {{ 15423 }}% Down from yesterday</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Pending</h5>
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="display-6">{{ number_format(56000) }}</span>
                        <i class="bi bi-clock-history" style="font-size: 1.5rem; margin-left: 10px; color: #FF8800;"></i>
                    </div>
                    <p class="text-success mt-3"><i class="bi bi-arrow-up"></i> {{ 145000 }}% Up from yesterday</p>
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
                                <span id="selectedMonth">October</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" data-month="January">2021</a>
                                <a class="dropdown-item" href="#" data-month="February">2022</a>
                                <a class="dropdown-item" href="#" data-month="March">2023</a>
                                <a class="dropdown-item" href="#" data-month="April">April</a>
                                <a class="dropdown-item" href="#" data-month="May">May</a>
                                <a class="dropdown-item" href="#" data-month="June">June</a>
                                <a class="dropdown-item" href="#" data-month="July">July</a>
                                <a class="dropdown-item" href="#" data-month="August">August</a>
                                <a class="dropdown-item" href="#" data-month="September">September</a>
                                <a class="dropdown-item" href="#" data-month="October">October</a>
                                <a class="dropdown-item" href="#" data-month="November">November</a>
                                <a class="dropdown-item" href="#" data-month="December">December</a>
                            </div>
                        </div>
                    </div>
                    <canvas id="donationChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('chart')
<script>
    const dummyData = {
        'January': [30, 45, 32, 70, 65, 80, 75, 90, 85, 95, 100, 110,120],
        'February': [20, 35, 25, 50, 45, 60, 55, 70, 65, 75, 80, 90],
        'March': [25, 40, 30, 60, 55, 70, 65, 80, 75, 85, 90, 100],
        'April': [35, 50, 42, 80, 75, 90, 85, 100, 95, 105, 110, 120],
        'May': [40, 55, 45, 90, 85, 100, 95, 110, 105, 115, 120, 130],
        'June': [45, 60, 50, 100, 95, 110, 105, 120, 115, 125, 130, 140],
        'July': [50, 65, 55, 110, 105, 120, 115, 130, 125, 135, 140, 150],
        'August': [55, 70, 60, 120, 115, 130, 125, 140, 135, 145, 150, 160],
        'September': [60, 75, 65, 130, 125, 140, 135, 150, 145, 155, 160, 170],
        'October': [65, 80, 70, 140, 135, 150, 145, 160, 155, 165, 170, 180],
        'November': [70, 85, 75, 150, 145, 160, 155, 170, 165, 175, 180, 190],
        'December': [75, 90, 80, 160, 155, 170, 165, 180, 175, 185, 190, 200]
    };

    const ctx = document.getElementById('donationChart').getContext('2d');
    const donationChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['5k', '10k', '15k', '20k', '25k', '30k', '35k', '40k', '45k', '50k', '55k', '60K','70K'],
            datasets: [{
                label: 'Donations',
                data: dummyData['October'],
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
                    max: 200
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
            const selectedMonth = this.getAttribute('data-month');
            document.getElementById('selectedMonth').innerText = selectedMonth;
            donationChart.data.datasets[0].data = dummyData[selectedMonth];
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
    /* .redcolor{
        color: red;
        background-color: red;
    }
    .bluecolor{
        color: blue;
        background-color: blue; */
    }
</style>
@endsection
