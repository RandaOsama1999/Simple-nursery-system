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
    header('location: ManagerLoggedIn.php');
  }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                    var currentTime = new Date();
                    var currentyear = currentTime.getFullYear();

                    y2=document.forms["myForm"]["bday"].value;
                     
                    var YearOFParent=0;
                    for (var i = 0; i< 4; i++)
                    {
                        var year2= y2.charAt(i);
                        YearOFParent+=year2;
                        
                    }
                  
                     
                    if(currentyear-YearOFParent<20|| currentyear-YearOFParent>50)
                    {
                        alert("Year of Teacher is not accepted :(");
                        return false;

                    }

                   x=document.getElementsByName("gender") 
                    var a=0;
                    for(i=0;i<x.length;i++) 
                    {
                    if(x.item(i).checked == false)
                    {
                     a++;
                    }
                    }
                     if(a == x.length) 
                     {
                    alert("Please select your gender");
                    return false;
                     }

                     x=document.forms["myForm"]["MobileNumber"].value;
                    if (x.length!=11 || isNaN(x) ) 
                    {
                        alert("InCorrect Mobilenumber1");
                        return false;
                    }
                    x1=document.forms["myForm"]["MobileNumber2"].value;
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
                    //////////////////////////////////
                    x=document.forms["myForm"]["Home"].value
                    if (x.length!=8 || isNaN(x)) 
                    {
                        alert("InCorrect Homenumber");
                        return false;
                    }
                   

                     var password = document.forms["myForm"]["password"].value
                    , confirm_password = document.forms["myForm"]["repassword"].value;
                    if (password.length<4) 
                    {
                        alert("Password should be more than or equal 4");
                        return false;
                    }
                    if(password != confirm_password) {
                        alert("Passwords Don't Match");
                        return false;
                    }
                    y2=document.forms["myForm"]["Email"].value;
                     
                     for (var i = 0; i< y2.length; i++)
                     {
                         if(y2.charAt(i)=="'")
                         {
                            alert("Personal Email not accepted :(");
                            return false;
                         }
                         
                     }

                      }  
            </script>

<div class="FORM">
        <h2 style="text-align:center; color: rgba(196, 90, 143, 0.836);">Add this info of the teacher</h2>
                <form name="myForm" action="AddingTeacherInTable.php" id="Form"
                onsubmit="return validateForm()" method="post">
                
        
                    First name*: <input type="text" name="firstname" pattern="[A-Za-z]{3,15}" title="InLettres more than 3 letters, less than 8" required> 
                    Last name*:<input type="text" name="lastname" pattern="[A-Za-z]{3,15}" title="InLettres more than 3 letters, less than 8" required>
                    Family name*:<input type="text" name="familyname" pattern="[A-Za-z]{3,15}" title="InLettres more than 3 letters, less than 8" required>
                    <br>
                    <br>
                    Date of Birth*:<input type="date" name="bday"  required>
                    <br>
                   <br>
                   Gender*:
                    <input type="radio" name="gender" value="male"  > Male
                    <input type="radio" name="gender" value="female"   > Female
                    <br>
                    <br>
                    MobileNumber*:  <input type="text" name="MobileNumber"required>
                    MobileNumber2*: <input type="text" name="MobileNumber2"required>
                    Home*: <input type="text" name="Home"required>
                    <br>
                    <br>
                    Address*: 
                    <input type="text" name="Address" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <br>
                    <br>
                    Subject*:
                <select name='sub' required>
                   <option value="1">1-Music</option>
                   <option value="2">2-Swimming</option>
                   <option value="3">3-Drawing</option>
                   <option value="4">4-Arabic</option>
                   <option value="5">5-English</option>
                   <option value="6">6-Quran</option>
                   <option value="7">7-Breakfast</option>
                   <option value="8">8-Lunch</option>
                   <option value="9">9-Nap</option>
                   <option value="10">10-Sports</option>
                </select>
                   <br>
                   <br>
                    Email*: 
                    <input type="email" name="Email" required>
                    
                    Password*: 
                    <input type="password" name="password" pattern="[A-Za-z]{3,8}" title="InLettres more than 3 letters, less than 8" required>
                    Repeat Password*:
                <input type="password" name="repassword" pattern="[A-Za-z]{3,8}" title="InLettres more than 3 letters, less than 8" required>
                    <br>
                    <br>
                
                    <input type="submit" name="Submit" value="Submit" style="color:blue">
                    
                    </form>
                    </div>
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