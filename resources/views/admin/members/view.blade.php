@extends('admin.layouts.app')
@section('title', 'Member')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @include('includes.message')
            <div class="row">
                <div class="col-md-4">
                    <h2 class="title-1 m-b-25">Member Profile</h2>
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <strong class="card-title text-light">Referrer</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Username </label>
                                        <p>{{ @$user->parentUser->username }}</p>
                                    </div>
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Name </label>
                                        <p>{{ @$user->parentUser->firstname . ' ' . @$user->parentUser->lastname }}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Email </label>
                                        <p>{{ @$user->parentUser->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h2 class="title-1 m-b-25">&nbsp;</h2>
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <strong class="card-title text-light">Sponsor</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Username </label>
                                        <p>{{ @$user->parentUser->username }}</p>
                                    </div>
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Name </label>
                                        <p>{{ @$user->parentUser->firstname . ' ' . @$user->parentUser->lastname }}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Email </label>
                                        <p>{{ @$user->parentUser->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h2 class="title-1 m-b-25">&nbsp;</h2>
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <strong class="card-title text-light">Sponsor Of Sponser</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Username </label>
                                        <p>{{ @$user->parentUser->parentUser->username }}</p>
                                    </div>
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Name </label>
                                        <p>{{ @$user->parentUser->parentUser->firstname . ' ' . @$user->parentUser->parentUser->lastname }}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Email </label>
                                        <p>{{ @$user->parentUser->parentUser->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title pl-2 text-dark">Account Overview</strong>
                            <div class="pull-right text-dark">
                                <a href="{{ url('member/dashboard/'. $user->id) }}" target="_blank">
                                    <button class="btn btn-info btn-sm">Login As Member</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                @php    
                                    $avatar = $user->userDetail->avatar ?? $memberSetting->default_pic;
                                @endphp 
                                <img class="rounded-circle mx-auto d-block user-profile2" src="{{ asset('storage/uploads/' . $avatar) }}" alt="">
                                <h5 class="text-sm-center mt-2 mb-2">{{ $user->firstname . ' ' . $user->lastname }}</h5>
                                <div class="location text-sm-center mt-2 mb-2">
                                    <i class="fa fa-envelope"></i> {{ $user->email }}</div>
                            </div>
                                
                                <div class="location text-sm-center ">
                                    <i class="fa fa-map-marker"></i> {{ @$user->userDetail ? $user->userDetail->address . ', ' .$user->userDetail->state . ', ' . $user->userDetail->country : '' }}</div>
                            
                            <hr>
                            <div class="card-text text-sm-center">
                                <a href="#">
                                    <i class="fa fa-facebook pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-pinterest pr-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <strong class="card-title text-light">Payment Requests</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    @foreach(@$userPayments as $userPayment)
                                        <div class="col col-md-6" style="margin-bottom:10px !important;"> 
                                            {{ $userPayment->leader->name }}
                                        </div>
                                        <div class="col col-md-6" style="margin-bottom:10px !important;">
                                            @if($userPayment->is_confirm)
                                            <div class="row">
                                                <span class="text-success mr-4">Approved</span>
                                                &nbsp;
                                                <button type="button" data-id="{{ $userPayment->id }}" class="js-unapprove-btn openPopup btn btn-info" data-toggle="modal" data-target="#scrollmodal3">
                                                    Unapprove 
                                                </button>
                                            </div>
                                            @elseif($userPayment->is_declined)
                                                <span class="text-danger">Declined</span>
                                            @else 
                                                <div class="row">
                                                    <form method="POST" action="{{ route('admin.member.approve.payment') }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $userPayment->id }}"/>
                                                        <button type="submit" class="btn btn-success mr-3">Approve</button>
                                                    </form> 
                                                    <form method="POST" action="{{ route('admin.member.decline.payment') }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $userPayment->id }}"/>
                                                        <button type="submit" class="btn btn-danger">Decline</button>
                                                    </form> 
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>

<div class="modal fade" id="scrollmodal3" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{ route('admin.member.unapprove.payment') }}">
        @csrf
        <input type="hidden" name="id" id="js-user-payment-id" value=""/>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to unapproved this payment?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.js-unapprove-btn').on('click',function() {
            $(document).find('#js-user-payment-id').val($(this).attr('data-id'));
        });
    });
</script>
@endsection