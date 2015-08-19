<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Edu Tech Solutions | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <style type="text/css">
                .bg-black {
                    background-image: url("/assets/images/bg1.jpg");
                    background-attachment: fixed;
                    background-size: cover;
                }
                .inner-wrapper {
                    background: none repeat scroll 0 0 rgba(255, 255, 255, 0.7);
                    border-radius: 3px;
                    box-shadow: 0 6px 6px rgba(0, 0, 0, 0.3);
                    overflow: hidden;
                    padding: 30px 40px;
                    width: 450px;
                    z-index: 999999999;
                    margin: 10% auto;
                }
                .inner-wrapper .header {
                      padding: 10px 10px;
                      text-align: center;
                      font-size: 26px;
                      font-weight: 300;
                      color: #000;
                }
                /*
                    Page: register and login
                */
                .form-box {
                  width: 360px;
                  margin: 90px auto 0 auto;
                }

                .form-control {
                    border-radius: 0 !important;
                    box-shadow: none;
                }
                .form-control {
                    background: #fff;
                    background-image: none;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
                    color: #555;
                    display: block;
                    font-size: 14px;
                    height: 34px;
                    line-height: 1.42857;
                    padding: 6px 12px;
                    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                    width: 100%;
                }
                input, button, select, textarea {
                    font-family: inherit;
                    font-size: inherit;
                    line-height: inherit;
                }


                .btn {
                        background-color: #287bbc;
                        background-image: -moz-linear-gradient(center top , #287bbc 0%, #23639a 100%);
                        background-image: -webkit-linear-gradient(top , #287bbc 0%, #23639a 100%);
                        border-color: #1b5480;
                        border-radius: 3px;
                        border-style: solid;
                        border-width: 1px;
                        box-sizing: border-box;
                        color: #fff;
                        cursor: pointer;
                        display: inline-block;
                        font-size: 16px;
                        height: 34px;
                        line-height: 32px;
                        margin: 0 0 20px;
                        overflow: visible;
                        padding: 0 15px;
                        text-decoration: none !important;
                        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.35);
                        vertical-align: middle;
                        white-space: nowrap;
                        width: 100%;
                }

                .btn:hover {
                        background-image: -moz-linear-gradient(center top , #23639a 100%, #287bbc 0%);
                        background-image: -webkit-linear-gradient(top , #23639a 100%, #287bbc 0%);
                        color: #ffffff;
                }
                .white-text{color: #ffffff}
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="bg-black">
            {{--set some message after action--}}
              @if (Session::has('message'))
                    <div class="alert alert-success">{{Session::get("message")}}</div>

              @elseif(Session::has('error'))
                   <div class="alert alert-warning">{{Session::get("error")}}</div>

              @elseif(Session::has('info'))
                  <div class="alert alert-info">{{Session::get("info")}}</div>

              @elseif(Session::has('danger'))
                   <div class="alert alert-danger">{{Session::get("danger")}}</div>

             @endif

            @yield('content')
        </body>
    </html>