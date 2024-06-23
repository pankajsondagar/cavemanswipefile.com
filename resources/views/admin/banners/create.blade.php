@extends('admin.layouts.app')
@section('title', 'Banner')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.banner.save') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-fw fa-check"></i>Upload Banner</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="size_id" class=" form-control-label">Select Size</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="size_id">
                                        @foreach($sizeList as $key => $size)
                                            <option value="{{ $key }}">{{ $size }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="ref_username" class=" form-control-label"> Banner </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="image" name="image" class="form-control">
                                    <span style="margin-top: 15px !important;">Select multiple image files (.jpg, .jpeg, and .png) with reasonable file sizes to upload multiple banner at once, make sure your server support it.</span>
                                    @error('image')
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