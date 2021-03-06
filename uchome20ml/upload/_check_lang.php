<?
define('IN_UCHOME',1);

echo "<h2>UCHome2ML LANGUAGE PACK VERIFIER</h2>";
echo "(c) by Valery Votintsev (vot), http://codersclub.org/discuzx/<br>";
echo "-------------------------------------------------------------<br>";

$lang = isset($_GET['lang']) ? $_GET['lang'] : '';

if(!$lang) {
  $uri = $_SERVER['REQUEST_URI'];
  $uri = preg_replace("/\.php.*$/i",'.php',$uri);

  echo "Set the language for check!<br><br>\n";
  echo "Example:<br>\n";
  echo $uri."?lang=en<br>\n";
  exit;
}

echo "CHECK LANGUAGE started.<br>";

$dir = 'language/'.$lang.'/';

$files = array(
	"lang_admincp.php",
	"lang_cp.php",
	"lang_cpmessage.php",
	"lang_exif.php",
	"lang_install.php",
	"lang_showmessage.php",
	"lang_source.php",
	"lang_source2.php",
	"lang_template.php",
	"lang_title.php",
	"lang_gift.php",
);


echo "Directory: ".$dir."<br><br>";

foreach($files AS $file) {
  echo "&nbsp;&nbsp;&nbsp;Checking file: ".$file."<br>";
  include $dir.$file;
}


echo "<br>------------------------<br>";
echo "CHECK LANGUAGE finished.<br>";
