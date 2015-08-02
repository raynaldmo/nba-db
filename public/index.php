<?php # index.php

$page_title = 'nba-db';
require ('includes/header.html');
require ('includes/error.php');
require ('includes/player_search_form.html');
require ('includes/player_header.php');
require '../.private/config.php';
require ('../.private/db.php');

//------------------- FUNCTIONS -----------------------------------

// display database query results for player list
function display_results($num, $r, $lt) {
  // echo "<p>Retrieved $num players.</p>\n";

  echo "<h1 style='border: none'>$lt</h1>";

  // Table header:
  echo '<table class="player-tbl" cellspacing="5" cellpadding="5"
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
			<td align="left">' . ($row['college'] != NULL ? $row['college'] : "None") . '</td>
		</tr>
		';
  }

  echo '</table>';

}

//------------------- END FUNCTIONS -----------------------------------

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // 1. Get letter value
  // based on letter value, display appropriate player list page

  if (! isset($_GET['lt'])) {
    $lt = 'A'; // default
  } else {
    $lt = $_GET['lt'];
  }

  // is_string($lt) ? print('<p>$lt is a string</p>') :
  //  print('<p>$lt is not a string</p>');

  // echo "<p>letter is $lt</p>";

  // 2. Based on letter value, build appropriate sql query

  // Define the query:
  $q = "SELECT ilkid as player_id, concat(lastname, ', ',firstname) as name,
        concat(firstname, '_', lastname) as fname,
        firstseason as fs, lastseason as ls, position as pos,
        college
        FROM players
        WHERE lastname LIKE '$lt%'
        ORDER BY lastname ASC";

  $r = @mysqli_query ($dbc, $q);

  // Count the number of returned rows:
  $num = mysqli_num_rows($r);

  if ($num > 0) { // If it ran OK, display the records.

    display_results($num, $r, $lt);

    mysqli_free_result ($r);

  } else { // If no records were returned.
    echo '<p class="error">No players found.</p>';
  }

}

mysqli_close($dbc);

?>

<?php include ('includes/footer.html'); ?>
