<style>
    .user-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background-color: #f1f3fa;
    color: #6c757d;
}
</style>

<div class="topbar-custom">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li>
                    <button class="button-toggle-menu nav-link">
                        <i data-feather="menu" class="noti-icon"></i>
                    </button>
                </li>
            </ul>
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <!-- Notifikasi -->
                @php
                    $stokMenipis = \App\Models\Barang::with('kategori')->where('stok', '<', 50)->get();
                @endphp

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                        <i data-feather="bell" class="noti-icon"></i>
                        @if ($stokMenipis->count() > 0)
                            <span class="badge bg-danger rounded-circle noti-icon-badge">
                                {{ $stokMenipis->count() }}
                            </span>
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <i class="icon-sm me-1"></i>
                                Pemberitahuan
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar style="max-height: 300px;">
                            @forelse ($stokMenipis as $barang)
                                <a href="{{ route('barang.show', $barang->id) }}"
                                    class="dropdown-item notify-item text-muted link-primary">
                                    <div class="notify-content">
                                        <p class="notify-details mb-0">
                                            <i data-feather="alert-circle" class="icon-xs me-1 text-danger"></i>
                                            <strong>{{ $barang->nama_barang ?? $barang->kategori->nama_kategori . $barang->pembelian->nama }}</strong>
                                        </p>
                                        <small class="text-danger">Stok tersisa {{ $barang->stok }}</small>
                                    </div>
                                </a>
                            @empty
                                <div class="dropdown-item text-muted text-center">
                                    Semua barang memiliki stok yang cukup
                                </div>
                            @endforelse
                        </div>

                        <a href="{{ route('barang.index') }}"
                            class="dropdown-item text-center text-primary notify-item notify-all">
                            Lihat Semua Barang
                            <i data-feather="arrow-right"></i>
                        </a>
                    </div>
                </li>

                <!-- Profile -->
                <li class="dropdown notification-list topbar-dropdown">
    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
        role="button" aria-haspopup="false" aria-expanded="false">
        <span class="user-icon rounded-circle">
            <i class="mdi mdi-account fs-18"></i>
        </span>
        <span class="pro-user-name ms-1"> {{ Auth::user()->name }} <i
                class="mdi mdi-chevron-down"></i></span>
    </a>
    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
        <div class="dropdown-header noti-title">
            <h6 class="text-overflow m-0">Selamat Datang !</h6>
        </div>

        <a href="{{ route('profile.index') }}" class="dropdown-item notify-item">
            <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
            <span>Akun Saya</span>
        </a>
        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>

            </ul>
        </div>
    </div>
</div>
