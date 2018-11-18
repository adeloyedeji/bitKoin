@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3>Add Bank Account</h3>
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
                            {!! session('error') !!}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{route('bank.add-card')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="card" class="control-label">Account Number</label>
                                    <input type="text" class="form-control" id="account_no" name="account_no" required>
                                </div>
                                <div class="form-group">
                                    <label for="bank" class="control-label">Bank</label>
                                    <select name="bank" id="bank" class="form-control">
                                        @forelse ($banks as $b)
                                            <option value="{{$b->code}}">{{$b->name}}</option>
                                        @empty
                                            <option value="0">No banks found!</option>
                                        @endforelse
                                    </select>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Add Bank Account</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <a href="{{route('bank.cards')}}" class="text-secondary"><i class="fa fa-long-arrow-left"></i> Back to Payment Methods</a>
                            </p>
                            <p>
                                You need to enter an account number you own.
                            </p>
                            <p>
                                For verification purposes, we require the name on the card match your account name.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
