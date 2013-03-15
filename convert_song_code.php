<?

$ch = "http://www.nhaccuatui.com/m/".$songid;
			
$r = @shell_exec('curl -I '.$ch);
@list ( $vat, $link) = @explode('?file=', $r);
@list( $link, $vat) = @explode('&autostart', $link);

$dom = new DOMDocument();
@$dom->loadXML(file_get_contents($link));


$data = array();
foreach($dom->getElementsByTagName('title') as $v)
	$data['name'] = trim($v->textContent);
foreach($dom->getElementsByTagName('creator') as $v)
	$data['singer'] = trim($v->textContent);
foreach($dom->getElementsByTagName('location') as $v)
	$data['link'] = trim($v->textContent);

$data['key'] = $songid;
?>