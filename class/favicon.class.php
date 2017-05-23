<?php
require_once("simpleimage.class.php");

class Favicon{
	
	private function is_favicons($path){
		$is_favicons=true;
		$favicon_size=array(16, 32, 96);
		$apple_touch_icon_size=array(57,114,72,144,60,120,76,152,80,180,167);
		foreach ($favicon_size as $key => $value)
		$is_favicons=$is_favicons*file_exists($path.'/favicon-'.$value.'x'.$value.'.png');
		foreach ($apple_touch_icon_size as $key => $value)
		$is_favicons=$is_favicons*file_exists($path.'/apple-touch-icon-'.$value.'x'.$value.'.png');
		return $is_favicons;
			
	}
	
	private function favicon_create($path,$favicon){
		$favicon_size=array(16, 32, 96);
		$apple_touch_icon_size=array(57,114,72,144,60,120,76,152,80,180,167);
		foreach ($favicon_size as $key => $value){
			$image = new SimpleImage();
			$image->load($path.'/'.$favicon);
			$image->resize($value, $value);
			$image->save($path.'/favicon-'.$value.'x'.$value.'.png');
		}
		foreach ($apple_touch_icon_size as $key => $value){
			$image = new SimpleImage();
			$image->load($path.'/'.$favicon);
			$image->resize($value, $value);
			$image->save($path.'/apple-touch-icon-'.$value.'x'.$value.'.png');
		}
		
		
	}
	
	public function favicons($path,$favicon) {
		$favicon_size=array(16, 32, 96);
		$apple_touch_icon_size=array(57,114,72,144,60,120,76,152,80,180,167);
		if (!Favicon::is_favicons($path)) Favicon::favicon_create($path,$favicon);
		foreach ($favicon_size as $key => $value) echo ('<link rel="icon" type="image/png" href="'.$path.'/'.'favicon-'.$value.'x'.$value.'.png" sizes="'.$value.'x'.$value.'">'."\n\t");
		foreach ($apple_touch_icon_size as $key => $value)
			echo ('<link rel="apple-touch-icon" sizes="'.$value.'x'.$value.'" href="'.$path.'/apple-touch-icon-'.$value.'x'.$value.'.png">'."\n\t");
		
		
	}
}
?>