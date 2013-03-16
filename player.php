<script src="build/mediaelement-and-player.min.js"></script>
<link rel="stylesheet" href="build/mediaelementplayer.min.css" />
<div id="player" style="position: fixed; bottom: 0; right: 0; background: #000; width: 100%">
	<info style="color: #fff">Bài Hát: <?= $song['name'] ?> &bull; Ca Sĩ: <?= $song['singer'] ?> &bull; <a href="<?= $song['link'] ?>" target="_blank">Tải Về</a> &bull; <a href="/s/<?= @$song['key'] ?>" >Link</a></info>
	<audio width="100%" id="player2" src="<?= $song['link'] ?>" type="audio/mp3" controls="controls" autoplay="">		
	</audio>
</div>

<script type="text/javascript">
	$('audio,video').mediaelementplayer({
		startVolume: 0.5,
		loop: true,
		features: ['playpause','progress','current','duration','tracks','volume'],
	});
	document.title = 'Bài Hát: <?= $song['name'] ?> | Ca Sĩ: <?= $song['singer'] ?> | Lite Music | mp3.familug.org';
</script>
