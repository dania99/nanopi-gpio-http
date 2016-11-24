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
</head>

<body onload="motor_handle('off', 0);motor_handle('off', 1);motor_handle('off', 2);">
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
                    <button class="btn btn-info">Channel 1</button>
                    <button id="on0" class="btn btn-danger" type="button" onclick="motor_handle('on', 0)">On</button>
                    <button id="off0" class="btn btn-success" type="button" onclick="motor_handle('off', 0)">Off</button>
                </div>
                <br>
                <br>
                <div class="btn-group">
                    <button class="btn btn-info">Channel 2</button>
                    <button id="on1" class="btn btn-danger" type="button" onclick="motor_handle('on', 1)">On</button>
                    <button id="off1" class="btn btn-success" type="button" onclick="motor_handle('off', 1)">Off</button>
                </div>
                <br>
                <br>
                <div class="btn-group">
                    <button class="btn btn-info">Channel 3</button>
                    <button id="on2" class="btn btn-danger" type="button" onclick="motor_handle('on', 2)">On</button>
                    <button id="off2" class="btn btn-success" type="button" onclick="motor_handle('off', 2)">Off</button>
                </div>
                <br>
            </div>
        </div>
    </div>
</body>
    <script>
        document.getElementById('on0').disabled = false;
        document.getElementById('off0').disabled = true;
        document.getElementById('on1').disabled = false;
        document.getElementById('off1').disabled = true;
        document.getElementById('on2').disabled = false;
        document.getElementById('off2').disabled = true;
        
        function motor_handle(state, channel) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "http://<?php echo $_SERVER['HTTP_HOST']; ?>/api/" + channel + "/" + state);
            xhr.send();
            
            if(state == 'on') {
                document.getElementById('on'+channel).disabled = true;
                document.getElementById('off'+channel).disabled = false;
            } else  {
                document.getElementById('on'+channel).disabled = false;
                document.getElementById('off'+channel).disabled = true;
            }
        }
    </script>
</html>
