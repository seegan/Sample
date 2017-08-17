<?php
require 'tamil_translate.php';
//require 'tamil_tanglish_translate.php';

$tamilTranslate = new tamilTranslate();

$string = $_GET['txt'];

		$data 		= $tamilTranslate->str_split_unicode($string);
		if(count($data['eng']) != 0) {
			$before_replace = implode("",$data['eng']);
		} else {
			$before_replace = '';
		}
		var_dump($before_replace); 



        
        
        
        
        
