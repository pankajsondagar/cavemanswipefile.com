@extends('admin.layouts.app')
@section('title', 'Feedbacks List')
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
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Subject</th>
                                    <th>Has Replied</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$list as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        @php    
                                            $avatar = $value->user->userDetail->avatar ?? $memberSetting->default_pic;
                                        @endphp 
                                        <td><img class="user-profile" src="{{ asset('storage/uploads/' . $avatar) }}"/>{{ $value->user->username }}</td>
                                        
                                        <td>
                                            {{ $value->subject }}
                                        </td>
                                        <td>
                                            @if($value->has_replied)
                                                <span class="badge badge-success">Yes</span>
                                            @else 
                                            <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.feedback.reply',['id' => $value->id]) }}">
                                                <button class="btn btn-sm btn-success"><i class="fa fa-reply"></i> Reply</button>
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