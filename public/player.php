<?php # player.php

$page_title = 'nba-db';

require ('includes/header.html');
require ('includes/error.php');
require ('includes/player_search_form.html');
require ('includes/player_header.php');
require '../.private/config.php';
require ('../.private/db.php');

//------------------- FUNCTIONS -----------------------------------

// display database query results for individual player stats
function display_player_stats($res) {

  echo '<br><div class="stat-sheet"><h3>Regular Season Stats</h3><br>';

  // Table header:
  echo '<table class="player-tbl" cellspacing="5" cellpadding="5"
 width="75%">
	<tr class="player-stat-heading">
		<td align="left"><b>Year</b></td>
		<td align="left"><b>Team</b></td>
		<td align="left"><b>Lg</b></td>
		<td align="left"><b>G</b></td>
		<td align="left"><b>Min</b></td>
		<td align="left"><b>Pts</b></td>
		<td align="left"><b>PPG</b></td>
		<td align="left"><b>FGM</b></td>
		<td align="left"><b>FGA</b></td>
		<td align="left"><b>FGP</b></td>
		<td align="left"><b>FTM</b></td>
		<td align="left"><b>FTA</b></td>
		<td align="left"><b>FTP</b></td>
		<td align="left"><b>3PM</b></td>
		<td align="left"><b>3PA</b></td>
		<td align="left"><b>3PP</b></td>
		<td align="left"><b>ORB</b></td>
		<td align="left"><b>DRB</b></td>
		<td align="left"><b>TRB</b></td>
		<td align="left"><b>RPG</b></td>
		<td align="left"><b>AST</b></td>
		<td align="left"><b>APG</b></td>
		<td align="left"><b>STL</b></td>
		<td align="left"><b>BLK</b></td>
		<td align="left"><b>TO</b></td>
		<td align="left"><b>PF</b></td>
	</tr>
';

  // Fetch and print all the records:
  while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    echo '<tr class="player-stat">
			<td align="left">' . $row['year'] . '</td>
			<td align="left">' . $row['team'] . '</td>
			<td align="left">' . $row['lg'] . '</td>
			<td align="left">' . $row['g'] . '</td>
			<td align="left">' . $row['min'] . '</td>
			<td align="left">' . $row['pts'] . '</td>
			<td align="left">' . $row['ppg'] . '</td>
			<td align="left">' . $row['fgm'] . '</td>
			<td align="left">' . $row['fga'] . '</td>
			<td align="left">' . $row['fgp'] . '</td>
			<td align="left">' . $row['ftm'] . '</td>
			<td align="left">' . $row['fta'] . '</td>
			<td align="left">' . $row['ftp'] . '</td>
			<td align="left">' . $row['tpm'] . '</td>
			<td align="left">' . $row['tpa'] . '</td>
			<td align="left">' . $row['tpp'] . '</td>
			<td align="left">' . $row['orb'] . '</td>
			<td align="left">' . $row['drb'] . '</td>
			<td align="left">' . $row['trb'] . '</td>
			<td align="left">' . $row['rpg'] . '</td>
			<td align="left">' . $row['ast'] . '</td>
			<td align="left">' . $row['apg'] . '</td>
			<td align="left">' . $row['stl'] . '</td>
			<td align="left">' . $row['blk'] . '</td>
			<td align="left">' . $row['turnover'] . '</td>
			<td align="left">' . $row['pf'] . '</td>
		</tr>
		';
  }

  echo '</table></div>';

}

// display database query results for player career stats
function display_career_stats($res) {

  echo '<br><div class="stat-sheet"><h3>Career Stats</h3><br>';

  // Table header:
  echo '<table class="player-tbl" cellspacing="5" cellpadding="5"
 width="75%">
	<tr class="player-stat-heading">
		<td align="left"><b>Lg</b></td>
		<td align="left"><b>G</b></td>
		<td align="left"><b>Min</b></td>
		<td align="left"><b>Pts</b></td>
		<td align="left"><b>PPG</b></td>
		<td align="left"><b>FGM</b></td>
		<td align="left"><b>FGA</b></td>
		<td align="left"><b>FGP</b></td>
		<td align="left"><b>FTM</b></td>
		<td align="left"><b>FTA</b></td>
		<td align="left"><b>FTP</b></td>
		<td align="left"><b>3PM</b></td>
		<td align="left"><b>3PA</b></td>
		<td align="left"><b>3PP</b></td>
		<td align="left"><b>ORB</b></td>
		<td align="left"><b>DRB</b></td>
		<td align="left"><b>TRB</b></td>
		<td align="left"><b>RPG</b></td>
		<td align="left"><b>AST</b></td>
		<td align="left"><b>APG</b></td>
		<td align="left"><b>STL</b></td>
		<td align="left"><b>BLK</b></td>
		<td align="left"><b>TO</b></td>
		<td align="left"><b>PF</b></td>
	</tr>
';

  // Fetch and print all the records:
  while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    echo '<tr class="player-stat">
			<td align="left">' . $row['lg'] . '</td>
			<td align="left">' . $row['g'] . '</td>
			<td align="left">' . $row['min'] . '</td>
			<td align="left">' . $row['pts'] . '</td>
			<td align="left">' . $row['ppg'] . '</td>
			<td align="left">' . $row['fgm'] . '</td>
			<td align="left">' . $row['fga'] . '</td>
			<td align="left">' . $row['fgp'] . '</td>
			<td align="left">' . $row['ftm'] . '</td>
			<td align="left">' . $row['fta'] . '</td>
			<td align="left">' . $row['ftp'] . '</td>
			<td align="left">' . $row['tpm'] . '</td>
			<td align="left">' . $row['tpa'] . '</td>
			<td align="left">' . $row['tpp'] . '</td>
			<td align="left">' . $row['orb'] . '</td>
			<td align="left">' . $row['drb'] . '</td>
			<td align="left">' . $row['trb'] . '</td>
			<td align="left">' . $row['rpg'] . '</td>
			<td align="left">' . $row['ast'] . '</td>
			<td align="left">' . $row['apg'] . '</td>
			<td align="left">' . $row['stl'] . '</td>
			<td align="left">' . $row['blk'] . '</td>
			<td align="left">' . $row['turnover'] . '</td>
			<td align="left">' . $row['pf'] . '</td>
		</tr>
		';
  }

  echo '</table></div>';

}

