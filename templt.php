<?php 

	global $title; 
	global $font;
	global $xcss;
	global $bg;

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<?php //<link rel="stylesheet" type="text/css" href="../style.css"> 
	if ($font) : ?>
	<link href='http://fonts.googleapis.com/css?family=<?php echo str_replace(' ','+',$font); ?>' rel='stylesheet' type='text/css'>
<?php endif; ?>
<style>

	html 			{	font-family: sans-serif;	}
	* 				{	padding:0;margin:0;box-sizing:border-box;position:relative;	}

	:root {
		--padd: 	1.2rem; // 3.2rem;
	}

	@media (min-width: 64rem) {
		:root {
			--padd: 5vh;
		}
	}

<?php if($font) : 
	echo 'h1 			{	font-family:'.$font.';	}'.PHP_EOL;
 endif; 
 	if($bg) :
 	echo 'html 			{	background:url('.$bg.') 50% 50% fixed no-repeat;background-size:cover; }	'.PHP_EOL;
 	endif;
 ?>
	.contain 		{	padding:0 var(--padd) var(--padd);max-width:740px;display:block;margin:0 auto;text-align:center;padding-bottom: var(--padd);	}
	h1 				{	font-size:2.4em;text-align:center;line-height:3em;border-bottom:1px solid rgba(225,225,225,0.6);margin: var(--padd) 0;padding-bottom: var(--padd);	}
	img.col 		{	display:block;margin:0 auto;max-width:100%;width:100%;z-index:1;	}
	.caption 		{	display:block;margin-bottom:3.6rem;	}
	ul.img-set 		{	display:block;list-style:none;	}
	ul.img-set li + li 	{	margin-top: var(--padd);	}
	a 				{	text-decoration: none; color: #fff;	}

	.endo 			{	border-top:1px solid rgba(225,225,225,0.6);margin: 0 0 1.6rem;padding-top: var(--padd);position: relative; z-index: 3;	}
	.endo p + p 	{	margin-top: 0.8rem;	}


	@media (max-width:640px) {	
		<?php // h1 				{	font-size:1.4em;line-height:2.6em;	}
		// ul.img-set li 	{	margin-bottom:2.4rem;	} ?>
		}
	/*a.img 			{	display:block;margin-bottom:1em;width:100%;text-align:center;	}*/
	.coverall 		{	position:absolute;bottom:0;top:0;left:0;right:0;width:auto;height:auto;z-index:2;	}
<?php if($xcss) : echo $xcss; endif; ?>
</style>
</head>
<body>
 
<?php

echo '<div class="contain">'.PHP_EOL;
echo '<h1>'.$title.'</h1>'.PHP_EOL;
echo '<ul class="img-set">';

date_default_timezone_set("Europe/Copenhagen");
$folder = 'img/';
$filetype = '*.*';
$files = glob($folder.$filetype);
$count = count($files);
 
$sortedArray = $files; // array();
for ($i = 0; $i < $count; $i++) {
	# sort by date
    // $sortedArray[date ('YmdHis', filemtime($files[$i])) . $i] = $files[$i];
}
 
ksort($sortedArray);

foreach ($sortedArray as &$filename) {
    echo '<li><img src="'.$filename.'" class="col" /></li>'.PHP_EOL;
    # caption option in progress
    // echo '<span class="caption">'.substr($filename,strlen($folder),strpos($filename, '.')-strlen($folder)).'</span>'.PHP_EOL;
}
echo '</ul></div>';
?>
<div class="coverall"></div>
<?php 
echo '<div class="contain"><div class="endo">';
echo '<p>A Handy PHP Script For Sharing Your Magical Memories</p>';
echo '<p><a href="#" target="_blank">[ source ]</a></p>';
echo '</div></div>'; ?>
</body>
</html>