@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                <h1 class="display-5 fw-bold">The North's <span class="text-danger">Best</span> Pizza</h1>
                <p class="lead text-muted">Freshly baked pizzas delivered with love.</p>

                @if(session('mssg'))
                    <div class="alert alert-success">{{ session('mssg')  }}</div>
                @endif

                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-outline-primary" href="{{ route('pizzas.index') }}">
                        <i class="fa-solid fa-list"></i> All Pizza
                    </a>
                    <a class="btn btn-primary" href="{{ route('pizzas.create') }}">
                        <i class="fa-solid fa-plus"></i> Order a Pizza
                    </a>
                    
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img class="img-fluid" src="/img/hand_2.png" alt="Pizza">
            </div>
        </div>
    </div>
@endsection
