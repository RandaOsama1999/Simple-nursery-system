﻿<?php 
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
  if(isset($_POST['submit']))
  {
    header('location: ParentPay.php');
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
            td{
                color: white;
            }
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
        <script>
             
             function validateForm() 
                {
                    var x = document.forms["myForm"]["cardno"].value;
                    if (x.length!=16 || isNaN(x)) 
                    {
                        alert("Card number is not accepted");
                        return false;
                    }
                      x=document.forms["myForm"]["security"].value;
                    if (x.length!=3 || isNaN(x)) 
                    {
                        alert("Security number is not accepted");
                        return false;
                    }
                }
        </script>
        <div id="data">
        <form name="myForm" onsubmit="return validateForm()" method="post">
        <h2 style="margin-bottom:1%;"> Fill this payment info: </h2>
        <br>
        <p style='text-align:center; font-size:medium;'>Name as it appears in your card*:  <input  type="text" name="namecard"required></p>
        <p style='text-align:center; font-size:medium;'>Card Number*: <input  type="text" name="cardno"required></p>
        <p style='text-align:center; font-size:medium;'>Security Code*: <input type="text" name="security"required></p>
        <p style='text-align:center; font-size:medium;'>Expiration date*:
        <select name="expyear" >
        <?php 
            $startdate2=strtotime("January");
            $enddate2=strtotime("+12 months", $startdate2);

            while ($startdate2 < $enddate2) {
            echo "<option value='$startdate'>". date("M", $startdate2) . "</option><br>";
            $startdate2 = strtotime("+1 month", $startdate2);
            }
            ?>
        </select>
        <select name="expyear"  required>
        <?php
            $startdate=strtotime("Today");
            $enddate=strtotime("+10 years", $startdate);

            while ($startdate < $enddate) {
            echo "<option value='$startdate'>". date("Y", $startdate) . "</option><br>";
            $startdate = strtotime("+1 years", $startdate);
            }
        ?>
        </select>
        </p>
        <br>
        <button class="btn" name="pay" style="margin-left:48%; margin-bottom:2%;">Pay</button>
        </form>

        <?php
            $email = $_SESSION['email']; 
            $servername = "localhost";
            $name = "root";
            $password = "";
            
            // Create connection
            $conn = new mysqli($servername, $name, $password);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM n_system.users WHERE Mail='$email'";
            $sqlTwo = "SELECT * FROM n_system.child WHERE ChildMail='$email'";
            $result = $conn->query($sqlTwo);
            $resultTwo = $conn->query($sql);
            while($rowTwo = $result->fetch_assoc()){
                if($rowTwo==true)
                {
                    $Child_ID=$rowTwo['Child_ID'];
                    date_default_timezone_set("Africa/Cairo");
                    $d=strtotime("today");
                    $Date= date("Y-m-d", $d);
                    $Time= date("H:i:s");
                    if(isset($_POST['pay']))
                    {
                        date_default_timezone_set("Africa/Cairo");
                        $d=strtotime("today");
                        $date= date("Y-m-d", $d);
                        $diff = date_diff(date_create($Date), date_create($date));
                        $diffFinal=$diff->format('%y');
                        $diffMonth=$diff->format('%m');

                        if($diffFinal==0 && $diffMonth>=1)
                        {
                            $msg="This date is not accepted!";
                            echo "<script type='text/javascript'>
                            alert('".$msg."');
                            location.replace('http://localhost/Project/ParentPayvisa.php');
                            </script>";
                        }
                        else{
                        while($row=$resultTwo->fetch_assoc()){
                            if($row==true)
                            {
                                if($row['Age']<5)
                                {
                                    $sqlFour = "SELECT amount FROM n_system.payamount WHERE amount_ID=1 ";
                                    $resultFour = $conn->query($sqlFour);
                                    while($rowThree = $resultFour->fetch_assoc()){
                                        if($rowThree==true)
                                        {
                                            $amount=$rowThree['amount'];
                                            $sqlSix = "INSERT INTO n_system.payment ( Child_ID, PayState_ID, Date, Time, amount_ID, PMethod_ID) VALUES
                                            ('$Child_ID',2,'$Date','$Time',1,2)";
                                            $resultSix = $conn->query($sqlSix);
                                        }
                                    }
                                }
                                else{
                                    $sqlFour = "SELECT amount FROM n_system.payamount WHERE amount_ID=2 ";
                                    $resultFour = $conn->query($sqlFour);
                                    while($rowThree = $resultFour->fetch_assoc()){
                                        if($rowThree==true)
                                        {
                                            $amount=$rowThree['amount'];
                                            $sqlSix = "INSERT INTO n_system.payment (Child_ID, PayState_ID, Date, Time, amount_ID, PMethod_ID) VALUES
                                            ('$Child_ID',2,'$Date','$Time',2,2)";
                                            $resultSix = $conn->query($sqlSix);
                                        }
                                    }

                                }
                            }
                        }
                    }
                    }
                    
                }
            }


            $conn->close();
            
        ?>
        <br>
        <form method="get">
        <button class="btn" name="back" style="margin-left:45%;">Back</button>
         <button class="btn" name="Logout" style="position: absolute; margin-left:1%;">Logout</button>
        </form>      
        </div>
        <br>
        
        
    <br>
        <div id="footer" >
            <br>
            <!--<img src="doda.png" width="250" height="100" style="padding-left: 180px ; position: absolute;">-->
            <h2 style="color: white">Contact Us</h2>
            <table align="center" >
                <tbody>
                <tr>
                <td >Address&nbsp;:</td>
                <td >77 Abd El Hameed Badawy street, Misr El Gedida, Cairo – Egypt</td>
                </tr>
                <tr>
                <td >Phone :</td>
                <td >02-26424712</td>
                </tr>
                <tr>
                <td >Fax :</td>
                <td >(+202) 24624712</td>
                </tr>
                <tr>
                <td >Email :</td>
                <td >smartkidsnursery@gmail.com</td>
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