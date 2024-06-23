@extends('member.layouts.app')
@section('title', 'Genealogy View')
@section('style')
<style>
    .tree, .tree ul {
        margin:0;
        padding:0;
        list-style:none
    }
    .tree ul {
        margin-left:1em;
        position:relative
    }
    .tree ul ul {
        margin-left:.5em
    }
    .tree ul:before {
        content:"";
        display:block;
        width:0;
        position:absolute;
        top:0;
        bottom:0;
        left:0;
        border-left:1px solid
    }
    .tree li {
        margin:0;
        padding:0 1em;
        line-height:2em;
        color:#369;
        font-weight:700;
        position:relative
    }
    .tree ul li:before {
        content:"";
        display:block;
        width:10px;
        height:0;
        border-top:1px solid;
        margin-top:-1px;
        position:absolute;
        top:1em;
        left:0
    }
    .tree ul li:last-child:before {
        background:#fff;
        height:auto;
        top:1em;
        bottom:0
    }
    .indicator {
        margin-right:5px;
    }
    .tree li a {
        text-decoration: none;
        color:#369;
    }
    .tree li button, .tree li button:active, .tree li button:focus {
        text-decoration: none;
        color:#369;
        border:none;
        background:transparent;
        margin:0px 0px 0px 0px;
        padding:0px 0px 0px 0px;
        outline: 0;
    }
</style>
@endsection
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    
                    @include('includes.message')
                    <div class="card">
                        <div class="card-header">
                            <strong>
                                Genealogy
                                </strong> View
                        </div>
                        <div class="card-body card-block">
                            <form method="GET" action="{{ route('member.genealogy') }}" autocomplete="off">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <input type="text" id="searchInput" name="search" class="form-control" placeholder="Type...">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-info" type="submit">Search</button>
                                        <a href="{{ route('member.genealogy') }}">
                                            <button class="btn btn-secondary" type="button">Clear</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <ul id="tree1">
                                @if(empty($users) || @$users && @$users->count() == 0)
                                    <p style="color: red;">No records found</p>
                                @endif
                                @foreach($users as $key => $user)
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
                            
                        </div>
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
$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'fa fa-minus';
      var closedClass = 'fa fa-plus';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews
$('#tree1').treed();
</script>
@endsection