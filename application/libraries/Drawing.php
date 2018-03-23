<?php if(!class_exists('PhpBasic')) exit('<h4>Direct access not allowed "'.__FILE__.'"</h4>');
/**
 * PhpBasic
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		PhpBasic
 * @author	   	Jeffrey Afable
 * @email  		pb.framework@gmail.com
 * @copyright		Copyright (c) 2011 - 2012
 * @since			Version 1.0
 * @filesource
**/
if(!function_exists("imagecreate")) exit("GD Library is not installed!");
define("IMAGE_FLIP_HORIZONTAL",'h');
define("IMAGE_FLIP_VERTICAL",	'v');
define("IMAGE_FLIP_BOTH",	'b');
define("IMAGE_FILLED",	0);
define("IMAGE_BORDER",	1);
define("IMAGE_DASHED",	2);
define("IMAGE_SOLID",	3);
class Drawing {
	private $__imageFileName;
	private $__imageInfo;
	private $__imageWidth;
	private $__imageHeight;
	private $__imageResource;
	private $__imageOriginal;
	public function GetWidth(){
		return $this->__imageWidth;
	}
	public function GetHeight(){
		return $this->__imageHeight;
	}
	public function Create($width,$height,$bg=array(255,255,255),$isgradient=FALSE){
		$this->__imageWidth		= $width;
		$this->__imageHeight	= $height;
		$this->__imageResource= imagecreatetruecolor($width, $height);
		imageantialias($this->__imageResource, true);
		if(!is_array($bg)) $bga = $this->HexDecRGB($bg);
		$r = (isset($bga[0]) && is_numeric($bga[0])) ? $bga[0] : 255; 
		$g = (isset($bga[1]) && is_numeric($bga[1])) ? $bga[1] : 255; 
		$b = (isset($bga[2]) && is_numeric($bga[2])) ? $bga[2] : 255; 
		$bgColor = $this->Rgb($r,$g,$b);
		imagefilltoborder($this->__imageResource, 0, 0, 0, $bgColor);
		if($isgradient==TRUE) $this->Gradient($bg,1);
		return $this;
	}
	public function Source($image_file) {
		if(!function_exists('imagecreatefrompng')) return;
		if(!is_readable($image_file)) {
			$this->error[] = 'File is not readable!';
			return;
		}
		$this->__imageFileName = $image_file;
		$img = getimagesize($image_file);

		switch($img['mime']) {
			case 'image/png' : 
					$image = imagecreatefrompng($image_file); 
				break;
			case 'image/jpeg': 
					$image = imagecreatefromjpeg($image_file); 
				break;
			case 'image/gif' : 
					$old_id = imagecreatefromgif($image_file); 
					$image  = imagecreatetruecolor($img[0],$img[1]); 
					imagecopy($image,$old_id,0,0,0,0,$img[0],$img[1]); 
				break;
			default: 
				exit("Invalid image format!");
				break;
		}
		$this->__imageInfo	= $img;
		$this->__imageWidth	= imagesx($image);
		$this->__imageHeight	= imagesy($image);
		$this->__imageResource	= $this->__imageOriginal = $image;
		return $this;
	}
	public function AddLine($x1,$y1,$x2,$y2,$color=NULL,$type=IMAGE_SOLID){
		if(!$this->__imageResource) return FALSE;
		$color = ($color==NULL) ? $this->Rgb(0,0,0) : $color;
		if($type==IMAGE_DASHED)
			imagedashedline($this->__imageResource, $x1,$y1,$x2,$y2, $color);
		else
			imageline($this->__imageResource, $x1,$y1,$x2,$y2, $color);
		return $this;
	}
	public function AddArc($cx ,$cy ,$width ,$height ,$start ,$end ,$color=NULL){
		if(!$this->__imageResource) return FALSE;
		imagearc($this->__imageResource,$cx ,$cy ,$width ,$height ,$start ,$end ,$color );
		return $this;
	}
	public function AddEllipse($cX,$cY,$Width,$Height,$color=NULL,$type=IMAGE_FILLED){
		if(!$this->__imageResource) return FALSE;
		$color = ($color==NULL) ? $this->Rgb(0,0,0) : $color;
		if($type==IMAGE_BORDER)
			imageellipse($this->__imageResource, $cX, $cY, $Width, $Height, $color);
		else
			imagefilledellipse($this->__imageResource, $cX, $cY, $Width, $Height, $color);
		return $this;
	}
	public function AddPolygon($points,$color=NULL,$type=IMAGE_FILLED){
		if(!$this->__imageResource) return FALSE;
		$color = ($color==NULL) ? $this->Rgb(0,0,0) : $color;
		if($type==IMAGE_BORDER)
			imagepolygon($this->__imageResource, $points, (sizeof($points)/2), $color);			
	    else
	    		imagefilledpolygon($this->__imageResource, $points, (sizeof($points)/2), $color);
		return $this;
	}
	public function AddRectangle($x,$y,$width,$height,$style=array()){
		if(!$this->__imageResource) return FALSE;
		$bgcolor	= (isset($style['BgColor'])	) ? $style['BgColor'] : $this->Rgb(255,255,255);
		$issolid	= (isset($style['IsSolid'])	) ? $style['IsSolid'] : FALSE;
		$borderColor= (isset($style['BorderColor'])	) ? $style['BorderColor'] : $this->Rgb(155,155,155);
		$borderSize= (isset($style['BorderSize'])	) ? $style['BorderSize'] : 1;
		if($issolid===FALSE){
			imagefilledrectangle($this->__imageResource, $x, $y , ($x+$width) , ($y+$height) , $borderColor);
			imagefilledrectangle($this->__imageResource, $x+$borderSize, $y+$borderSize , ($x+$width)-$borderSize , ($y+$height)-$borderSize , $bgcolor);
		}else{
			imagefilledrectangle($this->__imageResource, $x, $y , ($x+$width) , ($y+$height) , $color);
		}
		return $this;
	}
	public function AddText($text,$style=array()) {
		if(!$this->__imageResource) return FALSE;
		$fontColor	= (isset($style['Color'])) ? $style['Color'] : $this->Rgb(111, 111, 111);
		$fontColor	= (!is_array($fontColor)) ? $fontColor : $this->Rgb($fontColor[0],$fontColor[1],$fontColor[2]);
		$fontSize	= (isset($style['Size']) && is_numeric($style['Size'])) ? $style['Size'] : 15;
		$fontLeft	= (isset($style['Left']) && is_numeric($style['Left'])) ? $style['Left'] : 0;
		$fontTop	= (isset($style['Top']) && is_numeric($style['Top'])) ? $style['Top'] : 0;
		$fontTop	+= $fontSize;
		$fontAngle	= (isset($style['Angle']) && is_numeric($style['Angle'])) ? $style['Angle'] : 0;
		$fontShadow	= (isset($style['Shadow']) && is_numeric($style['Shadow'])) ? $style['Shadow'] : 1;
		$rndChrs	= (isset($style['RandomChars']) && $style['RandomChars']==TRUE)?TRUE:FALSE;
		$shadowColor= $this->Rgb(155, 155, 155);
		$TtfFont	= (isset($style['Font'])) ? PB_FONT_DIR.'/'.$style['Font'] : PB_FONT_DIR.'/arial.ttf';
		putenv('GDFONTPATH=' . realpath('.'));
		if($rndChrs==FALSE){
			imagettftext($this->__imageResource, $fontSize, $fontAngle, $fontLeft+$fontShadow, ($fontTop)+$fontShadow, $shadowColor, $TtfFont, $text);
			imagettftext($this->__imageResource, $fontSize, $fontAngle, $fontLeft, $fontTop, $fontColor, $TtfFont, $text);
		}else{
			for($i = 0; $i < strlen($text); $i++) {
				$calc_y = rand($fontTop-5,$fontTop+5);
				$angle = rand(-10,10);
				imagettftext($this->__imageResource, $fontSize, $angle, $fontLeft+$fontShadow, ($calc_y)+$fontShadow, $shadowColor, $TtfFont, $text{$i});
				imagettftext($this->__imageResource, $fontSize, $angle, $fontLeft, $calc_y, $fontColor, $TtfFont, $text{$i});
				$fontLeft += rand($fontSize-3,$fontSize+3) ;
			}
		}
		return $this;
	}
	public function Save($image_file, $destroy = TRUE) {
		if(!$this->__imageResource) return FALSE;
		$this->__imageFileName = $image_file;
		$extension = strtolower(pathinfo($this->__imageFileName, PATHINFO_EXTENSION));
		switch($extension) {
			case 'png' : 
				$result = @imagepng($this->__imageResource, $this->__imageFileName); 
				break;
			case 'jpeg': 
			case 'jpg' :
				$result = @imagejpeg($this->__imageResource, $this->__imageFileName); 
				break;
			case 'gif' :
				$result = @imagegif($this->__imageResource, $this->__imageFileName); 
				break;
			default: 
				$result = @imagepng($this->__imageResource, $this->__imageFileName); 
				break;
		}
		if($result==TRUE){
			if($destroy==TRUE) $this->destroy();
		}else{
			$this->Error = 'Failed to write image!';
		}
		return $this;
	}
	public function Rotate($angle, $background=NULL) {
		if(!$this->__imageResource) return FALSE;
		if(!$angle) return $this;
		if($background==NULL){
			$new_image = ImageCreateTruecolor($this->__imageWidth, $this->__imageHeight);
			$background = ImageColorAllocateAlpha($new_image, 255, 255, 255, 127);
		}
		$this->__imageResource = imagerotate($this->__imageResource, $angle, $background);
		return $this;
	}
	public function Flip($type) {
		if(!$this->__imageResource) return FALSE;
		if(!$type) return FALSE;
		$imgdest= imagecreatetruecolor($this->__imageWidth, $this->__imageHeight);
		$imgsrc	= $this->__imageResource;
		$height	= $this->__imageHeight;
		$width	= $this->__imageWidth;
		switch($type) {
			case 'h':
				for($x=0;$x<$width;$x++){
					imagecopy($imgdest, $imgsrc, $width-$x-1, 0, $x, 0, 1, $height);
				}
				break;
			case 'v':
				for($y=0;$y<$height;$y++){
					imagecopy($imgdest, $imgsrc, 0, $height-$y-1, 0, $y, $width, 1);
				}
				break;
			case 'b':
				for($x=0;$x<$width;$x++){
					imagecopy($imgdest, $imgsrc, $width-$x-1, 0, $x, 0, 1, $height);
				}
				$rowBuffer = imagecreatetruecolor($width, 1);
				for($y=0;$y<($height/2);$y++){
					imagecopy($rowBuffer, $imgdest  , 0, 0, 0, $height-$y-1, $width, 1);
					imagecopy($imgdest  , $imgdest  , 0, $height-$y-1, 0, $y, $width, 1);
					imagecopy($imgdest  , $rowBuffer, 0, $y, 0, 0, $width, 1);
				}
				imagedestroy($rowBuffer);
				break;
			}	
		$this->__imageResource = $imgdest;
		return $this;
	}
	
