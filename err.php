<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Error - MTS Assort</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="err_backdrop" style='background-color:#ffcc66'>
    <div id="bg"></div>
    <div id="bg" style="top:0.75vh;background-color:black;z-index:-2;"></div>
    <div class="container-fluid">
        <div id='row'>
            <img id="eggs_image" src="err.png" alt="nothing works">
            <div id="oct1" style='background-color:#ffcc66'></div>
            <div id="oct2" style='background-color:#ffcc66'></div>
            <div id="oct3" style='background-color:#ffcc66'></div>
            <div id="oct4" style='background-color:#ffcc66'></div>
            <div id="oct5" style='background-color:#ffcc66'></div>
            <div id="oct6" style='background-color:#ffcc66'></div>
            <div id="oct1" style="transform:scale(1.08);background-color:black;z-index:-1"></div>
            <div id="oct2" style="transform:scale(1.175) rotate(45deg);background-color:black;z-index:-1"></div>
            <div id="oct3" style="transform:scale(1.25) rotate(75deg);background-color:black;z-index:-1"></div>
            <div id="oct4" style="transform:scale(1.1) rotate(15deg);background-color:black;z-index:-1"></div>
            <div id="oct5" style="transform:scale(1.25) rotate(5deg);background-color:black;z-index:-1"></div>
            <div id="oct6" style="transform:scale(1.125) rotate(30deg);background-color:black;z-index:-1"></div>
        </div>
        <div class="row">
            <h1 id="title"> Кажется, что-то пошло не так</h1>
        </div>
        <div class="row">
            <button id="main_button_start" onclick="window.open('index.php','_self')" style='color:#ffcc66'>Назад</button>
        </div>
        <div style="height:50vh"></div>
    </div>
</body>

</html>
