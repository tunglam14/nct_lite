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
	$data['link'] = $r->data->stream_url;
	$data['key'] = $song_key;
	return $data;
}
?>

<div id="player" style="position: fixed; bottom: 0; right: 0; background: #000; width: 100%">
	<script type="text/javascript">
	var song = $('a[link="<?= ($_POST['url']) ?>"]');
if( song.html() == null)
{
	song = $("<a link='<?= ($_POST['url']) ?>'><?= @$_POST['name'] ?> </a>");	
}
</script>
<?

$song_info = get_mp3($_POST['url']);
$song = @$song_info['link'];

if($song == 'E')
{
?>
	<script type="text/javascript">
		song.addClass('muted').html('Require Login');
	</script>
<?
}
else
{
?>
<script src="build/mediaelement-and-player.min.js"></script>
<script type="text/javascript">

var song_name = song.html();
</script>
    <link rel="stylesheet" href="build/mediaelementplayer.min.css" />
    <info style="color: #fff"></info>
	<audio width="100%" id="player2" src="<?= $song ?>" type="audio/mp3" controls="controls" autoplay="">		
	</audio>

<script>
$('info').html('Bài Hát: ' + song_name + ' &bull; <a href="<?= $song ?>" target="_blank">Tải Về</a>' + ' &bull; <a href="s/<?= @$song_info['key'] ?>" >Link</a>');
$('.playing').remove();
// set title
document.title = song_name + ' | nct lite';
song.html( '<i class="icon icon-music playing"></i> ' + song_name);

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