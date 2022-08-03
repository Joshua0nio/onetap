<?php

session_start();

if (!isset($_COOKIE['user_id'])) {

    header("location:index.php");

    die();
}

$_SESSION['user_id'] = $_COOKIE['user_id'];



?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .btn-circle.btn-xl {

            width: 70px;

            height: 70px;

            padding: 10px 16px;

            border-radius: 35px;

            font-size: 24px;

            line-height: 1.33;

        }

        .borderbg {

            border: solid red 3px;

            display: inline-block;

        }
    </style>

</head>

<body onload="configure();">

    <br><br><br><br>

    <center>

        <div class="borderbg">

            <div id="my_camera">

            </div>

            <div id="results" style="visibility: hidden; position: absolute;"></div>

            <br>



        </div>

        <br><br><br><br>

        <div class="container">

            <button class="btn btn-secondary btn-circle btn-xl" type="button" onclick="saveSnap();">

                <img style="margin-left: -6px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAACTklEQVRoge2Yv24TQRDGfwRwg8ULhBIoaHCVhIqODhERkhQBKUJpqZB4BEQITeAVokgo4gngEaDGKKFDpMEStiORiMim2D3JjI+7mfWtLxL7SSN51/PNfnM3++cWEhISqsATYGi0Z7UozcEjYIA9gQGwUYPev3AX+I1dfGanwPLUVXvcBn6VCNTYCXCnanFXgD2gZxByCiwqYt/D9tZ6wDvgmkV8xzBAVs+PtQMA69jnTQeY1QTfMwYOXVGeBozzVhPYUjZDYCtAfIbnxrF+ygDncoIOFT7TRKGemSkKiYKqE2gAq8Au0AaOvLV934r3iQpZd1osAV9z+NIOgPsx9VgJ54FXCuF5k19TAdETCBGf2WbdCSzl+B8D28A8cMnbPPDa/yf9y3bvaAk0GK/5b8DNAk7L+4xy9ime2NESWGX8yReJz9Bi/E0UnUijJbAr/LY1wT3eCO5OBXrMhC/Cb04T3GNBcNsV6DET+sKvqQnu0RTcfqieuo4SctxBVYEs+C7aNwxc6XsYKmKSBD6J9kMDd020P06gYwzaObAi/I5xS2QZWrjv4FHugwr0mAkN3MFMbmRFSfxrI7tYRwLgTpXS/wS3zi/gVpsmcMv3ySc/xH3kV6UniLCVw9Haiwh6zIQZ4GWA+E3OyHE6wyKunsuE71NeNhPpCU0A3GRcxp1tPuN22L7/vYNbbYomrFlPupWoGxdy+nrA5ZG2tYxiois78t7AhykICcV7jdN14Afha3ss6wBXtZnO4i5Su2dAeBd34awWn5CQkJDw/+APuMErn8VJuQoAAAAASUVORK5CYII=">

            </button><br>

        </div>



    </center>







    <script type="text/javascript" src="assets/webcam.min.js">

    </script>



    <script type="text/javascript">
        function configure() {

            Webcam.set({

                width: 480,

                height: 360,

                image_format: 'jpeg',

                jpeg_quality: 90

            });



            Webcam.attach('#my_camera');

        }



        function saveSnap() {

            Webcam.snap(function(data_uri) {

                document.getElementById('results').innerHTML =

                    '<img id = "webcam" src = "' + data_uri + '">';

            });



            Webcam.reset();



            var base64image = document.getElementById("webcam").src;

            Webcam.upload(base64image, 'function.php', function(code, text) {

                alert('image sent');

                document.location.href = "index.php"

            });

        }
    </script>

</body>

</html>