<?php
    require_once "./common.php";
    require '../../vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    $materialView = new MaterialView();

   // AWS Info
   
   $bucketName = 'spmlmsmaterials';
   $IAM_KEY = 'AKIAR3OUAEMXMLICWQ7R';
   $IAM_SECRET = '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';


    //Obtained
    $keyPath = $_GET['keyPath'];
    $materialId = $_GET['materialId'];
    $employeeId = $_GET['employeeId'];




    $result = $materialView->getS3($materialId, $employeeId);

    
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