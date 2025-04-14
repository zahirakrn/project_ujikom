<div class="topbar-custom">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li>
                    <button class="button-toggle-menu nav-link">
                        <i data-feather="menu" class="noti-icon"></i>
                    </button>
                </li>
                <li class="d-none d-lg-block">
                    <h5 class="mb-0">Selamat Pagi, {{ Auth::user()->name }}</h5>
                </li>
            </ul>
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <!-- Notifikasi -->
                {{-- <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon fs-4"></i>
                        <span class="badge bg-danger rounded-circle" id="notification-count">{{ $stokMenipisCount }}</span> <!-- Jumlah notifikasi -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-end notification-dropdown">
                        <h6 class="dropdown-header">Notifications</h6>
                        @foreach ($barang as $item)
                            @if ($item->stok < 50)
                                <a href="#" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#notifStokModal">
                                    <i class="mdi mdi-alert-circle-outline"></i> Stok {{ $item->nama }} menipis!
                                </a>
                            @else
                                <a href="#" class="dropdown-item text-info">
                                    <i class="mdi mdi-check-circle-outline"></i> Stok {{ $item->nama }} aman
                                </a>
                            @endif
                        @endforeach
                    </div>
                </li> --}}

                <!-- Profile -->
                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('admiiin/assets/images/users/user-5.jpg') }}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ms-1"> {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <a href="{{ route('profile.index') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                            <span>My Account</span>
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

{{-- Modal notifikasi stok --}}
{{-- <div class="modal fade" id="notifStokModal" tabindex="-1" aria-labelledby="notifStokModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notifStokModalLabel">Peringatan Stok Menipis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ada beberapa barang yang stoknya sudah menipis, segera lakukan pengecekan dan pengisian ulang stok!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="{{ route('barang.index') }}" class="btn btn-primary">Lihat Stok</a>
            </div>
        </div>
    </div>
</div> --}}
