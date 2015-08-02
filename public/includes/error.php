<?php # error.php

// Create error handler:
function my_error_handler($errno, $errstr, $errfile, $errline, $errcontext) {

  $levels = array (
    E_WARNING =>  "Warning",
    E_NOTICE =>  "Notice",
    E_USER_ERROR =>  "User Error",
    E_USER_WARNING =>  "User Warning",
    E_USER_NOTICE =>  "User Notice",
    E_STRICT =>  "Strict warning",
    E_RECOVERABLE_ERROR =>  "Recoverable error",
    E_DEPRECATED =>  "Deprecated feature",
    E_USER_DEPRECATED =>  "Deprecated feature"
  );

  $message = date( "Y-m-d H:i:s - ");
  $message .= $levels[$errno] . ' ('. $errno . ')'. " : $errstr in $errfile,
  line $errline\n";

  // $message .= 'Log to file ' . $admin_path . APPLOG . "\n\n";

  $message .= "Variables:\n";
  $message .= print_r( $errcontext, true ) . "\n\n";

  if (!LIVE) { // Development (print the error).
    echo '<pre>' . $message . "\n";
    debug_print_backtrace();
    echo '</pre><br />';
  } else {  // Live deployment
    file_put_contents( 'php://stderr', $message);

    $ok = array(E_NOTICE, E_USER_NOTICE, E_WARNING, E_USER_WARNING);
    if (! in_array($errno, $ok)) {
      die('<div style="color:orangered">&lt;&lt;A system error occurred.
        Try reloading the page.&gt;&gt;</div>');
    }
  }
}