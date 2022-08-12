<!DOCTYPE HTML>
<html lang="en-US">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('')}}/assets/global2/css/bootstrap/css/bootstrap-rtl.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/global2/css/style.css" rel="stylesheet" type="text/css">
    <style>
        @page {
            /*direction: rtl;*/
            /*-webkit-animation-direction: revert;*/
            /*-moz-animation-direction: revert;*/
            /*-o-animation-direction: revert;*/
            /*animation-direction: revert;*/
            /*size: 21cm 29.7cm;*/
            /*margin: 15mm 15mm 15mm 15mm; !* change the margins as you want them to be. *!*/
        }


        @media all {
            .page-break {
                display: none;
            }
        }

        @media print {

            .page-break {
                display: block;
                page-break-after: always;
            }
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
<style>
    @media print {
        @page {
            size: landscape;
            margin: 20px;
        }
    }


</style>
<?php $i = 0 ?>
<div>

    @foreach($Coupons as $coupon)

        <div style="height: 370px; width: 49%; float: @if($i%2==0) right @else left; margin-left: 1% @endif">
            <table style="width: 100% ;height: 360px !important;" border="1" dir="rtl">
                <tbody>
                <tr>
                    <td width="75%" style="text-align: center;position: relative;">
                        <h3 style="margin-top: 5px">جمعية جسر الأمل الخيرية</h3>
                        <p style="padding-bottom: 10px">{{$coupon->project->name }}</p>
                        <div>
                            <div style="position: absolute;right: 30px;bottom: 15px;">
                                <strong>المحافظة</strong>: <span
                                        style="background: #eee;padding: 5px 10px">{{$coupon->customer->getState->name??''}}</span>
                            </div>

                            <div style="position: absolute;left: 30px;bottom: 15px;">
                                <strong>رقم الكوبون</strong>: <span
                                        style="background: #eee;padding: 5px 10px">{{$coupon->coupon_no}}</span>
                            </div>
                        </div>
                    </td>
                    <td width="25%" style="text-align: center"><img width="100px" src="{{url("uploads/news/sub/".\App\Models\Setting::find(1)->img_name)}}">
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <table border="1" style="width: 100%;text-align: center">
                            <tr align="center">
                                <td align="center">
                                    الاسم
                                </td>
                                <td align="center" style="background: #eee">
                                    <div class="couponh">{{ $coupon->customer->name  }}</div>
                                </td>
                                <td align="center">
                                    الهوية
                                </td>
                                <td align="center" style="background: #eee">
                                    <div class="couponh">{{ $coupon->customer->card_no }}</div>
                                </td>
                            </tr>
                            <tr align="center">
                                <td>نقطة التسليم</td>
                                <td style="background: #eee" colspan="3">{{ $address }}</td>
                            </tr>
                            <tr>

                                <td>وقت التسليم</td>
                                <td style="background: #eee">{{ request('time_s') }}</td>

                                <td>تاريخ التسليم</td>
                                <td style="background: #eee">{{ $date_s }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div>
                            <div style="width: 70%;float: right">
                                <div style="width: 200px; margin-right: 50px">
                                    <p>توقيع المدير</p>
                                    <p style="border-bottom: 1px solid ; width: 100%;"></p>
                                </div>
                            </div>
                            <div style="width: 30%;float: right;padding: 0px 10px ;">
                                <div style="border: 1px solid;text-align: center;height: 90px;">
                                    <p>ختم الجمعية</p>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div style="text-align: center">
                            <small>يصرف هذا الكوبون للشخص المستفيد فقط بعد الاطلاع على هويته الشخصية</small>
                            <br>
                            <small>هذا الكوبون ليس للبيع ويلغى في حال الشطب او التأخر عن موعد التسليم</small>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php $i++;?>

        @if($i%4==0)
            <div class="page-break"></div>

        @endif
    @endforeach
</div>

{{--</section>--}}
<script src="{{url('')}}/assets/js/jquery.min.js" type="text/javascript"></script>

</body>
</html>









