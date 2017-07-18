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

      $eventid = $_GET["eventid"];
      $title = $_GET["title"];
      $description = $_GET["description"];
      $fromdate = $_GET["fromdate"];
      $todate = $_GET["todate"];


      //update record into channel table

      //mysqli_query($con, "UPDATE channel SET title='test1'
      //mysqli_query($con, "UPDATE channel SET title=\"$title\"  
      mysqli_query($con, "UPDATE events SET eventname=\"$title\", eventdescription=\"$description\", fromdate=STR_TO_DATE('$fromdate','%m/%d/%y, %h:%i %p'), todate=STR_TO_DATE('$todate','%m/%d/%y, %h:%i %p')
                WHERE eventid = $eventid");

                //WHERE channelid = 48"); 

echo "updated: $eventid";
echo "title: |$title|";

        mysqli_close($con);


     return true;


   } //end of addchannel 


} //end of class definition
$api = new addchannelAPI;
$api->addchannel();


?>
