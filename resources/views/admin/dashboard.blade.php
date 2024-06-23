@extends('admin.layouts.app')
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
                                    <h2>Registered</h2>
                                    <span>{{ @$totalRegistered }}</span>
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
                                    <h2>Member</h2>
                                    <span>{{ @$totalMembers }}</span>
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
                                    <h2>Income</h2>
                                    <span>$0.00</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-hdd"></i>
                                </div>
                                <div class="text">
                                    <h2>Product</h2>
                                    <span>0</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart11"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-list-alt"></i>
                                </div>
                                <div class="text">
                                    <h2>Order</h2>
                                    <span>0</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart22"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-chart-bar"></i>
                                </div>
                                <div class="text">
                                    <h2>Sales</h2>
                                    <span>$0.00</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart33"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.message')
                    <h2 class="title-1 m-b-25">Recent Members</h2>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Profile</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Level</th>
                                    <th class="">Registered</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$recentMembers as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        @php    
                                            $avatar = $value->userDetail->avatar ?? $memberSetting->default_pic;
                                        @endphp 
                                        <td><img class="user-profile" src="{{ asset('storage/uploads/' . $avatar) }}"/></td>
                                        <td>
                                            <a href="{{ route('admin.member.view',['id' => $value->id]) }}">
                                                {{ $value->username }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $value->firstname . ' ' . $value->lastname }}
                                        </td>
                                        <td>{{ $value->email }}</td>
                                        <td>
                                            @if($value->has_plan)
                                                <span class="badge badge-success">Active</span>
                                            @else 
                                                @if ($value->status == 1)
                                                    <span class="badge badge-secondary">Registered Only</span>
                                                @else 
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <b>{!! $value->level !!}</b>
                                        </td>
                                        <td>
                                            {{ $value->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        


                    </div>
                    <div class="pull-right">
                        {{ @$recentMembers->links() }}
                    </div>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>
@endsection
    