<?php
    // AWS Info
    $bucketName = 'spmlmsmaterials';
    $IAM_KEY = 'AKIAR3OUAEMXP2SOFBKT';
    $IAM_SECRET = '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';

    require '../../vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    $keyPath = $_GET['keyPath'];
    var_dump($keyPath);

    // Get file
    try {
    // $s3 = S3Client::factory(
    //     array(
    //     'credentials' => array(
    //         'key' => $IAM_KEY,
    //         'secret' => $IAM_SECRET
    //     ),
    //     'version' => 'latest',
    //     'region'  => 'ap-southeast-1'
    //     )
    // );

    $s3 = new S3Client([
        'version' => '2006-03-01',
        'region'  => 'ap-southeast-1',
        'credentials' => [
            'key'    => $IAM_KEY,
            'secret' => $IAM_SECRET,
        ],
    ]);

    // curl.cainfo = "C:\wamp64\bin\php\php7.4.0\cacert.pem"

    // get Object
    $result = $s3->getObject(array(
        'Bucket' => $bucketName,
        'Key'    => $keyPath
    ));


    // Display it in the browser
    header("Content-Type: {$result['ContentType']}");
    header('Content-Disposition: filename="'.basename($keyPath).'"');
    echo $result['Body'];

    } catch (Exception $e) {
    die("Error: " . $e->getMessage());
    }