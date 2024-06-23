@extends('admin.layouts.app')
@section('title', 'Members List')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.message')
                    <form action="{{ route('admin.member.list') }}" method="get" class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <strong><i class="fa fa-fw fa-search"></i> Find Member </strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="text" class=" form-control-label">First Name</label>
                                            <input type="text" id="text" name="firstname" placeholder="Enter member name" class="form-control" value="{{ @$firstname }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username" class=" form-control-label">Username</label>
                                            <input type="text" id="username" name="username" placeholder="Enter member username" class="form-control" value="{{ @$username }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class=" form-control-label">Email</label>
                                            <input type="text" id="email" name="email" placeholder="Enter member email" class="form-control" value="{{ @$email }}">
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
                                    <a href="{{ route('admin.member.create') }}">
                                    <button type="button" class="btn btn-dark btn-sm">
                                        <i class="fa fa-plus"></i> New Member
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
                                    <th>Date</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Is Online</th>
                                    <th>Status</th>
                                    <th>Level</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$list as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ date('d M Y',strtotime($value->created_at)) }}</td>
                                        @php    
                                            $avatar = $value->userDetail->avatar ?? $memberSetting->default_pic;
                                        @endphp 
                                        <td><img class="user-profile" src="{{ asset('storage/uploads/' . $avatar) }}"/>{{ $value->username }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>
                                            @if($value->is_online)
                                                <i class="fa fa-circle text-danger-glow blink"></i>
                                            @else
                                            <i class="fa fa-circle text-danger"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->has_plan)
                                                <span class="badge badge-success">Active</span>
                                            @else 
                                                @if ($value->status == 1)
                                                    <span class="badge badge-secondary">Registered Only</span>
                                                @else 
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <b>{!! $value->level !!}</b>
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.member.view',['id' => $value->id]) }}">
                                                <button class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</button>
                                            </a>
                                            <a href="{{ route('admin.member.edit',['id' => $value->id]) }}">
                                                <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
                                            </a>
                                            <a href="{{ route('admin.member.delete',['id' => $value->id]) }}">
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