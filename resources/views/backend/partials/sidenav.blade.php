@php
$getRouteName = Route::currentRouteName();
$getUrl = url()->current();
@endphp
<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            
                <li class="{{ url()->current() == url('/dashboard') ? 'active pcoded-trigger' : '' }}">
                    <a href="{{ url('/dashboard') }}">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext side_menubar">Dashboard</span>
                    </a>
                </li>
            
        </ul>
        
        <ul class="pcoded-item pcoded-left-item">
            
            <li class="{{($getUrl=='transaction-list')?'active':''}}">
                <a href="{{url('transaction-list')}}">
                    <span class="pcoded-micon"><i class="fas fa-money"></i></span>
                    <span class="pcoded-mtext side_menubar">Transaction List</span>
                </a>
            </li>
            <!-- <li class="{{($getRouteName=='userList')?'active':''}}">
                <a href="">
                    <span class="pcoded-micon"><i class="fas fa-users"></i></span>
                    <span class="pcoded-mtext side_menubar">Transfer Money</span>
                </a>
            </li> -->
            
            
        </ul>
        
    </div>
</nav>
