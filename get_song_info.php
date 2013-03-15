<?
		    $ch = ("http://www.nhaccuatui.com/m/".$_GET['sid']);
			
		    $r = @shell_exec('curl -I '.$ch);
		    @list ( $vat, $link) = @explode('?file=', $r);
		    @list( $link, $vat) = @explode('&autostart', $link);
		    // echo $link;

		    $dom = new DOMDocument();
			@$dom->loadXML(file_get_contents($link));

			$data = array();
			foreach($dom->getElementsByTagName('title') as $v)
				$data['song'] = trim($v->textContent);
			foreach($dom->getElementsByTagName('creator') as $v)
				$data['author'] = trim($v->textContent);

echo json_encode($data);

?>