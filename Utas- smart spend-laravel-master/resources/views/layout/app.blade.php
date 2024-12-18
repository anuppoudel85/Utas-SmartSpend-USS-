<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary" id="top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">WD2023</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registrationModal">
                        Registration
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('submissions.index') }}" class="nav-link">Submissions</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('details') }}" class="nav-link">Details</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


@yield('content')


<!-- Footer -->
<div class="container">
    <div class="row">
        <div class="col-8">
            <span>&copy; 2023 Web Development Conference;</span>
            <a href="#">Privacy</a> &middot;
            <a href="#">Terms</a>
        </div>
        <div class="col-4 text-end">
            <a href="#top">Back to top</a>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registrationModalLabel">
                    Registration
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" id="first_name" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" id="last_name" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="email_address" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email_address" aria-describedby="emailHelp" />
                        <div id="emailHelp" class="form-text">
                            We'll never share your email with anyone else.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" />
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">
                            Confirm Password
                        </label>
                        <input type="password" class="form-control" id="confirm_password" />
                    </div>

                    <div class="mb-3">
                        <span class="me-2">Are you a research student?</span>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="research_student" id="research_student_yes" />
                            <label class="form-check-label" for="research_student_yes">
                                Yes
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="research_student" id="research_student_no" />
                            <label class="form-check-label" for="research_student_no">
                                No
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="agree_terms" />
                        <label class="form-check-label" for="agree_terms">
                            I acknowledge that I have read and understand the terms and
                            conditions.
                        </label>
                    </div>

                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- JQUERY CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@yield('scripts')
</body>

</html>
