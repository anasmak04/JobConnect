<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Offers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
    
@include('components.Navbar')

<div class="container">
    <div class="row">
        @foreach ($jobOffers as $jobOffer)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jobOffer->title }}</h5>
                        <p class="card-text">{{ $jobOffer->description }}</p>
                        <p class="card-text">Company: {{ $jobOffer->company->name }}</p>
                        <p class="card-text">Sector: {{ $jobOffer->secteur->name }}</p>
                        <a href="{{ route('job_offers.show', ['job_offer' => $jobOffer->id]) }}" class="btn btn-primary">Details</a>
                        {{-- <a href="{{ route('job_offers.apply', ['job_offer' => $jobOffer->id]) }}" class="btn btn-success">Apply</a> --}}
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
