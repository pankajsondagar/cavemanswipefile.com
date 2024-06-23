<ul>
    @foreach($users as $user)
        @php    
            $avatar = @$user->userDetail->avatar ?? $memberSetting->default_pic;
        @endphp
        <li>
            <img src="{{ asset('storage/uploads/' . $avatar) }}" style="height: 35px !important;marign-right:5px !important;"/><span style="margin-left: 5px !important;">{{ $user->username }}</span>
            @if($user->children->isNotEmpty())
                @include('partials.tree', ['users' => $user->children])
            @endif
        </li>
    @endforeach
</ul>