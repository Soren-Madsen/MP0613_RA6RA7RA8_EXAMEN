@extends('layouts.app')

@section('title','Verify')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <strong>{{ __('Verify Your Email Address') }}</strong>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p class="mb-2">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p class="mb-3">{{ __('If you did not receive the email') }},</p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">{{ __('Request another link') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
