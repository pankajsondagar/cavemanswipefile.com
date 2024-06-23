@extends('admin.layouts.app')
@section('title', 'Banners List')
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
                                    <th>Requested Level</th>
                                    <th>Status</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$list as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        @php    
                                        $avatar = $value->userDetail->avatar ?? $memberSetting->default_pic;
                                        @endphp 
                                        <td><img class="user-profile" src="{{ asset('storage/uploads/' . $avatar) }}"/>{{ $value->user->username }}</td>
                                        <td>{{ $value->leader->name }}</td>
                                        <td>
                                            @if($value->is_confirm)
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($value->is_declined)
                                                <span class="badge badge-danger">Declined</span>
                                            @else 
                                                <span class="badge badge-primary">Waiting For Approval</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->is_confirm)
                                                <div class="row">
                                                    <button type="button" data-id="{{ $value->id }}" class="js-unapprove-btn openPopup btn btn-sm btn-info" data-toggle="modal" data-target="#scrollmodal3">
                                                        Unapprove 
                                                    </button>
                                                </div>
                                            @elseif($value->is_declined)
                                                <span class="text-center">-</span>
                                            @else 
                                                <div class="row">
                                                    <form method="POST" action="{{ route('admin.member.approve.payment') }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $value->id }}"/>
                                                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                    </form> 
                                                    &nbsp;
                                                    <form method="POST" action="{{ route('admin.member.decline.payment') }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $value->id }}"/>
                                                        <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                                                    </form> 
                                                    &nbsp;
                                                    <button type="button" data-toggle="modal" data-target="#scrollmodal4" class="btn btn-sm btn-primary js-view-btn openPopup" data-name="{{ $value->user->firstname . ' ' .$value->user->lastname}}" data-message="{{ $value->message }}">View</button>
                                                </div>
                                            @endif
                                            
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
<div class="modal fade" id="scrollmodal3" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{ route('admin.member.unapprove.payment') }}">
        @csrf
        <input type="hidden" name="id" id="js-user-payment-id" value=""/>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to unapproved this payment?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </div>
        </form>
    </div>
</div>

@include('view_message')
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.js-unapprove-btn').on('click',function() {
            $(document).find('#js-user-payment-id').val($(this).attr('data-id'));
        });
        $('.js-view-btn').on('click',function() {
            $(document).find('#js-member-name').text($(this).attr('data-name'));
            $(document).find('#js-message').text($(this).attr('data-message'));
        });
    });
</script>
@endsection