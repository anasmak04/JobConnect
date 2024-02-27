<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Offers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset("css/style.css")}}" rel="stylesheet">
</head>
<body>

<!-- Navbar Placeholder - Replace with your Navbar component -->
<div class="navbar-placeholder">
    @include('components.Navbar')
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('job_offers.index') }}" method="GET" class="search-form">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="searchTerm" placeholder="Search job offers...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($jobOffers as $jobOffer)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jobOffer->title }}</h5>
                        <p class="card-text">{{ $jobOffer->description }}</p>
                        <p class="card-text">Company: {{ $jobOffer->company->name }}</p>
                        <p class="card-text">City: {{ $jobOffer->company->city->name }}</p>
                        <p class="card-text">Sector: {{ $jobOffer->secteur->name }}</p>
                        <a href="{{ route('job_offers.show', ['job_offer' => $jobOffer->id]) }}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
