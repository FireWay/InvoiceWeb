<?php
require_once '../../connectvars.php';
require_once './AipSpeech.php';

//开启一个会话
session_start();

$que = $_SERVER["QUERY_STRING"];
// echo $_SERVER["QUERY_STRING"]."<br>";

// echo explode('=', $que)[1]."<br>";
$name = explode('=', $que)[1];


//获取到临时文件 
$file=$_FILES['voicefile']; 
//获取文件名 
$fileName=$file['name']; 

echo "<br/><br/>FILES:<br/>";
var_dump($_FILES);


// 你的 APPID AK SK
const APP_ID = '10533442';
const API_KEY = 'eb8vDMwPyec1DGxecYQRzEjz';
const SECRET_KEY = '56ac673eafc3a65f49dd37d8dd8f27e8';
 
$client = new AipSpeech(APP_ID, API_KEY, SECRET_KEY);
// 识别本地文件
$li = $client->asr(file_get_contents($_FILES["voicefile"]["tmp_name"]), 'wav', 16000, array(
    'lan' => 'zh',
));
 
interface Msg{
	function getMsg();
}
 
class Result implements Msg{
	protected $res = null;
	protected function __construct($re){
		$this->res = $re;
	}
    public  function getMsg(){}
}
class Success extends Result{
	public function __construct($re){
		parent::__construct($re);
	}
	public function getMsg(){
		if ($this->res['err_msg'] == 'success.') {
			// var_dump($this->res);exit;
            echo  $this->res['result'][0];
            return $this->res['result'][0];
		}
	}
}

echo "<br/><br/>li:<br/>";
var_dump($li);

$tmp = new Success($li);
echo "<br/><br/>tmp->getMsg():<br/>";
$tmp->getMsg();



$_SESSION[$name] = $tmp->getMsg();
echo "<br/><br/>session:<br/>";
var_dump($_SESSION);
echo "<br/><br/>fileName:<br/>";
var_dump($fileName);
echo "<br/><br/>name:<br/>";
var_dump($name);
?>
<?php
$home_url = './in_voice.php';
header('Location: '.$home_url);
?>