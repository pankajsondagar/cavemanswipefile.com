@extends('admin.layouts.app')
@section('title', 'Manaul Payment')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.paymentoptions.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>
                                Manual 
                                </strong> Payment
                        </div>
                        <div class="card-body card-block">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <p class="text-muted mb-3">Use this gateway option to accept manual payment (cash, wire transfer, crypto or coin payments, and other offline or manual payment methods).</p>
                                    <p class="text-muted mb-3">The following tags available to display dynamic contents:</p>
                                    <p class="ml-4 mb-3"><strong>[[currencysym]]</strong> = Currency symbol ($).</p>
                                    <p class="ml-4 mb-3"><strong>[[currencycode]]</strong> = Currency code (USD).</p>
                                    <p class="ml-4 mb-3"><strong>[[feeamount]]</strong> = Payment processing fee.</p>
                                    <p class="ml-4 mb-3"><strong>[[amount]]</strong> = Registration amount.</p>
                                    <p class="ml-4 mb-3"><strong>[[totamount]]</strong> = Total amount need to pay.</p>
                                    <p class="ml-4 mb-3"><strong>[[payplan]]</strong> = Membership name.</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="title" class=" form-control-label"> Payment Name  </label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ $data->title }}">
                                </div>
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-12 col-md-12">
                                    <label for="title" class=" form-control-label"> Payment Instructions  </label>
                                    <textarea class="form-control" id="editor1" name="content">{{ $data->content }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Save Changes
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>
@endsection
@include('tinymce')