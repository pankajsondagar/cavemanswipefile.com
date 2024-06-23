@extends('member.layouts.app')
@section('title', 'Digital Download')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        @include('includes.message')
                        <form action="{{ route('member.banners') }}" method="get" class="form-horizontal">
                            <div class="card">
                                <div class="card-header">
                                    <strong><i class="fa fa-fw fa-search"></i> Find Banner </strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title" class=" form-control-label">Title</label>
                                                <input type="text" id="title" name="title" placeholder="Enter banner title" class="form-control" value="{{ @$title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filename" class=" form-control-label">File Name</label>
                                                <input type="text" id="filename" name="filename" placeholder="Enter banner filename" class="form-control" value="{{ @$filename }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="note" class=" form-control-label">Note</label>
                                                <input type="text" id="note" name="note" placeholder="Enter banner note" class="form-control" value="{{ @$note }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="note" class=" form-control-label">Size</label>
                                                <select class="form-control" name="size_id">
                                                    <option value="">Select Size</option>
                                                    @foreach($sizeList as $key => $size)
                                                        <option value="{{ $key }}" {{ @$size_id == $key ? 'selected' : '' }}>{{ $size }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="pull-left">
                                        <button type="submit" class="btn btn-primary btn-sm" value="search" name="submit">
                                            <i class="fa fa-search"></i> Search
                                        </button>
                                        <button type="submit" class="btn btn-danger btn-sm" value="clear" name="submit">
                                            <i class="fa fa-redo"></i> Clear
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        <div class="card">
                            <div class="card-header">
                                <strong><i class="fa fa-fw fa-picture-o"></i> All Banners </strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    @forelse(@$list as $key => $value)
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8 mt-4">
                                            @php    
                                                $avatar = $value->image ?? $memberSetting->default_pic;
                                            @endphp 
                                            <img style="border: 1px solid #dee2e6;height:150px;" src="{{ asset('storage/uploads/' . $avatar) }}"/>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                    @empty
                                        <div class="col-md-5">
                                        </div>
                                        <div class="col-md-4">
                                            <p>No banners found.</p>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>                  
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>
@endsection