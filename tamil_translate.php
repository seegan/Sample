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
	            '/ஔ/',         
	        ),


	        array (
	            'f',
	            'q',
	            'r',
	            'Q',
	            'l',
	            'z',
	            'j',
	            'e',
	            'g',
	            'k',
	            'a',
	            'u',
	            'y',
	            't',
	            'o',
	            's',
	            'w',
	            'd',
	            'm',
				'M',
				',',
				'<',
				'c',
				'C',
				'v',
				'V',
				'I',
				'x',
				'X',
				'xs',       
	        ),
	        $data 
	    );
	}


	function tamil_to_eng_double($letter1, $letter2) { 





		$key = $letter1.$letter2;

		if($letter1 == 'ஸ') {
			$data = array( 'ஸ்' => '];', 'ஸி' => ']p');
			return $data[$key];
		}

		if($letter1 == 'க') {
			$data = array( 'க்' => 'f;',	'கா' => 'fh',	'கி' => 'fp',	'கீ' => 'fP',	'கு' => 'F',	'கூ' => '$',	'கெ' => 'nf',	'கே' => 'Nf',	'கை' => 'if',	'கொ' => 'nfh',	'கோ' => 'Nfh',	'கௌ' => 'nfs');
			return $data[$key];
		}
		if($letter1 == 'ங') {
			$data = array( 'ங்' => 'q;',	'ஙா' => 'qh',	'ஙி' => 'qp',	'ஙீ' => 'qP',	'ஙெ' => 'nq',	'ஙே' => 'Nq',	'ஙை' => 'iq',	'ஙொ' => 'nqh',	'ஙோ' => 'Nqh',	'ஙௌ' => 'nqs');
			return $data[$key];
		}
		if($letter1 == 'ச') {
			$data = array( 'ச்' => 'r;',	'சா' => 'rh',	'சி' => 'rp',	'சீ' => 'rP',	'சு' => 'R',	'சூ' => '#',	'செ' => 'nr',	'சே' => 'Nr',	'சை' => 'ir',	'சொ' => 'nrh',	'சோ' => 'Nrh',	'சௌ' => 'nrs');
			return $data[$key];
		}
		if($letter1 == 'ஞ') {
			$data = array( 'ஞ்' => 'Q;',	'ஞா' => 'Qh',	'ஞி' => 'Qp',	'ஞீ' => 'QP',	'ஞெ' => 'nQ',	'ஞே' => 'NQ',	'ஞை' => 'iQ',	'ஞொ' => 'nQh',	'ஞோ' => 'NQh',	'ஞௌ' => 'nQs');
			return $data[$key];
		}
		if($letter1 == 'ட') {
			$data = array( 'ட்' => 'l;',	'டா' => 'lh',	'டி' => 'b',/*'lp',*/	'டீ' => 'lP',	'டு' => 'L',	'டூ' => '^',	'டெ' => 'nl',	'டே' => 'Nl',	'டை' => 'il',	'டொ' => 'nlh',	'டோ' => 'Nlh',	'டௌ' => 'nls');
			return $data[$key];
		}
		if($letter1 == 'ண') {
			$data = array( 'ண்' => 'z;',	'ணா' => 'zh',	'ணி' => 'zp',	'ணீ' => 'zP',	'ணு' => 'Z',	'ணூ' => 'Zh',	'ணெ' => 'nz',	'ணே' => 'Nz',	'ணை' => 'iz',	'ணொ' => 'nzh',	'ணோ' => 'Nzh',	'ணௌ' => 'nzs');
			return $data[$key];
		}
		if($letter1 == 'த') {
			$data = array( 'த்' => 'j;',	'தா' => 'jh',	'தி' => 'jp',	'தீ' => 'jP',	'து' => 'J',	'தூ' => 'Jh',	'தெ' => 'nj',	'தே' => 'Nj',	'தை' => 'ij',	'தொ' => 'njh',	'தோ' => 'Njh',	'தௌ' => 'njs');
			return $data[$key];
		}
		if($letter1 == 'ந') {
			$data = array( 'ந்' => 'e;',	'நா' => 'eh',	'நி' => 'ep',	'நீ' => 'eP',	'நு' => 'E',	'நூ' => 'Eh',	'நெ' => 'ne',	'நே' => 'Ne',	'நை' => 'ie',	'நொ' => 'neh',	'நோ' => 'Neh',	'நௌ' => 'nes');
			return $data[$key];
		}
		if($letter1 == 'ப') {
			$data = array( 'ப்' => 'g;',	'பா' => 'gh',	'பி' => 'gp',	'பீ' => 'gP',	'பு' => 'G',	'பூ' => 'Gh',	'பெ' => 'ng',	'பே' => 'Ng',	'பை' => 'ig',	'பொ' => 'ngh',	'போ' => 'Ngh',	'பௌ' => 'ngs');
			return $data[$key];
		}
		if($letter1 == 'ம') {
			$data = array( 'ம்' => 'k;',	'மா' => 'kh',	'மி' => 'kp',	'மீ' => 'kP',	'மு' => 'K',	'மூ' => 'Kh',	'மெ' => 'nk',	'மே' => 'Nk',	'மை' => 'ik',	'மொ' => 'nkh',	'மோ' => 'Nkh',	'மௌ' => 'nks');
			return $data[$key];
		}
		if($letter1 == 'ய') {
			$data = array( 'ய்' => 'a;',	'யா' => 'ah',	'யி' => 'ap',	'யீ' => 'aP',	'யு' => 'A',	'யூ' => 'Ah',	'யெ' => 'na',	'யே' => 'Na',	'யை' => 'ia',	'யொ' => 'nah',	'யோ' => 'Nah',	'யௌ' => 'nas');
			return $data[$key];
		}
		if($letter1 == 'ர') {
			$data = array( 'ர்' => 'u;',	'ரா' => 'uh',	'ரி' => 'up',	'ரீ' => 'uP',	'ரு' => 'U',	'ரூ' => 'Uh',	'ரெ' => 'nu',	'ரே' => 'Nu',	'ரை' => 'iu',	'ரொ' => 'nuh',	'ரோ' => 'Nuh',	'ரௌ' => 'nus');
			return $data[$key];
		}
		if($letter1 == 'ல') {
			$data = array( 'ல்' => 'y;',	'லா' => 'yh',	'லி' => 'yp',	'லீ' => 'yP',	'லு' => 'Y',	'லூ' => 'Yh',	'லெ' => 'ny',	'லே' => 'Ny',	'லை' => 'iy',	'லொ' => 'nyh',	'லோ' => 'Nyh',	'லௌ' => 'nys');
			return $data[$key];
		}
		if($letter1 == 'வ') {
			$data = array( 'வ்' => 't;',	'வா' => 'th',	'வி' => 'tp',	'வீ' => 'tP',	'வு' => 'T',	'வூ' => 'Th',	'வெ' => 'nt',	'வே' => 'Nt',	'வை' => 'it',	'வொ' => 'nth',	'வோ' => 'Nth',	'வௌ' => 'nts');
			return $data[$key];
		}
		if($letter1 == 'ழ') {
			$data = array( 'ழ்' => 'o;',	'ழா' => 'oh',	'ழி' => 'op',	'ழீ' => 'oP',	'ழு' => 'O',	'ழூ' => 'Oh',	'ழெ' => 'no',	'ழே' => 'No',	'ழை' => 'io',	'ழொ' => 'noh',	'ழோ' => 'Noh',	'ழௌ' => 'nos');
			return $data[$key];
		}
		if($letter1 == 'ள') {
			$data = array( 'ள்' => 's;', 'ளா' => 'sh',	'ளி' => 'sp',	'ளீ' => 'sP',	'ளு' => 'S',	'ளூ' => 'Sh',	'ளெ' => 'ns',	'ளே' => 'Ns',	'ளை' => 'is',	'ளொ' => 'nsh',	'ளோ' => 'Nsh',	'ளௌ' => 'nss');
			return $data[$key];
		}
		if($letter1 == 'ற') {
			$data = array( 'ற்' => 'w;',	'றா' => 'wh',	'றி' => 'wp',	'றீ' => 'wP',	'று' => 'W',	'றூ' => 'Wh',	'றெ' => 'nw',	'றே' => 'Nw',	'றை' => 'iw',	'றொ' => 'nwh',	'றோ' => 'Nwh',	'றௌ' => 'nws');
			return $data[$key];
		}
		if($letter1 == 'ன') {
			$data = array( 'ன்' => 'd;', 'னா' => 'dh',	'னி' => 'dp',	'னீ' => 'dP',	'னு' => 'D',	'னூ' => 'Dh',	'னெ' => 'nd',	'னே' => 'Nd',	'னை' => 'id',	'னொ' => 'ndh',	'னோ' => 'Ndh',	'னௌ' => 'nds');
			return $data[$key];
		}

	}

}


?>