@extends('member.layouts.app')
@section('title', 'Profile')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('member.profile.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Profile</strong> Edit
                        </div>
                        <div class="card-body card-block">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="text-secondary">Please complete the forms below, make sure the value you entered is valid.</div>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $user->id }}" name="id"/>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="firstname" class=" form-control-label"> First Name <span style="color:red;">*</span> </label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname') ?? @$user->firstname }}">
                                    @error('firstname')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class=" form-control-label">  Last Name <span style="color:red;">*</span> </label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname') ?? @$user->lastname }}">
                                    @error('lastname')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="email" class=" form-control-label"> Email <span style="color:red;">*</span> </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        
                                        <input type="text" id="email" name="email" class="form-control" value="{{ old('email') ?? @$user->email }}">
                                    </div>
                                    @error('email')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class=" form-control-label">  
                                        Opt-in for Notification <span style="color:red;"></span> </label>
                                    </br>
                                        <label class="switch switch-text switch-primary switch-pill">
                                            <input type="checkbox" name="is_notify" value="1" class="switch-input" {{ $profile->is_notify == 1 ? 'checked' : '' }}>
                                            <span data-on="On" data-off="Off" class="switch-label"></span>
                                            <span class="switch-handle"></span>
                                            </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="about_me" class=" form-control-label"> About Me </label>
                                    <textarea class="form-control" name="about_me" rows="4" >{{ @$profile->about_me }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class=" form-control-label"> Address </label>
                                    <textarea class="form-control" name="address" rows="4" >{{ @$profile->address }}</textarea>
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="state" class=" form-control-label">  State or Province  </label>
                                    <input type="text" id="state" name="state" class="form-control" value="{{ old('state') ?? @$profile->state }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class=" form-control-label"> Country </label>
                                    @include('country_dropdown',['value' => $profile->country])
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="phone" class=" form-control-label">  Phone  </label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') ?? @$profile->phone }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="twitter_url" class=" form-control-label"> Twitter </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-twitter"></i>
                                        </div>
                                        <input type="text" id="twitter_url"  name="twitter_url" class="form-control" value="{{ old('twitter_url') ?? @$profile->twitter_url }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-md-6">
                                    <label for="fb_url" class=" form-control-label"> Facebook </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                        <input type="text" id="fb_url"  name="fb_url" class="form-control" value="{{ old('fb_url') ?? @$profile->fb_url }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="avatar" class=" form-control-label">Avatar</label>
                                    <input type="file" id="avatar" name="avatar" class="form-control">
                                    @error('avatar')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                    @if (@$profile->avatar != null)
                                    <div>
                                        <img src="{{ asset('storage/uploads/' .@$profile->avatar) }}" style="height: 110px;"/>
                                    </div>
                                    @endif
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