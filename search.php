<?
if(isset($_POST['keyword']) and $_POST['keyword'] != '')
{
	$page = ( isset($_POST['page']) ? $_POST['page'] : 1 );
	$url = 'http://www.nhaccuatui.com/tim-kiem/bai-hat?q='.str_replace(' ', '+', $_POST['keyword']).'&page='.$page;


// // $string = 'key='.$_POST['keyword'].'&url=http://www.nhaccuatui.com/ajax/search';
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"GET");
	// no output
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// // curl_setopt($ch,CURLOPT_POSTFIELDS,$string); 
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:19.0) Gecko/20100101 Firefox/19.0');
	
	$data = curl_exec($ch);


	// var_dump(substr($data, strpos($data,'<ul class="list-song">'),  strpos($data,'<div class="pd-comment">') ));
	$dom = new DOMDocument();
	@$dom->loadHTML($data);

	// $xpath = new DOMXPath($dom);
	$classname = "song-item";
	$xpath = new DOMXPath($dom);
	$entries = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");

	echo '<table class="table table-hover">';
	foreach ($entries as $entry) {
		echo '<tr>';
		foreach($entry->childNodes as $i => $song)
		{
			// echo $i.'-'.var_dump($song).'<br><br><br><br><br>';

			switch ($i) {
				case 1:
					echo '<td>';
					foreach ($song->childNodes as $info) {
						// get h4 tag
						if(@$info->tagName == 'h4') {
							// get a tag
						foreach ($info->childNodes as $i) {
							if(@$i->tagName == 'a') 
								{
									foreach ($i->attributes as $v) {
										// get href attr in a tag
										if($v->name == 'href')
											echo '<a class="song" href="#" link="'.$v->value.'">'.trim($song->nodeValue).'</a>';
										if($v->name == 'class')
										{
											switch ($v->value) {
												case 'mof':
													echo '<span class="label">official</span>';
													break;
												case 'm320':
													echo '<span class="label label-success">320 kbps</span>';
													break;
												
												default:
													# code...
													break;
											}
										}
									}
										
								}
						}
						}
						// }
					}

					echo '</td>';

					break;

				case 3:
					echo '<td>';
					echo '<p class="pull-right">'.$song->nodeValue.'</p>';
					echo '<td>';
					break;
				// case 5:
				// foreach ($song->attributes as $v) {
				// 	if($v->name == 'id')
				// 		var_dump($v->value).'<br>';
				// 	var_dump($dom->getElementById($v->value));
				// }
					break;				
				default:
					# code...
					break;
			}
			// var_dump($i.'-'.$song->nodeValue);
		}

		echo '</tr>';

		// var_dump($entry);
		// echo '<br><br><br><br>';
	}
	
	echo '</table>';
?>

<script>
$('.song').click(function(){
	var link =  $(this).attr('link');
	$.ajax({
		type: 'POST',
		data: 'url='+link,
		url: 'link.php',
		success: function(res){
			if($('#player'))
			{
				$('#player').remove();
				$('.me-plugin').remove();
			}
				
			$(res).appendTo('body');
		}
	});
	
})

</script>

<?
}
else
{
	echo 'Emply list';
}
?>