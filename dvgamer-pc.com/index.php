<?php ob_start(); session_start(); ?>
<html>
<head>
<?php 
include ('include/torrent.dbcode.php');

?>
<title><?php echo $DVG_TITLE; ?></title>
</head><head>
<link rel="shortcut icon" href="images/DvGIcon.ico">
<link href="include/template_css.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image:url(images/bg/DvGamerBG.jpg);
	background-position:right top;
	background-repeat:no-repeat;
	background-attachment:fixed;
}
</style>
</head><body>
<?php /*
class HTMLElement
{
	protected $content;
	protected $tagname;
	protected $attributes;
	
	public function getAttributeSource()
	{
		$attributes = '';
		if (count($this->attributes)) {
			foreach ($this->attributes as $attrmne => $attrval)
			{
				$attributes .= ' ' . $attrmne . '="' . $attrval . '"';
			}
		}
		return $attributes;
	}
}

class HTMLparagraph extends HTMLElement
{
	protected $tagname = 'div';
	public function getSource()
	{
		return '<' . $this->tagname . $this->getAttributeSource() . '>'.
		$this->content . 
		'</' . $this->tagname . '>'; 
	}
	
	public function __toString()
	{
		return $this->getSource();
	}	
	
	public function __construct($content, $attributes = array())
	{
		$this->content = $content;
		$this->attributes = $attributes;
		//parent::__construct($content, $attributes);
	}

}

class HTMLImage extends HTMLElement
{
	protected $tagname = 'img';
	public function getSource()
	{
		if (!array_key_exists('alt',$this->attributes)) {
			$this->attributes['alt'] = 'This image needs alt text.';
		}
		return '<' . $this->tagname . $this->getAttributeSource() . ' />';
	}
	
	public function __toString()
	{
		return $this->getSource();
	}	
	
	public function __construct($content, $attributes = array())
	{
		$this->content = $content;
		$this->attributes = $attributes;
		//parent::__construct($content, $attributes);
	}
}
$para = new HTMLparagraph('The Object oriented programmin', array('id' => 'red','class' => 'red'));
echo htmlspecialchars($para) . '<br>';

$para2 = new HTMLparagraph('The Object oriented programming', array('id' => 'blue','class' => 'blue'));
echo htmlspecialchars($para2) . '<br>';

$parimg = new HTMLImage(' ', array('id' => 'logo','src' => 'images/loading.gif'));
echo $parimg;  */
/*
# Read a file
$torrent_data = bdec(file_get_contents('[TM] RPGMakerVX1.02.torrent'));
$info = strtolower(sha1(benc($torrent_data['info'])));

echo $info;

$fc = count($torrent_data['info']['files']);
echo '<h2>Files</h2>';

for ($fi = 0; $fi < $fc; $fi++) {
	if ($fc > 1) {
	$pc = count($torrent_data['info']['files'][$fi]['path']);
		for ($pi = 0; $pi < $pc; $pi++) {
			$torrentSize = $torrent_data['info']['files'][$fi]['length'];
			if ($pi <> ($pc - 1)) {
				echo $torrent_data['info']['files'][$fi]['path'][$pi] . '/';
			} else {
				echo $torrent_data['info']['files'][$fi]['path'][$pi] . '&nbsp;&nbsp;&nbsp;';
				echo '<strong>Size:</strong> ' . ($torrentSize / 1024) . ' KB<br>';
			}
		}
	}
} */


?>
</body>
</html>
<?php ob_end_flush(); ?>