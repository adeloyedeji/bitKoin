@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-transparent">{{ __('Account Blocked') }}</div>

                <div class="card-body">
                    
                    {{ __('Unfortunately after thorough analysis of your account usage, we regret to inform you that your account has been blocked by our administrators for fradulent reasons.') }}
                    {{ __('If you feel this was done in error, kindly contact us on') }}, <a href="mailto:{{env('APP_MAIL')}}">{{env('APP_MAIL')}}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
