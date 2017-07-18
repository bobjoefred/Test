<?php

class channelAPI {

   function getChannels() {
           echo "Testing PHP!!!! Have a great day :) " . mysqli_connect_error();
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


?>
