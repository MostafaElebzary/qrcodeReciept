<html>
<head>
    <style>
        #invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 120mm;
            background: #FFF;
        }

        h1 {
            font-size: 1.5em;
            color: #222;
        }

        h2 {
            font-size: .9em;
        }

        h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #top, #mid, #bot { /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #top {
            min-height: 40px;
        }

        #mid {
            min-height: 80px;
        }

        #bot {
            min-height: 50px;
        }

        #top .logo {
        / / float: left;
            height: 30px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
            background-size: 60px 60px;
        }



        .info {
            display: block;
        / / float: left;
            margin-left: 0;
        }



        .title p {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
          padding: 5px 0 5px 15px;
          border: 1px solid #EEE
        }

        .tabletitle {
        / / padding: 5 px;
            font-size: .5em;
            background: #EEE;
        }

        .service {
            border-bottom: 2px solid #EEE;
        }

        .item {
            width: 24mm;
        }

        .itemtext {
            font-size: .5em;
        }

        #legalcopy {
            margin-top: 5mm;
        }


    </style>
</head>

<body>

<div id="invoice-POS" dir="rtl">

    <center id="top">
{{--        <div class="logo"></div>--}}
        <div class="info">
            <h2>{{$order->supplier_name}}</h2>
        </div><!--End Info-->
    </center><!--End InvoiceTop-->


    <div id="bot">
        <div id="table">
            <table>
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">رقم الفاتورة   </p></td>
                    <td class="tableitem"><p class="itemtext">{{$order->id}}</p></td>
                </tr>
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">الاجمالى قبل الضريبة   </p></td>
                    <td class="tableitem"><p class="itemtext">{{$order->amount}} ريال</p></td>
                </tr>
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">قيمة الضريبة   </p></td>
                    <td class="tableitem"><p class="itemtext">{{$order->tax}} ريال</p></td>
                </tr>
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">الاجمالى بعد الضريبة   </p></td>
                    <td class="tableitem"><p class="itemtext">{{$order->total}} ريال</p></td>
                </tr>
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">التاريخ والوقت   </p></td>
                    <td class="tableitem"><p  class="itemtext">{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d h:i a')}}</p>
                    </td>
                </tr>

            </table>
        </div><!--End Table-->

        <div id="legalcopy">
{{--            <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please--}}
{{--                process this invoice within that time. There will be a 5% interest charge per month on late invoices.--}}
{{--            </p>--}}
        </div>

    </div><!--End InvoiceBot-->


    <div id="mid" style="text-align: center">
        <div class="info">

            <img src="{{url("/uploads/qr_images/" . base64_encode($order->id))}}" alt="">

        </div>
    </div><!--End Invoice Mid-->
</div><!--End Invoice-->

</body>
</html>
