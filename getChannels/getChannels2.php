<?php

class channelAPI {

   function getChannels() {
      $con=mysqli_connect("ip-172-31-26-234","SCUser1","password","snappchat");
      // Check connection
      if (mysqli_connect_errno()) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

           //sendResponse(200, 'testing results!!!');

    header('HTTP/1.1.200.200');
    header('Content-type: text/html ');

           $userid = $_GET["userid"];


$result = mysqli_query($con,
"SELECT a.channelid, a.title, a.description, a.locationname, a.lat, a.lon, a.ownerid, a.searchradius, a.channelid
FROM channels a
inner join mychannels b on a.channelid = b.channelid 
WHERE b.userid = $userid" );

 while($row = mysqli_fetch_array($result)) {
               echo $row['title'];
               echo "<col>";
               echo $row['description'];
               echo "<col>";
               echo $row['locationname'];
               echo "<col>";
               echo $row['lat'];
               echo "<col>";
               echo $row['lon'];
               echo "<col>";
               echo $row['ownerid'];
               echo "<col>";
               echo $row['searchradius'];
               echo "<col>";
               echo $row['channelid'];
               echo "<col>";

$lat = $row['lat'];
$lon = $row['lon'];
$searchradius = $row['searchradius'];
            
     $result1 = mysqli_query($con,
     "SELECT a.photoid, a.lat, a.lon, a.datetaken, a.userid, a.filename, a.mediatype, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) as distance 
     FROM photos a
     HAVING distance <=$searchradius
     ORDER BY datetaken DESC
     LIMIT 15");

     while($row1 = mysqli_fetch_array($result1)) {
               //echo $row1['lat'];
               //echo "<col>";
               //echo $row1['lon'];
               //echo "<col>";
               echo $row1['filename'];
               echo "<col>";
               echo $row1['mediatype'];
               echo "<col>";
           } // end while row1

      echo "<br>";


 } // end while row



           mysqli_close($con);

//echo "Row Inserted.";
//echo json_encode($result);

           //sendResponse(200, json_encode($result));
          return true;




   } //end of getChannels

// Helper method to get a string description for an HTTP status code
// From http://www.gen-x-design.com/archives/create-a-rest-api-with-php/ 
function getStatusCodeMessage($status)
{
    // these could be stored in a .ini file and loaded
    // via parse_ini_file()... however, this will suffice
    // for an example
    $codes = Array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    );

    return (isset($codes[$status])) ? $codes[$status] : '';
}

// Helper method tt-URI Too Long',
function sendResponse($status = 200, $body = '', $content_type = 'text/html')
{
    $status_header = 'HTTP/1.1 ' . $status . ' ' . getStatusCodeMessage($status);
    header($status_header);
    header('Content-type: ' . $content_type);
    echo $body;
}


} //end of class definition

$api = new channelAPI;
$api->getChannels();


?>

