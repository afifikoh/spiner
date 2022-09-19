<li class="nav-item">
    <a href="{{ url('home') }}" class="nav-link {{ Request::is('home') ? 'active':'' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Beranda</p>
    </a>
</li>

@if ($user->level == 'administrator')
<li class="nav-item">
    <a href="{{ url('pegawai') }}" class="nav-link {{ Request::is('pegawai') ? 'active':'' }}">
        <i class="nav-icon fas fa-user-friends"></i>
        <p>Pegawai</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('bidang') }}" class="nav-link {{ Request::is('bidang') ? 'active':'' }}">
        <i class="nav-icon fas fa-box-open"></i>
        <p>Bidang</p>
    </a>
</li>

<li class="nav-header">LAPORAN</li>
{{-- <li class="nav-item">
    <a href="{{ url('laporan-admin') }}" class="nav-link">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Data Pegawai</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('laporan') }}" class="nav-link">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Data Bidang</p>
    </a>
</li> --}}

<li class="nav-item">
    <a href="{{ url('laporan') }}" class="nav-link">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Data Kinerja</p>
    </a>
</li>

@elseif ($user->level == 'pegawai')
<li class="nav-item">
<a href="{{ url('kinerja-pegawai') }}" class="nav-link {{ Request::is('kinerja-pegawai') ? 'active':'' }}">
        <i class="nav-icon fas fa-suitcase"></i>
        <p>Kinerja Pegawai</p>
    </a>
</li>

<li class="nav-header">LAPORAN</li>
<li class="nav-item">
    <a href="{{ url('laporan-pegawai') }}" class="nav-link {{ Request::is('laporan-pegawai') ? 'active':'' }}">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Sudah Terverifikasi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('pengaturan-pegawai') }}" class="nav-link {{ Request::is('pengaturan-pegawai') ? 'active':'' }}">
        <i class="nav-icon fas fa fa-cog"></i>
        <p>Pengaturan</p>
    </a>
</li>

@elseif ($user->level == 'sub-koordinator' || $user->level == 'kepala-bidang')
<li class="nav-item">
    <a href="{{ url('kinerja-koordinator') }}" class="nav-link">
        <i class="nav-icon fas fa-suitcase"></i>
        <p>Kinerja Pegawai</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('laporan-sub-koordinator') }}" class="nav-link">
        <i class="nav-icon fas fa fa-cog"></i>
        <p>Pengaturan</p>
    </a>
</li>

@elseif ($user->level == 'kepala-bidang' || $user->level == 'kepala-bidang')
<li class="nav-item">
    <a href="{{ url('kinerja-kepbid') }}" class="nav-link">
        <i class="nav-icon fas fa-suitcase"></i>
        <p>Kinerja Pegawai</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('laporan-kepala-bidang') }}" class="nav-link">
        <i class="nav-icon fas fa fa-cog"></i>
        <p>Pengaturan</p>
    </a>
</li>
@endif