// Retrieve player information by name
function do_query($dbc, $table, $player_name) {

  $query = '';

  // player_name will be in the form 'firstName_lastName'
  // (single string with underscore between first name and last name)

  // parse name
  $firstname = explode('_', $player_name)[0];
  $lastname = explode('_', $player_name)[1];

  if ($table == 'players') {
    $query = "SELECT * FROM $table
    WHERE (firstname = '$firstname') and (lastname = '$lastname')";

  } else if ($table == 'player_regular_season') {
    $query = "SELECT year, team, gp as g, leag as lg, minutes as min,
               pts, round((pts/gp),1) as ppg, fgm, fga,
               round((fgm/fga),3) as fgp,
               ftm, fta, round((fgm/fga),3) as ftp,
               tpm, tpa, round((tpm/tpa),3) as tpp,
               oreb as orb, dreb as drb, reb as trb,
               round((reb/gp),1) as rpg,
               asts as ast,round((asts/gp),1) as apg, stl, blk, turnover, pf
               FROM $table WHERE (firstname = '$firstname') and (lastname = '$lastname')
               order by year";

  } else if ($table == 'player_career') {
    $query = "SELECT gp as g, leag as lg, minutes as min,
               pts, round((pts/gp),1) as ppg, fgm, fga,
               round((fgm/fga),3) as fgp,
               ftm, fta, round((fgm/fga),3) as ftp,
               tpm, tpa, round((tpm/tpa),3) as tpp,
               oreb as orb, dreb as drb, reb as trb,
               round((reb/gp),1) as rpg,
               asts as ast,round((asts/gp),1) as apg, stl, blk, turnover, pf
               FROM $table WHERE (firstname = '$firstname') and (lastname = '$lastname')
               order by lg";

  } else {
    return null;
  }

  $res = @mysqli_query ($dbc, $query);

  $num = mysqli_num_rows($res);

  if ($num > 0) {
    return $res;
  } else {
    return null;
  }
}

function display_player_profile($res) {
  $row = mysqli_fetch_array($res, MYSQL_ASSOC);
  echo '<div class="profile">';
  echo '<p class="profile-name">'.$row['firstname'].' '.$row['lastname'].'</p>';
  echo '<p><span>Position: </span>'.$row['position'].'</p>';
  echo '<p><span>Height: </span>'.$row['h_feet'].'\''.$row['h_inches']
    .'<span> Weight: </span>'.$row['weight'].'</p>';

  $arr = date_parse($row['birthdate']);
  echo '<p><span>Born: </span>'.$arr['month'].'/'.$arr['day'].'/'.$arr['year']
    .'</p>';

  echo '<p><span>College: </span>'.$row['college'].'</p>';
  echo '</div>';
}
//------------------- END FUNCTIONS -----------------------------------

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  if (empty($_GET['player_name'])) {
    echo "<p class='error'>No player found.</p>";

  } else {

    // player_name will be in the form 'firstName_lastName'
    // (single string with underscore between first name and last name)
    $player_name = $_GET['player_name'];

    $table = 'players';
    $num = 0;
    $res = null;

    if ($res = do_query($dbc, 'players',$player_name)){
      display_player_profile($res);
      mysqli_free_result ($res);
    } else {
      echo "<p class='error'>No player profile found</p>";
    }

    if ( $res = do_query($dbc,'player_regular_season',$player_name)) {
      display_player_stats($res);
      mysqli_free_result ($res);
    } else {
      echo "<p class='error'>No player stats found</p>";
    }

    if ( $res = do_query($dbc,'player_career',$player_name)) {
      display_career_stats($res);
      mysqli_free_result ($res);
    } else {
      echo "<p class='error'>No player career stats found</p>";
    }
  }

}

mysqli_close($dbc);

include ('includes/footer.html');

?>
