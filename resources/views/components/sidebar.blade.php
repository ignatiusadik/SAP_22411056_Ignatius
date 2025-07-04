<div>
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('home') }}" class="b-brand text-primary">
                    <img src="{{ url('images/logo.png') }}" width="150" height="50" alt="logo">
                </a>
            </div>

            {{-- SUPERADMIN MENU --}}
            @if(auth()->user()->role === 'superadmin')
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <x-sidebar.links title="Dashboard" icon="ti ti-dashboard" route="home" />
                    <x-sidebar.links title="Data Perusahaan" icon="ti ti-building" route="superadmin.perusahaan.index" />
                    <x-sidebar.links title="Data Admin Perusahaan" icon="ti ti-user" route="superadmin.users.index" />
                    <x-sidebar.links title="Departemen" icon="ti ti-users" route="superadmin.devisi.index" />
                </ul>
            </div>
            @endif

            {{-- ADMIN MENU --}}
            @if(auth()->user()->role === 'admin')
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <x-sidebar.links title="Dashboard" icon="ti ti-dashboard" route="home" />
                    <x-sidebar.links title="Data Karyawan" icon="ti ti-users" route="admin.users.index" />
                    <x-sidebar.links title="Konfirmasi Cuti" icon="ti ti-clipboard-check" route="admin.cuti.index" />
                    <x-sidebar.links title="Tebel Gaji" icon="ti ti-file-text" route="admin.tabelgaji.index" />
                    <x-sidebar.links title="Gaji Karyawan" icon="ti ti-report-money" route="admin.gaji.index" />

                </ul>
                </li>
                </ul>

            </div>
            @endif

            {{-- KARYAWAN MENU --}}
            @if(auth()->user()->role === 'karyawan')
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <x-sidebar.links title="Dashboard" icon="ti ti-dashboard" route="home" />
                    <x-sidebar.links title="Pengajuan Cuti" icon="ti ti-calendar-plus" route="karyawan.cuti.index" />
                    <x-sidebar.links title="Cetak Gaji" icon="ti ti-file-text" route="karyawan.cetak.index" />

                </ul>
            </div>


            @endif
        </div>
    </nav>
</div>