@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h2 class="h5 mb-0">Create a New Pizza Order</h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="name">Your name</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="enter your name" value="{{ old('name') }}">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="type">Choose pizza type</label>
                                    <select class="form-select" name="type" id="type">
                                        <option value="0" disabled {{ old('type') ? '' : 'selected' }}>--- choose action ---</option>
                                        <option value="margherita" {{ old('type') === 'margherita' ? 'selected' : '' }}>Margherita</option>
                                        <option value="hawaiian" {{ old('type') === 'hawaiian' ? 'selected' : '' }}>Hawaiian</option>
                                        <option value="veg supreme" {{ old('type') === 'veg supreme' ? 'selected' : '' }}>Veg Supreme</option>
                                        <option value="volcano" {{ old('type') === 'volcano' ? 'selected' : '' }}>Volcano</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="base">Choose base type</label>
                                    <select class="form-select" name="base" id="base">
                                        <option value="0" disabled {{ old('base') ? '' : 'selected' }}>--- choose action ---</option>
                                        <option value="chessy crust" {{ old('base') === 'chessy crust' ? 'selected' : '' }}>Chessy Crust</option>
                                        <option value="garlic crust" {{ old('base') === 'garlic crust' ? 'selected' : '' }}>Garlic Crust</option>
                                        <option value="thin & crispy" {{ old('base') === 'thin & crispy' ? 'selected' : '' }}>Thin & Crispy</option>
                                        <option value="thick" {{ old('base') === 'thick' ? 'selected' : '' }}>Thick</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Extra toppings</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="mushrooms" id="mushrooms" {{ in_array('mushrooms', old('toppings', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="mushrooms">Mushrooms</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="peppers" id="peppers" {{ in_array('peppers', old('toppings', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="peppers">Peppers</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="garlic" id="garlic" {{ in_array('garlic', old('toppings', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="garlic">Garlic</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="olives" id="olives" {{ in_array('olives', old('toppings', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="olives">Olives</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image_url">Choose image</label>
                                <select class="form-select" name="image_url" id="image_url">
                                    <option value="0" disabled {{ old('image_url') ? '' : 'selected' }}>--- choose image ---</option>
                                    <option value="/img/pizza1.png" {{ old('image_url') === '/img/pizza1.png' ? 'selected' : '' }}>Pizza 1</option>
                                    <option value="/img/pizza2.png" {{ old('image_url') === '/img/pizza2.png' ? 'selected' : '' }}>Pizza 2</option>
                                    <option value="/img/pizza3.png" {{ old('image_url') === '/img/pizza3.png' ? 'selected' : '' }}>Pizza 3</option>
                                    <option value="/img/pizza4.png" {{ old('image_url') === '/img/pizza4.png' ? 'selected' : '' }}>Pizza 4</option>
                                    <option value="/img/pizza5.png" {{ old('image_url') === '/img/pizza5.png' ? 'selected' : '' }}>Pizza 5</option>
                                    <option value="/img/pizza6.png" {{ old('image_url') === '/img/pizza6.png' ? 'selected' : '' }}>Pizza 6</option>
                                    <option value="/img/pizza7.png" {{ old('image_url') === '/img/pizza7.png' ? 'selected' : '' }}>Pizza 7</option>
                                    <option value="/img/pizza8.png" {{ old('image_url') === '/img/pizza8.png' ? 'selected' : '' }}>Pizza 8</option>
                                    <option value="/img/pizza9.png" {{ old('image_url') === '/img/pizza9.png' ? 'selected' : '' }}>Pizza 9</option>
                                    <option value="/img/pizza10.png" {{ old('image_url') === '/img/pizza10.png' ? 'selected' : '' }}>Pizza 10</option>
                                </select>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-paper-plane"></i> Order Pizza</button>
                                <a class="btn btn-light" href="{{ route('order.index') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <a class="btn btn-link" href="{{ route('order.index') }}"><i class="fa-solid fa-arrow-left"></i> Back to orders</a>
                </div>
            </div>
        </div>
    </div>
@endsection
