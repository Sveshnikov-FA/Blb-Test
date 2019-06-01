<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Groups - MTS Assort</title>
    <script src="script.js">


    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-image:url('bg.png');">
    <h1 id="header" style="clip-path:polygon(0 0, 100% 0, 100% 100%, 90% 75%, 10% 75%, 0 100%);height:17.5vh;font-size:5vh">Выберите группу</h1>
    <h1 id="filler" style="clip-path:polygon(0 0, 100% 0, 100% 100%, 90% 75%, 10% 75%, 0 100%);background-color:crimson;height:17.5vh;">placeholder</h1>
    <button id="groups_button" data-toggle="modal" data-target="#myModal" style="position:absolute;top:2.5%;left:80vw;background-color:crimson">Создать группу</button>
    <div id="group_cont">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = 'Groups';

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
    
        $result = mysqli_query($conn,"SHOW TABLES FROM Groups");
            $i = 0;
            if($result->num_rows > 0) {
                while($table=mysqli_fetch_array($result)) {
                    $rezz = join(" ",explode("_",$table[0]));
                    echo("<h3 class='item' id='item".$i."' onclick='group_1(".$i.")'>$rezz</h3>");
                    $i++;
                }  
            } else echo "<h3 style='border:none'>0 results</h3>";
    
            if(isset($_POST['gn'])){
                $str = $_POST['gn'];
                $mid = explode(" ",$str);
                $rezz = join("_", $mid);
                $sql = "CREATE TABLE $rezz (name VARCHAR(50) NOT NULL, result VARCHAR(50) NOT NULL)";
                if($conn->query($sql) === TRUE) {
                    echo "<br>Table created successfully <script>document.cookie = ('group=$rezz;expires=Tue, 29 Sept 2020 12:00:00 UTC' );window.open('test.php','_self'); </script>";
                }
                else {
                    if($conn->error==="Table '$rezz' already exists") {
                        echo "<script>alert('Table already exists.')</script>";
                    } else {
                    }
                }
            }
            $conn->close();
        ?>
    </div>
            <!-- The Modal -->
            <div class="container-fluid">
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Создать группу</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="post">
                                    <input type="text" id="gn" name="gn">
                                    <input type="submit" class="btn btn-secondary">
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

</body>

</html>
