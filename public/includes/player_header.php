<?php
$letter_A = 0x41;
echo '<div class="index-line"';
echo "<p>Index: ";

for ($i = 0; $i < 26; $i++) {
  $val = chr($letter_A + $i);
  echo "<a class='index' href='/playerlist/" . $val. "'>" . $val . "</a>";
}
echo '</p></div>';