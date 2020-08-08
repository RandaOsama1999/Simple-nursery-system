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
  if(isset($_GET['EditChild']))
  {
    header('location: EditMyChildInfo.php');
  }
  if(isset($_GET['back']))
  {
    header('location: ManagerLoggedIn.php');
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
                    location.replace("http://localhost/Project/SendInterviewInfo.php")
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
  width: 50%;
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
            <h2 style="text-align:center; color: rgba(196, 90, 143, 0.836);">Fill this info to send the interview info to the parent</h2>
            <form id='searchform' name="myForm" method='post' onsubmit="return validateForm()">
            <p style='text-align:center; font-size:medium;'>
                Mail: 
                <select name="parentmail">
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
                
                            $query="SELECT ChildMail FROM n_system.child WHERE State_ID=1";
                            $resultQuery = $conn->query($query);
                            while($rowq = $resultQuery->fetch_assoc()){
                                if($rowq==true)
                                {
                                    $ChildMail=$rowq["ChildMail"];
                                    echo '<option value="'.$ChildMail.'">'.$ChildMail.'</option>';
                                }
                            }
                        }
                        $conn->close();
                    ?>
                </select>
                </p>
                <p style='text-align:center; font-size:medium;'>Date: <input type='date' name='date'></p>
                <p style='text-align:center; font-size:medium;'>
                Time: 
                <select name="time">
                    <option value="10:00:00">10:00:00</option>
                    <option value="10:30:00">10:30:00</option>
                    <option value="11:00:00">11:00:00</option>
                    <option value="11:30:00">11:30:00</option>
                    <option value="12:00:00">12:00:00</option>
                    <option value="12:30:00">12:30:00</option>
                    <option value="13:00:00">13:00:00</option>
                    <option value="13:30:00">13:30:00</option>
                    <option value="14:00:00">14:00:00</option>
                    <option value="14:30:00">14:30:00</option>
                    <option value="15:00:00">15:00:00</option>
                </select>
                </p>
                <button class='btn' name='save' style='margin-left:48%; margin-bottom:2%;margin-top:2%;'>Save</button>
                
            </form>
            <form method="get">
            <button class='btn' name='back' style='margin-left:48%; margin-bottom:2%;margin-top:2%;'>Back</button>
                    </form>
          <br>
          <script>
              function validateForm() 
                {    
                    var currentTime = new Date();
                    var currentyear = currentTime.getFullYear();
                    var currentmonth = currentTime.getMonth();
                    var currentDay = currentTime.getDate();
                    var currm=0;
                    if(currentmonth==0){currm=01;}
                    else if(currentmonth==1){currm=02;}
                    else if(currentmonth==2){currm=03;}
                    else if(currentmonth==3){currm=04;}
                    else if(currentmonth==4){currm=05;}
                    else if(currentmonth==5){currm=06;}
                    else if(currentmonth==6){currm=07;}
                    else if(currentmonth==7){currm=08;}
                    else if(currentmonth==8){currm=09;}
                    else if(currentmonth==9){currm=10;}
                    else if(currentmonth==10){currm=11;}
                    else if(currentmonth==11){currm=12;}


                    y2=document.forms["myForm"]["date"].value;
                     
                    var YearOFInt=0;
                    for (var i = 0; i< 4; i++)
                    {
                        var year2= y2.charAt(i);
                        YearOFInt+=year2;
                        
                    }
                    var MonthOFInt=0;
                    
                    for (var i = 6; i< 7; i++)
                    {
                        var month= y2.charAt(i);
                        MonthOFInt+=month;
                        
                    }

                    var DayOFInt=0;
                    
                    for (var i = 8; i< 10; i++)
                    {
                        var day= y2.charAt(i);
                        DayOFInt+=day;
                        
                    }
                  
                     
                    if(currentyear-YearOFInt!=0 || currm-MonthOFInt!=0 || currentDay-DayOFInt>=0)
                    {
                        alert("Date is not accepted :(");
                        return false;

                    }
                }
        </script>
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

            if(isset($_POST['save'])){
                $Mail=$_POST['parentmail'];
                $Date = $_POST['date'];
                $Time = $_POST['time'];
                $sql="SELECT Child_ID FROM n_system.child WHERE ChildMail='$Mail'";
                $sqlThree="SELECT Manager_ID FROM n_system.manager WHERE ManagerMail='$email'";
                
                $resultTwo = $conn->query($sqlThree);
                while($rowThree = $resultTwo->fetch_assoc()){
                    if($rowThree==true)
                    {
                        $Manager_ID=$rowThree['Manager_ID'];
                        $resulty = $conn->query($sql);
                        while($row = $resulty->fetch_assoc()){
                            if($row==true)
                            {
                                $Child_ID=$row['Child_ID'];
                                
                                $sqlFour="INSERT INTO n_system.interview (Time, Date, Child_ID, Manager_ID)
                                VALUES ('$Time','$Date','$Child_ID','$Manager_ID')";
                                $resultThree = $conn->query($sqlFour);

                                $sqlFive="UPDATE n_system.child SET State_ID=3 WHERE ChildMail='$Mail'";
                                $resultFive = $conn->query($sqlFive);
                            
                            }
                        }
                        
                    }
                }
                
            }
        }


        $conn->close();
        ?>   
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