<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Representer Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

     <!-- Fonts and Icons -->
     <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
     <link rel="dns-prefetch" href="//fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
 
     
     <!-- Main CSS -->
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
 
 
     <!-- SweetAlert2 CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
 
     <!-- jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>


@include("components.Navbar")

{{-- @extends('layouts.app') --}}


    
        <div class="container py-5" style="width: 100%">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ $user->avatar_url }}" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <p class="text-muted mb-1">
                                @if ($user->role)
                                    {{ $user->role->name }}
                                @else
                                    User Role
                                @endif
                            </p>
                            <p class="text-muted mb-4">{{ $user->location ?? 'User Location' }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary">Follow</button>
                                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <!-- Static social links -->
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <!-- Add other static social links -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Dynamic user information -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <!-- Add other dynamic user information -->
                        </div>
                    </div>
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1">Assignment</span> Project Status</p>
                            <!-- Static projects -->
                            <div class="project-item">
                                <span class="float-start clickable" style="cursor: pointer;">Project Name 1</span>
                                <span class="float-end status" style="background-color: #4CAF50; color: white; border-radius: 5px;">Completed</span>
                            </div>
                            <!-- Add other static projects -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        



{{-- 
<div class="container mt-5">
    <section style="background-color: #eee;">
        <div class="container py-5" style="width: 100%">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <p class="text-muted mb-1">
                            </p>
                            <!-- Assuming the role or title is stored in 'role' -->
                            <p class="text-muted mb-4">{{ $user->location ?? 'User Location' }}</p>
                            <!-- Assuming location information is stored in 'location' -->
                            <div class="d-flex justify-content-center mb-2">
                                <!-- Link to show the representer form page -->
                                <a href="{{ route('candidat.fill.representer.info') }}" class="btn btn-primary">Become Representer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> --}}


<!-- Include Bootstrap JS and its dependencies below -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
