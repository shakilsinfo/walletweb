@include('backend.partials.header')
@include('backend.partials.sidenav')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
            	@yield('content')

            </div>
            
        </div>
    </div>
</div>
@include('backend.partials.footer')
@include('backend.partials.modal')
@include('sweetalert::alert')