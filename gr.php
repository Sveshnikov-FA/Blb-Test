<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Group - MTS Assort</title>
    <script src="script.js">


    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>


    </script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            height: 50vh;
        }

        .chart-wrapper {
            width: 42vw;
            height: 42vh;
            margin: 0 auto;
        }

        h1,
        h3,
        p {
            font-family: TruthCYR;
        }

        h3 {
            margin-top: 3vh;
        }

        .fa-vk,
        .fa-twitter {
            border: 6px solid darkred;
            border-radius: 2vh;
            padding: 5px;
            margin-left: 2vh;
            margin-bottom: 1vh;
            color: darkred;
            font-size: 4vh;
        }

    </style>
</head>

<body style="background-image:url('bg_opacity.png');">
    <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Groups";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $tgroup = join(" ",explode("_",explode("?","$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")[1]));
            
            
            echo "<h1 id='header'>Группа $tgroup</h1><h1 id='filler'>Group</h1><div class='container-fluid'><div class='row'><div class='col-6'><div class='wrapper'>            <div class='container d-flex flex-column justify-content-center align-items-center'>                <h3 class='title text-center mb-5'>                    Распределение позиций в группе</h3><div class='chart-wrapper'><canvas id='myChart'></canvas></div></div></div>
            </div>
            <div class='col-6'>
            <h3>Участники</h3>";
    
            $group = join("_",explode(" ",$tgroup));
            $msql = "SELECT result FROM $group";
            $array = array();
            $js = "";
            $rezzult = $conn->query($msql);
            if($rezzult = $conn->query($msql)) {
                if($rezzult->num_rows > 0) {
                    while($row = $rezzult->fetch_assoc()) array_push($array,$row["result"]);
                    $js = json_encode($array, JSON_UNESCAPED_UNICODE);
                    $js = mb_convert_encoding($js,"UTF-8","UTF-8");
                    echo "<script>var array_one = $js;group_graph(array_one); </script>";
                    
                }
                else echo "0 results";
            } else echo "<script>console.log(`$conn->error`);window.open('err.php','_self');</script>";  
            
            $msql = "SELECT * FROM $group";
            $rezzult = $conn->query($msql);
            if($rezzult = $conn->query($msql)) {
                if($rezzult->num_rows > 0) {
                    while($row = $rezzult->fetch_assoc()) echo("<hr><div id='prt' style='clear:both;margin-bottom:1vh'><p style='float:left'>" . join(' ',explode('_', $row["name"])). "</p><p style='float:right'>" . $row["result"]. "</p></div><br>");
                }
                else echo "0 results";
            } 
        ?>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">But first of all, enter your username</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post">
                            <input type="text" id="gn" name="gn">
                            <button name='bttn' class="btn btn-secondary">Continue</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="chars">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="title_m">Uh oh</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h6 id="desc_m">Something went wrong. Make sure to report that to the developer team</h6>
                    </div>

                </div>
            </div>
        </div>
        <?php
        echo "<div id='cta'><h3>Поделиться:</h3><hr><div onclick='share.vk(`$group`)' class='fab fa-vk'></div><div onclick='share.tw(`$group`)' class='fab fa-twitter'></div><hr></div>";
    ?>
            <form method='post'>
                <button id="groups_button" name='btn' id='tester'>Test</button>
            </form>
            <?php 
            $flag = 0;
            if(isset($_COOKIE["user"])) {
                $result = mysqli_query($conn,"SELECT name FROM $group");
                if($result->num_rows > 0) 
                    $msql = "SELECT * FROM $group";
                    $rezzult = $conn->query($msql);
                    if($rezzult = $conn->query($msql)) {
                        if($rezzult->num_rows > 0) {
                            while($row = $rezzult->fetch_assoc()) {
                                if($row["name"]==$_COOKIE['user']) {
                                    $flag = 1;
                                    break;
                                }
                            } 
                        }
                    }  
                
                if($flag==1) {
                    echo "<script>document.getElementById('tester').style.visibility='hidden';</script>";
                }
            }
    if(isset($_POST['bttn'])) {
            $gn = $_POST['gn'];
            echo "<script>var d = new Date();d.setTime(d.getTime() + (29 * 24 * 60 * 60 * 1000));var expires = 'expires=' + d.toUTCString();    document.cookie = 'user=$gn' + ';' + expires; window.open('test.php','_self'); </script>";
    }
        if(isset($_POST['btn'])) {
                    echo "<script>$(document).ready(function(){    $('#myModal').modal();});</script>";
                } 
            $conn->close();
        ?>
</body>

</html>
