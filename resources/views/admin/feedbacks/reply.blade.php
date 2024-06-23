@extends('admin.layouts.app')
@section('title', 'Feedbacks Reply')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border">
                            <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-comment-text"></i>Feedback Reply</h3>
                                
                            </div>
                            <div class="au-inbox-wrap">
                                <div class="au-chat au-chat--border">
                                    <div class="au-chat__title">
                                        <div class="au-chat-info">
                                            <div class="avatar-wrap {{ @$feedback->user->is_online ? 'online' : '' }}">
                                                <div class="avatar avatar--small">
                                                    @php    
                                                        $avatar = $feedback->user->userDetail->avatar ?? $memberSetting->default_pic;
                                                    @endphp 
                                                    <img src="{{ asset('storage/uploads/' . $avatar) }}" alt="John Smith">
                                                </div>
                                            </div>
                                            <span class="nick">
                                                <a href="#">{{ @$feedback->user->firstname . ' ' . @$feedback->user->lastname }}</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="au-chat__content au-chat__content2 js-scrollbar5">
                                        <div class="recei-mess-wrap">
                                            <span class="mess-time">{{ $feedback->created_at->diffForHumans() }}</span>
                                            <div class="recei-mess__inner">
                                                <div class="avatar avatar--tiny">
                                                    <img src="{{ asset('storage/uploads/' . $avatar) }}" alt="John Smith">
                                                </div>
                                                <div class="recei-mess-list">
                                                    <div class="recei-mess">{{ @$feedback->message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach(@$feedback->feedbacks as $val)
                                            <div class="send-mess-wrap">
                                                <span class="mess-time">{{ $val->created_at->diffForHumans() }}</span>
                                                <div class="send-mess__inner">
                                                    <div class="send-mess-list">
                                                        <div class="send-mess">{{ $val->reply }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="au-chat-textfield">
                                        <form class="au-form-icon" method="POST" action="{{ route('admin.feedback.save') }}">
                                            @csrf
                                            <input type="hidden" value="{{ $feedback->id }}" name="id"/>
                                            <input class="au-input au-input--full au-input--h65" autocomplete="off" type="text" name="reply" placeholder="Type a message">
                                            <button class="btn btn-success" style="margin-top:10px;" type="submit">Submit</button>
                                        </form>
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