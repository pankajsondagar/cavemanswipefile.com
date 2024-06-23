@extends('member.layouts.app')
@section('title', 'Make Payment')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Payment</strong>
                        </div>
                        <img class="card-img-top" src="{{ asset('storage/uploads/' . $plan->logo) }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title mb-3">{{ $plan->name }}</h4>
                            <div class="pull-right">
                                <button type="button" class="btn btn-info m-l-10 m-b-10"> ${{$plan->reg_fee }} USD
                                   
                                </button>
                                @if ($paymentStatus) 
                                    <button type="button" class="btn btn-success m-l-10 m-b-10"> PAID</button>
                                @else 
                                    <button type="button" class="btn btn-danger m-l-10 m-b-10"> UNPAID</button>
                                @endif
                            </div>
                            <p class="card-text">{{ $plan->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong> {{ @$paymentOptionContent->title }}</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ @$paymentOptionContent->content }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card border border-info text-center">
                        <div class="card-body text-center">
                            <h4 class="card-title mb-3"><i class="fa fa-handshake-o"></i>
                                <h4>Manual Payment</h4></h4>
                            
                            <div class="mt-4">Admin</div>
                            <div>Amount: ${{ $amount }}</div>
                            <h6>Total: ${{ $total }}</h6>
                            @if(@$adminPayment) 
                                @if($adminPayment->is_confirm)
                                    <span class="text-success mt-4">Paid</span>
                                @elseif($adminPayment->is_declined)
                                    <span class="text-danger mt-4">Declined</span>
                                @else 
                                    <span class="text-warning mt-4">Waiting For Confirmation</span>
                                @endif
                            @else 
                                <button type="button" class="openPopup btn btn-info btn-sm mt-4" data-toggle="modal" data-target="#scrollmodal">Make Payment </button>

                            @endif
                        </div>
                    </div>
                </div>

                @if(@$firstSponser)
                    <div class="col-md-4">
                        <div class="card border border-primary text-center">
                            <div class="card-body text-center">
                                <h4 class="card-title mb-3"><i class="fa fa-handshake-o"></i>
                                    <h4>Manual Payment</h4></h4>
                                
                                <div class="mt-4">Your Sponser : {{ @$firstSponser->firstname . ' ' . @$firstSponser->lastname  }}</div>
                                <div>Amount: ${{ $amount }}</div>
                                <h6>Total: ${{ $total }}</h6>
                                @if(@$adminPayment->is_declined || @$adminPayment->is_confirm != 1)
                                    <span class="text-warning mt-4">-</span>
                                @else
                                    @if(@$firstSponserPayment) 
                                        @if($firstSponserPayment->is_confirm)
                                            <span class="text-success mt-4">Paid</span>
                                        @elseif($firstSponserPayment->is_declined)
                                            <span class="text-danger mt-4">Declined</span>
                                        @else 
                                            <span class="text-warning mt-4">Waiting For Confirmation</span>
                                        @endif
                                    @else 
                                        <button type="button" class="openPopup btn btn-primary btn-sm mt-4" data-toggle="modal" data-target="#scrollmodal2">
                                            Make Payment 
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if(@$secondSponser)
                    <div class="col-md-4">
                        <div class="card border border-success text-center">
                            <div class="card-body text-center">
                                <h4 class="card-title mb-3"><i class="fa fa-handshake-o"></i>
                                <h4>Manual Payment</h4></h4>
                                <div class="mt-4">Sponser's Sponser : {{ @$secondSponser->firstname . ' ' . @$secondSponser->lastname  }}</div>
                                <div>Amount: ${{ $amount }}</div>
                                <h6>Total: ${{ $total }}</h6>
                                @if(@$firstSponserPayment->is_declined || @$firstSponserPayment->is_confirm != 1)
                                    @if(@$firstSponserPayment->is_declined)
                                        <span class="text-warning mt-4">-</span>
                                    @else 
                                        @include('member.second_sponser')
                                    @endif
                                @else
                                    @include('member.second_sponser')
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('member.payment_modals')
@endsection