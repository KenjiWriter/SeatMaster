@extends('layouts.app')

@section('title', '- home')

@section('content')
    @extends('layouts.navbar')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">SeatMaster</h1>
                <p class="lead fw-normal text-white-50 mb-0">We guarantee that you sit with confidence</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @livewire('showfilms')
        </div>
    </section>
@endsection
