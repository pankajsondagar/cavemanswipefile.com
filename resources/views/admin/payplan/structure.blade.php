@extends('admin.layouts.app')
@section('title', 'Payplan - Structure')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.payplan.structure.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>Structure</strong> Options
                        </div>
                        <div class="card-body card-block">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="alert alert-light alert-has-icon">
                                        <div class="alert-body text-small">
                                            <div class="alert-title"><i class="fas fa-exclamation-triangle text-danger"></i>&nbsp;&nbsp;<b>Important!</b></div>
                                            <div class="text-danger">The level settings (Width and Depth) will be embedded in the member data when they register to the system, changing these values after the member registered may result in the member commissions and structure not being processed properly.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{ @$data->id }}" name="id"/>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="level_width" class=" form-control-label">Level Width</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control select2" name="level_width">
                                        <option value="Unilevel">Unilevel</option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ @$data->level_width == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="level_depth" class=" form-control-label"> Level Depth </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control select2" name="level_depth">
                                        @for ($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}" {{ @$data->level_depth == $i ? 'selected' : '' }} >{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="symbol" class=" form-control-label"> Currency Symbol </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="symbol" name="symbol" class="form-control" value="{{ old('symbol') ?? @$data->symbol }}">
                                    @error('symbol')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="code" class=" form-control-label"> Currency Code </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="code" name="code" class="form-control" value="{{ old('code') ?? @$data->code }}">
                                    @error('code')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">  Sender Name  </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ?? @$data->name }}">
                                    @error('name')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email" class=" form-control-label">  Sender Email  </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email') ?? @$data->email }}">
                                    @error('email')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="status" class=" form-control-label"> Reminder Interval Before Account Expiry </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="form-control" name="reminder">
                                        <option value="0" {{ @$data->reminder == 0 ? 'selected' : '' }}>Disable</option>
                                        <option value="1" {{ @$data->reminder == 1 ? 'selected' : '' }}>3 Days</option>
                                        <option value="2" {{ @$data->reminder == 2 ? 'selected' : '' }}>5 Days</option>
                                        <option value="3" {{ @$data->reminder == 3 ? 'selected' : '' }}>1 Week</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
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