@if (request()->session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ request()->session()->get('success') }}
    </div>
@endif

@if (request()->session()->get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ request()->session()->get('error') }}
    </div>
@endif
