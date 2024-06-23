@extends('member.layouts.app')
@section('title', 'Digital Content')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        @include('includes.message')
                        <form action="{{ route('member.digital.content') }}" method="get" class="form-horizontal">
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" name="plan">
                                                    <option value="">Select Leader</option>
                                                    @foreach($plans as $key => $val)
                                                        <option value="{{ $key }}" {{ $plan == $key ? 'selected' : '' }}>{{ $val }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-search"></i> Find
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            </form>  
                            @foreach($list as $val)
                                <div class="card">
                                    <div class="card-body card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="mb-4">{!! $val->subtitle !!}</p>

                                                {!! $val->content !!} 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>      
                </div>                  
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>
@endsection