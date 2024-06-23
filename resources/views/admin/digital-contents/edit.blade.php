@extends('admin.layouts.app')
@section('title', 'Digital Content')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.digital.content.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $data->id }}" name="id"/>
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-fw fa-check"></i>Edit Digital Content</strong>
                        </div>
                        <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="menu_name" class=" form-control-label"> Menu Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="menu_name" name="menu_name" class="form-control" value="{{ $data->menu_name }}">
                                    <p>Page ID: {{ $data->page_id }}</p>
                                    @error('menu_name')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label"> Title</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="title" class="form-control" value="{{ $data->title }}">
                                    @error('title')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="subtitle" class=" form-control-label">Subtitle</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" name="subtitle" rows="4">{{ $data->subtitle }}</textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="content" class="form-control-label">Content</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" rows="4" name="content">{{ $data->content }}</textarea>
                                    @error('content')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="ref_username" class=" form-control-label"> Available Payplan </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label>
                                        <input type="checkbox" value="1" {{ in_array(1,$payplanArr) ? 'checked' : '' }} name="payplan[]">&nbsp;Bronze Leader
                                    </label>
                                </br>
                                    <label>
                                        <input type="checkbox" value="2" {{ in_array(2,$payplanArr) ? 'checked' : '' }} name="payplan[]">&nbsp;Silver Leader
                                    </label>
                                </br>
                                    <label>
                                        <input type="checkbox" value="3" {{ in_array(3,$payplanArr) ? 'checked' : '' }} name="payplan[]">&nbsp;Gold Leader
                                    </label>
                                </br>
                                    <label>
                                        <input type="checkbox" value="4" {{ in_array(4,$payplanArr) ? 'checked' : '' }} name="payplan[]">&nbsp;Platinum Leader
                                    </label>
                                </br>
                                    <label>
                                        <input type="checkbox" value="5" {{ in_array(5,$payplanArr) ? 'checked' : '' }} name="payplan[]">&nbsp;Diamond Leader
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Availabilty</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="availabilty">
                                        <option value="0" {{ $data->availabilty == 0 ? 'selected' : '' }}>Public</option>
                                        <option value="1" {{ $data->availabilty == 1 ? 'selected' : '' }}>Registered (Active Only)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Page Status</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="status">
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Disable</option>
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Enable</option>
                                        <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>Private</option>
                                    </select>
                                    
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