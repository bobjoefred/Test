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

      $channelid = $_GET["channelid"];
      $title = $_GET["title"];
      $description = $_GET["description"];
      $location = $_GET["location"];
      $lat = $_GET["lat"];
      $lon = $_GET["lon"];
      $radius = $_GET["radius"];


      //update record into channel table

      //mysqli_query($con, "UPDATE channel SET title='test1'
      //mysqli_query($con, "UPDATE channel SET title=\"$title\"  
      mysqli_query($con, "UPDATE channels SET title=\"$title\", description=\"$description\", locationname=\"$location\", lat=$lat, lon=$lon, searchradius=$radius
                WHERE channelid = $channelid");

                //WHERE channelid = 48"); 

echo "updated: $channelid";
echo "title: |$title|";

        mysqli_close($con);


     return true;


   } //end of addchannel 


} //end of class definition
$api = new addchannelAPI;
$api->addchannel();


?>
