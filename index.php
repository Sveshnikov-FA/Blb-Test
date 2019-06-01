<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Main - MTS Assort</title>
    <script src="script.js">

    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="main_backdrop">
        <div id="bg"></div>
        <div id="bg" style="top:0.75vh;background-color:black;z-index:-2;"></div>
        <div class="container-fluid">
            <div id='row'>
                <img id="eggs_image" src="logo.png" alt="nothing works">
                <div id="oct1"></div>
                <div id="oct2"></div>
                <div id="oct3"></div>
                <div id="oct4"></div>
                <div id="oct5"></div>
                <div id="oct6"></div>
                <div id="oct1" style="transform:scale(1.08);background-color:black;z-index:-1"></div>
                <div id="oct2" style="transform:scale(1.175) rotate(45deg);background-color:black;z-index:-1"></div>
                <div id="oct3" style="transform:scale(1.25) rotate(75deg);background-color:black;z-index:-1"></div>
                <div id="oct4" style="transform:scale(1.1) rotate(15deg);background-color:black;z-index:-1"></div>
                <div id="oct5" style="transform:scale(1.25) rotate(5deg);background-color:black;z-index:-1"></div>
                <div id="oct6" style="transform:scale(1.125) rotate(30deg);background-color:black;z-index:-1"></div>
            </div>
            <div class="row">
                <h1 id="title"> MTS ASSORT</h1>
            </div>
            <div class="row">
                <button id="main_button_start" onclick="window.open('groups.php','_self')">_START</button>
            </div>
            <div style="height:50vh"></div>
        </div>
</body>

</html>
