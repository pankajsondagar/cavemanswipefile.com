@extends('admin.layouts.app')
@section('title', 'Digital Download')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.digital.download.save') }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-fw fa-check"></i>Upload File</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="ref_username" class=" form-control-label"> File Name <span class="error">*</span></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <span style="margin-top: 15px !important;">The display name for the file (without extension)</span>
                                    @error('name')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="ref_username" class=" form-control-label"> Path </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="path" name="path" class="form-control">
                                    <span style="margin-top: 15px !important;">The file (pdf,rar,zip) must have maximum size of 2MB</span>
                                    @error('path')
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
                                        <option value="0">Disabled</option>
                                        <option value="1">Enabled</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Status</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="status">
                                        <option value="0">Public</option>
                                        <option value="1">Registered Member</option>
                                        <option value="2">Registered Member With Membership Active</option>
                                        <option value="3">Registered Member With Membership Inactive</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="image" class=" form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="image" name="image" class="form-control">
                                    <span style="margin-top: 15px !important;">The image must have maximum size of 1MB</span>
                                    @error('image')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" name="description" rows="4"></textarea>
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