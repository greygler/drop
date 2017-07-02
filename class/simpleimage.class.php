<?php

 
class SimpleImage {
	/* http://sanchiz.net/blog/resizing-images-with-php 
Подключение:
require ('class/SimleImage.class.php');

		// Изменяем размеры и сохраняем как image1.jpg
	$image = new SimpleImage();
	$image->load('image.jpg');
	$image->resize(400, 200);
	$image->save('image1.jpg');
	   
	   // Изменяем ширину и сохраняем как image1.jpg
	$image = new SimpleImage();
	$image->load('image.jpg');
	$image->resizeToWidth(250);
	$image->save('image1.jpg'); 
	
	 // Изменяем до 50% от оригинала и сохраняем как image1.jpg
	$image = new SimpleImage();
	$image->load('image.jpg');
	$image->scale(50);
	$image->save('image1.jpg');	
	
	// Изменяем высоту и выводим прямо в браузер;
	$image = new SimpleImage();
	$image->load('image.jpg');
	$image->resizeToHeight(150);
	$image->output();
   


 */

   var $image;
   var $image_type;

   public function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
  public function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   public function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }
   }
  public function getWidth() {
      return imagesx($this->image);
   }
  public function getHeight() {
      return imagesy($this->image);
   }
  public function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
  public function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
  public function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
  public function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }
   
   public function img_ext($file_type) // Формируем расширение картинки исходя из mime-type
	{
		switch ($file_type) {
		case "image/jpeg":
			return "jpg";
			break;
		case "image/png":
			return "png";
			break;
		 case "image/gif":
			return "gif";
			break;
	}

	}
	
	public function img_base64($img_file, $class="", $alt="") // Создаем img-тег base64 изображения
	{
		$imageSize = getimagesize($img);
		$imageData = base64_encode(file_get_contents($img));
		$imageSrc = "data:{$imageSize['mime']};base64,{$imageData}";
		if ($class!="") $imgclass='class="'.$class.'"'; else $imgclass='';
		if ($alt!="") $imgalt='alt="'.$alt.'"'; else $imgalt='';
		$tag = '<img ' .$imgclass.' src="'.$imageSrc.'" '.$imgalt.' />';
		return $tag;
		}
}
?>