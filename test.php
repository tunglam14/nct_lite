<html>
<head>

<script src="resources/js/jquery.min.js"></script>
<script src="build/mediaelement-and-player.min.js"></script>
<script type="text/javascript">
</script>

    <link rel="stylesheet" href="build/mediaelementplayer.min.css" />
</head>

<body>
	
</body>
	<!-- http://s72.stream.nixcdn.com/ca0f9349e460f29f61f2ad9b56093005/5142c65a/NhacCuaTui233/LangNgheNuocMat-MrSiro_4a5yn_hq.mp3 -->
	<script>
// JavaScript object for later use

// $('#player2').attr('src','http://s72.stream.nixcdn.com/ca0f9349e460f29f61f2ad9b56093005/5142c65a/NhacCuaTui233/LangNgheNuocMat-MrSiro_4a5yn_hq.mp3');


function playsong()
{
	var player = new MediaElementPlayer('#player2',{
	success: function (mediaElement, domObject) {
        
        mediaElement.addEventListener('ended', function(e) {
        	var new_url = '';
			// http://s41.stream.nixcdn.com/2fade21355351c1a0a4b80ea240d7eaf/5142cd62/NhacCuaTui238/HoangMang-BuiAnhTuan_4bvq9_hq.mp3


			$('.me-plugin').remove();
			$('.mejs-container').remove();
			$('<audio>').attr('id','player2').attr('width','100%').attr('type','audio/mp3').attr('controls','controls').attr('autoplay','').attr('src','http://s41.stream.nixcdn.com/2fade21355351c1a0a4b80ea240d7eaf/5142cd62/NhacCuaTui238/HoangMang-BuiAnhTuan_4bvq9_hq.mp3').prependTo('body');
			playsong();
        });
         
        // call the play method
        mediaElement.pause();
        console.log('a');
    },
	});
}
$(document).ready(function(){

$('<audio>').attr('id','player2').attr('width','100%').attr('type','audio/mp3').attr('controls','controls').attr('autoplay','').attr('src','http://s72.stream.nixcdn.com/ca0f9349e460f29f61f2ad9b56093005/5142c65a/NhacCuaTui233/LangNgheNuocMat-MrSiro_4a5yn_hq.mp3').prependTo('body');
playsong();
});

</script>

</html>