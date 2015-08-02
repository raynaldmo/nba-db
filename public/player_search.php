<?php # player_search.php

$page_title = 'nba-db';
require ('includes/header.html');
require ('includes/error.php');
require ('includes/player_search_form.html');
require ('includes/player_header.php');
require '../.private/config.php';
require ('../.private/db.php');

//-------------------- FUNCTIONS --------------------------------------

// display database query results for player search
function display_results($num, $r) {
  // echo "<p>Retrieved $num players.</p>\n";

  // Table header:
  echo '<table class="player-search-tbl" cellspacing="5" cellpadding="5"
 width="75%">
	<tr class="player-list-heading">
		<td align="left"><b>Player Name</b></td>
		<td align="left"><b>Years Played</b></td>
		<td align="center"><b>Position</b></td>
		<td align="left"><b>College</b></td>
	</tr>
';

  // Fetch and print all the records:
  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '<tr class="player-list">
			<td align="left"><a href="/player/' . urlencode($row['fname']) . '">' .
      $row['name'].'</a></td>
			<td align="center">' . $row['fs'] . ' - '. $row['ls'].'</td>
			<td align="center">' . $row['pos'] . '</td>
			<td align="left">' . $row['college'] . '</td>
		</tr>
		';
  }

  echo '</table>';

}

//------------------------ END FUNCTIONS -----------------------------------

// Logic for page:
// 1. Check if Post request
// 2. Get player last name
// 3. Build and execute query
// 4. Display results

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Check for name
  // more robust input checking than just using empty()
  if (! (filter_has_var(INPUT_POST, 'last_name') &&
    (strlen(filter_input(INPUT_POST, 'last_name')) > 0))) {
    echo "<p class='error'>Please enter player's last name</p>";

  } else {
    $lastname = mysqli_real_escape_string($dbc, trim($_POST['last_name']));

    // Define the query:
    $q = "SELECT ilkid as player_id, concat(lastname, ', ',firstname) as name,
            concat(firstname, '_', lastname) as fname,
            firstseason as fs, lastseason as ls, position as pos,
            college
            FROM players
            WHERE lastname = '$lastname'
            ORDER BY lastname ASC";

    $r = @mysqli_query ($dbc, $q);

    // Count the number of returned rows:
    $num = mysqli_num_rows($r);

    if ($num > 0) { // If it ran OK, display the records.
      display_results($num, $r);
      mysqli_free_result ($r);
    } else { // If no records were returned.
      echo "<p class='error'>No players with last name " .
        htmlentities($lastname) . " found.</p>";
    }

  }
}

mysqli_close($dbc);

?>

<?php include ('includes/footer.html'); ?>
