@extends('admin.layouts.app')
@section('title', 'Email Templates Edit')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.notification.update') }}" method="post" class="form-horizontal">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Email Template</strong> Edit
                        </div>
                        <div class="card-body card-block">
                            <input type="hidden" value="{{ $data->id }}" name="id"/>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('firstname') ?? $data->name }}">
                                    @error('name')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="subject" class=" form-control-label">Subject</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') ?? $data->subject }}">
                                    @error('subject')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="status" class=" form-control-label">Email Status</label>
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
                                    <label for="copy_to_admin" class=" form-control-label">Copy Email to Admin</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="switch switch-text switch-success switch-pill">
                                        <input type="checkbox" name="copy_to_admin" value="1" class="switch-input" {{ $data->copy_to_admin == 1 ? 'checked' : '' }}>
                                        <span data-on="Yes" data-off="No" class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                        </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class="form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{-- @include('admin.notifications.tags') --}}
                                    <textarea class="form-control" id="editor1" name="description">{{ $data->description }}</textarea>
                                    @error('description')
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
@include('tinymce')