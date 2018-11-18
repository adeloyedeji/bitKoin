@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3>Edit Profile</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="uname" class="col-form-label text-md-right">{{ __('Username') }}</label>

                            <input id="uname" type="text" class="form-control{{ $errors->has('uname') ? ' is-invalid' : '' }}" name="uname" value="{{ $profile->uname }}" required autofocus>

                            @if ($errors->has('uname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('uname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="fname" class="col-form-label text-md-right">{{ __('First Name') }}</label>

                            <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ $profile->fname }}" required>

                            @if ($errors->has('fname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="lname" class="col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ $profile->lname }}" required>

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
                                            @if($year == $i)
                                                <option selected value="{{$i}}">{{$i}}</option>
                                            @else
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endif
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
                                        <option @if($month == 1) selected @endif value="1">January</option>
                                        <option @if($month == 2) selected @endif value="2">February</option>
                                        <option @if($month == 3) selected @endif value="3">March</option>
                                        <option @if($month == 4) selected @endif value="4">April</option>
                                        <option @if($month == 5) selected @endif value="5">May</option>
                                        <option @if($month == 6) selected @endif value="6">June</option>
                                        <option @if($month == 7) selected @endif value="7">July</option>
                                        <option @if($month == 8) selected @endif value="8">August</option>
                                        <option @if($month == 9) selected @endif value="9">September</option>
                                        <option @if($month == 10) selected @endif value="10">October</option>
                                        <option @if($month == 11) selected @endif value="11">November</option>
                                        <option @if($month == 12) selected @endif value="12">December</option>
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
                                            @if ($i == $day)
                                                <option selected value="{{$i}}">{{$i}}</option>
                                            @else
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endif
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

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $profile->email }}" readonly>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }} <small><i>ignore if you do not intend changing your password.</i></small></label>

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Update Profile') }}
                                    </button>
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
