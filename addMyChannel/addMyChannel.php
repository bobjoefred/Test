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

      $userid = $_GET["userid"];
      $channelid = $_GET["channelid"];

   // Insert new record into MyChannels table 
$result=mysqli_query($con, "INSERT into mychannels (userid, channelid)
                VALUES ($userid, $channelid)");

 mysqli_close($con);

     return true;


   } //end of addchannel 




} //end of class definition
$api = new addchannelAPI;
$api->addchannel();


?>

