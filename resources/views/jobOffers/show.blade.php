<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job_offer->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@include('components.Navbar')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $job_offer->title }}</h5>
            <p class="card-text">Description: {{ $job_offer->description }}</p>
            <p class="card-text">Company: {{ $job_offer->company->name }}</p>
            <p class="card-text">Sector: {{ $job_offer->secteur->name }}</p>
            <p class="card-text">Location: {{ $job_offer->location }}</p>
            <p class="card-text">Type: {{ $job_offer->type }}</p>
            <p class="card-text">Salary: {{ $job_offer->salary }}</p>
            <p class="card-text">Start Date: {{ $job_offer->start_date }}</p>
            <p class="card-text">End Date: {{ $job_offer->end_date }}</p>
            <a href="{{ route('job_offers.index') }}" class="btn btn-primary">Back to Job Offers</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
