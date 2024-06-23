@extends('admin.layouts.app')
@section('title', 'Member')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.member.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $user->id }}" name="id"/>
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong><i class="fa fa-fw fa-check"></i>Edit Member</strong>
                        </div>
                        <div class="card-body card-block">
                            {{-- <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="ref_username" class=" form-control-label"> Referrer Username </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="ref_username" name="ref_username" class="form-control" value="{{ old('ref_username') }}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="ref_name" class=" form-control-label"> Referrer Name </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p></p>
                                </div>
                            </div> --}}

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="firstname" class=" form-control-label">First Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname') ?? $user->firstname }}">
                                    @error('firstname')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="lastname" class=" form-control-label">Last Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname') ?? $user->lastname }}">
                                    @error('lastname')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="username" class=" form-control-label">Username</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username') ?? $user->username }}">
                                    @error('username')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') ?? $user->email }}">
                                    @error('email')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class=" form-control-label">&nbsp;</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p>Leave empty if you do not want to change password.</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class=" form-control-label">Password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="password" name="password" class="form-control">
                                    @error('password')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="confirm_password" class=" form-control-label">Confirm Password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="confirm_password" name="confirm_password" class="form-control">
                                    @error('confirm_password')
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