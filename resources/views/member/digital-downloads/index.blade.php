@extends('member.layouts.app')
@section('title', 'Digital Download')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        @include('includes.message')
                        <form action="{{ route('member.digital.download') }}" method="get" class="form-horizontal">
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" name="plan">
                                                    <option value="">Select Leader</option>
                                                    @foreach($plans as $key => $val)
                                                        <option value="{{ $key }}" {{ $plan == $key ? 'selected' : '' }}>{{ $val }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-search"></i> Find
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            </form>
                            @if(!$isActivePlan)
                                <div class="card">
                                    <div class="card-body card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if($plan)
                                                    <p class="text-danger">No records available for selected leader. Please upgrade to continue!</p>
                                                @else 
                                                    <p class="text-danger">No leader selected from drop-down!</p>    
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>File Name</th>
                                                <th>Image</th>
                                                <th class="">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(@$list as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/uploads/' .$value->image) }}" style="height: 110px;"/>
                                                    </td>
                                                    
                                                    <td class="">
                                                        <a href="{{ asset('storage/uploads/' .$value->path) }}" download id="js-download-btn" data-id="{{ $value->id }}">
                                                            <button class="btn btn-sm btn-info"><i class="fa fa-download"></i> Download</button>
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
                            @endif
                    </div>      
                </div>                  
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $('#js-download-btn').on('click',function() {
            var id = $(this).attr('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            $.ajax({
                url: "{{ route('member.update.count') }}",
                type: 'POST',
                data: {
                    "id": id,
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection