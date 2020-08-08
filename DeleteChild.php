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
    header('location: ManagerLoggedIn.php');
  }
  ?>
<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.search-box input').keyup(function(){
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(); //result
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        resultDropdown.html(data); //set
                    });
                } else{
                    resultDropdown.empty();
                }
            });
            $(document).on("click", ".result p", function(){
                $(this).parents(".search-box").find('input').val($(this).html());
                $(this).parent(".result").empty();
            });
        });
        </script>
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
  width: 30%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  padding: 2px 16px;
  background-color: rgba(196, 90, 143, 0.836);
  color: white;
}
body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 800;
        position: relative;
        display: inline-block;
        padding-left: 40%;
        font-size: 14px;
    }
    .search-box input{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result{
        width: 275px;   
        padding-left: 525px;
        box-sizing: border-box;
    }
    .result p{
        width: 275px;
        margin: 0;
        padding-left: 30px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
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
            y2=document.forms["myForm"]["childmail"].value;
                     
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
        <div id="data">
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
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){     
                if($row==true)
                {
                    echo '<h2 style="text-align:center; color: rgba(196, 90, 143, 0.836);">Enter the mail of the child you want to Remove</h2>';
                    echo "<form id='searchform' method='post' name='myForm' onsubmit='return validateForm()'>
                    <div class='search-box' >
                        <input type='text' autocomplete='off' placeholder='Search Mail' name='childmail'>
                        <div class='result'></div>
                    </div>
                            
                    <button class='btn' name='search'  style='position: absolute; margin-left:0.6%;'>Delete</button>
                    </form>
                    <br>";
                    echo "<br>";
                    
                }
            }
            if(isset($_POST['remove'])){
                $childMail = $_POST['childmail'];
                $count=0;
                $count2=0;
                $sqlt="SELECT * FROM n_system.child WHERE ChildMail='$childMail' AND State_ID=2";
                $resultt=$conn->query($sqlt);
                while($rowt = $resultt->fetch_assoc()){     
                    if($rowt==true)
                    {
                        $Parent_ID=$rowt['Parent_ID'];
                        $Child_ID=$rowt['Child_ID'];
                        $sqlTwo="DELETE FROM n_system.users WHERE Mail='$childMail'";
                        $sqlThree="DELETE FROM n_system.child WHERE ChildMail='$childMail'";
                        $sqlD="DELETE FROM n_system.comments WHERE MailP='$childMail'";
                        $sqlP="DELETE FROM n_system.payment WHERE Child_ID='$Child_ID'";
                        mysqli_query($conn,$sqlTwo);
                        mysqli_query($conn,$sqlThree);
                        mysqli_query($conn,$sqlD);
                        mysqli_query($conn,$sqlP);
                        $sqltw="SELECT * FROM n_system.child WHERE Parent_ID='$Parent_ID'";
                        $resulttw=$conn->query($sqltw);
                        while($rowtw = $resulttw->fetch_assoc()){     
                            if($rowtw==true)
                            {
                                $count=$count+1;
                            }
                            
                        }
                        if($count==0)
                        {
                            $sqlFour="DELETE FROM n_system.parent WHERE Parent_ID='$Parent_ID'";
                            mysqli_query($conn,$sqlFour);
                        }
                        $count2=$count2+1;
                    }
                }

                if($count2==0)
                {
                    echo '
                    <div id="myModal" class="modal">
    
                    <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2 class="header">This Email is not available!</h2>
                    </div>
                
                </div>';
                }
               
            }
            $conn->close();
            
        ?>
        
        <form method="get">
        <button class="btn" name="back" style="margin-left:46%;">Back</button>
         <button class="btn" name="Logout" style="position: absolute; margin-left:0.3%;">Logout</button>
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