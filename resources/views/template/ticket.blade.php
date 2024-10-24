<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="container">
            <div class="card mt-5" style="background-color: #06061e;">
                <div class="row">
                    <div class="col-lg-5">
                        <img src="{{ asset('attachment/img/img_ticket.jpg') }}" alt="" srcset="" class="mw-100 p-5" style="border-radius: 60px;">
                    </div>

                <div class="col-lg-6" style="color: #ffcf03; font-family: typeWriter;">
                    <div class="p-5">
                        <div>
                            <h1 class="text-center">FORMAT RESERVASI</h1>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <h2>{{ $data['name'] }}</h2>
                                <h2>{{ $data['phone'] }}</h2>
                                <h2>{{ $data['email'] }}</h2>
                                <h2>RSRV-{{ $data['uid'] }}</h2>
                            </div>
                            <div class="" style="background-color: #ffcf03;">
                                @php
                                    echo '<img src="/attachment/qrcode/cache/'.$data['uid'].'qrcode.png" alt="barcode" class="p-2"   />';
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </body>
</html>
