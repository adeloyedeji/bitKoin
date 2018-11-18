@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3>Bank Account</h3>
                    <h6><i>Your money will be paid into this account</i></h6>
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
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            @if (\Auth::user()->cash_account)
                                <table class="table table-hover table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Account Number</th>
                                            <th>Bank</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ '******' . substr(\Auth::user()->cash_account->account_no, -4) }}
                                            </td>
                                            <td>
                                                {{ \Auth::user()->cash_account->bank_name }}
                                            </td>
                                            <td>
                                                <a href="{{route('bank.add-cards')}}"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <a href="{{route('bank.add-cards')}}" class="btn btn-secondary">Add Bank Details</a>
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
                    <h3>Cards</h3>
                    <h6><i>Saved cards</i></h6>
                </div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
