<?php
session_start(); 
$Email=$_SESSION['email'];
 
$conn = new mysqli("localhost", "root", "","n_system");
           
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if(isset($_POST['send']))
            {
                 
                $Day=$_POST['Day'];
                $Start=$_POST['Start'];
                $ID=$_POST['ID'];
                if($ID=='Music')
                {
                    $ID1=1;
                }
                else if($ID=='Swimming')
                {
                    $ID1=2;
                }
                else if($ID=='Drawing')
                {
                    $ID1=3;
                }
                else if($ID=='Arabic')
                {
                    $ID1=4;
                }
                else if($ID=='English')
                {
                    $ID1=5;
                }
                else if($ID=='Quran')
                {
                    $ID1=6;
                }
                else if($ID=='Breakfast')
                {
                    $ID1=7;
                }
                else if($ID=='Lunch')
                {
                    $ID1=8;
                }
                else if($ID=='Nap')
                {
                    $ID1=9;
                }
                else if($ID=='Sports')
                {
                    $ID1=10;
                }
                if($Start=='1')
                {
                    $Start='12:00:00';
                    $End='12:30:00';
                }
              else if($Start=='2')
                {
                    $Start='01:00:00';
                    $End='01:30:00';
                }

               else if($Start=='1')
                {
                    $Start='02:00:00';
                    $End='02:30:00';
                }


                        $mysql="INSERT INTO schedule (Day,TimeStart,TimeEnd,Subject_ID) 
                        VALUES ('$Day','$Start','$End','$ID1')";
                        echo $mysql;
                        mysqli_query($conn,$mysql);
            }
            header("location: Adding_New_Schedule.php");  
    ?>