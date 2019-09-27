<!DOCTYPE html>
<html>
<head>
	<title> Invoice </title>
	@include('layouts.links')
</head>
<body>
	@include('layouts.navbar')
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-xs-center">
                <i class="fa fa-search-plus float-xs-left icon"></i>
                <h2>Invoice for transaction #{{$invoice->id}}</h2>
            </div>
            <hr>
           
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        	 <br>
	Issue date: {{$invoice->issueDate}}
	<br>
	Due date: {{$invoice->dueDate}}
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-xs-center bg-info"><strong>Order summary</strong></h3>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <td><strong>Request id</strong></td>
                                    <td class="text-xs-center"><strong>amount</strong></td>
                                    <td class="text-xs-center"><strong>Request Number</strong></td>
                                    <td class="text-xs-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$invoice->quotation_request_id}}</td>
                                    <td class="text-xs-center">{{$invoice->amount}}</td>
                                    <td class="text-xs-center">1</td>
                                    <td class="text-xs-right">{{$invoice->amount}}</td>
                                </tr>
                                
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-xs-center"><strong>Subtotal</strong></td>
                                    <td class="highrow text-xs-right">{{$invoice->amount}}</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-xs-center"><strong>Discount</strong></td>
                                    <td class="emptyrow text-xs-right">$00</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-xs-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-xs-right">{{$invoice->amount}}</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-xs-center"><strong>Status</strong></td>
                                    <td class="emptyrow text-xs-right">
                                    	
                                    		@if(!empty($invoice->transaction)) paid
                                    		@else not paid
                                    		@endif


                                    </td>
                                </tr>
                                 <tr>
                                    
                                     <td colspan="4" class="emptyrow text-xs-right">
                                    	
                                    		@if(!empty($invoice->transaction)) 
                                    		@else 
                                    		<a class="btn btn-success" href="">Pay Now</a>
                                    		@endif


                                    </td>
                                   <td class="emptyrow"></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

@include('layouts.footer')

</body>
</html>





