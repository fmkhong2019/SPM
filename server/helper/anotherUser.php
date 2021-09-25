
<?php 
// Failed attempt at trying to log a user out permanently
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../../guugle-main/guugle/home_page/login.html" );

?>