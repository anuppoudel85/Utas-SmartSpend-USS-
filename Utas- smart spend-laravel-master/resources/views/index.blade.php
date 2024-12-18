@extends('layout.app')
@section('title', 'Index')

@section('content')
    <div class="bg-light border-top border-bottom">
        <div class="container py-5">
            <h1 class="text-center fw-bold">2023 Web Development Conference</h1>
            <p class="text-center">
                Welcome to the 1st international conference on web development. It
                will take place in Hobart, Australia, and it is hosted by
                <a href="https://www.utas.edu.au">University of Tasmania</a>
            </p>
        </div>
    </div>

    <!-- Image Grid -->
    <div class="container my-5">
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('images/cascade-brewery.jpg') }}" class="grid-image" alt="Cascade Brewery" />
                <h2 class="text-center">Cascade Brewery</h2>
            </div>
            <div class="col-4">
                <img src="{{ asset('images/hobart-harbor.jpg') }}" class="grid-image" alt="Hobart Harbor" />
                <h2 class="text-center">Hobart Harbor</h2>
            </div>
            <div class="col-4">
                <img src="{{ asset('images/port-arthur.jpg') }}" class="grid-image" alt="Port Arthur" />
                <h2 class="text-center">Port Arthur</h2>
            </div>
        </div>
    </div>

    <!-- Sponsers -->
    <div class="container my-5 py-5 border-top border-bottom">
        <div class="row">
            <div class="col-5">
                <h2 class="fw-bold">Sponsers</h2>
            </div>
            <div class="col-7">
                <p class="sponser-name">University of Tasmania</p>
                <p class="sponser-name">ABC Network Company</p>
                <p class="sponser-name">Hobart Cooperation</p>
            </div>
        </div>
    </div>
@endsection
