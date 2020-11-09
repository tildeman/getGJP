<?php
class GJPGet {
	public function get($raw) {
		require_once dirname(__FILE__)."/XORCipher.php";
		$xor = new XORCipher();
		$gjpencode = $xor->cipher($raw,37526);
		$gjpencode = base64_encode($gjpencode);
		$gjpencode = str_replace("+","-",$gjpencode);
		$gjpencode = str_replace("/","_",$gjpencode);
		return $gjpencode;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Get GJP</title>
</head>
<body>
	<span style="font-family:sans-serif;">Hi. This is a Geometry Dash GJP generator. Type your password below to get the code, in which it can be used for fetching the level leaderboards on the servers.<br></span>
	<form method="post">
		<input type="password" name='GJPString'>
		<input type="submit" name='sm' value='OK'>
	</form>
	<?php
	if (isset($_POST['sm'])){
		$n=new GJPGet();
		echo '<br>'.$n->get($_POST['GJPString']);
	}
	?>
</body>
</html>
