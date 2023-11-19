<!DOCTYPE html>
<html>
<head>

    <title>Invoice</title>
</head>
<style>

    .header{
        padding:15px 0;
        border-radius:20px

    }
    .head-title{
        background-color: #7AE2E2;
        color: #FDFEFE;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        font-weight: bold;
        font-size: 35px;
        padding-left: 30px;
        width: auto;
    }
    .title-address{
        font-size: 12px;
        font-weight: bold;
    }
    .head-address{
        font-size: 12px;
        width: 60%;
    }
    .main-container{
        background-color: #ffffff;
    }
    .center{
        display:flex;
        justify-content:center
    }
    td{
        padding:15px
    }
    .title{
        color:#000;
        font-weight: normal;
        font-size: 16px;
    }
    .contentLeft{
        font-size:16px;
        font-weight:bold;
    }
    .bill{
        font-size:16px;
        font-weight:bold;
    }
    .contentRight{
        font-size:16px;
        font-weight:bold;
        text-align: right;
    }
    p{
        font-size: 14px;
    }
    .total{
        font-size:16px;
        font-weight:bold;
    }
    .line{
        border-top:solid 7px #7AE2E2;
        margin-left: 20px;
        margin-right: 20px;
        border-radius: 20px;
    }
    th{
        padding: 12px;
        border-bottom: solid 1px;
        background-color: #7AE2E2;
        color: #FDFEFE;
        font-size:14px;
    }
    .table2 td{
        padding: 20px;
        text-align: center;
    }
    .table1, .table2, .table-header{
        width: 100%;
    }
    .table-header td{
        padding-right: 30px;
        padding-left: 0;
    }
    .table2{
        border: solid 1px #7AE2E2;
        border-top: 0;
    }
    table{
        border-spacing: 0;
    }
    .table3{
        display: flex;
        justify-content: end;
        margin-top: 5px;
    }
    .table3 td{
        padding: 10px 65px;
        text-align: center;
        background-color: #7AE2E2;
        color: #FDFEFE;
    }
    .table4 td{
        padding: 10px;
    }
    p{
        margin: 0;
    }

</style>



<body>

<section class="main-container">

    <div class="header">
        <table class="table-header">
            <tr>
                <td><h1 class="head-title">INVOICE</h1></td>
                <!--td style="display:flex;justify-content: end"><img src="/img/logo.png" width="250" alt=""></td-->
            </tr>
        </table>
    </div>

    <div class="line">
    </div>

    <div style="padding:15px">
        <table class="table1">
            <tr>
                <td><p class="contentLeft">Invoice No: <span class="title">#{{isset($transactionId) ? $transactionId->transaction_id : ''}}</span></p> </td>
                <td><p class="contentRight">Date: <span class="title">20 October 2022</span></p> </td>
            </tr>
        </table>
    </div>
    <div style="padding-left: 30px">
        <p class="bill">Bill to:</p>
        <p>{{isset($useraddress) ?  $useraddress->name : ''}}</p>
        <p> {{isset($useraddress) ?  $useraddress->address : ''}}</p>
        <p>{{isset($useraddress) ?  $useraddress->phone : ''}}</p>
        <p> {{isset($useraddress) ?  $useraddress->email : ''}}</p>
    </div>

    <div style="padding: 40px">
        <table class="table2">
		 <thead>
            <tr>
                <th>Items</th>
                <th>Quantity</th>
                <th>Price per unit</th>
                <th>Amount (RM)</th>
            </tr>
			 </thead>
            <tbody>
			@foreach($orders as $product)
			<tr>
                <td>{{isset($product) ? $product->name : ''}} </td>
                <td>{{isset($quantities) ? $quantities->quantity : ''}}</td>
                <td>{{isset($product) ? $product->list_price_on_store : ''}}</td>
                <td>{{isset($product) ? $product->cart_total : ''}}</td>
            </tr>
			@endforeach
        </tbody>
        </table>

        <table class="table3">
            <tr>
                <td class="total">TOTAL</td>
                <td class="total">{{$transactionId->shipping_total + $transactionId->cart_total}}</td>
            </tr>
        </table>

    </div>


    <div style="padding-left: 30px;margin-top: 50px;margin-bottom: 20px">


        <table class="table4">
            <tr>
                <td>
                    <p class="title-address" style="margin-bottom: 10px">LIFECARE SDN BHD ()()</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="head-address">No. 8, Jalan 2/131A, Project Jaya Industrial Estate, Jalan Kelang Lama 58200 Kuala Lumpur</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="head-address">Tel No: 03-7784 8136  Fax No: 7784 8140</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="head-address">www.lifecare.com</p>
                </td>
            </tr>
        </table>
    </div>

    <!--  <hr>-->

    <!--  <div class="center" style="padding: 20px 30px">-->
    <!--    <p>If you have any questions about this receipt, simply reply to this email or reach out to our <a href='#'>support team</a> for help.</p>-->
    <!--  </div>-->
    <div class="center" style="padding: 10px 30px;background-color: #7AE2E2">

    </div>
</section>


</body>
</html>
