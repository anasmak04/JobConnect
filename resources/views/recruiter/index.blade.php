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
                        <h5 class="card-title">Create Job Offers</h5>
                        <form action="{{ route('job_offers.store') }}" method="POST">
                            @csrf <!-- CSRF token -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="secteur_id" class="form-label">Sector</label>
                                <!-- Assuming you have a list of sectors, you can generate options dynamically -->
                                <select name="secteur_id" class="form-select" aria-label="Sector" required>
                                    <option value="">Select a Sector</option>
                                    @foreach($secteurs as $secteur)
                                    <option value="{{ $secteur->id }}">{{ $secteur->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div> --}}
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" class="form-control" id="type" name="type" required>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="text" class="form-control" id="salary" name="salary" required>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <input type="hidden" name="recruiter_id" value="{{ auth()->id() }}">
                            <button type="submit" class="btn btn-primary">Create Job Offer</button>
                        </form>
                        
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Created Job Offers</h5>
                        <p class="mb-4"><span class="text-primary font-italic me-1">Offers</span> Job Offers</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Salary</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <!-- Add more table headers as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Loop through job offers --}}
                                    @foreach ($createdJobOffers as $jobOffer)
                                        <tr>
                                            <td>{{ $jobOffer->title }}</td>
                                            <td>{{ $jobOffer->description }}</td>
                                            <td>{{ $jobOffer->type }}</td>
                                            <td>{{ $jobOffer->salary }}</td>
                                            <td>{{ $jobOffer->start_date }}</td>
                                            <td>{{ $jobOffer->end_date }}</td>
                                            <!-- Add more table data as needed -->
                                        </tr>
                                    @endforeach
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
