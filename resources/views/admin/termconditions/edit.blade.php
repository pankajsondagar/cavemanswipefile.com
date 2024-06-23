@extends('admin.layouts.app')
@section('title', 'Payplan - Structure')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.termsconditions.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>
                                Page 
                                </strong> Content
                        </div>
                        <div class="card-body card-block">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="text-secondary">Please write here your site terms and condition, privacy policy, refund policy, etc.</div>
                                </div>
                            </div>
                            <input type="hidden" value="{{ @$data->id }}" name="id"/>

                            <div class="row form-group">
                                
                                <div class="col-12 col-md-12">
                                    <textarea class="form-control" id="editor1" name="content">{{ $data->content }}</textarea>
                                    @error('content')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Save Changes
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
@include('tinymce')