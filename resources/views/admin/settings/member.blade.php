@extends('admin.layouts.app')
@section('title', 'Member Settings')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.member.settings.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Member Settings</strong> Edit
                        </div>
                        <div class="card-body card-block">
                            <input type="hidden" value="{{ @$data->id }}" name="id"/>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="default_pic" class=" form-control-label">Default Member Picture</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="default_pic" name="default_pic" class="form-control">
                                    @error('default_pic')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                    @if ($data->default_pic != null)
                                    <div>
                                        <img src="{{ asset('storage/uploads/' .$data->default_pic) }}" style="height: 110px;"/>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="max_pic_width" class=" form-control-label"> Max Picture Width (px) </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="max_pic_width" name="max_pic_width" class="form-control" value="{{ old('max_pic_width') ?? @$data->max_pic_width }}">
                                    @error('max_pic_width')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="max_pic_height" class=" form-control-label">  Max Picture Height (px) </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="max_pic_height" name="max_pic_height" class="form-control" value="{{ old('max_pic_height') ?? @$data->max_pic_height }}">
                                    @error('max_pic_height')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="max_mem_site_title" class=" form-control-label">  Max Member Site Title  </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="max_mem_site_title" name="max_mem_site_title" class="form-control" value="{{ old('max_mem_site_title') ?? @$data->max_mem_site_title }}">
                                    @error('max_mem_site_title')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="max_mem_site_desc" class=" form-control-label">  Max Member Site Description  </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="max_mem_site_desc" name="max_mem_site_desc" class="form-control" value="{{ old('max_mem_site_desc') ?? @$data->max_mem_site_desc }}">
                                    @error('max_mem_site_desc')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="payplan_reg_option" class=" form-control-label"> Payplan Registration Option </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="payplan_reg_option">
                                        <option value="1" {{ @$data->payplan_reg_option == 1 ? 'selected' : '' }}> Manual by Member</option>
                                        <option value="2" {{ @$data->payplan_reg_option == 2 ? 'selected' : '' }}> Automatically by the System</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="" class=" form-control-label"> Max Cookie Availability </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="" name="" class="form-control" value="1000">
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="login-checkbox" style="margin-top: 5px;">
                                        <label>
                                            <input type="checkbox" value="1" name="">
                                            Allow Member to Register Their Referrals
                                            
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="login-checkbox" style="margin-top: 5px;">
                                        <label>
                                            <input type="checkbox" value="1" name="">
                                            Allow Duplicate Email to Register
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="login-checkbox" style="margin-top: 5px;">
                                        <label>
                                            <input type="checkbox" value="1" name="">
                                            Allow Enter Sponsor Manually on the Registration form
                                        </label>
                                    </div>
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