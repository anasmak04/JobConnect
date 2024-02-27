<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Representer Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        .profile-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
        .badge {
            margin: 0 5px;
        }
        .card {
            margin-bottom: 30px;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .status {
            padding: 5px 10px;
            border-radius: 5px;
        }
        .project-item {
            margin-bottom: 10px;
        }
        .checkbox__label {
            margin-right: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
@include('components.Navbar')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ $user->getFirstMediaUrl('profile_images') }}" alt="avatar" class="rounded-circle img-fluid profile-image mb-3">
                    <h5>{{ $user->name }}</h5>
                    <p class="text-muted">
                        {{ $user->role->name ?? 'User Role' }}
                    </p>
                    <p class="text-muted">{{ $user->location ?? 'User Location' }}</p>
                    <div class="mb-3">
                        <h6>Skills:</h6>
                        @foreach ($user->skills as $skill)
                            <span class="badge badge-primary">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                    <div>
                        <h6>Formations:</h6>
                        @foreach ($user->formations as $formation)
                            <span class="badge badge-secondary">{{ $formation->title }}</span>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="button" class="btn btn-primary">Follow</button>
                        <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                    </div>
                </div>
            </div>
            <!-- Social links card -->
            <div class="card">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item">
                            <i class="fas fa-globe fa-lg text-warning"></i>
                            <p>https://mdbootstrap.com</p>
                        </li>
                        <!-- Add more social links as needed -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <!-- Project status card -->
            <div class="card mb-4">
                <div class="card-body">
                    <p><span class="text-primary font-italic">Assignment Project Status</span></p>
                    <div class="project-item">
                        <span class="float-left">Project Name 1</span>
                        <span class="float-right status" style="background-color: #4CAF50; color: white;">Completed</span>
                    </div>
                    <!-- Add more projects as needed -->
                </div>
            </div>
            <!-- Profile edit form -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('candidat.save.profile') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <!-- Skills selection -->
                        <div class="form-group">
                            <label for="skills">Skills</label>
                            <div>
                                @foreach ($skills as $skill)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="skills[]" id="skill_{{ $skill->id }}" value="{{ $skill->id }}"> {{ $skill->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <!-- Formations selection -->
                        <div class="form-group">
                            <label for="formations">Formations</label>
                            <div>
                                @foreach ($formations as $formation)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="formations[]" id="formation_{{ $formation->id }}" value="{{ $formation->id }}"> {{ $formation->title }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Profile</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
