@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-transparent">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h4>Bitcoin Rates</h4>
                    <h6 class="text-success" id="ngn_price">Current Price: {{$btc_to_naira}}/BTC</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills nav-fill navtop">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#monthly" data-toggle="tab">Month</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#weekly" data-toggle="tab">Week</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#today" data-toggle="tab">Today</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="monthly">
                                    <br>
                                    <div id="container" style="height: 400px; min-width: 310px"></div>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="weekly">Weekly data</div>
                                <div class="tab-pane" role="tabpanel" id="today">Today</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>
@endsection
