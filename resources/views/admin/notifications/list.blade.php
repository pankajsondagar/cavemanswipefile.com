@extends('admin.layouts.app')
@section('title', 'Email Templates List')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.message')
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Email Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->subject }}</td>
                                        <td>
                                            @if($value->status == 1)
                                                <span class="badge badge-success">Enabled</span>
                                            @else 
                                                <span class="badge badge-danger">Disabled</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.notification.edit',['id' => $value->id]) }}">
                                                <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>
@endsection
    