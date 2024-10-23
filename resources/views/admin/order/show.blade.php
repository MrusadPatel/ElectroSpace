@extends('admin.layouts.master')
@section('main-content')

@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shpping_method);
    $coupon = json_decode($order->coupon);
@endphp
    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5 pt-4 px-4 align-self-end">
          
            <div class="card">
                <div class="card-body invoice-print">
                  <div class="container mb-5 mt-3">
                    <div class="row d-flex align-items-baseline">
                      <div class="col-xl-9 float-end">
                        <p style="color: #7e8d9f;font-size: 20px;">Order #<strong>{{$order->invocie_id}}</strong></p>
                      </div>
                      
                      <hr>
                    </div>
              
                    <div class="container">
                      <div class="col-md-12">
                        <div class="text-center">
                          <p class="pt-2 fs-2 fw-bold">ElectroSpace</p>
                        </div>
              
                      </div>
              
              
                      <div class="row my-1">
                        <div class="col-xl-8">
                          <ul class="list-unstyled">
                            <li class=""><b class="fw-bolder fs-5">Billed To : </b><span >{{$address->name}}</span></li>
                            <li class="">+91 {{$address->phone}}</li>
                            <li class="">{{$address->email}}</li>
                            <li class="">{{$address->address}}</li>
                            <li class="">{{$address->city}}, {{$address->state}}</li>
                            <li class="">{{$address->country}} - {{$address->zip}}</li>
                          </ul>
                        </div>
                        <div class="col-xl-4">
                            <ul class="list-unstyled text-end">
                                <li class=""><b class="fw-bolder fs-5">Shipped To : </b><span >{{$address->name}}</span></li>
                                <li class="">+91 {{$address->phone}}</li>
                                <li class="">{{$address->email}}</li>
                                <li class="">{{$address->address}}</li>
                                <li class="">{{$address->city}}, {{$address->state}}</li>
                                <li class="">{{$address->country}} - {{$address->zip}}</li>
                              </ul>
                        </div>
                      </div>

                      <div class="row my-4">
                        <div class="col-xl-8">
                          <ul class="list-unstyled">
                            <li class=""><b class="fw-bolder fs-5">Payment Information : </b></li>
                            <li class=""><b>Method : </b> {{$order->payment_method}}</li>
                            <li class=""><b>Transaction Id : </b> {{@$order->transaction->transaction_id}}</li>
                            <li class=""><b>Payment Status : </b> {{@$order->payment_status ==1 ? 'Completed' : 'Pending'}}</li>
                          </ul>
                        </div>

                        <div class="col-xl-4">
                            <ul class="list-unstyled text-end">
                                <li class=""><b class="fw-bolder fs-5">Order Date : </b></li>
                                <li class="">{{date('d F, Y', strtotime($order->created_at))}}</li>
                              </ul>
                        </div>
                      </div>
              
                      <div class="row my-2 mx-1 justify-content-center">
                        <h4 class="fs-4 fw-bolder py-2">Order Summary</h4>
                        <table class="table table-striped table-borderless">
                          <thead style="background-color:#84B0CA ;" class="text-white">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Description</th>
                              <th scope="col">Qty</th>
                              <th scope="col">Unit Price</th>
                              <th scope="col">Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($order->orderProducts as $product)
                                <tr>
                                    <th scope="row">{{++$loop->index}}</th>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->qty}}</td>
                                    <td>Rs. {{$product->unit_price}}</td>
                                    <td>Rs. {{$product->unit_price * $product->qty}}</td>
                                </tr>
                            @endforeach
                          </tbody>
              
                        </table>
                      </div>
                      <div class="row">
                        {{-- <h4 class="fs-5 fw-bolder py-2 ms-2">Order Status</h4> --}}
                        <div class="col-xl-8">
                          {{-- <form action="" method="get"> --}}
                                <div class="form-group form-inline col-md-4 ">
                                    <label  class="col-md-3  fs-5 fw-bold">Order Status</label>
                                    <select class="form-select form-control" id="order_status" data-id="{{$order->id}}"  name="status">
                                    @foreach (config('order_status.order_status_admin') as $key => $orderstatus)
                                        <option  {{$order->order_status == $key ? 'selected' : ''}} value="{{$key}}">{{$orderstatus['status']}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group form-inline col-md-4 ">
                                    <label  class="col-md-3  fs-5 fw-bold">Payment Status</label>
                                    <select class="form-select form-control" id="payment_status" data-id="{{$order->id}}">
                                        <option  {{$order->payment_status == 0 ? 'selected' : ''}}  value="0">Pending</option>
                                        <option {{$order->payment_status == 1 ? 'selected' : ''}}  value="1">Completed</option>
                                    </select>
                                </div>
                          {{-- </form> --}}
                        </div>
                        <div class="col-xl-4">
                          <ul class="list-unstyled text-end">
                            <li class=" ms-3 fs-5 fw-medium"><span class="text-black me-4 fs-5 fw-semibold">SubTotal</span>Rs. {{$order->sub_total}}</li>
                            <li class=" ms-3 mt-2 fs-5 fw-medium"><span class="text-black me-4 fs-5 fw-semibold">Shipping (+)</span>Rs. {{@$shipping->cost}}</li>
                            <li class=" ms-3 mt-2 fs-5 fw-medium"><span class="text-black me-4 fs-5 fw-semibold">Coupon (-)</span>
                                @if (@$coupon->discount_type == 'amount')
                                    Rs. {{@$coupon->discount ? @($coupon->discount) :0 }}
                                @elseif(@$coupon->discount_type == 'percent')
                                    Rs. {{@$coupon->discount ? @(($coupon->discount * $order->sub_total) / 100 ) :0 }}
                                @else
                                    Rs. 0
                                @endif
                               
                            </li>
                          </ul>
                          <p class="text-black float-end  fs-5 fw-medium"><span class="text-black me-3 fs-5 fw-semibold"> Total Amount</span><span class="fs-4">Rs. {{$order->amount}}</span></p>
                        </div>
                      </div>
                      <hr class="my-3">
                      <div class="row my-4">
                        <div class="col-xl-10">
                          <p>Thank you for your purchase</p>
                        </div>
                        <div class="col-xl-2">
                          <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary text-capitalize print_invoice"
                            style="background-color:#60bdf3 ;">Print</button>
                        </div>
                      </div>
              
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </section>
   
@endsection

@push('scripts')
  
<script>
    $(document).ready(function(){

        $('#order_status').on('change', function(){
            let status = $(this).val();
            let id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: "{{route('admin.order.status')}}",
                data: {status: status, id:id},
                success: function(data){
                    if(data.status === 'success'){
                        alert(data.message);
                    }
                },
                error: function(data){
                    console.log(data);
                }
            })
        })

        $('#payment_status').on('change', function(){
            let status = $(this).val();
            let id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: "{{route('admin.payment.status')}}",
                data: {status: status, id:id},
                success: function(data){
                    if(data.status === 'success'){
                        alert(data.message);
                    }
                },
                error: function(data){
                    console.log(data);
                }
            })
        })

        $('.print_invoice').on('click', function(){
            let printBody = $('.invoice-print');
            let originalContents = $('body').html();

            $('body').html(printBody.html());

            window.print();

            $('body').html(originalContents);

        })
    })
</script>


@endpush