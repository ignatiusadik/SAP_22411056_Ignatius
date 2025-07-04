    @extends('layouts.mantis')
    @if(auth()->user()->role === 'superadmin')
    <title>Dashboard Super Admin</title>
    @section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Dashboard Super Admin</h2>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card text-white bg-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person-check"></i> Welcome!</h5>
                        <p class="card-text">You are logged in as <strong>{{ Auth::user()->name }}</strong>.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-graph-up-arrow"></i> Stats</h5>
                        <p class="card-text">Total logins: <strong>15</strong><br>Last login: <strong>2 days ago</strong></p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card text-white bg-warning shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-gear-fill"></i> Settings</h5>
                        <p class="card-text">Manage your profile, password, and preferences.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Section with Chart -->
        <div class="card mt-5 shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Activity Overview</h5>
            </div>
            <div class="card-body">
                <p class="text-muted">Below is a simple representation of your login activity over the last 7 days:</p>
                <canvas id="loginChartSuperadmin" height="100"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const Superadminctx = document.getElementById('loginChartSuperadmin').getContext('2d');
        const loginChartSuperadmin = new Chart(Superadminctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Logins',
                    data: [3, 4, 2, 5, 1, 0, 2],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endsection
    @endif

    @if(auth()->user()->role === 'admin')
    <title>Dashboard Admin</title>
    @section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Dashboard Admin</h2>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card text-white bg-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person-check"></i> Welcome!</h5>
                        <p class="card-text">You are logged in as <strong>{{ Auth::user()->name }}</strong>.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-graph-up-arrow"></i> Stats</h5>
                        <p class="card-text">Total logins: <strong>15</strong><br>Last login: <strong>2 days ago</strong></p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card text-white bg-warning shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-gear-fill"></i> Settings</h5>
                        <p class="card-text">Manage your profile, password, and preferences.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Section with Chart -->
        <div class="card mt-5 shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Activity Overview</h5>
            </div>
            <div class="card-body">
                <p class="text-muted">Below is a simple representation of your login activity over the last 7 days:</p>
                <canvas id="loginChartAdmin" height="100"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const Adminctx = document.getElementById('loginChartAdmin').getContext('2d');
        const loginChartAdmin = new Chart(Adminctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Jumlah Karyawan',
                    data: [3, 4, 2, 5, 1, 0, 2],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endsection
    @endif
    @if(auth()->user()->role === 'karyawan')
    <title>Dashboard Karyawan</title>
    @section('content')
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold">Dashboard Karyawan</h2>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="row g-4">
            <!-- Total Gaji -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 text-white" style="background: linear-gradient(135deg, #11998e, #38ef7d);">
                    <div class="card-body position-relative">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-cash-stack fs-3 me-3"></i>
                            <h5 class="card-title mb-0">Total Gaji</h5>
                        </div>
                        <p class="card-text fs-4 fw-bold">Rp 5.200.000</p>
                    </div>
                </div>
            </div>

            <!-- Status Pengajuan Cuti -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 text-white" style="background: linear-gradient(135deg, #00b09b, #96c93d);">
                    <div class="card-body position-relative">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-calendar-check fs-3 me-3"></i>
                            <h5 class="card-title mb-0">Status Cuti</h5>
                        </div>
                        <p class="card-text fs-5 fw-bold text-white">
                            <span class="badge bg-light text-success px-3 py-2">Disetujui</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sisa Cuti -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 text-white" style="background: linear-gradient(135deg, #f7971e, #ffd200);">
                    <div class="card-body position-relative">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-hourglass-split fs-3 me-3"></i>
                            <h5 class="card-title mb-0">Sisa Cuti</h5>
                        </div>
                        <p class="card-text fs-4 fw-bold">6 Hari</p>
                    </div>
                </div>
            </div>
        </div>

        @endsection
        @endif
        @guest
        <script>
            window.location = "{{route('login')}}";
        </script>
        @endguest