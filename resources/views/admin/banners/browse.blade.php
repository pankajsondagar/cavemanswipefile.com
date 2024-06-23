@extends('admin.layouts.app')
@section('title', 'Banners List')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.message')
                    <form action="{{ route('admin.banner.list') }}" method="get" class="form-horizontal">
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
                                <div class="pull-right">
                                    <a href="{{ route('admin.banner.create') }}">
                                    <button type="button" class="btn btn-dark btn-sm">
                                        <i class="fa fa-plus"></i> New Banner
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </form>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Update</th>
                                    <th>Banner</th>
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$list as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ date('d M Y',strtotime($value->created_at)) }}</td>
                                        @php    
                                            $avatar = $value->image ?? $memberSetting->default_pic;
                                        @endphp 
                                        <td><img style="border: 1px solid #dee2e6;height:150px;" src="{{ asset('storage/uploads/' . $avatar) }}"/></td>
                                        <td>{{ @$value->size->title ?? '-' }}</td>
                                        <td>
                                            @if($value->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else 
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.banner.edit',['id' => $value->id]) }}">
                                                <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
                                            </a>
                                            <a href="{{ route('admin.banner.delete',['id' => $value->id]) }}">
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        


                    </div>
                    <div class="pull-right">
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>
@endsection