@extends('admin.layouts.app')
@section('title', 'Pages List')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.message')
                        
                    <div class="pull-right m-b-10">
                        <a href="{{ route('admin.page.create') }}">
                        <button type="button" class="btn btn-dark btn-sm">
                            <i class="fa fa-plus"></i> New Page
                        </button>
                        </a>
                    </div>
                    
                    <div class="table-responsive table--no-card m-b-30 m-t-10">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Update</th>
                                    <th>Title</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$list as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ date('d M Y',strtotime($value->created_at)) }}</td>
                                       
                                        <td>
                                            {{ $value->title }}
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.page.edit',['id' => $value->id]) }}">
                                                <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
                                            </a>
                                            <a href="{{ route('admin.page.delete',['id' => $value->id]) }}">
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