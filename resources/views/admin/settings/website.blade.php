@extends('admin.layouts.app')
@section('title', 'Website Settings')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.website.settings.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Website Settings</strong> Edit
                        </div>
                        <div class="card-body card-block">
                            <input type="hidden" value="{{ @$data->id }}" name="id"/>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="site_title" class=" form-control-label">Site Title</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="site_title" name="site_title" class="form-control" value="{{ old('site_title') ?? @$data->site_title }}">
                                    @error('site_title')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="site_name" class=" form-control-label">Site Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="site_name" name="site_name" class="form-control" value="{{ old('site_name') ?? @$data->site_name }}">
                                    @error('site_name')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="site_url" class=" form-control-label">Site URL</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="site_url" name="site_url" class="form-control" value="{{ old('site_url') ?? @$data->site_url }}">
                                    @error('site_url')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="alias_name" class=" form-control-label">Administrator Alias Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="alias_name" name="alias_name" class="form-control" value="{{ old('alias_name') ?? @$data->alias_name }}">
                                    @error('alias_name')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="logo" class=" form-control-label">Site Logo</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="logo" name="logo" class="form-control">
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
                                    <label for="icon" class=" form-control-label">Site Icon</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="icon" name="icon" class="form-control">
                                    @error('icon')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                    @if ($data->icon != null)
                                    <div>
                                        <img src="{{ asset('storage/uploads/' .$data->icon) }}" style="height: 110px;"/>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="site_keywords" class=" form-control-label">Site Keywords</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" name="site_keywords">{{ @$data->site_keywords }}</textarea>
                                    @error('site_keywords')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="site_desc" class=" form-control-label"> Site Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea class="form-control" name="site_desc">{{ @$data->site_desc }}</textarea>
                                    @error('site_desc')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="from_name" class=" form-control-label">From Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="from_name" name="from_name" class="form-control" value="{{ old('from_name') ?? @$data->from_name }}">
                                    @error('from_name')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="from_email" class=" form-control-label">From Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="from_email" name="from_email" class="form-control" value="{{ old('from_email') ?? @$data->from_email }}">
                                    @error('from_email')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="status" class=" form-control-label">Logo Style</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="logo_style">
                                        <option value="1" {{ @$data->logo_style == 1 ? 'selected' : '' }}>Default</option>
                                        <option value="2" {{ @$data->logo_style == 2 ? 'selected' : '' }}>Rounded</option>
                                        <option value="3" {{ @$data->logo_style == 3 ? 'selected' : '' }}>Circle</option>
                                        <option value="4" {{ @$data->logo_style == 4 ? 'selected' : '' }}>Border</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="member_website" class=" form-control-label">Member Wesite</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="switch switch-text switch-primary switch-pill">
                                        <input type="checkbox" name="member_website" value="1" class="switch-input" {{ $data->member_website == 1 ? 'checked' : '' }}>
                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                        </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="cooking_consent" class=" form-control-label">Cookie Consent</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="switch switch-text switch-primary switch-pill">
                                        <input type="checkbox" name="cooking_consent" value="1" class="switch-input" {{ $data->cooking_consent == 1 ? 'checked' : '' }}>
                                        <span data-on="On" data-off="Off" class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                        </label>
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