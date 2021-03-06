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
  if(isset($_GET['EditChild']))
  {
    header('location: EditMyChildInfo.php');
  }
  if(isset($_GET['EditParent']))
  {
    header('location: EditParentInfo.php');
  }
  if(isset($_GET['Photo']))
  {
    header('location: UploadChildPhoto.php');
  }
  if(isset($_GET['Recievecomment']))
  {
    header('location: InquiriesRespond.php');
  }
  if(isset($_GET['Sendcomment']))
  {
    header('location: Parent_Send_Comments.php');
  }
  if(isset($_GET['schduleview']))
  {
    header('location: ViewScheduleByParent.php');
  }
  if(isset($_GET['viewpay']))
  {
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
    $count=0;
    $sql = "SELECT * FROM  n_system.users WHERE Mail='$email'";
    $result = $conn->query($sql);
    $sqlTwo = "SELECT * FROM n_system.child WHERE ChildMail='$email'";
    $resultTwo = $conn->query($sqlTwo);
    while($row = $result->fetch_assoc()){
    if($row==true)
    {
        while($rowTwo = $resultTwo->fetch_assoc()){
            if($rowTwo==true)
            {
                $Child_ID=$rowTwo['Child_ID'];
                $sqlT = "SELECT * FROM n_system.payment WHERE Child_ID='$Child_ID'";
                    $resultT = $conn->query($sqlT);
                    while($rowT = $resultT->fetch_assoc()){
                        if($rowT==true)
                        {
                            echo '
                                <div id="myModal" class="modal">
                
                                <div class="modal-header">
                                <span class="close">&times;</span>
                                <h2 class="header">You Already Paid</h2>
                                </div>
                            
                            </div>';
                            $count=$count+1;
                        }
                    }
            }
    }
}
  }
  if($count==0)
{
    header('location: ParentPay.php');
}
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
               $(document).ready(function(){
                $(".close").click(function(){
                    $("#myModal").hide();
                });
            });
        </script>
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
        ul {
            font-size:medium;
    list-style-type: none;
    padding:0;
    margin-left:42%;
    width: 200px;
    background-color: #f1f1f1;
    text-align:center;
}
li button {
    display: block;
    color: black;
    padding: 8px 16px;
    text-decoration: none;
    background-color: #f1f1f1;
    border: none;
    padding: 12px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

li button:hover{
    background-color: forestgreen;
    color: white;
    text-decoration: none;
}

li button.active {
    background-color: forestgreen;
    color: white;
}
.modal {
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 300px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
    position: relative;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 20%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  padding: 2px 16px;
  background-color: rgba(196, 90, 143, 0.836);
  color: white;
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
        if (isset($_SESSION['email']))
        {
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
            $sql = "SELECT * FROM  n_system.users WHERE Mail='$email'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
            if($row==true)
            {
                echo '<h2 style="text-align:center; color: rgba(196, 90, 143, 0.836);">Welcome ' . $row["FirstName"] . "'s parent!</h2>"; 
                //echo '<h2 style="text-align:center; color: rgba(196, 90, 143, 0.836);">Welcome ' . $username .' '. $row["LastName"].' '. $row["FamilyName"]. '!</h2>';
                echo "<br>";
            }
        }
    }


        $conn->close();
        ?>

        <form  method="get" >
        <ul>
            <li><button name="EditChild">Edit your Child's Info</button></li>
            <li><button name="EditParent">Edit your Info</button></li>
            <li><button name="Photo">Upload your child's photo</button></li>
            <li><button name="Recievecomment">Recieve comments</button></li>
            <li><button name="Sendcomment">Send comments</button></li>
            <li><button name="schduleview">View Schedule</button></li>
            <li><button name="viewpay">View Payment amount</button></li>
            <li> <button class="active" name="Logout" onclick="Logout()"> Logout</button></li>
         </ul>
        </form>
        <br>      
        </div>
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