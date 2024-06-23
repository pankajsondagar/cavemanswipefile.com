@extends('admin.layouts.app')
@section('title', 'Digital Content')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.digital.content.save') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-fw fa-check"></i>Digital Content</strong>
                        </div>
                        <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="page_id" class=" form-control-label"> Page ID <span class="error">*</span></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="page_id" name="page_id" class="form-control">
                                    <span style="margin-top: 15px !important;">Use only aplphanumeric (a-z,A-Z,0-9) and minimum 4 characters.</span>
                                    @error('page_id')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="menu_name" class=" form-control-label"> Menu Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="menu_name" name="menu_name" class="form-control">
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
                                    <input type="text" id="title" name="title" class="form-control">
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
                                    <textarea class="form-control" name="subtitle" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="content" class="form-control-label">Content</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" rows="4" name="content"></textarea>
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
                                        <input type="checkbox" value="1" name="payplan[]">&nbsp;Bronze Leader
                                    </label>
                                </br>
                                    <label>
                                        <input type="checkbox" value="2" name="payplan[]">&nbsp;Silver Leader
                                    </label>
                                </br>
                                    <label>
                                        <input type="checkbox" value="3" name="payplan[]">&nbsp;Gold Leader
                                    </label>
                                </br>
                                    <label>
                                        <input type="checkbox" value="4" name="payplan[]">&nbsp;Platinum Leader
                                    </label>
                                </br>
                                    <label>
                                        <input type="checkbox" value="5" name="payplan[]">&nbsp;Diamond Leader
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Availabilty</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="availabilty">
                                        <option value="0">Public</option>
                                        <option value="1">Registered (Active Only)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Page Status</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="status">
                                        <option value="0">Disable</option>
                                        <option value="1">Enable</option>
                                        <option value="2">Private</option>
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