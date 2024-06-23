@extends('member.layouts.app')
@section('title', 'Feedback')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('member.save.feedback') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-fw fa-check"></i> Contact Us Form</strong>
                        </div>
                        <div class="card-body card-block">
                            <input type="hidden" name="id" value="{{ @$authMember->id }}"/>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="subject" class=" form-control-label">Subject <span class="error">*</span></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    @error('subject')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="message" class=" form-control-label">Message <span class="error">*</span></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea id="myTextarea" class="form-control" rows="4" name="message"></textarea>
                                    @error('message')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
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