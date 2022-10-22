@extends('backend.layouts.layout')
@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Transaction List</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item" style="float: left;">
                        <a href="{{url('/')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="javascript::void(0)">Transaction List</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header col-12 ">
                    <div class="row">
                        <div class="col-md-6">
                        	<h3>Transaction List</h3>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success btn-round float-right mt-1" href="javascript::void(0)" data-toggle="modal" data-target="#addCategory" style="margin-left: 10px;">
                                <i class="icofont icofont-plus"></i> Transfer Amount
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-block col-12">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-bordered yajra-datatable compact table-striped nowrap text-center" id="categoryListTable">
                            <thead>
                                <tr>
                                    <th>S/L</th>
                                    <th>Transaction Date</th>
                                    <th>Transaction to</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Conversion Currency</th>
                                    <th>Conversion Amount</th>
                                </tr>
                                <?php
                                $number = 1;
                                $numElementsPerPage = 10; // How many elements per page
                                $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                                ?>
                            </thead>
                            <tbody>
                            	@if(!empty($transactionList))
                                @foreach($transactionList as $trans)
                                <tr>
                                    <td>{{$currentNumber++}}</td>
                                    <td>{{ $trans['transfer_date'] }}</td>
                                    <td>{{ $trans['user_name'] }}</td>
                                    <td>{{ $trans['currency'] }}</td>
                                    <td>{{ $trans['amount'] }}</td>
                                    <td>{{ $trans['convert_currency'] }}</td>
                                    <td>{{ $trans['conversion_amount'] }}</td>
                                    
                                </tr>
                                <!-- Modal -->
                                
                                @endforeach
                                @else
                                <tr>
                                	<td colspan="7">No Data Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header col-12 ">
                    <div class="row">
                        <div class="col-md-6">
                        	<h3>3rd Highest Transaction List</h3>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                </div>

                <div class="card-block col-12">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-bordered yajra-datatable compact table-striped nowrap text-center" id="categoryListTable">
                            <thead>
                                <tr>
                                    <th>S/L</th>
                                    <th>Transaction Date</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Conversion Currency</th>
                                    <th>Conversion Amount</th>
                                </tr>
                                <?php
                                $number = 1;
                                $numElementsPerPage = 10; // How many elements per page
                                $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                                ?>
                            </thead>
                            <tbody>
                            	@if(!empty($thirdHighestTransaction))
                                @foreach($thirdHighestTransaction as $trans)
                                <tr>
                                    <td>{{$currentNumber++}}</td>
                                    <td>{{ $trans['transfer_date'] }}</td>
                                    <td>{{ $trans['currency'] }}</td>
                                    <td>{{ $trans['amount'] }}</td>
                                    <td>{{ $trans['convert_currency'] }}</td>
                                    <td>{{ $trans['conversion_amount'] }}</td>
                                    
                                </tr>
                                <!-- Modal -->
                                
                                @endforeach
                                @else
                                <tr>
                                	<td colspan="7">No Data Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page-body end -->

<!-- New Category Add modal start-->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action='{{url("transferMoney")}}' method="POST" id="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transfer Money</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Select User<span style="color: red;">*</span>:</label>
                                <select class="form-control" name="user_id">
                                	<option value="">Select User</option>
                                	@foreach($getUserList as $user)
                                	<option value="{{$user['id']}}">{{$user['name']}}</option>
                                	@endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Currency<span style="color: red;">*</span>:</label>
                                <input type="text" class="form-control" placeholder="Example: USD" name="currency" value="{{session()->get('currency')}}" readonly required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label">Amount to transfer<span style="color: red;">*</span>:</label>
                                <input type="text" class="form-control" placeholder="Example: 50" name="amount" required>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Transfer</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- New Courier Add modal End-->
@endsection
@section('scripts')

@endsection