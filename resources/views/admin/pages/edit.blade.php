@extends('admin.layouts.app')
@section('title', 'Page')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.page.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-fw fa-check"></i> Edit Page</strong>
                        </div>
                        <input type="hidden" value="{{ $page->id }}" name="id"/>
                        <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="title" class="form-control" value="{{ @$page->title }}">
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="content" class=" form-control-label">Page Content</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea id="editor1" name="content">{{ @$page->content }}</textarea>
                                    
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
@include('tinymce')