<!DOCTYPE HTML>
<html lang="en-US">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('')}}/assets/global2/css/bootstrap/css/bootstrap-rtl.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/global2/css/style.css" rel="stylesheet" type="text/css">
    <style>
        @page {
            direction: rtl;
            -webkit-animation-direction: revert;
            -moz-animation-direction: revert;
            -o-animation-direction: revert;
            animation-direction: revert;
            size: 21cm 29.7cm;
            margin: 15mm 15mm 15mm 15mm; /* change the margins as you want them to be. */
        }


        @media all {
            .page-break	{ display: none; }
        }

        @media print {
            body {-webkit-print-color-adjust: exact;}

            .page-break	{ display: block; page-break-before: always; }
        }
    </style>

</head>
<body class="color-scheme-neue" dir="rtl">
{{--<section class="content">--}}
<div class="row">
    <div class="col-xs-12">
        <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">طباعة</a>
    </div>
</div>
<?php $i=0 ?>
@foreach($Coupons as $coupon)
    <div class="portlet light bordered">
        <div class="portlet-title">
        </div>
        <div class="row invoice-body">
            <table class="table" dir="rtl">
                <tbody>

                <tr>
                    <td align="right" width="30%"><img src="{{url('')}}/assets/global2/img/header6.jpg"></td>
                    {{--<td align="right" ><img src="{{url('')}}/assets/global2/img/header5.JPG">{{ $coupon->project->name  }}</td>--}}
                    <td align="right" colspan="2">{{ $coupon->project->name  }}</td>
                    <td align="right" width="20%" >
                        <p> رقم الكوبون :<u>{{$coupon->coupon_no}}</u>
                        </p>

                        {{$coupon->customer->getState->name}}
                    </td>
                </tr>
                <tr>
                    <td align="center" width="30%"><small>الاسم</small></td>
                    <td align="center" bgcolor="#a9a9a9" width="30%"><div class="couponh">{{ $coupon->customer->name  }}</div></td>
                    <td align="center" width="20%"><small>الهوية</small></td>
                    <td align="center" width="20%" bgcolor="#a9a9a9"><div class="couponh">{{ $coupon->customer->card_no }}</div></td>
                </tr>
                <tr align="center" >
                    <td >نقطة التسليم</td>
                    <td bgcolor="#a9a9a9">{{ $address }}</td>
                    <td>تاريخ التسليم</td>
                    <td bgcolor="#a9a9a9">{{ $date_s }}</td>
                </tr>
                <tr>
                    <td colspan="2"><small>يصرف هذا الكوبون للشخص المستفيد فقط بعد الاطلاع على هويته الشخصية</small>
                        <br><small>هذا الكوبون ليس للبيع ويلغى في حال الشطب او التأخر عن موعد التسليم</small></td>
                    <td align="center"><small>توقيع منسق المشروع</small></td>
                    <td align="center"><small>الختم</small></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php $i++ ?>
    @if($i%4 == 0)
        <div class="page-break"></div>

    @endif
@endforeach

{{--</section>--}}
<script src="{{url('')}}/assets/js/jquery.min.js" type="text/javascript"></script>

</body>
</html>









