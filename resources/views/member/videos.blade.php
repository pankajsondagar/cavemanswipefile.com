@extends('member.layouts.app')
@section('title', 'Videos')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! $videoURL->content !!}            
                </div>                  
            </div>
        </div>
    </div>
</div>
@endsection