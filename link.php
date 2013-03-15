<?
if(!isset($_POST['url']))
die();
$url = $_POST['url'];

$ex = explode('.', $url);
$songid = $ex[count($ex) - 2];

include "convert_song_code.php";

$song = $data;

include "player.php";

?>
