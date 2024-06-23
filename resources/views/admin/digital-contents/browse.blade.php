@extends('admin.layouts.app')
@section('title', 'Digital Content List')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.message')

                    <div class="pull-right m-b-10">
                        <a href="{{ route('admin.digital.content.create') }}">
                        <button type="button" class="btn btn-dark btn-sm">
                            <i class="fa fa-plus"></i> Create New
                        </button>
                        </a>
                    </div>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Available Payplan</th>
                                    <th>Page Status</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$list as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $value->title }}
                                        </td>
                                        <td>
                                            {{ $value->payplanText }}
                                        </td>
                                        <td>
                                            @if($value->status == 0)
                                                <span class="badge badge-danger">Disable</span>
                                            @elseif ($value->status == 1)
                                                <span class="badge badge-success">Enable</span>
                                            @else 
                                                <span class="badge badge-info">Private</span>
                                            @endif
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.digital.content.edit',['id' => $value->id]) }}">
                                                <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
                                            </a>
                                            <a href="{{ route('admin.digital.content.delete',['id' => $value->id]) }}">
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