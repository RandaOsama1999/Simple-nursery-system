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
  if(isset($_POST['save']))
  {
    header('location: EditMyChildInfo.php');
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

            while($rowTwo=$result->fetch_assoc())
            { 
                if($rowTwo==true)
               {
                    $sqlone = " SELECT Hobby, School,Parent_ID FROM n_system.child WHERE ChildMail='$email'";
                    $resultone = $conn->query($sqlone);

                    while($rowT= $resultone->fetch_assoc())
                    {  
                        if($rowT==true)
                        {
                            $Hobby=$rowT['Hobby'];
                            $School=$rowT['School'];

                            $sqlTwo = " SELECT * FROM n_system.users WHERE Mail='$email'";
                            $resultTwo=$conn->query($sqlTwo);
                        
                            while($row = $resultTwo->fetch_assoc())
                            {  
            
                                if($row==true)
                                {
                                    $FirstName=$row['FirstName'];
                                    $LastName=$row['LastName'];
                                    $FamilyName=$row['FamilyName'];
                                    $DateOfBirth=$row['DateOfBirth'];
                                    $Mobile=$row['Mobile'];
                                    $MobileTwo=$row['MobileTwo'];
                                    $Home=$row['Home'];
                                    $Address=$row['Address'];
                                    $UserP=$row["Password"];
                                }
                            }

                        }

                    }
                }
            }
            if(isset($_POST['save']))
            {  

                $FirstName=$_POST['FirstName'];
                $LastName=$_POST['LastName'];
                $FamilyName=$_POST['FamilyName'];
                $DateOfBirth=$_POST['DateOfBirth'];
                $Mobile=$_POST['Mobile'];
                $MobileTwo=$_POST['MobileTwo'];
                $Home=$_POST['Home'];
                $Address=$_POST['Address'];
                $Hobby=$_POST['Hobby'];
                $School=$_POST['School'];

                date_default_timezone_set("Africa/Cairo");
                $d=strtotime("today");
                $date= date("Y-m-d", $d);
                $diff = date_diff(date_create($DateOfBirth), date_create($date));

                $Age=$diff->format('%y');
                $UserP=$_POST['Password'];
        
                $sqlThree="UPDATE n_system.users SET FirstName='$FirstName', LastName='$LastName' , FamilyName='$FamilyName',
                 DateOfBirth='$DateOfBirth',Age='$Age', Mobile='$Mobile', MobileTwo='$MobileTwo',
                 Home='$Home', Address='$Address',Password='$UserP' WHERE Mail='$email'";


                $sqlFour="UPDATE  n_system.child SET Hobby='$Hobby', School='$School' WHERE ChildMail='$email'";


                $resultThree=mysqli_query($conn,$sqlThree);

                $resultfour=mysqli_query($conn,$sqlFour);
            }
            $conn->close();
            
        ?>
<script>
        function validateForm()
        {
             
            var currentTime = new Date();
                    var currentyear = currentTime.getFullYear();

                    y2=document.forms["myForm"]["DateOfBirthP"].value;
                     
                    var Year=0;
                    for (var i = 0; i< 4; i++)
                    {
                        var year2= y2.charAt(i);
                        Year+=year2;
                    }
                    if(currentyear-Year<20|| currentyear-Year>50)
                    {
                        alert("Year of Parent is not accepted :(");
                        return false;

                    }

                    var currentTime = new Date();
                    var currentyear = currentTime.getFullYear();

                    y2=document.forms["myForm"]["DateOfBirth"].value;
                     
                    var YearOFChild=0;
                    for (var i = 0; i< 4; i++)
                    {
                        var year2= y2.charAt(i);
                        YearOFChild+=year2;
                        
                    }

                    if(currentyear-YearOFChild>8 || currentyear-YearOFChild<1)
                    {
                        alert("Year of child is not accepted :(");
                        return false;
                    }
                    x=document.forms["myForm"]["Mobile"].value;
                    if (x.length!=11 || isNaN(x) ) 
                    {
                        alert("InCorrect Mobilenumber1");
                        return false;
                    }
                    x1=document.forms["myForm"]["MobileTwo"].value;
                    if (x1.length!=11 || isNaN(x1) ) 
                    {
                        alert("InCorrect Mobilenumber2");
                        return false;
                    }
                    if(x==x1)
                    {
                        alert("please enter another mobile number since both are the same o ehna nas7een awi ");
                        return false;
                    }
                    x=document.forms["myForm"]["Home"].value;
                    if (x.length!=8 || isNaN(x) ) 
                    {
                        alert("InCorrect Home number");
                        return false;
                    }
                    var b = 0, x=document.getElementsByName("hobby");
                     for(j=0;j<x.length;j++) 
                    {
                       if(x.item(j).checked == false) 
                        {
                       b++;
                        }
                    }
                    if(currentyear-YearOFChild<4)
                    {
                        x=document.forms["myForm"]["School"].value;
                        if(x!="")
                        {
                            alert("School must be empty 3lshan eldaahh baby :D");
                            return false;
                        }
                    }
                    else
                    {
                        x=document.forms["myForm"]["School"].value;
                        if(x=="" || x.length<3)
                        {
                            alert("School is required");
                            return false;
                        }
                    }
                   
                    x=document.forms["myForm"]["Hobby"].value;
                   
                    if(x!= "Reading"  &&  x!= "reading"  && x!= "Swimming" && x!= "swimming" && x!= "Music" && x!= "music" 
                    && x!= "Computer" && x!= "computer" && x!= "Drawing" && x!= "drawing" && x!= "Coloring" && x!= "coloring") 
                    {
                      
                    alert("Please Choose From : Reading-Swimming-Music-Computer-Drawing-Coloring ");
                        return false;   
                    } 

                    x=document.forms["myForm"]["Password"].value;
                    if (x.length<4) 
                    {
                        alert("Password should be more than or equal 4");
                        return false;
                    }
        }

        </script>
        <form method="post"  id="form" name="myForm" onsubmit="return validateForm()"  >
        <h2 style='text-align:center; color: rgba(196, 90, 143, 0.836);'>Edit <?php echo $FirstName; ?>'s Info</h2>
        <br>
        <p style='text-align:center; font-size:medium;'>First Name: <input type='text' name='FirstName' pattern="[A-Za-z]{3,15}" title="In Lettres more than 3 letters, less than 8" value='<?php echo $FirstName; ?>'><p>
        <p style='text-align:center; font-size:medium;'>Last Name: <input type='text' name='LastName'  pattern="[A-Za-z]{3,15}" title="In Lettres more than 3 letters, less than 8" value='<?php echo $LastName; ?>'><p>
        <p style='text-align:center; font-size:medium;'>Family Name: <input type='text' name='FamilyName'  pattern="[A-Za-z]{3,15}" title="In Lettres more than 3 letters, less than 8" value='<?php echo $FamilyName; ?>'><p>
        <p style='text-align:center; font-size:medium;'>Date Of Birth: <input type='date' name='DateOfBirth'  value='<?php echo $DateOfBirth; ?>'><p>
        <p style='text-align:center; font-size:medium;'>Mobile: <input type='text' name='Mobile' value='0<?php echo $Mobile; ?>'><p>
        <p style='text-align:center; font-size:medium;'>Mobile Two: <input type='text' name='MobileTwo' value='0<?php echo $MobileTwo; ?>'><p>
        <p style='text-align:center; font-size:medium;'>Home: <input type='text' name='Home' value='<?php echo $Home; ?>'><p>
        <p style='text-align:center; font-size:medium;'>Address: <input type='text' name='Address' pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number
         and one uppercase and lowercase letter, and at least 8 or more characters" value='<?php echo $Address; ?>'><p>
        <p style='text-align:center; font-size:medium;'>Hobby: <input type='text' name='Hobby' pattern="[A-Za-z]{1,15}" title="In Lettres" value='<?php echo $Hobby; ?>'><p>
        <p style='text-align:center; font-size:medium;'>School: <input type='text' name='School' 
        pattern="[A-Za-z]{3,20}" title="InLettres more than 3 letters, less than 20" value='<?php echo $School; ?>'><p>
        <p style='text-align:center; font-size:medium;'>Password: <input type='text' name='Password' value='<?php echo $UserP; ?>'><p>
        <br>
       
        <input type="submit" name="save" value="Submit" style="color:blue"  >
    </form>
        
        
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