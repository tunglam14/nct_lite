<?
if(isset($_POST['keyword']) and $_POST['keyword'] != '')
{
	require "dom.php";
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
			switch ($i) {
				case 1:
					echo '<td>';
					echo $song->nodeValue;
					echo '</td>';
					break;

				case 3:
					echo '<td>';
					echo '<p class="pull-right">'.$song->nodeValue.'</p>';
					echo '<td>';
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
	// $tags = $xpath->query("*/div[@class='new-song']");
	
 //    var_dump(($tags));
// $data = json_decode(curl_exec($ch));

// if($data == null)
// {
// 	echo 'Server Error';
// 	die();
// }

// if($data->error_message != 'Success')
// {
// 	echo 'No song found';
// 	die();
// }


// var_dump($data->data);


}
else
{
	echo 'Emply list';
}
?>