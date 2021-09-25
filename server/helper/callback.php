<?php

include 'hybridauth-linkedin-master/hybridauth-linkedin-master/includes/hybridauth/autoload.php';
include 'hybridauth-linkedin-master/hybridauth-linkedin-master/config.php';
include '../model/UserDAO.php';
$dao = new UserDAO();

use Hybridauth\Exception\Exception;
use Hybridauth\Hybridauth;
use Hybridauth\HttpClient;

session_start();

try {
 
    $hybridauth = new Hybridauth($hybridauthConfig);

	// logout a user - hardcoded one specific provider
	// done BEFORE everything else
	// 		to avoid the error of if the token was revoked by the user
	if (isset($_GET['logout'])) {
		$adapter = $hybridauth->getAdapter('LinkedIn');
		$adapter->disconnect();

		$goTo = "/linkedin-test/?userLoggedOut=true";
		
		// if the user revoked the token, the trick is to log them out of HybridAuth then re-sign in
		// redirect them back to this page rather than the "you logged out" page
		if ( isset($_GET['relogin']) ) {
			$goTo = $hybridauthConfig['callback'];
		}

		header("Location: $goTo");
		exit();
	}

	// Gracefully handle if a user declines on the prompt to log in
	if (isset($_GET['error']) && ($_GET['error'] == 'user_cancelled_login' || $_GET['error'] == 'user_cancelled_authorize')) {
        header("Location: ../../index.html?" .  $_GET['error']);
        // header("Location: http://localhost/WAD2Project/guugle/guugle/home_page/home.html");
		exit();
	}


    // Log in the user with a specific provider
    /**
     * When invoked, `authenticate()` will redirect users to provider login page where they
     * will be asked to grant access to your application. If they do, provider will redirect
     * the users back to Authorization callback URL (i.e., this script).
     */

    $hybridauth->authenticate('LinkedIn');

    $adapters = $hybridauth->getConnectedAdapters();
   


    // these are the only fields returned
    // put these in your database table
    // when debugging, you may get an error if you print this out and then try to redirect the user (line 72)
    //		since you can't send headers after text is printed
    $userInfoLinkedIn = $adapters['LinkedIn']->getUserProfile();
    print "<br />identifier: " .$userInfoLinkedIn->identifier;
    print "<br />photoURL: " . $userInfoLinkedIn->photoURL;
    print "<br />displayName: " . $userInfoLinkedIn->displayName;
    print "<br />firstName: " . $userInfoLinkedIn->firstName;
    print "<br />lastName: " . $userInfoLinkedIn->lastName;
    print "<br />email: " . $userInfoLinkedIn->email;

    $id = $userInfoLinkedIn->identifier;
    $dname = $userInfoLinkedIn->displayName;
    $fname = $userInfoLinkedIn->firstName;
    $lname = $userInfoLinkedIn->lastName;
    $email = $userInfoLinkedIn->email;
    $photoURL = $userInfoLinkedIn->photoURL;

    // Shared with both Returning and New Users 
    $_SESSION['id'] = $id;

			if ($dao->checkCompletion($id)){
                $_SESSION['login'] = true;
                header("Location: ../../guugle-main/guugle/main_page/main.php" );
                // $url = '../../../main_page/main.html';
                // $data = array('id' => $id);
                // // use key 'http' even if you send the request to https://...
                // $options = array(
                //     'http' => array(
                //         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                //         'method'  => 'POST',
                //         'content' => http_build_query($data)
                //     )
                // );
                // $context  = stream_context_create($options);
                // $result = file_get_contents($url, false, $context);
                // if ($result === FALSE) {print"redirect failed"; }
            }
                
            else {
                if(!($dao->checkUser($id))){
                    if ($dao ->addUser($id, $dname, $fname, $lname, $email, $photoURL)){
                        header("Location: ../../profile_creation.php" );   
                    }

                    else {
                        echo "placeholder";
                    }
                }
                else {
                    header("Location: ../../profile_creation.php" ); 
                }
            }


    
    
   


                
    // ******************************************************
    //  Now that we have data on the user,
    // this is where you would store it in YOUR database
    // ******************************************************


    /**
     * Redirects user to home page (i.e., index.php in our case)
     */

    /*elseif(checkUser($hybridauth)){
        header("Location: ../")
    }
    */

    // Uncommented For Testing Purposes 
    // HttpClient\Util::redirect('/linkedin-test/index.php');
} 

catch (Exception $e) {
  
    // if we get this error, then just redirect the user back to this page, but logging them out
    // Signed API request has returned an error. HTTP error 401. Raw Provider API response: {"serviceErrorCode":65601,"message":"The token used in the request has been revoked by the user","status":401}

    if ( strpos($e->getMessage(), "65601") > 0) {       
       header("Location: " . $hybridauthConfig['callback'] . "?logout=true&relogin=true");
       exit();
    }

    echo $e->getMessage();

}
?>