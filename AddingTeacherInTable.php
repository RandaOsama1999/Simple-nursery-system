<?php
 
$con=new mysqli("localhost","root","","n_system");
if(isset($_POST['Submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $familyname=$_POST['familyname'];

    $bday=$_POST['bday'];

    $d=strtotime("today");
    $date= date("Y-m-d", $d);
    $diff = date_diff(date_create($bday), date_create($date));

    $Age=$diff->format('%y');

    $gender=$_POST['gender'];

     
    $MobileNumber=$_POST['MobileNumber'];
    $MobileNumber2=$_POST['MobileNumber2'];

    $Home=$_POST['Home'];
    $Email=$_POST['Email'];
    $Subject=$_POST['sub'];

    $Password=$_POST['password'];
    $UserType=3;
    $Address=$_POST['Address'];
   

  

    $mysql="INSERT INTO users (Mail,Password,userType_ID,FirstName,LastName,FamilyName,DateOfBirth,Age,Gender,Mobile,Mobiletwo,Home,Address) 
     
    VALUES ('$Email','$Password','$UserType','$firstname','$lastname','$familyname','$bday' ,'$Age','$gender','$MobileNumber','$MobileNumber2' ,'$Home','$Address')";
   
    $mysql2="INSERT INTO teacher ( userType_ID,TeacherMail,Subject_ID) 
     
    VALUES ('$UserType','$Email',$Subject)";
   //echo $mysql;
   //echo $mysql2;
    mysqli_query($con,$mysql);
    mysqli_query($con,$mysql2);
}
header("Location:ManagerLoggedIn.php")
?>