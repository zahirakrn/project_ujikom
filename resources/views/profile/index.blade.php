    @extends('layouts.backend.template')
    @section('content')
    <div class="content-page">
                    <div class="content">

                        <!-- Start Content-->
                        <div class="container-fluid">
                            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-18 fw-semibold m-0">Profile</h4>
                                </div>

                                <div class="text-end">
                                    <ol class="breadcrumb m-0 py-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <img src="assets/images/small/user-image.jpg" class="rounded-top-2 img-fluid" alt="image data">

                                        <div class="card-body">
                                            <div class="align-items-center">

                                                <div class="silva-main-sections">
                                                    <div class="silva-profile-main">
                                                        <img src="assets/images/users/user-11.jpg" class="rounded-circle img-fluid avatar-xxl img-thumbnail float-start" alt="image profile">

                                                        <span class="sil-profile_main-pic-change img-thumbnail">
                                                            <i class="mdi mdi-camera text-white"></i>
                                                        </span>
                                                    </div>

                                                    <div class="overflow-hidden ms-md-4 ms-0">
                                                        <h4 class="m-0 text-dark fs-20 mt-2 mt-md-0">{{ Auth::user()->name }}</h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body pt-0">
                                            <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active p-2" id="profile_about_tab" data-bs-toggle="tab" href="#profile_about" role="tab">
                                                        <span class="d-block d-sm-none"><i class="mdi mdi-information"></i></span>
                                                        <span class="d-none d-sm-block">About</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link p-2" id="setting_tab" data-bs-toggle="tab" href="#profile_setting" role="tab">
                                                        <span class="d-block d-sm-none"><i class="mdi mdi-information"></i></span>
                                                        <span class="d-none d-sm-block">Setting</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content text-muted bg-white">
                                                <div class="tab-pane active show pt-4" id="profile_about" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-md-6 mb-4">
                                                            <div class="">
                                                                <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">About me</h5>
                                                                <p>Geetings, fellow software enthusiasts! I'm thrilled to see your intereset in exploring my profile. I'm Christian Mayo,
                                                                    a 24-year-old software engineer from the United Kingdom. My educational path led me to earn a Bachelor's Degeer in Computer Science,
                                                                    specializing in Software Engineering. With this qualification, I'm equipped to dive into the world of coding and develooment,ready
                                                                    to tackle exciting projects and contribute to cutting-edge technological advancement...
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 col-md-6 mb-4">
                                                            <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">Contact Details</h5>

                                                            <div class="row">

                                                                <div class="col-md-4 col-sm-4 col-lg-4 mb-3">
                                                                    <div class="profile-email mb-md-2">
                                                                        <h6 class="text-uppercase fs-13">Email Addess</h6>
                                                                        <a href="#" class="text-primary fs-14 text-decoration-underline">{{ Auth::user()->email }}</a>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 col-sm-4 col-lg-4 mb-3">
                                                                    <div class="profile-email">
                                                                        <h6 class="text-uppercase fs-13">Social Media</h6>
                                                                        <ul class="social-list list-inline mt-0 mb-0">
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="social-item border-primary text-primary justify-content-center align-content-center"><i class="mdi mdi-facebook fs-14"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="social-item border-danger text-danger justify-content-center align-content-center"><i class="mdi mdi-google fs-14"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="social-item border-info text-info justify-content-center align-content-center"><i class="mdi mdi-twitter fs-14"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="social-item border-secondary text-secondary justify-content-center align-content-center"><i class="mdi mdi-github fs-14"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-lg-4 mb-3">
                                                                    <div class="profile-email">
                                                                        <h6 class="text-uppercase fs-13">Location</h6>
                                                                        <a href="#" class="fs-14">Melbourne, Australia</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end Experience -->
                                                <div class="tab-pane pt-4" id="profile_setting" role="tabpanel">
                                                    <div class="row">

                                                        <div class="row">
                                                            <div class="col-lg-6 col-xl-6">
                                                                <div class="card border">

                                                                    <div class="card-header">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <h4 class="card-title mb-0">Personal Information</h4>
                                                                            </div><!--end col-->
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-body">


                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Email Address</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" placeholder="Email" aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Password</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="text" value="123">
                                                                            </div>
                                                                        </div>

                                                                    </div><!--end card-body-->
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-xl-6">
                                                                <div class="card border mb-0">

                                                                    <div class="card-header">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <h4 class="card-title mb-0">Change Password</h4>
                                                                            </div><!--end col-->
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-body mb-0">
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Old Password</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="password" placeholder="Old Password">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">New Password</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="password" placeholder="New Password">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Confirm Password</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="password" placeholder="Confirm Password">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <button type="submit" class="btn btn-primary mb-2 mb-md-0">Change Password</button>
                                                                                <button type="button" class="btn btn-danger">Cancel</button>
                                                                            </div>
                                                                        </div>

                                                                    </div><!--end card-body-->
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div> <!-- end education -->

                                                <!-- end education -->

                                            </div> <!-- Tab panes -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- container-fluid -->
                    </div>
                    <!-- content -->


                    <!-- end Footer -->

                </div>
    @endsection
