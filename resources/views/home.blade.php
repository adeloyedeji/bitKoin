@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- start section -->
			<section class="section section--no-pt">
                <br><br>
                <script>
                    (function(b,i,t,C,O,I,N) {
                        window.addEventListener('load',function() {
                            if(b.getElementById(C))return;
                            I=b.createElement(i),N=b.getElementsByTagName(i)[0];
                            I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
                        },false)
                    })(document,'script','{{ asset("welcome/js/widget.js") }}','btcwdgt');
                </script>

                <div class="grid grid--container">
                    <div class="section-heading section-heading--center  col-MB-60">
                        <h2 class="__title">Bitcoin Trade Statistics</h2>
                    </div>

                    <div class="row">
                        <div class="col col--md-6">
                            <div class="col-MB-40">
                                <div class="btcwdgt-chart"></div>
                            </div>
                        </div>

                        <div class="col col--md-6">
                            <div class="col-MB-40">
                                <div class="btcwdgt-chart" bw-theme="light"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col--md-6 col--lg-3">
                            <div class="col-MB-40">
                                <div class="btcwdgt-price"></div>
                            </div>
                        </div>

                        <div class="col col--md-6 col--lg-3">
                            <div class="col-MB-40">
                                <div class="btcwdgt-price" bw-theme="light" bw-cur="eur"></div>
                            </div>
                        </div>

                        <div class="col col--md-6 col--lg-3">
                            <div class="col-MB-40">
                                <div class="btcwdgt-price" bw-cash="true"></div>
                            </div>
                        </div>

                        <div class="col col--md-6 col--lg-3">
                            <div class="col-MB-40">
                                <div class="btcwdgt-price" bw-theme="light" bw-cur="rub"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end section -->
        </div>
    </div>
    {{-- <br><br>
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
    </div> --}}
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h4>Trade Statistics</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            
                        </div>
                        <div class="col-md-6 col-sm-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>
@endsection
