@extends('layouts.landing')

@section('content')
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    @if (session()->has('message'))
                            <p class="alert alert-info">
                                {{ session()->get('message') }}
                            </p>
                     @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group  mb-0">
                            <button type="submit" class="col-md-12 btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                    <div class="poweredBy pt-3">
                        <div class="row">
                            <div class="col-4 text-left">
                                &#169; <a  target="_blank" href="http://aicnandi.org/"> aicnandi.org </a> {{ date('Y') }}
                            </div>
                            <div class="col-8 text-right">
                                <a   target="_blank" class="text-muted" href="https://www.peakanddale.com/">
                                  Powered by : www.peakanddale.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
