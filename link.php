<?
if(!isset($_POST['url']))
die();

function get_mp3($url)
{
	$ex = explode('.', $url);
	$song_key = $ex[count($ex) - 2];
	 
	// get content from api
	$api_result = file_get_contents("http://www.nhaccuatui.com/download/song/$song_key");
	 
	$r = json_decode($api_result);
	 
	if($r == null)
	{
		return false;
		exit(0);
	}
	 
	// check error_code
	if($r->error_code != 0)
	{
		return "ERROR: ".$r->error_message;
	}
	// get download link
	return $r->data->stream_url;
}
?>

<div id="player" style="position: fixed; bottom: 0; right: 0;">
<?

$song = get_mp3($_POST['url']);
if($song == 'ERROR: Invalid Login')
{
?>
	<script type="text/javascript">
		$('a[link="<?= ($_POST['url']) ?>"]').addClass('muted').html('Require Login');
	</script>
<?
}
else
{
?>
<script src="build/mediaelement-and-player.min.js"></script>
    <link rel="stylesheet" href="build/mediaelementplayer.min.css" />
<audio id="player2" src="<?= $song ?>" type="audio/mp3" controls="controls" autoplay="">		
</audio>

<script>
$('.playing').remove();
$('a[link="<?= ($_POST['url']) ?>"]').html( '<i class="icon icon-music playing"></i> ' + $('a[link="<?= ($_POST['url']) ?>"]').html());

$('audio,video').mediaelementplayer(
	{
		loop: true,
		features: ['playpause','progress','current','duration','tracks','volume'],
	}
	);
</script>
<?
}
?>
</div>