
<!DOCTYPE html>
<html>
<head>
    <title>Receipt Email - Mobel Furniture</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <style type="text/css">
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        /****** EMAIL CLIENT BUG FIXES - BEST NOT TO CHANGE THESE ********/

        .ExternalClass {
            width: 100%;
        }
        /* Forces Outlook.com to display emails at full width */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: 100%;
        }

        /* Forces Outlook.com to display normal line spacing, here is more on that*/

        body {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }

        /* Prevents Webkit and Windows Mobile platforms from changing default font sizes. */

        html,
        body {
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
        }

        /* Resets all body margins and padding to 0 for good measure */

        table td {
            border-collapse: collapse;
            border-spacing: 0px;
            border: 0px none;
            vertical-align: middle;
            width: auto;
        }

        /*This resolves the Outlook 07, 10, and Gmail td padding issue. Heres more info */
        /****** END BUG FIXES ********/
        /****** RESETTING DEFAULTS, IT IS BEST TO OVERWRITE THESE STYLES INLINE ********/

        .table-mobile {
            width: 600px;
            margin: 0 auto;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            background-color: white;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .table-mobile-small {
            width: 560px !important;
        }

        body, p {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.5;
            color: #222222;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
        }

        a {
            color: #ffbb00;
            text-decoration: none;
            display: inline-block;
        }

        img {
            border: 0 none;
            display: block;
        }

        @media(min-width:480px) {
            .product-header td {
                padding: 25px;
            }

            .product-image,
            .product-title,
            .product-price {
                border-bottom: 1px solid #eeeeee;
            }

            .product-title {
                padding-left: 15px;
            }

            .product-price {
                padding-right: 25px;
            }
        }

        @media (max-width:479px) {
            body {
                padding-left: 10px;
                padding-right: 10px;
            }

            table,
            table > tbody,
            table > tr,
            table > tbody > tr,
            table > tr > td,
            table > tbody > tr > td {
                width: 100% !important;
                max-width: 100% !important;
                display: block !important;
                overflow: hidden !important;
                box-sizing: border-box;
                /*height: auto !important;*/
            }

            .table-mobile-small {
                width: 95% !important;
                max-width: 100% !important;
                display: block !important;
                overflow: hidden !important;
                box-sizing: border-box;
                height: auto !important;
            }

            .full-image {
                width: 100% !important;
            }

            .footer-content p {
                text-align: left !important;
            }

            .product-title,
            .product-price {
                width: 50% !important;
                float: left;
                border-bottom: 1px solid #eeeeee;
            }

            .product-image,
            .product-title,
            .product-price {
                padding: 10px;
            }

            .product-image img {
                width: 100% !important;
            }

            .product-price p {
                text-align: right !important;
            }

            .product-header {
                display: none !important;
            }

            .header-item {
                display: table-cell !important;
                float: none !important;
                width: 50% !important;
            }

            .table-mobile {
                box-shadow: none !important;
                margin: 0;
                border-radius: 0;
            }
        }
    </style>

</head>
<body>

<table width="100%" height="100%" cellpadding="0" cellspacing="0">

    <tr>
        <td bgcolor="#f3f2f7">

            <!-- ========= Table content ========= -->


            <table cellpadding="0" cellspacing="0" width="600" class="table-mobile" align="center">
                <tr>
                    <td height="25" bgcolor="#55586b" style="border-radius:5px 5px 0 0;"></td>
                </tr>

                <!-- ========= Header ========= -->

                <tr>
                    <td bgcolor="#55586b">

                        <table cellpadding="0" cellspacing="0" class="table-mobile-small" align="center">
                            <tr>

                                <td class="header-item">
                                    <p style="font-family:sans-serif;font-size:20px;font-weight:bold;text-transform:uppercase;margin-top:0;margin-bottom:0;color:#fff;text-align:right;">
                                        聯絡我們
                                    </p>
                                    <p style="font-family:sans-serif;font-size:12px;font-weight:normal;text-transform:uppercase;margin-top:0;margin-bottom:0;color:#8b8fa7;text-align:right;">
                                        Contact  Us
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- ========= Divider ========= -->

                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" width="100%" align="center">
                            <tr>
                                <td height="20" bgcolor="#55586b"></td>
                            </tr>
                            <tr>
                                <td style="border-bottom:1px solid #f8f8f8;" height="1"></td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- ========= Intro text ========= -->

                <tr>
                    <td style="padding:35px 0;border-top:1px solid #eeeeee;">
                        <table cellpadding="0" cellspacing="0" class="table-mobile-small" align="center">

                            <tr>
                                <td colspan="2">
                                    <p style="font-family:sans-serif;font-size:22px;font-weight:bold;text-transform:none;margin-top:0;margin-bottom:10px;color:#55586b;text-align:left;">
                                        您有一封新留言請注意查收
                                    </p>
                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:20px;color:#55586b;text-align:left;">
                                        以下是留言表單詳細。
                                    </p>
                                    <blockquote style="margin:20px 0;padding:10px 20px;background:#f3f2f7;font-size:14px;border-left:3px solid #ddd;">
                                        姓名：{{$info['name']}}<br>
                                        Email：{{$info['email']}} <br>
                                        電話：{{$info['tel'] }}<br>
                                        公司：{{$info['company'] }}<br>
                                        標題：{{ $info['subject']}} <br>
                                        留言內容：<big style="color:#fc0d0d;">{{$info['content']}} </big>
                                    </blockquote>
                                    <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:20px;color:#55586b;text-align:left;">
                                        您也可以登入官網後台查看。
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="25"></td>
                </tr>
            </table>

            <!-- ========= Footer ========= -->



        </td>
    </tr>
</table>


</body>
</html>
