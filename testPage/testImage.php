<?php
require 'vendor/autoload.php';
//use Aws\S3\S3Client;
//use Aws\Common\Credentials\Credentials;
//$credentials = new Credentials('AKIAIOXQQ66CV5AI3MCQ', 'A115FOBhdx7+Oc6BSfWQsNKvTeRxLQ7FSTlS1Q50');
// Instantiate the S3 client with your AWS credentials
/*$s3Client = S3Client::factory(array(
    'credentials' => array(
        'key'    => 'AKIAIOXQQ66CV5AI3MCQ',
        'secret' => 'A115FOBhdx7+Oc6BSfWQsNKvTeRxLQ7FSTlS1Q50',
    )
));*/
$sharedConfig = [
    'region'  => 'us-west-2',
    'version' => 'latest',
	'credentials' => [
        'key'    => 'AKIAIOXQQ66CV5AI3MCQ',
        'secret' => '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',
    ]

];
// Create an SDK class used to share configuration across clients.
$sdk = new Aws\Sdk($sharedConfig);

// Create an Amazon S3 client using the shared configuration data.
$s3 = $sdk->createS3();
$result = $s3->listBuckets();

foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}

echo("Hello World!");
?>
