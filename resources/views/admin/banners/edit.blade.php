@extends('admin.layouts.app')
@section('title', 'Banner')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.banner.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-fw fa-check"></i>Edit Banner</strong>
                        </div>
                        <input type="hidden" value="{{ $banner->id }}" name="id"/>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="lastname" class=" form-control-label">File</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <span>{{ @$banner->filename }}</span>
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="title" class="form-control" value="{{ @$banner->title }}">
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Status</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="status">
                                        <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="size_id" class=" form-control-label">Select Size</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="size_id">
                                        @foreach($sizeList as $key => $size)
                                            <option value="{{ $key }}" {{ $key == $banner->size_id ? 'selected' : '' }}>{{ $size }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="note" class=" form-control-label">Note</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="note" name="note" class="form-control" value="{{ @$banner->note }}">
                                    
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