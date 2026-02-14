@extends('layouts.app')

@section('title', 'Order List')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Pizza <span class="text-danger">Orders</span></h1>
            <a class="btn btn-primary" href="{{ route('order.create') }}"><i class="fa-solid fa-plus"></i> New Order</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                @if(count($orders) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><i class="fa fa-calendar"></i> Order Date</th>
                                <th scope="col"><i class="fa fa-user"></i> User</th>
                                <th scope="col"><i class="fa fa-flag"></i> Order Type</th>
                                <th scope="col"><i class="fa fa-deaf"></i> Order Base</th>
                                <th scope="col"><i class="fa fa-image"></i> Image</th>
                                <th scope="col" class="text-end"><i class="fa fa-link"></i> Go</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <i class="fa fa-calendar-alt"></i>
                                        {{ $order->created_at->format('d.m.Y') }}
                                        <i class="fa fa-clock"></i>
                                        {{ $order->created_at->format('H:i:s') }}
                                    </td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->type }}</td>
                                    <td>{{ $order->base }}</td>
                                    <td>
                                        @if(!empty($order->image_url))
                                            <img class="rounded" src="{{ $order->image_url }}" alt="Order image" style="max-width: 60px; height: auto;">
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a class="btn btn-sm btn-outline-warning"
                                           href="{{ route('order.show', $order->id) }}"
                                           title="See order details">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mb-0">{{ __('No data found!') }}</div>
                @endif
            </div>
        </div>

        @if(session('mssg'))
            <div class="alert alert-success mt-3 text-center">{{ session('mssg')  }}</div>
        @endif

        <div class="mt-3">
            <a class="btn btn-link" href="{{ url('/') }}"><i class="fa-solid fa-arrow-left"></i> Back to homepage</a>
        </div>
    </div>
@endsection
