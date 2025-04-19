@extends('layouts.backend.template')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-center justify-content-between">
                <h4 class="fs-18 fw-semibold m-0">Profil</h4>
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dasbor</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card profile-card border-0 overflow-hidden position-relative" style="margin-top: 60px;">
                        <div class="bg-primary" style="height: 120px;"></div>
                        <div class="card-body text-center position-relative" style="margin-top: -60px;">
                            <div class="mb-3">
                                <div class="rounded-circle bg-white border d-flex align-items-center justify-content-center mx-auto shadow" style="width: 100px; height: 100px;">
                                    <i class="mdi mdi-account text-primary" style="font-size: 50px;"></i>
                                </div>
                            </div>
                            <h3 class="fw-bold text-dark mb-1">Nama Pengguna : {{ Auth::user()->name }}</h3>
                            <p class="text-muted mb-3">Email : {{ Auth::user()->email }}</p>

                            <a href="mailto:{{ Auth::user()->email }}" class="btn btn-outline-primary btn-sm rounded-pill px-4">
                                <i class="mdi mdi-email-outline me-1"></i> Kirim Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Tambahkan custom CSS di bawah --}}
<style>
    .profile-card {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.4s ease; /* Animasi saat hover */
        cursor: pointer;
    }

    .profile-card:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
    }
</style>
@endsection
