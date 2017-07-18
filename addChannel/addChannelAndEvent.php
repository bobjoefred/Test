<?php

class addchannelAPI {


   function addchannel() {


      $con=mysqli_connect("ip-172-31-26-234","SCUser1","password","snappchat");


      // Check connection
      if (mysqli_connect_errno()) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      header('HTTP/1.1.200.200');
      header('Content-type: text/html ');

      $title = $_GET["title"];
      $description = $_GET["description"];
      $location = $_GET["location"];
      $ownerid = $_GET["ownerid"];
      $lat = $_GET["lat"];
      $lon = $_GET["lon"];
      $fromdate = $_GET["fromdate"];
      $todate = $_GET["todate"];
      $private = $_GET["private"];
      $radius = $_GET["radius"];

//echo "******* INPUT: ";
//echo "<br/>";
//echo $title;
//echo "<br/>";
//echo $description;
//echo "<br/>";
//echo $location;
//echo "<br/>";
//echo $badgeimage;
 //echo "<br/>";
 //echo $foldername;
 //echo "<br/>";
// echo $ownerid;
// echo "<br/>";
// echo $lat;
// echo "<br/>";
// echo $lon;
// echo "<br/>";
// echo $private;
// echo "<br/>";
// echo "******** END OF INPUT";
// echo "<br/>";


   //Insert new record into Channel table
$result=mysqli_query($con, "INSERT into channels (title,description, locationname, ownerid, lat, lon, private_fl, searchradius)
                VALUES ('$title','$description','$location', $ownerid,$lat,$lon,$private, $radius)");

   // Get channelID that was created by autoincrement channelid column
   $channelid = mysqli_insert_id($con);
   echo $channelid;

   // Insert new record into Events table 
$result1=mysqli_query($con, "INSERT into events (channelid, eventname, eventdescription, fromdate, todate)
                VALUES ($channelid,'$title','$description','$fromdate','$todate')");


 mysqli_close($con);


     return true;


   } //end of addchannel 




} //end of class definition
$api = new addchannelAPI;
$api->addchannel();


?>

