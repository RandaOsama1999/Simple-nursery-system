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
  if(isset($_GET['save']))
  {
    header('location: SearchSchedule.php');
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
border:1px solSubject_IDblack;
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
        <div id="data">
        <?php
            $email = $_SESSION['email']; 
            $servername = "localhost";
            $name = "root";
            $pass = "";
            
            // Create connection
            $conn = new mysqli($servername, $name, $pass);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            

            $Schedule_ID=$_GET['Schedule_ID'];

            $sql = "SELECT *  FROM n_system.schedule WHERE Schedule_ID='$Schedule_ID' ";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc())
            {
                if($row==true)
                {
                   $Day=$row['Day'];
                   $TimeStart=$row['TimeStart'];
                   $TimeEnd=$row['TimeEnd'];
                }
                
            }

           $sql2 = "SELECT subject.SubjectName, subject.Subject_ID from n_system.subject, n_system.schedule WHERE
            subject.Subject_ID=schedule.Subject_ID AND Schedule_ID='$Schedule_ID'" ; 

            $result2 = $conn->query($sql2);
            while($row2 = $result2->fetch_assoc())
            {
                if($row2==true)
                {
                   $SubjectName=$row2['SubjectName'];
                   $Subject_ID=$row2['Subject_ID'];
                }
                
            }
            



            if(isset($_POST['save']))
            {  
                $TimeStart=$_POST['TimeStart'];
                $SubjectName=$_POST['SubjectName'];

                if($SubjectName=='Music')
                {
                    $Subject_ID=1;
                }
                else if($SubjectName=='Swimming')
                {
                    $Subject_ID=2;
                }
                else if($SubjectName=='Drawing')
                {
                    $Subject_ID=3;
                }
                else if($SubjectName=='Arabic')
                {
                    $Subject_ID=4;
                }
                else if($SubjectName=='English')
                {
                    $Subject_ID=5;
                }
                else if($SubjectName=='Quran')
                {
                    $Subject_ID=6;
                }
                else if($SubjectName=='Breakfast')
                {
                    $Subject_ID=7;
                }
                else if($SubjectName=='Lunch')
                {
                    $Subject_ID=8;
                }
                else if($SubjectName=='Nap')
                {
                    $Subject_ID=9;
                }
                else if($SubjectName=='Sports')
                {
                    $Subject_ID=10;
                }
                if($TimeStart=='1')
                {
                    $TimeStart='12:00:00';
                    $TimeEnd='12:30:00';
                }
              else if($TimeStart=='2')
                {
                    $TimeStart='01:00:00';
                    $TimeEnd='01:30:00';
                }

               else if($TimeStart=="3")
                {
                    $TimeStart='02:00:00';
                    $TimeEnd='02:30:00';
                }
                
                $sql1="UPDATE  n_system.schedule SET Subject_ID='$Subject_ID', TimeStart='$TimeStart', TimeEnd='$TimeEnd'  WHERE Schedule_ID='$Schedule_ID' ";

                $result1=mysqli_query($conn,$sql1);
            }


            $conn->close();
            
        ?>
        <form action="" method="post"  id="form">
        <h2 style="text-align:center; color: rgba(196, 90, 143, 0.836);">Edit Schedule </h2>
        <br>
        
        <p style='text-align:center; font-size:medium;'>Day:<?php echo $Day; ?><p>


        <h2>Subject</h2>
                <select name='SubjectName' required>
                   <option value="Music">1-Music</option>
                   <option value="Swimming">2-Swimming</option>
                   <option value="Drawing">3-Drawing</option>
                   <option value="Arabic">4-Arabic</option>
                   <option value="English">5-English</option>
                   <option value="Quran">6-Quran</option>
                   <option value="Breakfast">7-Breakfast</option>
                   <option value="Lunch">8-Lunch</option>
                   <option value="Nap">9-Nap</option>
                   <option value="Sports">10-Sports</option>
                </select>

        <h2>Time Start</h2>
                <select name='TimeStart' required>
                   <option value="1">12:00:00</option>
                   <option value="2">01:00:00</option>
                   <option value="3">02:00:00</option>
                </select>

        
        <br>
        <button class="btn" name="save" style=" margin-bottom:2%;">Save</button>
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