@extends('layouts.admin.app')

@section('contents')
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="profile-info-inner">
                    <div class="profile-details-hr">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr">
                                    <p><b>Name</b><br> {{$user->fname . ' ' . $user->lname}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>Username</b><br> {{$user->uname}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr">
                                    <p><b>Date of Birth</b><br> {{$user->date_of_birth}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>E-mail</b><br> {{$user->email}}</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="address-hr">
                                    <p><b>Phone</b><br> {{$user->phone ? $user->phone : 'Not yet verified'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>Bank Name</b><br> {{$user->cash_account->bank_name}}</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    <p><b>Account Number</b><br> {{$user->cash_account->account_no}}</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                    @if($user->status != 3)
                                    <button class="btn btn-success widget-btn-1 btn-sm" onclick="document.getElementById('blockForm').submit();">Block Account</button>
                                    <form action="{{route('admin.users.profile.block')}}" method="post" id="blockForm" style="display:none">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="user" id="user" value="{{$user->id}}">
                                    </form>
                                    @else
                                    <button class="btn btn-success widget-btn-1 btn-sm" onclick="document.getElementById('unblockForm').submit();">Unlock Account</button>
                                    <form action="{{route('admin.users.profile.unblock')}}" method="post" id="unblockForm" style="display:none">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="user" id="user" value="{{$user->id}}">
                                    </form>
                                    @endif
                                    <button class="btn btn-danger widget-btn-4 btn-sm" onclick="document.getElementById('deleteForm').submit()">Delete Account</button>
                                    <form action="{{route('admin.users.profile.delete')}}" method="post" id="deleteForm" style="display:none">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="uid" id="uid" value="{{$user->id}}">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection