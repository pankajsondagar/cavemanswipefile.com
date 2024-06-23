@extends('member.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Dashboard</h2>
                        
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fa fa-paper-plane"></i>
                                </div>
                                <div class="text">
                                    <h2>Hits</h2>
                                    <span>0</span>
                                </br>
                                    
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-handshake"></i>
                                </div>
                                <div class="text">
                                    <h2>Referrals</h2>
                                    <span>{{ $refferals }}</span>
                                </br>
                                    
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-money-bill-alt"></i>
                                </div>
                                <div class="text">
                                    <h2>Earning</h2>
                                    <span>$0.00</span>
                                </br>
                                    
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Account Overview</strong>
                            <div class="pull-right">
                                <span class="badge badge-success">Active</span>
                            </div>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-md-12">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Registered </label>
                                        <p>{{ date('d M Y',strtotime($authMember->created_at)) }}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col col-md-12">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Name </label>
                                        <p>{{ $authMember->firstname . ' ' . $authMember->lastname . ' ('.$authMember->email.')' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">My Sponsor</strong>
                            
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Username </label>
                                        <p>{{ @$mySponser->username }}</p>
                                    </div>
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Name </label>
                                        <p>{{ @$mySponser->firstname . ' ' . @$mySponser->lastname }}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Email </label>
                                        <p>{{ @$mySponser->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Sponser Of Sponsor</strong>
                            
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Username </label>
                                        <p>{{ @$sponserOfSponser->username }}</p>
                                    </div>
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Name </label>
                                        <p>{{ @$sponserOfSponser->firstname . ' ' . @$sponserOfSponser->lastname }}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col col-md-6">
                                        <label for="ref_username" class=" form-control-label" style="font-weight: 600;"> Email </label>
                                        <p>{{ @$sponserOfSponser->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Membership</strong>
                            
                        </div>
                        <div class="card-body card-block">
                            <div class="summary">
                                
                                    <div class="summary-item">
                                        <h6 style="margin-bottom: 15px;margin-top: 15px;"><span class="text-muted">Registered Since</span> {{ date('d M Y',strtotime($authMember->created_at)) }}</h6>
                                        <ul class="list-unstyled list-unstyled-border">
                                            @php $nextLeaderKey = 0; @endphp
                                            @foreach($plans as $key => $plan)
                                                @php 
                                                    $query = App\Models\UserPayment::where('user_id',$authMember->id)
                                                                ->where('leader_id',$plan->id)
                                                                ->where('is_confirm',1);
                                                    $count = $query->count();
                                                    if ($count == 3) {
                                                        $nextLeaderKey = $plan->id;
                                                    }
                                                @endphp
                                                    
                                                @if($count || $key == $nextLeaderKey) 
                                                    <li class="media">
                                                        <div>
                                                            <img class="mr-3 rounded" width="50" src="{{ asset('storage/uploads/' .$plan->header_img) }}" alt="Membership">
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-title">{{ $plan->name }}</div>
                                                            <div class="text-muted text-small">{{ $plan->description }}</div>

                                                            <h6 class="mt-3">
                                                                
                                                                @if($count == 3)
                                                                    <div class="media-right text-right" style="font-weight: 600;font-size: 16px;">
                                                                    <div>${{ $plan->reg_fee }} USD</div>
                                                                        <div></div>
                                                                    </div>
                                                                @else 

                                                                    <div class="media-right text-right">
                                                                        <div></div>
                                                                        @if(@$authMember)
                                                                        <div><div class="badge badge-primary"></div><a href="{{ route('member.make.payment',['planId' => $plan->id,'id'=>$authMember->id]) }}" class="btn btn-danger btn-round">Make Payment </a></div>
                                                                        @else 
                                                                        <div><div class="badge badge-primary"></div><a href="{{ route('member.make.payment',['planId' => $plan->id]) }}" class="btn btn-danger btn-round">Make Payment </a></div>
                                                                        @endif
                                                                    </div>
                                                                    
                                                                @endif
                                                            </h6>
                                                        </div>
                                                    </li>
                                                @endif
                                                
                                            @endforeach            
                                        </ul>
                                    </div>
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
                                            ({{ @$userPayment->user->firstname . ' ' . @$userPayment->user->lastname }})
                                        </div>
                                        <div class="col col-md-6" style="margin-bottom:10px !important;">
                                            @if(@$userPayment->allow_actions) 
                                                @if($userPayment->is_confirm)
                                                    <span class="text-success">Approved</span>
                                                @elseif($userPayment->is_declined)
                                                    <span class="text-danger">Declined</span>
                                                @else 
                                                    <div class="row">
                                                        <form method="POST" action="{{ route('admin.member.approve.payment') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $userPayment->id }}"/>
                                                            <input type="hidden" name="leader_id" value="{{ $userPayment->leader->id }}"/>
                                                            <button type="submit" class="btn btn-success">Approve</button>
                                                        </form> 
                                                        &nbsp;
                                                        <form method="POST" action="{{ route('admin.member.decline.payment') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $userPayment->id }}"/>
                                                            <button type="submit" class="btn btn-danger">Decline</button>
                                                        </form> 
                                                        &nbsp;
                                                            <button type="button" data-toggle="modal" data-target="#scrollmodal4" class="btn btn-sm btn-primary js-view-btn openPopup" data-name="{{ $userPayment->user->firstname . ' ' .$userPayment->user->lastname}}" data-message="{{ $userPayment->message }}">View</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            @else 
                                                <p class="text-danger">Please upgrade to {{@$userPayment->leader->name}}.</p>    
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
@include('view_message')
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        

        $('.js-view-btn').on('click',function() {
            $(document).find('#js-member-name').text($(this).attr('data-name'));
            $(document).find('#js-message').text($(this).attr('data-message'));
        });
    });
</script>
@endsection
    