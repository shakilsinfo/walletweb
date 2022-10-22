@extends('backend.layouts.layout')
@section('content')

<div class="page-body">
    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-md-12 col-xl-12">
            <h5 class="text-center">Welcome to dashboard</h5>
        </div>
        <div class="col-md-12 col-xl-12">
            <h3 class="text-center">Name: <b>{{session()->get('name')}}</b></h3>
            <h3 class="text-center">Local Currency: <b>{{session()->get('currency')}}</b></h3>
        </div>
        <div class="col-md-6 col-xl-6 offset-md-3">
           <h3 class="text-center">Currency Rates</h3>
           <div class="text-center" style="background-color: black;border-radius: 5px;color: #fff;">
               <table class="table" style="color: #fff">
                   <tr>
                       <td>Date</td>
                       <td>{{$getCurrencyRate['date']}}</td>
                   </tr>
                   <tr>
                       <td>Base Currency</td>
                       <td>{{$getCurrencyRate['base']}}</td>
                   </tr>
                   <tr>
                       <td colspan="2">Rates</td>
                   </tr>
                   @foreach($getCurrencyRate['rates'] as $key => $rate)
                   <tr>
                       <td>{{$key}}</td>
                       <td>{{$rate}}</td>
                   </tr>
                   @endforeach
               </table>
           </div>
        </div>
        
        
        {{-- model wise sale info --}}

        
        {{-- end model wise sale info --}}


        {{-- chart --}}
      
        <!--  retail last 30 days Order chart -->

        <!--  retail last 30 days OrderPrice chart -->
        
       
    </div>
</div>
@endsection
