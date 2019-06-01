<!DOCTYPE html>
<html>

<head>
    <title>Result - MTS Assort</title>
    <meta charset="utf-8">
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        body {
            margin: 0;
        }

        .container {
            height: 50vh;
        }

        .chart-wrapper {
            width: 42vw;
            height: 42vh;
            margin: 0 auto;
        }

        textarea {
            position: absolute;
            visibility: hidden;
        }

        h1,
        #filler {
            padding: 2vh;
            margin: 0;
            color: aliceblue;
            background-color: #ff0000;
            width: 100%;
            height: auto;
            margin-bottom: 1.5vh;
            padding-bottom: 6vh;
            clip-path: polygon(0 0, 100% 0, 100% 80%, 95% 100%, 85% 70%, 80% 65%, 70% 55%, 60% 90%, 45% 100%, 25% 70%, 15% 85%, 5% 64%, 0 73%);
        }

        #filler {
            position: absolute;
            margin: 0;
            left: 0vh;
            top: 0.75vh;
            background-color: black;
            z-index: -1;
        }

        h1,
        h2 {
            font-family: TruthCYR;
        }

        button {
            border: none;
            background-color: #ff0000;
            color: aliceblue;
        }

        h2,
        p {
            margin-right: 5vh;
        }

    </style>
</head>

<body onload="results(); fill();" style="background-image:url('bg_opacity.png');">
    <h1>Результаты</h1>
    <h1 id="filler">fill</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div style="visibility:hidden;position:absolute" id="ph"></div>
                <div class="wrapper">
                    <div class="container d-flex flex-column justify-content-center align-items-center">
                        <h2 class="title text-center mb-5" style='margin-top: 3vh'>
                            Какие позиции подходят?
                        </h2>
                        <div class="chart-wrapper">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h2 style='margin-top:3vh'>Какая позиция подходит лучше всего?</h2>
                <p id="work_type"></p>
                <h2 style='margin-top:3vh'>Что это значит?</h2>
                <p id="explain"></p>
                <h2 style='margin-top:3vh'>Как работает эта система?</h2>
                <p id="score">Placeholder</p>
                <form method="post">
                    <textarea name="user" id="user"></textarea>
                    <textarea name="group" id="group"></textarea>
                    <textarea name="result" id="result"></textarea>
                    <button style="font-family:TruthCYR;font-size:2vh">Back</button>
                </form>
            </div>

        </div>
    </div>
    <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Groups";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $group ="";
            if(isset($_POST['group'])) {
                $group = $_POST["group"];
                $user = $_POST['user'];
                $mid = explode(" ",$user);
                $rezz = join("_", $mid);
                $res = $_POST['result'];
                $mid = explode(" ",$res);
                $rezz1 = join("_", $mid);
                $group = join("_",explode(" ",$group));
                
                $flag = 0;
                $result = mysqli_query($conn,"SHOW TABLES FROM Groups");
                if($result->num_rows > 0) {
                    while($table=mysqli_fetch_array($result)) {
                    $msql = "SELECT * FROM $table[0]";
                    $rezzult = $conn->query($msql);
                    if($rezzult = $conn->query($msql)) {
                        if($rezzult->num_rows > 0) {
                            while($row = $rezzult->fetch_assoc()) {
                                if($row["name"]==$user) {
                                    $flag = 1;
                                    break;
                                }
                            } 
                }
                
                }  
            }
                }
            if($flag==0) {
                $sql = "INSERT INTO $group (name, result) VALUES ('$rezz', '$rezz1')";
                $conn->query($sql);
            }
                echo "<script>back('$group')</script>";
            }
            $link = explode("?","$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
            echo "<script>document.getElementById('ph').innerHTML = '$link[1]';</script>";
            $conn->close();
        ?>
</body>

</html>
