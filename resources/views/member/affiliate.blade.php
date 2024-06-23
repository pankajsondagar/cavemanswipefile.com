@extends('member.layouts.app')
@section('title', 'Affiliate')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    Affiliate URL : <a href="{{ $url }}" target="_blank">{{ @$url }}</a>
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