	public function Resize($new_width = NULL,$new_height = NULL, $use_resize = TRUE) {
		if(!$this->__imageResource) return FALSE;
		if($new_height==NULL && $new_width==NULL) return FALSE;
		$height = $this->__imageHeight;
		$width  = $this->__imageWidth;
		if(!is_numeric($new_height) && is_numeric($new_width)){
			$new_height	= $height * $new_width / $width;
		}
		if(is_numeric($new_height) && !is_numeric($new_width)){
			$new_width	= $width  * $new_height/ $height;
		}
		$new_image = imagecreatetruecolor($new_width,$new_height);
		imagealphablending($new_image, FALSE);
		if($use_resize) imagecopyresized($new_image, $this->__imageResource, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		else imagecopyresampled($new_image, $this->__imageResource, 0, 0, 0, 0, $new_width, $new_height, $width, $height);	
		$this->__imageResource = $new_image;
		return $this;
	}
	public function Crop($from_x,$from_y,$to_x,$to_y) {
		if(!$this->__imageResource) return FALSE;
		$height = $this->__imageHeight;
		$width  = $this->__imageWidth;
		$new_width  = $to_x - $from_x;
		$new_height = $to_y - $from_y;	
		$new_image = imagecreatetruecolor($new_width, $new_height);
		imagealphablending($new_image, FALSE);
		imagecopy($new_image, $this->__imageResource, 0,0, $from_x,$from_y, $new_width, $new_height);
		$this->__imageResource = $new_image;
		return $this;
	}
	public function Show($destroy = TRUE) {
		if(!$this->__imageResource) return FALSE;
		header("Content-type: ".$this->__imageInfo['mime']);
		switch($this->__imageInfo['mime']) {
			case 'image/png' : imagepng($this->__imageResource); break;
			case 'image/jpeg': imagejpeg($this->__imageResource); break;
			case 'image/gif' : imagegif($this->__imageResource); break;
			default: imagepng($this->__imageResource); break;
		}
		if($destroy) $this->destroy();
		exit();
	}
	public function RemoveBorders(){
		$this->Crop(0,0,($this->__imageWidth-1),($this->__imageHeight-1));
		return $this;
	}
	public function Restore() {
		$this->__imageResource = $this->__imageOriginal;
		return $this;
	}
	public function Destroy() {
		 @imagedestroy($this->__imageResource);
		 @imagedestroy($this->__imageOriginal);
	}
	public function AddWaterMark($wfullpath) {
		if(!$this->__imageResource) return FALSE;
		$wimg = getimagesize($wfullpath);
		switch($wimg['mime']) {
			case 'image/png' : 
					$wimage = imagecreatefrompng($wfullpath); 
				break;
			case 'image/jpeg': 
					$wimage = imagecreatefromjpeg($wfullpath); 
				break;
			case 'image/gif' : 
					$old_id = imagecreatefromgif($wfullpath); 
					$wimage  = imagecreatetruecolor($wimg[0],$wimg[1]); 
					imagecopy($wimage,$old_id,0,0,0,0,$wimg[0],$wimg[1]); 
				break;
			default: 
				exit("Invalid image watermark format!");
				break;
		}
		$imagewidth = $this->__imageWidth;
		$imageheight = $this->__imageHeight;
		$watermarkwidth =  imagesx($wimage);
		$watermarkheight =  imagesy($wimage);
		$startwidth = ($this->__imageWidth - ($watermarkwidth+5));
		$startheight = ($this->__imageHeight - ($watermarkheight+5));
		imagecopy($this->__imageResource, $wimage,  $startwidth, $startheight, 0, 0, $watermarkwidth, $watermarkheight);
		return $this;
	}
	public function Brightness($range){
		if($this->__imageResource)
			imagefilter($this->__imageResource, IMG_FILTER_BRIGHTNESS, $range);
		return $this;
	}
	public function Colorizer($r,$g,$b){
		if($this->__imageResource)
			imagefilter($this->__imageResource, IMG_FILTER_COLORIZE, $r,$g,$b);
		return $this;
	}
	public function GrayScale(){
		if($this->__imageResource)
			imagefilter($this->__imageResource, IMG_FILTER_GRAYSCALE);
		return $this;
	}
	public function Pixelate($filter=3){
		if($this->__imageResource)
			@imagefilter($this->__imageResource, IMG_FILTER_PIXELATE, $filter, TRUE);
		return $this;
	}
	public function Rgb($r,$g,$b){
		if($this->__imageResource)
			return imagecolorallocate($this->__imageResource, $r, $g, $b);
	}
	public function HexDecRGB($hex){
		$hex = trim($hex,'#');
		$rgb = array();
		if(strlen($hex)==6){
			for($i=0;$i<strlen($hex);$i+=2)
				$rgb[]=hexdec(substr($hex,$i,2));
		}elseif(strlen($hex)==3){
			for($i=0;$i<strlen($hex);$i++)
				$rgb[]=hexdec(substr($hex,$i,1));
		}
		return $rgb;
	}
	public function Gradient($hexcolor="000000",$colorinc=2){
		if(is_numeric($this->__imageHeight)&&is_numeric($this->__imageWidth)){
			$rgb  = $this->HexDecRGB($hexcolor);
			$red	 = $rgb[0]-10;
			$green= $rgb[1]-10;
			$blue = $rgb[2]-10;
			$r=0;			
			for($i=0;$i<=$this->__imageHeight;$i+=1){			
				$rc = (($red+$r)<255) ? ($red+$r) : 255;
				$gc = (($green+$r)<255) ? ($green+$r) : 255;
				$bc = (($blue+$r)<255) ? ($blue+$r) : 255;
				$c=$this->Rgb($rc,$gc,$bc);
				$this->AddLine(0,$i,$this->__imageWidth,$i,$c);
				$r+=$colorinc;
			}
		}
		return $this;
	}
}
# PHP_END_FILE