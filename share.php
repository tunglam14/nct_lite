<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">


<?
	if(!isset($_GET['sid'])) header("Location:../index.html");

	$songid = $_GET['sid'];

  include "convert_song_code.php";

  $song = $data;

  if(empty($song['name'])) header("Location:../index.html");

?>
    <title>Bài Hát: <?= $song['name'] ?> &bull; <?= $song['singer'] ?> | Lite Music | mp3.familug.org</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tìm Cái - Nghe Luôn">
    <meta name="author" content="lamdt">
    <script src="../resources/js/jquery.min.js"></script>
    <link href="../resources/css/bootstrap-responsive.min.css" rel="stylesheet">
    <script src="../resources/js/myjs.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>

    <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/mycss.css" rel="stylesheet">
    <!-- Le styles -->
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
        <script src="../build/mediaelement-and-player.min.js"></script>
        <link rel="stylesheet" href="../build/mediaelementplayer.min.css" />
        <? include "player.php"; ?>

			<br>
			<center>
			<a href="http://<?= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ?>" >Link</a> | <a href="<?= $song ?>" target="_blank">Download</a>
			</center>

		<script>
		// set title

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
      
      <iframe  src="//www.facebook.com/plugins/like.php?href=http://<?= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font=segoe+ui&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:21px;" allowTransparency="true"></iframe>
        <!-- Place this tag where you want the +1 button to render. -->
      <span class="g-plusone pull-right" data-size="medium" data-annotation="inline" data-width="120"></span>
        
      </center>

      <script type="text/javascript">
      window.___gcfg = {lang: 'vi'};

          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
      </script>
      <img src="../logo.jpg" style="display: none;">
      <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39329617-1']);
  _gaq.push(['_setDomainName', 'familug.org']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    </div>
  </body>
</html>
