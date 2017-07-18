<?php

// Include the AWS SDK using the Composer autoloader.
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucket = 'snappcastphotos';
$keyname = '*** Your Object Key ***';

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-west-1'
]);

// Use the us-west-2 region and latest version of each client.
$sharedConfig = [
    'region'  => 'us-west-1',
    'version' => 'latest',
    'credentials' => [
        'key'    => 'AKIAIOXQQ66CV5AI3MCQ',
        'secret' => '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',
    ]
];

// Create an SDK class used to share configuration across clients.
$sdk = new Aws\Sdk($sharedConfig);

// Create an Amazon S3 client using the shared configuration data.
$s3client = $sdk->createS3();

$result = $s3client->listBuckets();						
foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}
/*
$promise = $s3Client->listBucketsAsync();
// Block until the result is ready.
$result = $promise->wait();
*/

echo "about to PutObject";
// Send a PutObject request and get the result object.
/*
$result = $s3Client->putObject([
    'Bucket' => 'snappcastphotos',
    'Key'    => 'dadPHPTest',
    'Body'   => 'this is the body!'
]);
*/

$result = $s3Client->putObject(array(
    'Bucket'     => 'snappcastphotos',
    'Key'        => 'dadPHPTest',
    'Body'       => 'this is the body!'
));

echo "about to GetObject";
/*
// Download the contents of the object.
$result = $s3Client->getObject([
    'Bucket' => 'snappcastphotos',
    'Key'    => 'bingo1'
]);

// Print the body of the result by indexing into the result object.
echo $result['Body']
;

*/

// Instantiate the client.
//$s3 = S3Client::factory();

//$s3 = Aws\S3\S3Client::factory();

//$s3::factory();

/*
try {
    // Upload data.
    $result = $s3->putObject(array(
        'Bucket' => $bucket,
        'Key'    => $keyname,
        'Body'   => 'Hello, world!',
        'ACL'    => 'public-read'
    ));

    // Print the URL to the object.
    echo $result['ObjectURL'] . "\n";
} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}
*/

echo "Hello ";
