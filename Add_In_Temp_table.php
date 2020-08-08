<?php
 
$con=new mysqli("localhost","root","","n_system");
if(isset($_POST['Submit']))
{
    $userType=2;
    $stateID=1;
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $familyname=$_POST['familyname'];

    $bday=$_POST['bday'];
    date_default_timezone_set("Africa/Cairo");
    $d=strtotime("today");
    $date= date("Y-m-d", $d);
    $diff = date_diff(date_create($bday), date_create($date));

    $Age=$diff->format('%y');

    $gender=$_POST['gender'];

    $MobileNumber=$_POST['MobileNumber'];
    $MobileNumber2=$_POST['MobileNumber2'];

    $Home=$_POST['Home'];
    $Address=$_POST['Address'];
    $schoolname=$_POST['schoolname'];
    $hobby=$_POST['hobby'];


    $parentfirstname=$_POST['parentfirstname'];
    $parentlastname=$_POST['parentlastname'];
    $parentfamilyname=$_POST['parentfamilyname'];

    $parentbday=$_POST['parentbday'];

    $d2=strtotime("today");
    $datetwo= date("Y-m-d", $d2);
    $diff = date_diff(date_create($parentbday), date_create($datetwo));
    $parentAge=$diff->format('%y');

    $parentgender=$_POST['parentgender'];
    $Job=$_POST['Job'];
    $Email=$_POST['PersonalMail'];

    $nurseryMail=$firstname.$MobileNumber."@gmail.com";
    $nurseryPass=$_POST['password'];
    $rePass=$_POST['repassword'];

    $currentchildmail=$_POST['currentchildmail'];
    if($currentchildmail=="")
    {
        $mysql="INSERT INTO users (Mail,Password,userType_ID,FirstName,LastName,FamilyName,DateOfBirth,Age,Gender,Mobile,Mobiletwo,
        Home,Address) 
        VALUES ('$nurseryMail','$nurseryPass','$userType','$firstname','$lastname','$familyname','$bday'
        ,'$Age','$gender','$MobileNumber','$MobileNumber2' ,'$Home','$Address')";

        $mysqlThree="INSERT INTO parent (FirstName,LastName,FamilyName,DateOfBirth,Age,Gender,Job,PersonalMail) 
        VALUES ('$parentfirstname','$parentlastname','$parentfamilyname'
        ,'$parentbday','$parentAge','$parentgender','$Job','$Email')";
        mysqli_query($con,$mysql);
        mysqli_query($con,$mysqlThree);

        $Parent_ID=mysqli_insert_id($con);

        $mysqlTwo="INSERT INTO child (userType_ID,Parent_ID,ChildMail,Hobby,School,State_ID)
        VALUES ('$userType','$Parent_ID','$nurseryMail','$hobby','$schoolname','$stateID')";
        mysqli_query($con,$mysqlTwo); 

    }
    else{
        $sql = "SELECT * FROM child WHERE ChildMail='$currentchildmail'";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
            if($row==true)
            {
                $Parent_ID=$row['Parent_ID'];
                $mysql="INSERT INTO users (Mail,Password,userType_ID,FirstName,LastName,FamilyName,DateOfBirth,Age,Gender,Mobile,Mobiletwo,
                Home,Address) 
                VALUES ('$nurseryMail','$nurseryPass','$userType','$firstname','$lastname','$familyname','$bday'
                ,'$Age','$gender','$MobileNumber','$MobileNumber2' ,'$Home','$Address')";
                        
                $mysqlTwo="INSERT INTO child (userType_ID,Parent_ID,ChildMail,Hobby,School,State_ID)
                VALUES ('$userType','$Parent_ID','$nurseryMail','$hobby','$schoolname','$stateID')";
                
                mysqli_query($con,$mysql);
                mysqli_query($con,$mysqlTwo);
            }
        }
    }
}

$msg="Thanks for registeration ,Use this Mail to Login= ".$nurseryMail;
echo "
<div id='myModal' class='modal'>

<div class='modal-header'>
<span class='close'>&times;</span>
<h2 class='header'>".$msg."</h2>
</div>
</div>";

//header("Location:Nursery.html");
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
               $(document).ready(function(){
                $(".close").click(function(){
                    location.replace("http://localhost/Project/Nursery.html")
                });
            });
        </script>

        <style>
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
    
</body>
</html>