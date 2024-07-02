@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Bank Ledger Edit</h2>
        <div class="">
            <a href="{{ route('bank.ledgers.list') }}" class="btn btn-primary"><i class="material-icons md-plus"></i> Bank Ledger List</a>
        </div>
    </div>
    <div class="row justify-content-center">
    	<div class="col-sm-12">
    		<div class="card">
		        <div class="card-body">
                    <form method="post" action="{{ route('bank.ledgers.update',$bankledgers->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <label for="invoice_no" class="col-form-label" style="font-weight: bold;">Invoice No: <span class="text-danger"> *</span></label>
                                <input type="number" name="invoice_no" id="invoice_no" class="form-control" value="{{ $bankledgers->invoice_no }}">
                            </div>

                            <div class="form-group col-md-3 mb-4">
                                <label for="payment_date" class="col-form-label" style="font-weight: bold;">Date:</label>
                                <?php $date = date('Y-m-d') ?>
                                <input type="date" name="payment_date" id="payment_date" value="{{ $bankledgers->payment_date }}" class="form-control">

                                @error('payment_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3 mb-4">
                                <label for="receive_amount" class="col-form-label" style="font-weight: bold;">Receive Amount: <span class="text-danger"> *</span></label>
                                <input type="number" name="receive_amount" id="receive_amount"  class="form-control" value="{{ $bankledgers->receive_amount }}">
                                 @error('receive_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>

                            <div class="form-group col-md-3 mb-4">
                              <label for="transaction_num" class="col-form-label" style="font-weight: bold;">Transection Num: <span class="text-danger"> *</span></label>
                              <input type="number" id="transaction_num" name="transaction_num"  class="form-control"  value="{{ $bankledgers->transaction_num }}">
                            </div>

                            <div class="form-group col-md-3 mb-4">
                                <label for="bank_name" class="col-form-label" style="font-weight: bold;">Bank Name: </label>
                                <input type="text" id="bank_name" name="bank_name"  class="form-control"  value="{{ $bankledgers->bank_name }}">
                            </div>
                        </div>

                        <div class="row mb-4 justify-content-sm-end">
                            <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
		        </div>
		        <!-- card body .// -->
		    </div>
		    <!-- card .// -->
    	</div>
    </div>
</section>

@endsection

@push('footer-script')
<script type="text/javascript">
</script>
@endpush