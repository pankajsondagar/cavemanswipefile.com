@extends('admin.layouts.app')
@section('title', 'Digital Download List')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.message')
                    <div class="pull-right m-b-10">
                        <a href="{{ route('admin.digital.download.create') }}">
                        <button type="button" class="btn btn-dark btn-sm">
                            <i class="fa fa-plus"></i> Upload File
                        </button>
                        </a>
                    </div>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>File Name</th>
                                    <th>Image</th>
                                    <th>Size</th>
                                    <th>Total Downloaded</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$list as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ date('d M Y',strtotime($value->created_at)) }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/uploads/' .$value->image) }}" style="height: 110px;"/>
                                        </td>
                                        <td>
                                            @php 
                                                $fileSizeInBytes = $value->file_size ?? 0; 
                                                // Determine the appropriate unit based on file size
                                                if ($fileSizeInBytes < 1024) {
                                                    $formattedSize = $fileSizeInBytes . ' bytes';
                                                } elseif ($fileSizeInBytes < (1024 * 1024)) {
                                                    $fileSizeInKB = $fileSizeInBytes / 1024;
                                                    $formattedSize = number_format($fileSizeInKB, 2) . ' KB';
                                                } else {
                                                    $fileSizeInMB = $fileSizeInBytes / (1024 * 1024);
                                                    $formattedSize = number_format($fileSizeInMB, 2) . ' MB';
                                                }

                                            @endphp 
                                            {{ $formattedSize }}
                                        </td>
                                        <td>
                                            {{ $value->count }} Times
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.digital.download.edit',['id' => $value->id]) }}">
                                                <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
                                            </a>
                                            <a href="{{ route('admin.digital.download.delete',['id' => $value->id]) }}">
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