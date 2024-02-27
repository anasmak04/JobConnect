@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Recruiters Created by Representer</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($recruiters as $recruiter)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recruiter->name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $recruiter->email }}</p>
                            <p class="card-text"><strong>Position:</strong> {{ $recruiter->position }}</p>
                            <!-- Add more fields as needed -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
