<?php

class Lib_Util_Img2Thumb	{

	var $bg_red;
	var $bg_green;
	var $bg_blue;
	var $maxSize=100000000;

	function Img2Thumb($filename,$newxsize,$newysize,$fileout='',$thumbMaxSize=0,$bgred=255,$bggreen=255,$bgblue=255)	{		
		//if($thumbMaxSize) {
			$this->maxSize = true;
		//} else {
		//	$this->maxSize = false;
		//}
		if($bgred>=0 || $bgred<=255) {
			$this->bg_red = $bgred;
		} else {
			$this->bg_red = 255;
		}
		if($bggreen>=0 || $bggreen<=255) {
			$this->bg_green = $bggreen;
		} else {
			$this->bg_green = 255;
		}
		if($bgblue>=0 || $bgblue<=255) {
			$this->bg_blue = $bgblue;
		} else {
			$this->bg_blue = 255;
		}
		
		$this -> NewImgCreate($filename,$newxsize,$newysize,$fileout);
	}
	
	function NewImgCreate($filename,$newxsize,$newysize,$fileout) {
		//pregunta la extencion
		$type=$this->GetImgType($filename);
		//se fija que extencion es

		switch($type) {
			case "gif":
				// imagecreatefromgif no existe para php corriendo en servidores
				// windows, asi que aca preguntamos si existe o no.
				if( function_exists("imagecreatefromgif") ) {
					$orig_img = imagecreatefromgif($filename);
					break;
				} else {
					print( "sorry, this server doesn't support <b>imagecreatefromgif()</b>" );
					exit;
					break;
				}
			case "jpg":
				$orig_img = imagecreatefromjpeg($filename);
				break;
			case "png":
				$orig_img = imagecreatefrompng($filename);
				break;
		}
		
		$new_img =$this->NewImgResize($orig_img,$newxsize,$newysize,$filename);
		if (!empty($fileout)) 
			 $this-> NewImgSave($new_img,$fileout,$type);
		else 
			 $this->NewImgShow($new_img,$type);
		
		ImageDestroy($new_img);
		ImageDestroy($orig_img);
	}

	function NewImgResize($orig_img,$newxsize,$newysize,$filename) {
		//getimagesize returns array
		// [0] = width in pixels
		// [1] = height in pixels
		// [2] = type
		// [3] = img tag "width=xx height=xx" values
		
		$orig_size=getimagesize($filename);
		$maxX=$newxsize;
		$maxY=$newysize;
		
		$X0=$orig_size[0];
		$Y0=$orig_size[1];
					
		if($X0<$maxX && $Y0<$maxY){
			$newxsize=$X0;
			$adjustX = ($maxX - $newxsize)/2;
			$newysize=$Y0;
			$adjustY = ($maxY - $newysize)/2;
		
		}elseif($X0>$maxX && $Y0>$maxY){
			$fdev[0]=0;
			$fdev[1]=0;
			//Se fija el porcentaje
			$porcw=($maxX * 100) / $X0;
			$porch=($maxY * 100) / $Y0;
			//Se fija como quedaria con el porcentaje aplicado
			$quedariaw=($porch * $X0) / 100;
			$quedariah=($porcw * $Y0) / 100;
			//Elije opcion que no se pase
			if($quedariah>$maxY)$fporc = $porch;
			if($quedariaw>$maxX)$fporc = $porcw;
			//Devuelve medidas
			$fdev[0]=($X0 * $fporc) / 100;
			$fdev[1]=($Y0 * $fporc) / 100;
			$newxsize=$fdev[0];
			$adjustX = ($maxX - $newxsize)/2;
			$newysize=$fdev[1];
			$adjustY = ($maxY - $newysize)/2;
		}else{
			if($X0<$Y0){
				$newxsize = $newysize * ($X0/$Y0);
				$adjustX = ($maxX - $newxsize)/2;
				$adjustY = 0;
			}else{
				$newysize = $newxsize / ($X0/$Y0);
				$adjustX = 0;
				$adjustY = ($maxY - $newysize)/2;
			}
		}

		if( $this->maxSize ) {
			$im_out = ImageCreateTrueColor($maxX,$maxY);
			$bgfill = imagecolorallocate( $im_out, $this->bg_red, $this->bg_green, $this->bg_blue );
			imagefill( $im_out, 0,0, $bgfill );
			ImageCopyResampled($im_out, $orig_img, $adjustX, $adjustY, 0, 0,
				$newxsize, $newysize,$orig_size[0], $orig_size[1]);
		}
		//	Need to image fill just in case image is transparent, don't always want black background
		else {
			$im_out = ImageCreateTrueColor($newxsize,$newysize);
			$bgfill = imagecolorallocate( $im_out, $this->bg_red, $this->bg_green, $this->bg_blue );
			imagefill( $im_out, 0,0, $bgfill );
			ImageCopyResampled($im_out, $orig_img, 0, 0, 0, 0,
				$newxsize, $newysize,$orig_size[0], $orig_size[1]);
		}
		return $im_out;
	}


	function NewImgSave($new_img,$fileout,$type){
		switch($type) {
			case "gif":
				if( function_exists("imagegif") ) {
					if (substr($fileout,strlen($fileout)-4,4)!=".gif")
						$fileout .= ".gif";
					return imagegif($new_img,$fileout);
					break;
				}
				else
					$this->NewImgSave( $new_img, $fileout, "jpg" );
			case "jpg":
				if (substr($fileout,strlen($fileout)-4,4)!=".jpg")
					$fileout .= ".jpg";
				return imagejpeg($new_img,$fileout);
				break;
			case "png":
				if (substr($fileout,strlen($fileout)-4,4)!=".png")
					$fileout .= ".png";
				return imagepng($new_img,$fileout);
				break;
		}
	}

	function NewImgShow($new_img,$type) {
		switch($type) {
			case "gif":
				if( function_exists("imagegif") ) {
					header ("Content-type: image/gif");
					return imagegif($new_img);
					break;
				}
				else
					$this->NewImgShow( $new_img, "jpg" );
			case "jpg":
				header ("Content-type: image/jpeg");
				return imagejpeg($new_img);
				break;
			case "png":
				header ("Content-type: image/png");
				return imagepng($new_img);
				break;
		}
	}

	function GetImgType($filename)	{
		$size = getimagesize($filename);
		/**
		*   1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF,
		*   5 = PSD, 6 = BMP,
		*   7 = TIFF(intel byte order),
		*   8 = TIFF(motorola byte order),
		*   9 = JPC, 10 = JP2, 11 = JPX,
		*  1 2 = JB2, 13 = SWC, 14 = IFF
		*/
		switch($size[2]) {
			case 1:
				return "gif";
				break;
			case 2:
				return "jpg";
				break;
			case 3:
				return "png";
				break;
		}
	}

}
?>