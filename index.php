<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motor Controller</title>
    <meta name="description" content="Embedded System Engineer, Tech Junkie, Minimalist, Food Lover">
    <meta name="author" content="Md. Minhazul Haque">
    <link href="bootstrap.min.css" rel="stylesheet">
    <script>
        var btn_on = document.getElementById('on');
        var btn_off = document.getElementById('off');
        
        btn_on.disabled = false;
        btn_off.disabled = true;
        
        function motor_handle(state) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "http://<?php echo $_SERVER['HTTP_HOST']; ?>/api/0/" + state);
            xhr.send();
            
            if(state == 'on') {
                btn_on.disabled = true;
                btn_off.disabled = false;
            } else  {
                btn_on.disabled = false;
                btn_off.disabled = true;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Motor Controller</a>
                    </div>
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a><?php echo date(DATE_RFC2822); ?></a>
                            </li>
                            <li>
                                <a href="#">Minhaz</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="btn-group">
                    <button id="on" class="btn btn-danger" type="button" onclick="motor_handle('on')">On</button>
                    <button id="off" class="btn btn-success" type="button" onclick="motor_handle('off')">Off</button>
                </div>
            </div>
        </div>
    </div>
</body>
