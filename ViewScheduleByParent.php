<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
  	header('location: Login.php');
  }
  if (isset($_GET['Logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: Login.php");
  }
  if(isset($_GET['back']))
  {
    header('location: ParentLoggedIn.php');
  }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style>
            h1,h2{
                color: darksalmon;
                text-align: center;
            }
          /*  td{
                color: white;
            }*/
            .navbar {
                background-color: rgb(27, 73, 92);
                font-family: Arial, Helvetica, sans-serif;
            }

            .navbar a {
                font-size: 16px;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            #footer {
                background-color: forestgreen;
                font-family: Arial, Helvetica, sans-serif;
            }

            #footer p {
                font-size: 16px;
                color: white;
                text-align: center;
                text-decoration: none;
            }
            .dropbtn {
                background-color: rgb(27, 73, 92);
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {background-color: #ddd;}

            .dropdown:hover .dropdown-content {display: block;}

            .dropdown:hover .dropbtn {background-color: rgba(196, 90, 143, 0.836)}

            #list:hover {
                background-color: rgba(196, 90, 143, 0.836);
            }
            
            #Form
                    {
                        background-image: url("candy3.png");              
                        text-align: center;
                        padding: 20px;
                        margin:20px;
                        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
                    }
                    #T
                    {
                        
                        color: rgb(27, 73, 92);
                        align: right;
                        border: 2px solid black;
                        border-spacing: 10px;
                        padding: 40px;
                        margin:40px;
                    }
                
        fieldset
        {
margin-bottom: 20px;
padding: 10px;
border:1px solid black;
        }
        legend
        {
            padding: 10px;

        }
        .FORM input{
            margin:5px;
        }
        #data{
            background-image: url("candy3.png");
          
         padding: 20px;
         background-position-x:100px;
          
          min-height: 340px;  
        }
</style>
    </head>
    <body>
    <title>Smart Kids nursery</title>
        <div class="bg">
        
        <img src="logo.png" style="width:23%" >
        </div>
        <div class="navbar">
                <a id="list" onclick="Home()" href="#home">Home</a>
                <script>
                        function Home()
                        {
                                location.replace("http://localhost/Project/Nursery.html")
                        }
                </script>
                <div class="dropdown">
                        <button class="dropbtn">About Us</button>
                        <div class="dropdown-content">
                          <a onclick="Mission()" href="#">Mission</a>
                          <script>
                                function Mission() {
                                        location.replace("http://localhost/Project/Mission.html")
                                }
                        </script>
                          <a onclick="Vision()" href="#">Vision</a>
                          <script>
                                function Vision() {
                                        location.replace("http://localhost/Project/vision.html")
                                }
                        </script>
                          <a onclick="Obj()" href="#">Objectives</a>
                          <script>
                                function Obj() {
                                        location.replace("http://localhost/Project/Objectives.html")
                                }
                        </script>
                        </div>
                </div>
                <a onclick="Gallery()" id="list" href="#">Gallery</a>
                <script>
                        function Gallery() {
                                location.replace("http://localhost/Project/Gallery.html")
                        }
                </script>
                <a onclick="myFunction()" id="list" href="#contact">Contact Us</a>
                <script>
                        function myFunction() {
                            var elmnt = document.getElementById("footer");
                            elmnt.scrollIntoView();
                        }
                </script>
                <a onclick="Log()" id="list" href="#login">Login</a>
                <script>
                       function Log()
                        {
                                location.replace("http://localhost/Project/Login.php")
                        }
                </script>
                <a onclick="SignUp()" id="list" href="#signup">Sign Up</a>
                <script>
                       function SignUp()
                        {
                                location.replace("http://localhost/Project/SignUp.php")
                        }
                </script>
                <a onclick="Inquiry()" id="list" href="#interview">Inquiry</a>
                <script>
                       function Inquiry()
                        {
                                location.replace("http://localhost/Project/Inquiry.html")
                        }
                </script>
        </div>
        <br>
        <div id="data">
        <?php
 
$Email=$_SESSION['email']; 
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
$Age="SELECT Age FROM n_system.users WHERE Mail='$Email'";
$result= mysqli_query($conn,$Age);
while($row = $result->fetch_assoc()) 
        { 
            $a= $row["Age"] ;
        }
if($a >=5)
{
$conn2 = new mysqli($servername, $username, $password);
$Sunday="SELECT * FROM n_system.schedule WHERE DAY='Sunday'OR DAY='sunday' ";
$result11= mysqli_query($conn2,$Sunday);
echo "<table width='400' align='center' id='T' border='5' >";
echo "<tr>";
echo "<th>"."Day"."<th>";
echo "<th>"."Subject"."<th>";
echo "<th>"."Start Time"."<th>";
echo "<th>"."End Time"."<th>";
echo "</tr>";


while($row = $result11->fetch_assoc()) 
        { 
              $subject=$row["Subject_ID"];
                $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                $result3= mysqli_query($conn2,$subjectfromtable);
                $row2 = $result3->fetch_assoc();
                $subject=$row2["SubjectName"];
            echo "<tr>";
            echo "<td>".$row["Day"]."<td>";
            echo "<td>".$subject."<td>";
            echo "<td>".$row["TimeStart"]."<td>";
            echo "<td>".$row["TimeEnd"]."<td>";
            echo"<tr>";
        }
        $Monday="SELECT * FROM n_system.schedule WHERE DAY='Monday' OR DAY='monday' ";
        $result2= mysqli_query($conn2,$Monday);
        while($row = $result2->fetch_assoc()) 
        { 
           
                $subject=$row["Subject_ID"];
                $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                $result3= mysqli_query($conn2,$subjectfromtable);
                $row2 = $result3->fetch_assoc();
                $subject=$row2["SubjectName"];
            
            echo "<tr>";
            echo "<td>".$row["Day"]."<td>";
            echo "<td>".$subject."<td>";
            echo "<td>".$row["TimeStart"]."<td>";
            echo "<td>".$row["TimeEnd"]."<td>";
            echo"<tr>";
        }
        ////////////////////
        $Tuesday="SELECT * FROM n_system.schedule WHERE DAY='Tuesday' OR DAY='tuesday' ";
        $resultx= mysqli_query($conn2,$Tuesday);
        while($row = $resultx->fetch_assoc()) 
        { 
                $subject=$row["Subject_ID"];
                $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                $result3= mysqli_query($conn2,$subjectfromtable);
                $row2 = $result3->fetch_assoc();
                $subject=$row2["SubjectName"];
            
            echo "<tr>";
            echo "<td>".$row["Day"]."<td>";
            echo "<td>".$subject."<td>";
            echo "<td>".$row["TimeStart"]."<td>";
            echo "<td>".$row["TimeEnd"]."<td>";
            echo"<tr>";
        }
         ////////////////////
         $Wednesday="SELECT * FROM n_system.schedule WHERE DAY='Wednesday' OR DAY='wednesday' ";
         $result4= mysqli_query($conn2,$Wednesday);
         while($row = $result4->fetch_assoc()) 
         { 
             
                 $subject=$row["Subject_ID"];
                 $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                 $result3= mysqli_query($conn2,$subjectfromtable);
                 $row2 = $result3->fetch_assoc();
                 $subject=$row2["SubjectName"];
             
             echo "<tr>";
             echo "<td>".$row["Day"]."<td>";
             echo "<td>".$subject."<td>";
             echo "<td>".$row["TimeStart"]."<td>";
             echo "<td>".$row["TimeEnd"]."<td>";
             echo"<tr>";
         }
          ////////////////////
        $Thursday="SELECT * FROM n_system.schedule WHERE DAY='Thursday' OR DAY='thursday' ";
        $result5= mysqli_query($conn2,$Thursday);
        while($row = $result5->fetch_assoc()) 
        {  
                $subject=$row["Subject_ID"];
                $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                $result3= mysqli_query($conn2,$subjectfromtable);
                $row2 = $result3->fetch_assoc();
                $subject=$row2["SubjectName"];
            
            echo "<tr>";
            echo "<td>".$row["Day"]."<td>";
            echo "<td>".$subject."<td>";
            echo "<td>".$row["TimeStart"]."<td>";
            echo "<td>".$row["TimeEnd"]."<td>";
            echo"<tr>";
        }

        echo"</table>";
}
else
{
     
    $conn2 = new mysqli($servername, $username, $password);
$Sunday="SELECT * FROM n_system.schedule WHERE DAY='Sunday' OR DAY='sunday' ";
 
 
$result= mysqli_query($conn2,$Sunday);
echo "<table width='400' align='center' id='T' border='5' >";
echo "<tr>";
echo "<th>"."Day"."<th>";
echo "<th>"."Subject"."<th>";
echo "<th>"."Start Time"."<th>";
echo "<th>"."End Time"."<th>";
echo "</tr>";


while($row = $result->fetch_assoc()) 
        { 
            if ($row["Subject_ID"]=='1'||$row["Subject_ID"]=='5')
            {
             $subject="Games";
            }
            else
            {
                $subject=$row["Subject_ID"];
                $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                $result3= mysqli_query($conn2,$subjectfromtable);
                $row2 = $result3->fetch_assoc();
                $subject=$row2["SubjectName"];
            }
          
            echo "<tr>";
        
            echo "<td>".$row["Day"]."<td>";
            echo "<td>".$subject."<td>";
            echo "<td>".$row["TimeStart"]."<td>";
            echo "<td>".$row["TimeEnd"]."<td>";
            echo"<tr>";
        }
        $Monday="SELECT * FROM n_system.schedule WHERE DAY='Monday' OR DAY='monday' ";
        $result2= mysqli_query($conn2,$Monday);
        while($row = $result2->fetch_assoc()) 
        { 
            if ($row["Subject_ID"]=='1'||$row["Subject_ID"]=='5')
            {
             $subject="Games";
            }
            else
            {
                $subject=$row["Subject_ID"];
                $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                $result3= mysqli_query($conn2,$subjectfromtable);
                $row2 = $result3->fetch_assoc();
                $subject=$row2["SubjectName"];
            }
            echo "<tr>";
            echo "<td>".$row["Day"]."<td>";
            echo "<td>".$subject."<td>";
            echo "<td>".$row["TimeStart"]."<td>";
            echo "<td>".$row["TimeEnd"]."<td>";
            echo"<tr>";
        }
        ////////////////////
        $Tuesday="SELECT * FROM n_system.schedule WHERE DAY='Tuesday' OR DAY='tuesday' ";
        $resultx= mysqli_query($conn2,$Tuesday);
        while($row = $resultx->fetch_assoc()) 
        { 
            if ($row["Subject_ID"]=='1'||$row["Subject_ID"]=='5')
            {
             $subject="Games";
            }
            else
            {
                $subject=$row["Subject_ID"];
                $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                $result3= mysqli_query($conn2,$subjectfromtable);
                $row2 = $result3->fetch_assoc();
                $subject=$row2["SubjectName"];
            }
            echo "<tr>";
            echo "<td>".$row["Day"]."<td>";
            echo "<td>".$subject."<td>";
            echo "<td>".$row["TimeStart"]."<td>";
            echo "<td>".$row["TimeEnd"]."<td>";
            echo"<tr>";
        }
         ////////////////////
         $Wednesday="SELECT * FROM n_system.schedule WHERE DAY='Wednesday' OR DAY='wednesday' ";
         $result4= mysqli_query($conn2,$Wednesday);
         while($row = $result4->fetch_assoc()) 
         { 
             if ($row["Subject_ID"]=='1'||$row["Subject_ID"]=='5')
             {
              $subject="Games";
             }
             else
             {
                 $subject=$row["Subject_ID"];
                 $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                 $result3= mysqli_query($conn2,$subjectfromtable);
                 $row2 = $result3->fetch_assoc();
                 $subject=$row2["SubjectName"];
             }
             echo "<tr>";
             echo "<td>".$row["Day"]."<td>";
             echo "<td>".$subject."<td>";
             echo "<td>".$row["TimeStart"]."<td>";
             echo "<td>".$row["TimeEnd"]."<td>";
             echo"<tr>";
         }
          ////////////////////
        $Thursday="SELECT * FROM n_system.schedule WHERE DAY='Thursday' OR DAY='thursday' ";
        $result5= mysqli_query($conn2,$Thursday);
        while($row = $result5->fetch_assoc()) 
        { 
            if ($row["Subject_ID"]=='1'||$row["Subject_ID"]=='5')
            {
             $subject="Games";
            }
            else
            {
                $subject=$row["Subject_ID"];
                $subjectfromtable="SELECT SubjectName From n_system.subject WHERE Subject_ID='$subject' ";
                $result3= mysqli_query($conn2,$subjectfromtable);
                $row2 = $result3->fetch_assoc();
                $subject=$row2["SubjectName"];
            }
            echo "<tr>";
            echo "<td>".$row["Day"]."<td>";
            echo "<td>".$subject."<td>";
            echo "<td>".$row["TimeStart"]."<td>";
            echo "<td>".$row["TimeEnd"]."<td>";
            echo"<tr>";
        }

        echo "</table>";
    }

    ?>
    <br>
    <form method="get">
        <button class="btn" name="back" style="margin-left:45%;">Back</button>
         <button class="btn" name="Logout" style="position: absolute; margin-left:1%;">Logout</button>
        </form>  
        <br>
        <div id="footer" >
            <br>
            <!--<img src="doda.png" width="250" height="100" style="padding-left: 180px ; position: absolute;">-->
            <h2 style="color: white">Contact Us</h2>
            <table align="center" style="color:white" >
                <tbody>
                <tr>
                <td  >Address&nbsp;:</td>
                <td  >77 Abd El Hameed Badawy street, Misr El Gedida, Cairo – Egypt</td>
                </tr>
                <tr>
                <td >Phone :</td>
                <td  >02-26424712</td>
                </tr>
                <tr>
                <td >Fax :</td>
                <td  >(+202) 24624712</td>
                </tr>
                <tr>
                <td  >Email :</td>
                <td  >smartkidsnursery@gmail.com</td>
                </tr>
                </tbody>
            </table>
            <br>
            <br>
            <p class="copyright" style="font-size: 11px">Copyright 2019 © Smart Kids Nursery, All Right Reserved</p>
           
            <br>
        </div>
                    
    </body>
</html>