<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
      /* Add some basic styling */
      body {
        /* margin: 0 auto; */
        background-color: #E8E8E8;
      }
      .card-header{
        background-color: #023487;
        padding: 15px;
        padding-left: 9px;
        font-size: 12px;
        color: white;
      }
      .box{
        font-family: system-ui;
        width: 43%;
        margin: auto;
        background-color: white;
        border: 2px solid #ccc;
        font-size: 12px;
      }
      .card-body{
        margin-top: 25px;

      }
      .card-body p{
        padding: 13px;
        font-size: 12px;
        padding-top: 0px;
      }
      .card-body h6{
        padding-left: 10px;
        font-size: 12px;
      }
      .card-body span{
        padding-left: 10px;
        font-size: 12px;
      }
      .order-details {
        border: 1px solid #ccc;
        padding: 13px;
      }

      .order-details h2 {
        color: #023487;
        font-size: 22px;
        margin-bottom: 13px;
      }

      .order-details p {
        /* font-size: 18px; */
        margin-bottom: 0px;
      }
      .order-number{
        color: #023487;
      }
      .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
      {
        line-height: 2.428571;
      }
    </style>
  </head>
  <body>
    <div class="container">
    <div class="box"> 
        <div class="card">
           <div class="card-header">
             @if ($role == 'Admin')
               <h1 class="card-title">You have received an order.</h1>
              @else
              @if($order_status_id == 1)
              <h1 class="card-title">Thank you for your order.</h1>
              @elseif($order_status_id == 2)
              <h1 class="card-title">{{$order_status['name']}}.</h1>
              @elseif($order_status_id == 5)
              <h1 class="card-title">{{$order_status['name']}}.</h1>
              @else
              <h1 class="card-title">Your order status has been updated.</h1>
              @endif
              @endif
           </div>
           <div class="card-body table-responsive">
                @if ($role == 'Admin')
                <h6>Dear Admin,</h6>
                @else
                <h6>Dear {{$user->name}},</h6>
                @endif
                @if ($role == 'Admin')
                <p>You have received an order.</p>
                <span class="order-number">Order number: {{$order['reference']}}</span><br>
                <span>Customer: {{$user->name}}</span><br>
                <span>Phone Number : {{$user->phone}}</span><br>
                <span>Address: {{$user->address}}</span><br>
                <span>Date:{{ date('d-m-Y', strtotime($order['order_date'])) }}</span><br>
                @else
                  @if($order_status_id == 1)
                  <p>Your<span class="order-number"><b>Order number. {{ $order['reference'] }} ({{ date('d-m-Y', strtotime($order['order_date'])) }})</b></span> was received. Your order details are as follows :</p>
                  @elseif($order_status_id == 5)
                  <p>Your<span class="order-number"><b>Order number. {{ $order['reference'] }} ({{ date('d-m-Y', strtotime($order['order_date'])) }})</b></span> was canceled for some reasons. Please contact the Bombay Choconuts team for more information. Your order details were as follows :</p>
                  @else
                  <p>Your<span class="order-number"><b>Order number. {{ $order['reference'] }} ({{ date('d-m-Y', strtotime($order['order_date'])) }})</b></span> has been {{$order_status['name']}}. Your order details are as follows :</p>
                  @endif
                @endif
               
                <table class="table table-border">
                  <tbody>
                      <tr>
                        <th style=" line-height: 2.428571; padding:5px">Product</th>
                        <th style=" line-height: 2.428571; padding:5px">Weight</th>
                        <th style=" line-height: 2.428571; padding:5px">Quantity</th>
                        <th style=" line-height: 2.428571; padding:5px">Price</th>
                        <th style=" line-height: 2.428571; padding:5px">Total</th>
                    </tr>
                    @foreach ($order_details as $key => $value)
                    <tr>
                        <td style=" line-height: 2.428571; padding:5px">{{ $value->product['title'] }}</td>
                        <td style=" line-height: 2.428571; padding:5px">{{ $value['weight'] }}</td>
                        <td style=" line-height: 2.428571; padding:5px">{{ number_format($value['quantity']) }}</td>
                        <td style=" line-height: 2.428571; padding:5px"> {{ ($value['sale_price']) }}</td>
                        <td style=" line-height: 2.428571; padding:5px">{{ ($value['sub_total']) }}</td>
                    </tr>
                    @endforeach
                    <hr>
                    <tr>
                      <th colspan="7" style=" line-height: 2.428571; padding:5px; text-align: right;">Total: {{ $order['sub_total'] }}</th>
                    </tr>
                  </tbody>
                </table>
                <hr>
                <p>You will receive an email at the next status update.</p>
                <p><b>Greetings,<br>
                Bombay Choc n nuts Team</b></p>
           </div>
        </div>
    </div>       
    </div>
  </body>
</html>
