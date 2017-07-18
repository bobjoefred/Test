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
      $userid = $_GET["userid"];
      $lat = $_GET["lat"];
      $lon = $_GET["lon"];
      $fromdate = $_GET["fromdate"];
      $todate = $_GET["todate"];
      $private = $_GET["private"];
      $radius = $_GET["radius"];


   //Insert new record into Channel table
$result=mysqli_query($con, "INSERT into channels (title,description, locationname, ownerid, lat, lon, private_fl, searchradius)
                VALUES ('$title','$description','$location', $userid,$lat,$lon,$private, $radius)");

   // Get channelID that was created by autoincrement channelid column
   $channelid = mysqli_insert_id($con);
   echo $channelid;

   // Insert new record into MyChannels table 
$result1=mysqli_query($con, "INSERT into mychannels (userid, channelid)
                VALUES ($userid, $channelid)");


 mysqli_close($con);


     return true;


   } //end of addchannel 




} //end of class definition
$api = new addchannelAPI;
$api->addchannel();


?>

