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
      $fromdate = $_GET["fromdate"];   
      $todate = $_GET["todate"];   
      $tag1 = $_GET["tag1"];   
      $tag2 = $_GET["tag2"];   
      $tag3 = $_GET["tag3"];  

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



      //Insert new record into channel table
$result=mysqli_query($con, "INSERT into events (channelid, eventname, eventdescription, fromdate, todate, usertag1, usertag2, usertag3)
                VALUES ($channelid,'$title','$description',STR_TO_DATE('$fromdate','%m/%d/%y, %h:%i %p'), STR_TO_DATE('$todate','%m/%d/%y, %h:%i %p'),'$tag1','$tag2','$tag3')");

      // Get channelID that was created by autoincrement channelid column
//echo     '<br>mysql_insert_id: ', mysqli_insert_id($con);

//      $channelid = mysqli_insert_id($con);


//	echo $channelid;

        mysqli_close($con);


     return true;


   } //end of addchannel 




} //end of class definition
$api = new addchannelAPI;
$api->addchannel();


?>

