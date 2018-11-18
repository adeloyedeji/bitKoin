@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-transparent">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="uname" class="col-form-label text-md-right">{{ __('Username') }}</label>

                            <input id="uname" type="text" class="form-control{{ $errors->has('uname') ? ' is-invalid' : '' }}" name="uname" value="{{ old('uname') }}" required autofocus>

                            @if ($errors->has('uname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('uname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="fname" class="col-form-label text-md-right">{{ __('First Name') }}</label>

                            <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required>

                            @if ($errors->has('fname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="lname" class="col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required>

                            @if ($errors->has('lname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="row">
                                <div class="col-md-4">
                                    <select name="year" id="year" class="form-control">
                                        @for($i = 1900; $i <= date('Y'); $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('year'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" id="month" name="month">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    @if ($errors->has('month'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('month') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <select name="day" id="day" class="form-control">
                                        @for($i = 1; $i<= 31; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('day'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('day') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="agree" id="agree" {{ old('agree') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        <a href="#">{{ __('I agree to terms and conditions of this website.') }}</a>
                                    </label>
                                    @if ($errors->has('agree'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('agree') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                    <p>
                                        <a href="{{route('login')}}">Already have an account? Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
