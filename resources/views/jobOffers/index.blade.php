<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Offers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        @foreach($jobOffers as $offer)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $offer->title }}</h5>
                    <p class="card-text">{{ $offer->description }}</p>
                    <p class="card-text">Location: {{ $offer->location ?? 'Not specified' }}</p>
                    <p class="card-text">Type: {{ $offer->type }}</p>
                    <p class="card-text">Salary: {{ $offer->salary ? '$'.$offer->salary : 'Negotiable' }}</p>
                    <p class="card-text">Start Date: {{ $offer->start_date ? $offer->start_date->format('F d, Y') : 'ASAP' }}</p>
                    <p class="card-text">Company: {{ $offer->company->name }}</p>
                    <p class="card-text">Sector: {{ $offer->secteur->name }}</p>
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
