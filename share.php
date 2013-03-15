<?
	if(!isset($_GET['sid'])) header("Location:../index.html");

	$api_result = file_get_contents("http://www.nhaccuatui.com/download/song/".$_GET['sid']);
	 
	$r = json_decode($api_result);
	 
	if($r == null)
	{
		header("Location:../index.html");
		exit(0);
	}
	 
	// check error_code
	if($r->error_code != 0)
	{
		header("Location:../index.html");
	}
	// get download link
	$song = $r->data->stream_url;
	$data['key'] = $_GET['sid'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>nct lite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tìm Nhanh - Nghe Nhanh">
    <meta name="author" content="lamdt">

    <!-- Le styles -->
    <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/mycss.css" rel="stylesheet">
    <link href="../resources/css/bootstrap-responsive.min.css" rel="stylesheet">

    <script type="text/javascript">
    var page = 1;
    </script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../resources/js/html5shiv.js"></script>
    <![endif]-->
    <link rel="icon" href="http://www.favicon.cc/favicon/97/603/favicon.ico" type="image/x-icon">

</head>

<body>
    <div class="container-narrow">
        <div class="masthead">
        <ul class="nav nav-pills pull-left">
            <li class="active"><a href="http://<?= $_SERVER["SERVER_NAME"] ?>" class="" style=" width: 100%;" ><i class="icon-white icon-music"></i> Lite Music</a></li>
        </ul>
        
        <br/>
        <br/>
      <hr style="margin-top: 16px">
        <div class="jumbotron">
        <div class="lead">
            
        </div>
        
        </div>

        <script src="../resources/js/jquery.min.js"></script>
        <script src="../resources/js/myjs.js"></script>
        <script src="../resources/js/bootstrap.min.js"></script>
        
        	<script src="../build/mediaelement-and-player.min.js"></script>
		
		    <link rel="stylesheet" href="../build/mediaelementplayer.min.css" />
		    <info style="color:"></info>

			<audio width="100%" id="player2" src="<?= $song ?>" type="audio/mp3" controls="controls" autoplay="">		
			</audio>

			<br>
			<center>
			<a href="http://<?= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ?>" >Link</a> | <a href="<?= $song ?>" target="_blank">Download</a>
			</center>

		<script>
		// set title

		$('audio,video').mediaelementplayer(
			{
				loop: true,
				features: ['playpause','progress','current','duration','tracks','volume'],
			}
			);
		$(document).ready(function(){
			$.ajax({
				type: "GET",
				data: "sid=<?= $_GET['sid'] ?>",
				url: '../get_song_info.php',
				success: function(res){
					console.log(res);
					var obj = jQuery.parseJSON(res);
					$('info').html('Bài hát: '+obj.song+ ' - Ca Sĩ: '+obj.author);
					document.title = 'Bài hát: '+obj.song+ ' - Ca Sĩ: '+obj.author + ' | nct lite';
				}
			});

			window.___gcfg = {lang: 'vi'};

	          (function() {
	            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	            po.src = 'https://apis.google.com/js/plusone.js';
	            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	          })();
		});
		</script>

    </div> <!-- /container -->
    <hr style="margin-bottom: 10px">
    <div class="footer" style="margin-bottom: 10px">
      <center>
      <small>
        <a>lamdt@familug.org</a>
        <br />
        <a href="http://www.familug.org" target="_blank">http://www.familug.org</a>
        <br />
        &copy; 2013</small>
        <br>
        <iframe class="github-btn" width="112px" scrolling="0" height="20px" frameborder="0" allowtransparency="true" src="http://ghbtns.com/github-btn.html?user=lamoanh&repo=nct_lite&type=watch&count=true"></iframe>
      
      <iframe class="github-btn" width="112px" scrolling="0" height="20px" frameborder="0" allowtransparency="true" src="http://ghbtns.com/github-btn.html?user=lamoanh&repo=nct_lite&type=fork&count=true"></iframe>
      
      <iframe  src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.familug.org&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font=segoe+ui&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:21px;" allowTransparency="true"></iframe>
        <!-- Place this tag where you want the +1 button to render. -->
        <span class="g-plusone pull-right" data-size="medium" data-annotation="inline" data-width="120"></span>
        
      </center>

      <script type="text/javascript">
        
      </script>
      <img src="icon.gif" style="display: none;">
    </div>
  </body>
</html>