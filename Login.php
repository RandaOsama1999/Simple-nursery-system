<?php
session_start();
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if(isset($_POST['login'])){
                $count=0;
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $sql = "SELECT Mail, userType_ID FROM n_system.users WHERE Mail='$email' AND Password='$pass'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    if($row==true)
                    {
                        $_SESSION['email'] = $email;
                        if($row["userType_ID"]==1)
                        {
                            header("location: ManagerLoggedIn.php");
                        }
                        else if($row["userType_ID"]==2)
                        {
                            
                            $sqlTwo = "SELECT State_ID FROM n_system.child WHERE ChildMail='$email'";
                            $resultTwo = $conn->query($sqlTwo);
                            while($rowTwo = $resultTwo->fetch_assoc()){
                                if($rowTwo==true)
                                {
                                    if($rowTwo["State_ID"]==2)
                                    {
                                        header("location: ParentLoggedIn.php");
                                    }
                                    else if($rowTwo["State_ID"]==1){
                                        header("location: ParentLoggedInPending.php");
                                    }
                                    else{
                                        header("location: ParentLoggedInInterview.php");
                                    }
                                }
                            }
                            
                        }
                        else
                        {
                            header("location: TeacherLoggedIn.php");
                        }
                        $count=$count+1;
                    }
                }
                if($count==0)
                {
                    echo '
                    <div id="myModal" class="modal">
    
                    <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2 class="header">Wrong Login Info</h2>
                    </div>
                
                </div>';
                }
            }
            
            $conn->close();
        ?>
<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            .header{
                color: white;
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
            
            *{
            box-sizing: border-box;
        }

        .DLogin
        {
            background-image: url("candy3.png");
          
         padding: 20px;
         background-position-x:100px;
          
          min-height: 340px;  
          
        }
        .FLogin
        {
background-color:snow;
margin: 15px;
padding:10px;
margin-left: 40%;
   top:45%;
left:550px;
border-style:ridge;
width:250px;
        }
        input
        {
            background-color: white;
            padding: 10px;
            
        }
        .btn
         {
    background-color: green;
    color: white;
    padding: 15px 20px;
    margin: 15px;
    margin-left: 25%;
    width: 60%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
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
        <script>
            function validateForm(){
            y2=document.forms["myForm"]["email"].value;
                     
                     for (var i = 0; i< y2.length; i++)
                     {
                         if(y2.charAt(i)=="'")
                         {
                            alert("Email not accepted :(");
                            return false;
                         }
                         
                     }
            }
        </script>
        <br>
        <div class="DLogin" id="log">
        <div class="FLogin" >
            <form  method="post" name="myForm" onsubmit="return validateForm()" >
                <h2 style="color: rgba(196, 90, 143, 0.836);">Login</h2>
                <b>Email</b>
                <input type="email" name="email" required>
                <b>Password</b>
                <input type="password" name="password" pattern="[A-Za-z]{3,8}" title="InLettres more than 3 letters, less than 8" required>
                <button type="submit" class="btn" name="login" id="loginPage">Login</button>
            </form>
            
            
                    </div>
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
                <td >77 Abd El Hameed Badawy street, Misr El Gedida, Cairo - Egypt</td>
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