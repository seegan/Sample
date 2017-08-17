<?php
class tamilTranslate
{


	function __construct()
	{

	}



    function mb_htmlentities($string, $hex = true, $encoding = 'UTF-8') {
        return preg_replace_callback('/[\x{80}-\x{10FFFF}]/u', function ($match) use ($hex) {
            return sprintf($hex ? '&#x%X;' : '&#%d;', mb_ord($match[0]));
        }, $string);
    }

    function mb_ord($char, $encoding = 'UTF-8') {
        if ($encoding === 'UCS-4BE') {
            list(, $ord) = (strlen($char) === 4) ? @unpack('N', $char) : @unpack('n', $char);
            return $ord;
        } else {
            return mb_ord(mb_convert_encoding($char, 'UCS-4BE', $encoding), 'UCS-4BE');
        }
    }

    function mb_html_entity_decode($string, $flags = null, $encoding = 'UTF-8') {
        return html_entity_decode($string, ($flags === NULL) ? ENT_COMPAT | ENT_HTML401 : $flags, $encoding);
    }

	function str_split_unicode($str) {
        $data = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += 1) {

            //$ret[] = mb_substr($str, $i, 1, "UTF-8");
            $tmp = mb_substr($str, $i, 1, "UTF-8");
            if($tmp == '்' || $tmp =='ா' || $tmp == 'ி' || $tmp == 'ீ' || $tmp == 'ு' || $tmp == 'ூ' || $tmp == 'ெ' || $tmp == 'ே' || $tmp == 'ை' || $tmp == 'ொ' || $tmp == 'ோ' || $tmp == 'ௌ' ) {
            	$tmpl = mb_substr($str, ($i-1), 1, "UTF-8");
            	
            	$data['ret'][$i] = $tmpl.$tmp;
				$data['eng'][$i] = $this->tamil_to_eng_double($tmpl, $tmp);

            	unset($data['ret'][$i-1]);
            	unset($data['eng'][$i-1]);
            } else {
            	$data['ret'][$i] = mb_substr($str, $i, 1, "UTF-8");
            	$data['eng'][$i] = $this->tamil_to_eng_single($data['ret'][$i]);
            }
        }
        return $data;
	}


	function tamil_to_eng_single ($data) {
	    return preg_replace(
	        array (
	            '/க/',
	            '/ங/',
	            '/ச/',
	            '/ஞ/',
	            '/ட/',
	            '/ண/',
	            '/த/',
	            '/ந/',
	            '/ப/',
	            '/ம/',
	            '/ய/',
	            '/ர/',
	            '/ல/',
	            '/வ/',
	            '/ழ/',
	            '/ள/',
	            '/ற/',
	            '/ன/',
	            '/அ/',
	            '/ஆ/',
	            '/இ/',
	            '/ஈ/',
	            '/உ/',
	            '/ஊ/',
	            '/எ/',
	            '/ஏ/',
	            '/ஐ/',
	            '/ஒ/',
	            '/ஓ/',
	            '/ஸ/',
	            '/ஜ/',
	            '/ஷ/',           
	        ),
	        array (
	            'ka',
	            'nga',
	            'cha',
	            'nga',
	            'da',
	            'na',
	            'tha',
	            'na',
	            'pa',
	            'ma',
	            'ya',
	            'ra',
	            'la',
	            'va',
	            'za',
	            'la',
	            'ra',
	            'na',
	            'a',
	            'aa',
	            'i',
	            'ee',
	            'u',
	            'oo',
	            'e',
	            'a',
	            'ai',
	            'o',
	            'oo',
	            'sa',
	            'j',
	            'sa'           
	        ),
	        $data 
	    );
	}


	function tamil_to_eng_double($letter1, $letter2) { 
	    $data1 = preg_replace(
	        array (
	            '/க/',
	            '/ங/',
	            '/ச/',
	            '/ஞ/',
	            '/ட/',
	            '/ண/',
	            '/த/',
	            '/ந/',
	            '/ப/',
	            '/ம/',
	            '/ய/',
	            '/ர/',
	            '/ல/',
	            '/வ/',
	            '/ழ/',
	            '/ள/',
	            '/ற/',
	            '/ன/',
	            '/ஸ/',
	            '/ஜ/',
	            '/ஷ/',

	        ),
	        array (
	            'k',
	            'ng',
	            'ch',
	            'ng',
	            'd',
	            'n',
	            'th',
	            'n',
	            'p',
	            'm',
	            'y',
	            'r',
	            'l',
	            'v',
	            'z',
	            'l',
	            'r',
	            'n',
	            'sh',
	            'j',
	            'sh'
	        ),
	        $letter1 
	    );



	    $data2 = preg_replace(
	        array (
	        	'/்/',
	            '/ா/',
	            '/ி/',
	            '/ீ/',
	            '/ு/',
	            '/ூ/',
	            '/ெ/',
	            '/ே/',
	            '/ை/',
	            '/ொ/',
	            '/ோ/',
	            '/ௌ/',
	        ),
	        array (
	            '',
	            'aa',
	            'i',
	            'ee',
	            'u',
	            'oo',
	            'e',
	            'ee',
	            'ai',
	            'o',
	            'oo',
	            'ow',
	        ),
	        $letter2 
	    );

	    $out = $data1.$data2;
	    return $out;
	}
}




/*function str_split_unicode($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}*/

?>