<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

    @include('components.Navbar')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">

                <h3 class="text-center">Welcome {{ $recruiter->name }} </h3>

                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <p class="text-muted mb-4">User Location</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-primary me-2">Follow</button>
                            <button type="button" class="btn btn-outline-primary">Message</button>
                        </div>
                    </div>
                </div>

                <div class="card mb-4 mb-lg-0 shadow-sm">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Company Information</h5>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex align-items-center p-3">
                                    <i class="fas fa-building fa-lg text-warning me-3"></i>
                                    <p class="mb-0 flex-grow-1">
                                        {{-- Company Name: <strong>{{ $recruiter->company->name }}</strong> --}}
                                    </p>
                                </li>

                                <li class="list-group-item d-flex align-items-center p-3">
                                    <i class="fas fa-info-circle fa-lg text-warning me-3"></i>
                                    <p class="mb-0 flex-grow-1">
                                        Description: <strong>{{ $recruiter->company->description }}</strong>
                                    </p>
                                </li>

                                <li class="list-group-item d-flex align-items-center p-3">
                                    <i class="fas fa-link fa-lg text-warning me-3"></i>
                                    <p class="mb-0 flex-grow-1">
                                        Website: <a href="{{ $recruiter->company->website }}" target="_blank"
                                            class="text-primary">{{ $recruiter->company->website }}</a>
                                    </p>
                                </li>

                                <li class="list-group-item d-flex align-items-center p-3">
                                    <i class="fas fa-map-marker-alt fa-lg text-warning me-3"></i>
                                    <p class="mb-0">
                                        City: <strong>{{ $recruiter->company->city->name }}</strong>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Create Recruiter User</h5>
                        <form action="{{ route('recruiter.store') }}" method="POST">
                            @csrf <!-- CSRF token -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Recruiter</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Recruiters Created</h5>
                        <p class="mb-4"><span class="text-primary font-italic me-1">Recruiters</span> created recruiters</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <!-- Add more table headers as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Loop through recruiters --}}
                                    {{-- @foreach ($recruiters as $recruiter)
                                        <tr>
                                            <td>{{ $recruiter->name }}</td>
                                            <td>{{ $recruiter->email }}</td>
                                            <td>{{ $recruiter->position }}</td>
                                            <!-- Add more table data as needed -->
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
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
