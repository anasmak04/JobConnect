<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Representer Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

@include("components.Navbar")

<div class="container py-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body text-center">
                    <img src="{{ $profile }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">{{ $profile->name }}</h5>
                    <p class="text-muted mb-4">{{ $user->location ?? 'User Location' }}</p>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary me-2">Follow</button>
                        <button type="button" class="btn btn-outline-primary">Message</button>
                    </div>
                </div>
            </div>
            <div class="card mb-4 mb-lg-0 shadow-sm">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-building fa-lg text-warning"></i>
                            <p class="mb-0">
                                Company Name: <strong>{{$profile->company->name}}</strong>
                            </p>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-info-circle fa-lg text-warning"></i>
                            <p class="mb-0">
                                Description: <strong>{{$profile->company->description}}</strong>
                            </p>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-link fa-lg text-warning"></i>
                            <p class="mb-0">
                                Website: <a href="{{$profile->company->website}}" target="_blank">{{$profile->company->website}}</a>
                            </p>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-map-marker-alt fa-lg text-warning"></i>
                            <p class="mb-0">
                                City: <strong>{{$profile->company->city->name}}</strong>
                            </p>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $profile->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <p class="mb-4"><span class="text-primary font-italic me-1">Assignment</span> Project Status</p>
                    <div class="project-item mb-3">
                        <div class="d-flex justify-content-between">
                            <span class="clickable" style="cursor: pointer;">Project Name 1</span>
                            <span class="badge bg-success rounded-pill">Completed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
