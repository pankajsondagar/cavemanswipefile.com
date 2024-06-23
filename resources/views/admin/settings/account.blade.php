@extends('admin.layouts.app')
@section('title', 'Account Settings')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.account.settings.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Account Settings</strong> Edit
                        </div>
                        <div class="card-body card-block">
                            <input type="hidden" value="{{ @$data->id }}" name="id"/>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="admin_pic" class=" form-control-label">Admin Picture</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="admin_pic" name="admin_pic" class="form-control">
                                    @error('admin_pic')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                    @if ($data->admin_pic != null)
                                    <div>
                                        <img src="{{ asset('storage/uploads/' .$data->admin_pic) }}" style="height: 110px;"/>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="username" class=" form-control-label">Admin Username</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username') ?? Auth::user()->username }}">
                                    @error('username')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class=" form-control-label">Admin Password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="password" name="password" class="form-control">
                                    <div class="login-checkbox" style="margin-top: 10px;">
                                        <label>
                                            <input type="checkbox" value="1" name="change_password">Confirm Password Change
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="" class=" form-control-label">Short Date Format</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="" name="" class="form-control" value="j M Y">
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="" class=" form-control-label"> Long Date Format </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="" name="" class="form-control" value="D, j M Y H:i:s">
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="" class=" form-control-label"> Max Displayed Items on Page </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="" name="" class="form-control" value="15">
                                    
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
                                    <label for="" class=" form-control-label">Enable SMTP</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p>Configuring SMTP as a mail transfer agent is quite challenging.</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="host" class=" form-control-label">Host</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="host" name="host" class="form-control" value="{{ old('smtp_host') ?? @$data->smtp_host }}">
                                    @error('host')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="port" class=" form-control-label">Port</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="port" name="port" class="form-control" value="{{ old('smtp_port') ?? @$data->smtp_port }}">
                                    @error('port')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="username" class=" form-control-label">Username</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="username" name="username" class="form-control" value="{{ old('smtp_username') ?? @$data->smtp_username }}">
                                    @error('username')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class=" form-control-label">Password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="password" name="password" class="form-control" value="{{ old('smtp_password') ?? @$data->smtp_password }}">
                                    @error('password')
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