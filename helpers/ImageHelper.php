<?php
class ImageHelper {
	
	/**
	 * Cria thumbnail de imagem
	 */
	public static function createImageThumb($imagebase, $filename, $thumbs_base, $mimetype, $width, $quality){
	
		#se nao houver, cria diretorio de thumbs
		if(!is_dir($thumbs_base)){
			if(!mkdir($thumbs_base, 0777, true)) {
			    die('Falha ao tentar criar '.$thumbs_base);
			}
		}
		
		$pict = $imagebase.'/'.$filename;
		
		switch($mimetype){
			case 'image/jpeg':
				$original = imagecreatefromjpeg($pict);		
				break;
			case 'image/png':
				$original = imagecreatefrompng($pict);
				break;
			case 'image/gif':
				$original = imagecreatefromgif($pict);
				break;		
		}
		
		$larg_foto = imagesx($original);
		$alt_foto = imagesy($original);
		$fator = ($alt_foto/$larg_foto);
		$altura_nova = ($width*$fator);
		$out = imagecreatetruecolor($width, $altura_nova);
		imagecopyresized($out, $original, 0, 0, 0, 0, $width, $altura_nova, $larg_foto, $alt_foto);
		
		$thumb_filename = explode('.', $filename);
		$thumb_filename = '/thumb_'.$thumb_filename[0].'.jpg'; 
		imagejpeg($out, $thumbs_base.$thumb_filename, $quality);
		
		imagedestroy($out);
		imagedestroy($original);
	}	
}
?>