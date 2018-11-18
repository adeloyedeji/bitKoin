@extends('layouts.admin.app')

@section('contents')
    <div class="product-status mg-b-15">    
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <h4>Users List</h4>
                        {{-- <div class="add-product">
                            <a href="add-department.html">Add Departments</a>
                        </div> --}}
                        <div class="asset-inner">
                            <table>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Wallet Balance (&#8358;)</th>
                                    <th>Status</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date of Birth</th>
                                    <th>Setting</th>
                                </tr>
                                @php $i = 0; @endphp
                                @forelse ($users as $u)
                                    <tr>
                                        <td>
                                            {{$i+=1}}
                                        </td>
                                        <td>
                                            {{$u->fname . ' ' . $u->lname}}
                                        </td>
                                        <td>
                                            {{number_format($u->bitcoin_wallet->balance, 2)}}
                                        </td>
                                        <td>
                                            @if ($u->status === 0)
                                                <button class="ws-setting">Pending E-mail verification</button>
                                            @elseif($u->status == 1)
                                                <button class="ps-setting">Pending Account Verification</button>
                                            @elseif($u->status == 2)
                                                <button class="pd-setting">Verified Account</button>
                                            @elseif($u->status == 3)
                                                <button class="ds-setting">Account Blocked</button>
                                            @else
                                                <button class="ds-setting">Unknown</button>
                                            @endif
                                        </td>
                                        <td>
                                            {{$u->email}}
                                        </td>
                                        <td>
                                            @if ($u->phone)
                                                {{$u->phone}}
                                            @else
                                                Not yet verified.
                                            @endif
                                        </td>
                                        <td>
                                            {{$u->date_of_birth}}
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" title="View" class="pd-setting" href="{{route('admin.users.profile', ['username' => $u->uname])}}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="text-center">Seems quiet in here.</h4>
                                                    <h5 class="text-center">Looks like nobody has signed up yet.</h5>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                        <div class="custom-pagination">
                            <nav aria-label="Page navigation example">
                                {{-- <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul> --}}
                                {{$users->links()}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection