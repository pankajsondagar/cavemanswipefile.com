@extends('admin.layouts.app')
@section('title', 'Payplan Settings')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.payplan.leaders.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Options</strong>
                        </div>
                        <div class="card-body card-block">
                            <input type="hidden" value="{{ @$data->id }}" name="id"/>
                            <input type="hidden" value="{{ @$data->type }}" name="type"/>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Program Name </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ?? @$data->name }}">
                                    @error('name')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label">Program Description </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" name="description" rows="4">{{ @$data->description }}</textarea>
                                    @error('description')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="logo" class=" form-control-label">Program Logo (approx. 128x128 px)</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="logo" name="logo" class="form-control">
                                    <span>The image must have a maximum size of 1MB</span>
                                    @error('logo')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                    @if ($data->logo != null)
                                    <div>
                                        <img src="{{ asset('storage/uploads/' .$data->logo) }}" style="height: 110px;"/>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="header_img" class=" form-control-label">Program Header Image (approx. 980x240 px)</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="header_img" name="header_img" class="form-control">
                                    <span>The image must have a maximum size of 1MB</span>
                                    @error('header_img')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                    @if ($data->header_img != null)
                                    <div>
                                        <img src="{{ asset('storage/uploads/' .$data->header_img) }}" style="height: 110px;"/>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="reg_fee" class=" form-control-label"> Registration Fee </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="reg_fee" name="reg_fee" class="form-control" value="{{ old('reg_fee') ?? @$data->reg_fee }}">
                                    @error('reg_fee')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="renewal_fee" class=" form-control-label"> Renewal Fee (Optional)</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="renewal_fee" name="renewal_fee" class="form-control" value="{{ old('renewal_fee') ?? @$data->renewal_fee }}">
                                    @error('renewal_fee')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="membership_interval" class=" form-control-label">Membership Interval</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="membership_interval">
                                        <option value="1" {{ $data->membership_interval == 1 ? 'selected' : '' }}>Life Time</option>
                                        <option value="2" {{ $data->membership_interval == 2 ? 'selected' : '' }}>30 Days</option>
                                        <option value="3" {{ $data->membership_interval == 3 ? 'selected' : '' }}>Monthly</option>
                                        <option value="4" {{ $data->membership_interval == 4 ? 'selected' : '' }}>Quartly</option>
                                        <option value="5" {{ $data->membership_interval == 5 ? 'selected' : '' }}>Yearly</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="member_as_vendor" class=" form-control-label">Automatically Register Member As Vendor</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="switch switch-text switch-primary switch-pill">
                                        <input type="checkbox" name="member_as_vendor" value="1" class="switch-input" {{ $data->member_as_vendor == 1 ? 'checked' : '' }}>
                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                        </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="allow_inactive" class=" form-control-label">Allow Inactive Account Refer Others</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="switch switch-text switch-primary switch-pill">
                                        <input type="checkbox" name="allow_inactive" value="1" class="switch-input" {{ $data->allow_inactive == 1 ? 'checked' : '' }}>
                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                        </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="status" class=" form-control-label">Program Status</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="switch switch-text switch-primary switch-pill">
                                        <input type="checkbox" name="status" value="1" class="switch-input" {{ $data->status == 1 ? 'checked' : '' }}>
                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                        </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="intial_commission" class=" form-control-label"> Initial Level Commission
                                       
                                         </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" name="intial_commission" rows="4">{{ @$data->intial_commission }}</textarea>
                                    @error('intial_commission')
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