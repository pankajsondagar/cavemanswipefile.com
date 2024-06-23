@extends('admin.layouts.app')
@section('title', 'Website Settings')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.content.update') }}" method="post" class="form-horizontal">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Website</strong> Settings
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="content" class=" form-control-label">Payment Option</label>
                                </div>
                                <input type="hidden" value="{{ @$paymentOption->slug }}" name="slug[]"/>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" name="content[]">{{ @$paymentOption->content }}</textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="content" class=" form-control-label">Secure Admin URL</label>
                                </div>
                                <input type="hidden" value="{{ @$adminURL->slug }}" name="slug[]"/>
                                <div class="col-12 col-md-9">
                                    <input type="text" value="{{ @$adminURL->content }}" name="content[]" class="form-control"/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="content" class=" form-control-label">Video URL</label>
                                </div>
                                <input type="hidden" value="{{ @$videoURL->slug }}" name="slug[]"/>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" rows="4" name="content[]">{{ @$videoURL->content }}</textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="content" class=" form-control-label">Registration Success Message</label>
                                </div>
                                <input type="hidden" value="{{ @$registerMsg->slug }}" name="slug[]"/>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" rows="4" name="content[]">{{ @$registerMsg->content }}</textarea>
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