<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<style>
    body{
        padding:0;
        margin:0;
        font-family: sans-serif;
    }
    nav{
    width: 100%;
    height: 80px;
    background-color: #202652;
    line-height: 80px;
}
nav img{
    width: 50px;
    margin-top: 10px;
}

nav ul{
    float: right;
    margin: 0;
    margin-right: 1.9rem;
}

nav ul li{
    list-style-type: none;
    display: inline-block;
}

nav ul li a{
    font-weight: bold;
    
    text-decoration: none;
    color: #fff;
    padding: 20px;
    
}

img{
    width: 14%;
    margin-left: 1.9rem;
    margin-top: -4%;
}

nav ul li a:hover{
   
    color: #151935;
}
table{
    margin:auto;
    padding:20px;
    
}

table tr th,td{
    
    border:4px solid black;
    padding:10px;
}
.head{
    background-color: #273136;
    color:white;
}
.stats{
    width:60%%;
    margin:auto;
}
footer{
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1rem;
    margin-top: 4%;
}

</style>
<body>
    <nav>
        <img src="./logo.jpeg" class="img" alt="logo"> 
            <ul>
                <li><a href="http://127.0.0.1:5500/index.html">HOME</a></li>
                <li><a href="http://127.0.0.1:5500/about.html">ABOUT</a></li>
                <li><a href="localhost/table.php">DATA</a></li>
                <li><a href="http://127.0.0.1:5500/policies.html">POLICIES</a></li>
                <li><a href="http://127.0.0.1:5500/survey.html">SURVEY</a></li>
            </ul>
    </nav>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th class="head">College</th>
            <th class="head">State </th>
            <th class="head">Category </th>
            <th class="head">Intake</th>
            <th class="head">Passouts</th>
            <th class="head">Total Placed</th>
            <th class="head">Average Salary</th>
            <th class="head">Unemployed</th>
        </tr>

        </thead>
        
        <?php
        $conn = mysqli_connect("localhost", "root", "", "eduIndex");
        $sql = "SELECT * FROM testing";
        $result = $conn->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['College']."</td>";
                echo "<td>".$row['State']."</td>";
                echo "<td>".$row['Category']."</td>"; 
                echo "<td>".$row['Intake']."</td>";    
                echo "<td>".$row['Passouts']."</td>"; 
                echo "<td>".$row['Total_Placed']."</td>"; 
                echo "<td>".$row['Average_Sal']."</td>"; 
                echo "<td>".$row['unemployed']."</td>";
            }
            
        }
        else{
            echo "No results";
        }
        $conn->close();

        ?>
    </table>
    <div class="stats">

    <?php
        $conn = mysqli_connect("localhost", "root", "", "eduIndex");
        $sql = "SELECT * FROM testing";
        $result = $conn->query($sql);
        $sum = 0;
        $tech_avg = 0;
        $buis_avg=0;
        $count=0;
        $c=0;
        $total_in = 0;
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                //total unemployed
                $sum = $sum+ $row['unemployed'];
                $total_in = $total_in + $row['Intake'];
                if($row['Category']=="Technical"){
                    $count++;
                    $tech_avg = ($tech_avg+ $row['Average_Sal']);
  
                }
                if($row['Category']=="Buisness"){
                    $c++;
                    $buis_avg = ($buis_avg+ $row['Average_Sal']);
  
                }
                
            }
            
        }
        else{
            echo "No results";
        }
        $percentage = $sum/$total_in * 100;
        echo "<br><br>";
        echo '<i><p style="margin-left:10px;">Total unemployed students: '.$sum;
        echo "<br><br>";
        echo "Average Salary of technical students: ". "₹".  number_format($tech_avg/$count,2);
        echo "<br><br>";
        echo "Average Salary of buisness students: ". "₹".number_format($buis_avg/$c,1);
        echo "<br><br>";
        echo "Unemployment percentage among graduates: ".number_format($percentage,2) ."%";
        

        //graph
        
        $conn->close();
        $intake = array(
            array("label"=> "VIT", "y"=> 2000),
            array("label"=> "SRM", "y"=> 1500),
            array("label"=> "MIT Bangalore", "y"=> 1000),
            array("label"=> "Anna University", "y"=> 1200),
            array("label"=> "VIT Vellore", "y"=> 2500),
            array("label"=> "VIT Bhopal", "y"=> 280),
            array("label"=> "VIT AP", "y"=> 340),
            array("label"=> "MIT Jaipur", "y"=> 720),
            array("label"=> "MIT Manipal", "y"=> 850),
            array("label"=> "MIT WPU", "y"=> 2000),
        );
         
        $passout = array(
            array("label"=> "VIT", "y"=> 1980),
            array("label"=> "SRM", "y"=> 1450),
            array("label"=> "MIT Bangalore", "y"=> 970),
            array("label"=> "Anna University", "y"=> 1134),
            array("label"=> "VIT Vellore", "y"=> 2451),
            array("label"=> "VIT Bhopal", "y"=> 200),
            array("label"=> "VIT AP", "y"=> 320),
            array("label"=> "MIT Jaipur", "y"=> 600),
            array("label"=> "MIT Manipal", "y"=> 700),
            array("label"=> "MIT WPU", "y"=> 1821)
        );
         
        $placed = array(
            array("label"=> "VIT", "y"=> 1551),
            array("label"=> "SRM", "y"=> 1341),
            array("label"=> "MIT Bangalore", "y"=> 838),
            array("label"=> "Anna University", "y"=> 1045),
            array("label"=> "VIT Vellore", "y"=> 2334),
            array("label"=> "VIT Bhopal", "y"=> 183),
            array("label"=> "VIT AP", "y"=> 234),
            array("label"=> "MIT Jaipur", "y"=> 420),
            array("label"=> "MIT Manipal", "y"=> 536),
            array("label"=> "MIT WPU", "y"=> 1621)
        );
        $average_sal = array(
            array("label"=> "VIT Chennai", "y"=> 550),
            array("label"=> "SRM", "y"=> 500),
            array("label"=> "MIT Bangalore", "y"=> 580),
            array("label"=> "Anna University", "y"=> 300),
            array("label"=> "VIT Vellore", "y"=> 600),
            array("label"=> "VIT Bhopal", "y"=> 400),
            array("label"=> "VIT AP", "y"=> 420),
            array("label"=> "MIT Jaipur", "y"=> 510),
            array("label"=> "MIT Manipal", "y"=> 600),
            array("label"=> "MIT WPU", "y"=> 420)
        );
        ?>
    </div>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        <script>
        window.onload = function () {
         
         var chart = new CanvasJS.Chart("chartContainer", {
             animationEnabled: true,
             exportEnabled: true,
             theme: "light1", // "light1", "light2", "dark1", "dark2"
             title:{
                 text: "Placement Data for colleges"
             },
             axisX:{
                 reversed: true
             },
             axisY:{
                 includeZero: true
             },
             toolTip:{
                 shared: true
             },
             data: [{
                 type: "stackedBar",
                 name: "intake",
                 dataPoints: <?php echo json_encode($intake, JSON_NUMERIC_CHECK); ?>
             },{
                 type: "stackedBar",
                 name: "passout",
                 dataPoints: <?php echo json_encode($passout, JSON_NUMERIC_CHECK); ?>
             },{
                 type: "stackedBar",
                 name: "placed",
                 dataPoints: <?php echo json_encode($placed, JSON_NUMERIC_CHECK); ?>
             },{
                 type: "stackedBar",
                 name: "average salary( x 1000)",
                 dataPoints: <?php echo json_encode($average_sal, JSON_NUMERIC_CHECK); ?>
             }]
         });
         chart.render();
          
         }
        </script>
         <footer>
        <p>Project Made for HackOverFlow</p>
        <br>
        <p>Copyright &copy; 2022, eduIndex</p>
    </footer>
    </html>