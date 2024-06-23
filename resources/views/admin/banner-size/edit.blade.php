@extends('admin.layouts.app')
@section('title', 'Banner')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.banner.size.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-fw fa-check"></i>Edit Banner Size</strong>
                        </div>
                        <input type="hidden" value="{{ $banner->id }}" name="id"/>
                        <div class="card-body card-block">
                            

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="title" class="form-control" value="{{ @$banner->title }}">
                                    <span style="margin-top: 15px !important;">Please add banner size like this 128x128</span>
                                </div>
                            </div>

                            

                            

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>
@endsection