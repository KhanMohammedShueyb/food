<html>

<head>
    <title>Welcome</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style type="text/css">
        i {
            font-size: 50px !important;
            color: #0ede63 ;
        }
        .container{
            text-align: center;
            margin-top: 20px;
        }
        h3,h1{
            font-weight: bold;
            padding-top: 10px;
        }
        .otp{
            font-weight: bolder;
            color: #0ede63 ;
            padding: 20px;
        }
        .lock{
            display: grid;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <div>
            <h1> <i class="fa fa-dashcube"></i>INVENTROY</h1>
            <h1 class="otp">
                {{ $OTP }}
            </h1>
           <h3>Use this one-time password (OTP)</h3>
           <hr>
           

        </div>
    </div>
</body>

</html>