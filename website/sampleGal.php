<?php

echo "<title>iPhotoCast</title>
                 <link href='https://fonts.googleapis.com/css?family=Playfair+Display:900|Raleway:300' rel='stylesheet' type='text/css'>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">
        <div id=\"nav\">
    <div id=\"nav_wrapper\">
        <ul>
            <li><a href=\"#\">Home</a>
            </li>
            <li> <a href=\"#\">item #2</a>
            </li>
            <li> <a href=\"#\">Album</a>

                <ul>
                    <li><a href=\"#\">dropdown #1 item #1</a>
                    </li>
                    <li><a href=\"#\">dropdown #1 item #2</a>
                    </li>
                    <li><a href=\"#\">dropdown #1 item #3</a>
                    </li>
                </ul>
            </li>
            <li> <a href=\"#\">dropdown #2</a>

                <ul>
                    <li><a href=\"#\">dropdown #2 item #1</a>
                    </li>
                    <li><a href=\"#\">dropdown #2 item #2</a>
                    </li>
                    <li><a href=\"#\">dropdown #2 item #3</a>
                    </li>
                </ul>
            </li>
            <li> <a href=\"#\">item #3</a>
            </li>
        </ul>
    </div>
</div>
";

class channelAPI {

   function loadResults(){

	$result = mysqli_query($con,
"SELECT a.photoid, a.lat, a.lon, a.datetaken, a.userid, a.filename, a.mediatype,((ACOS(SIN($latParam * PI() / 180) * SIN(lat * PI() / 180) + COS($latParam * PI() / 180) * COS(lat * PI() / 180) * COS(($lonParam - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) as distance
FROM photos a
HAVING distance <=$distance
ORDER BY datetaken DESC");


	$total = 1;
	$counter = 1;

        echo "<table border = 0>";
 	while($row = mysqli_fetch_array($result)) {
               if($counter > 3){
                echo "<tr>";
               }

               echo "<td>";
               $output = (" <img src=\"https://s3-us-west-1.amazonaws.com/snappcastphotos/images/" . $row['filename'] . "\" alt=\"Forest\" width=\"600\" height=\"400\">");
               echo $output;
               echo "</td>";
               echo "<td>";
               echo $counter;
               echo "</td>";

               if($counter > 2){
                echo "</tr>";
                $counter = 0;
               }
               $counter = $counter + 1;
               $total = $total + 1;
               if($total > 30)
                break;
           }

	echo "</table>";

	if($total > 30){
        	echo "<div <button class=\"button\" onclick=\"alert('Hello world!')\">Load More</button> </div>";
	}

   }	

   function tester(){
	echo"ASDFOIJADSFDJSAIOFJSAOD";
   }

   function getChannels() {
      $con=mysqli_connect("ip-172-31-26-234","SCUser1","password","snappchat");
      // Check connection
      if (mysqli_connect_errno()) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

           //sendResponse(200, 'testing results!!!');

    header('HTTP/1.1.200.200');
    header('Content-type: text/html ');

	   $latParam = $_GET["lat"];
           $lonParam = $_GET["lon"];
           $distance = $_GET["distance"];
	   
//echo "( 2: current location $lat, $lon ");
	   //echo "<br>";
$result = mysqli_query($con, 
"SELECT a.photoid, a.lat, a.lon, a.datetaken, a.userid, a.filename, a.mediatype,((ACOS(SIN($latParam * PI() / 180) * SIN(lat * PI() / 180) + COS($latParam * PI() / 180) * COS(lat * PI() / 180) * COS(($lonParam - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) as distance 
FROM photos a
HAVING distance <=$distance 
ORDER BY datetaken DESC");


$total = 1;
$counter = 1;

        echo "<table border = 0>";
 while($row = mysqli_fetch_array($result)) {
               if($counter > 3){
                echo "<tr>";
               }

               echo "<td>";
               $output = (" <img src=\"https://s3-us-west-1.amazonaws.com/snappcastphotos/images/" . $row['filename'] . "\" alt=\"Forest\" width=\"600\" height=\"400\">");
               echo $output;
               echo "</td>";
               echo "<td>";
               echo $counter;
               echo "</td>";

               if($counter > 2){
                echo "</tr>";
                $counter = 0;
               }
               $counter = $counter + 1;
               $total = $total + 1;
               if($total > 30)
                break;
           }

echo "</table>";

if($total > 30){
	echo"<button type=\"button\" onclick=\"tester\">Click Me!</button>";
}



//echo " <img src=\"https://s3-us-west-1.amazonaws.com/snappcastphotos/images/1342CEC2-92B1-42AF-8156-2486587D7ED9-14981-000012167ED688D9\" alt=\"Forest\" width=\"600\" height=\"400\">";

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
 
// Helper method to send a HTTP response code/message
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

echo $test
?>
