@extends('member.layouts.app')
@section('title', 'Password')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('member.password.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Password</strong> Edit
                        </div>
                        <div class="card-body card-block">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="text-secondary">Update your password using forms below. Leave empty to keep the current password.</div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ @$authMember->id }}"/>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="password" class=" form-control-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" >
                                    @error('password')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col col-md-6">
                                    <label for="confirm_password" class=" form-control-label"> Confirm Password </label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" >
                                    @error('confirm_password')
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