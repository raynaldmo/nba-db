<?php # error.php

// Create error handler:
function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {

  // Build the error message:
  $message = "Error $e_number occurred in script '$e_file' on line $e_line:
  $e_message\n";

  // Append $e_vars to  $message:
  $message .= print_r ($e_vars, 1);

  if (!LIVE) { // Development (print the error).
    echo '<pre>' . $message . "\n";
      debug_print_backtrace();
      echo '</pre><br />';
  } else { // Don't show the error.
    echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div><br />';
  }

} // End of my_error_handler() definition.