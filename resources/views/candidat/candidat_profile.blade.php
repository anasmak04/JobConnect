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

    <style>
        .check-group {
            background: #fff;
            max-width: 13rem;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgb(0 0 10 / 0.2);

            counter-reset: total;
            counter-reset: checked;

            >*+* {
                margin-top: 0.75rem;
            }

            .checkbox {
                counter-increment: total;
            }

            input[type="checkbox"]:checked {
                counter-increment: checked;
            }

            &__result {
                font-weight: bold;
                padding-top: 0.75rem;
                border-top: 1px solid rgb(0 0 0 / 0.2);

                &:after {
                    content: counter(checked) " / " counter(total);
                    padding-left: 1ch;
                }
            }
        }


        .checkbox {
            $block: &;

            cursor: pointer;
            display: flex;
            align-items: center;

            &__input {
                position: absolute;
                width: 1.375em;
                height: 1.375em;
                opacity: 0;
                cursor: pointer;

                &:checked+#{$block}__icon .tick {
                    stroke-dashoffset: 0;
                }
            }

            &__icon {
                width: 1.375em;
                height: 1.375em;
                flex-shrink: 0;
                overflow: visible;

                .tick {
                    stroke-dasharray: 20px;
                    stroke-dashoffset: 20px;
                    transition: stroke-dashoffset .2s ease-out;
                }
            }

            &__label {
                margin-left: 0.5em;
            }
        }
    </style>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>


    @include('components.Navbar')



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
                        <div class="mb-3">
                            <h6>Skills:</h6>
                            @foreach ($user->skills as $skill)
                                <span class="badge bg-primary">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                        <div>
                            <h6>Formations:</h6>
                            @foreach ($user->formations as $formation)
                                <span class="badge bg-secondary">{{ $formation->title }}</span>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-3">
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
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <p class="mb-4"><span class="text-primary font-italic me-1">Assignment</span> Project Status
                        </p>
                        <!-- Static projects -->
                        <div class="project-item">
                            <span class="float-start clickable" style="cursor: pointer;">Project Name 1</span>
                            <span class="float-end status"
                                style="background-color: #4CAF50; color: white; border-radius: 5px;">Completed</span>
                        </div>
                        <!-- Add other static projects -->
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('candidat.save.profile') }}" method="POST">
                            @csrf
                            <!-- Profile Information -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <!-- Other profile fields -->

                            <!-- Skills and Formations -->
                            <div class="d-flex">
                                <!-- Skills -->
                                <div class="form-group flex-grow-1 me-3">
                                    <label for="skills">Skills</label>
                                    <div class="check-group">
                                        @foreach ($skills as $skill)
                                            <label for="skill_{{ $skill->id }}" class="checkbox">
                                                <input class="checkbox__input" type="checkbox" name="skills[]"
                                                    id="skill_{{ $skill->id }}" value="{{ $skill->id }}">
                                                <span class="checkbox__label">{{ $skill->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Formations -->
                                <div class="form-group flex-grow-1">
                                    <label for="formations">Formations</label>
                                    <div class="check-group">
                                        @foreach ($formations as $formation)
                                            <label for="formation_{{ $formation->id }}" class="checkbox">
                                                <input class="checkbox__input" type="checkbox" name="formations[]"
                                                    id="formation_{{ $formation->id }}" value="{{ $formation->id }}">
                                                <span class="checkbox__label">{{ $formation->title }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Save Profile</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


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
