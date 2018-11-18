@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3>
                        Bank Verification Number
                        @if (\Auth::user()->bvn)
                            <i class="fa text-success fa-check-circle pull-right"></i>
                        @else
                            <i class="fa fa-ban text-danger pull-right"></i>
                        @endif
                    </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (\Auth::user()->bvn)
                                Your BVN was verified {{\Auth::user()->bvn->created_at->diffForHumans()}}
                            @else
                                <form action="{{route('verification.bvn')}}" method="post">
                                    @csrf
                                    <label for="bvn" class="control-label">Bank Verification Number</label>
                                    <div class="form-row align-items-center">
                                        <div class="col-sm-6 my-1">
                                            <input type="text" class="form-control" id="bvn" name="bvn">
                                        </div>
                                        <div class="col-auto my-1">
                                            <button type="submit" class="btn btn-primary">Verify BVN</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3>
                        Phone Number
                        @if (\Auth::user()->phone)
                            <i class="fa text-success fa-check-circle pull-right"></i>
                        @else
                            <i class="fa fa-ban text-danger pull-right"></i>
                        @endif
                    </h3>
                </div>

                <div class="card-body">
                    @if (\Auth::user()->phone)
                        Phone number has been verified
                    @else
                        @if (\Auth::user()->bvn)
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('verification.phone')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="control-label">Phone Number</label>
                                            <input type="number" name="phone" id="phone" class="form-control" required>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            You need to verify your BVN to be able to verify your Phone Number.
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3>
                        Bank Account
                        @if (\Auth::user()->cash_account)
                            <i class="fa text-success fa-check-circle pull-right"></i>
                        @else
                            <i class="fa fa-ban text-danger pull-right"></i>
                        @endif
                    </h3>
                </div>

                <div class="card-body">
                    @if (\Auth::user()->cash_account)
                        Your bank account was verified {{\Auth::user()->cash_account->created_at->diffForHumans()}}.
                    @else
                        <a href="{{route('bank.add-cards')}}" class="btn btn-secondary">Add Bank Details</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
