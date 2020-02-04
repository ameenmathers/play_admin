@extends('layouts.auth')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Referral') }}</h3></div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/referral-store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="referrer_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Your Name') }}</label>

                                <div class="col-md-6">
                                    <input id="referrer_name" type="text"
                                           class="form-control @error('email') is-invalid @enderror" name="referrer_name"
                                           value="{{ old('name') }}" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Your Email') }}</label>

                                <div class="col-md-6">
                                    <input id="referrer_email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="referrer_email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <h5 class="col-12 center">Referral Details</h5>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="referee_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Referee Name') }}</label>

                                <div class="col-md-6">
                                    <input id="referee_name" type="text"
                                           class="form-control @error('referee_name') is-invalid @enderror"
                                           name="referee_name" value="{{ old('referee_name') }}" required
                                           autocomplete="referee_name" autofocus>

                                    @error('referee_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
{{--TODO Add phone column to table migration--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="referee_phone"--}}
{{--                                       class="col-md-4 col-form-label text-md-right">{{ __('Referee Phone') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="referee_phone" type="text"--}}
{{--                                           class="form-control @error('referee_phone') is-invalid @enderror"--}}
{{--                                           name="referee_phone" value="{{ old('referee_phone') }}" required--}}
{{--                                           autocomplete="referee_phone" autofocus>--}}

{{--                                    @error('referee_phone')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label for="referee_email"
                                       class="col-md-4 col-form-label text-md-right">{{ __(' Referee E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="referee_email" type="email"
                                           class="form-control @error('referee_email') is-invalid @enderror"
                                           name="referee_email" value="{{ old('referee_email') }}" required
                                           autocomplete="referee_email">

                                    @error('referee_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-12 center">
                                    <button type="submit" class="btn btn-lg btn-outline-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
