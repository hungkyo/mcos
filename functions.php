<?php
function Make_HTML_Inline($html) {
	$html = str_replace ( "\n", "", $html );
	$html = str_replace ( "\r", "", $html );
	$html = str_replace ( "\t", "", $html );
	$html = str_replace ( "\o", "", $html );
	$html = str_replace ( "\t", "", $html );
	
	$html = str_replace ( '> <', '><', $html );
	$html = str_replace ( ' >', '>', $html );
	$html = str_replace ( '< ', '<', $html );
	$html = str_replace ( ' =', '=', $html );
	$html = str_replace ( '= ', '=', $html );
	$html = str_replace ( ' :', ':', $html );
	$html = preg_replace ( '/\s\s+/u', ' ', $html );
	return $html;
}
function replace_title($str) {
	$str1 = strtolower ( get_ascii ( $str ) );
	$strx = str_split($str1);
	$str1 = '';
	foreach ($strx as $c)
		if ((ord($c)>=ord('a') && ord($c)<=ord('z')) || (ord($c)>=ord('0') && ord($c)<=ord('9')) || ($c == ' ') || ($c == '-')) $str1 = $str1 . $c;
	
	//$str1 = strtolower ( get_ascii ( $str ) );
	
	$str2 = str_replace ( array ('~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '=', '{', '}', '[', ']', '|', ':', ';', '"', '<', '>', '.', '?', '/', ',', '//', '\'' ), ' ', convert_non_mark ( trim ( $str1 ) ) );
	$str3 = str_replace ( ' ', '-', trim ( $str2 ) );
	$str4 = str_replace ( '---', '-', trim ( $str3 ) );
	$str5 = str_replace ( '--', '-', trim ( $str4 ) );
	return trim ( $str5 );
}
function convert_non_mark($str) {
	
	$str = preg_replace ( "/(Г |ГЎ|бєЎ|бєЈ|ГЈ|Гў|бє§|бєҐ|бє­|бє©|бє«|Дѓ|бє±|бєЇ|бє·|бєі|бєµ)/", 'a', $str );
	
	$str = preg_replace ( "/(ГЁ|Г©|бє№|бє»|бєЅ|ГЄ|б»Ѓ|бєї|б»‡|б»ѓ|б»…)/", 'e', $str );
	
	$str = preg_replace ( "/(Г¬|Г­|б»‹|б»‰|Д©)/", 'i', $str );
	
	$str = preg_replace ( "/(ГІ|Гі|б»Ќ|б»Џ|Гµ|Гґ|б»“|б»‘|б»™|б»•|б»—|ЖЎ|б»ќ|б»›|б»Ј|б»џ|б»Ў)/", 'o', $str );
	
	$str = preg_replace ( "/(Г№|Гє|б»Ґ|б»§|Е©|Ж°|б»«|б»©|б»±|б»­|б»Ї)/", 'u', $str );
	
	$str = preg_replace ( "/(б»і|ГЅ|б»µ|б»·|б»№)/", 'y', $str );
	
	$str = preg_replace ( "/(Д‘)/", 'd', $str );
	
	$str = preg_replace ( "/(ГЂ|ГЃ|бє |бєў|Гѓ|Г‚|бє¦|бє¤|бє¬|бєЁ|бєЄ|Д‚|бє°|бє®|бє¶|бєІ|бєґ)/", 'A', $str );
	
	$str = preg_replace ( "/(Г€|Г‰|бєё|бєє|бєј|ГЉ|б»Ђ|бєѕ|б»†|б»‚|б»„)/", 'E', $str );
	
	$str = preg_replace ( "/(ГЊ|ГЌ|б»Љ|б»€|ДЁ)/", 'I', $str );
	
	$str = preg_replace ( "/(Г’|Г“|б»Њ|б»Ћ|Г•|Г”|б»’|б»ђ|б»|б»”|б»–|Ж |б»њ|б»љ|б»ў|б»ћ|б» )/", 'O', $str );
	
	$str = preg_replace ( "/(Г™|Гљ|б»¤|б»¦|ЕЁ|ЖЇ|б»Є|б»Ё|б»°|б»¬|б»®)/", 'U', $str );
	
	$str = preg_replace ( "/(б»І|Гќ|б»ґ|б»¶|б»ё)/", 'Y', $str );
	
	$str = preg_replace ( "/(Дђ)/", 'D', $str );
	
	return $str;

}
function get_ascii($str) {
	
	$chars = array (

	'a' => array ('A', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ă', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ă' ), 

	'e' => array ('E', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê' ), 

	'i' => array ('I', 'í', 'ì', 'ỉ', 'ĩ', 'ị', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị' ), 

	'o' => array ('O', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'Ố', 'Ồ', 'Ổ', 'Ô', 'Ộ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ơ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ơ' ), 

	'u' => array ('U', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư' ), 

	'y' => array ('Y', 'ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ' ), 

	'd' => array ('D', 'đ', 'Đ' ), 

	'q' => array ('Q' ), 

	'w' => array ('W' ), 

	'r' => array ('R' ), 

	't' => array ('T' ), 

	'p' => array ('P' ), 

	's' => array ('S' ), 

	'f' => array ('F' ), 

	'g' => array ('G' ), 

	'h' => array ('H' ), 

	'j' => array ('J' ), 

	'k' => array ('K' ), 

	'l' => array ('L' ), 

	'z' => array ('Z' ), 

	'x' => array ('X' ), 

	'c' => array ('C' ), 

	'v' => array ('V' ), 

	'b' => array ('B' ), 

	'n' => array ('N' ), 

	'm' => array ('M' ) )

	;
	
	foreach ( $chars as $key => $arr )
		
		foreach ( $arr as $val )
			
			$str = str_replace ( $val, $key, $str );
	
	return $str;

}

function page_navi($sql,$slug)
{
	Global $mysql,$p,$m;
	$href = $slug;
	$q = $mysql->query($sql);
	$r = mysql_fetch_array($q);
	$_p = $r['c'];
	$max = ceil($_p/$m);
	$a = array();
	if($p>1){
		$a[] = array(
			'link' => $href.'?p=1',
			'text' => 'First',
		);
	}
	if($p>4){
		for($i=$p-1;$i>=$p-2;$i++){
			$a[] = array(
				'link' => $href.'?p='.$i,
				'text' => $i,
			);
		}
	}else{
		for($i=2;$i<$p;$i++){
			$a[] = array(
				'link' => $href.'?p='.$i,
				'text' => $i,
				'name' => $i,
				'title' => $i,
			);
		}
	}
	$a[] = array(
		'link' => $href.'?p='.$p,
		'text' => $p,
		'name' => $p,
		'title' => $p,
		'class' => 'current'
	);
	if($p<$max-2){
		for($i=$p+1;$i<=$p+2;$i++){
			$a[] = array(
				'link' => $href.'?p='.$i,
				'text' => $i,
				'name' => $i,
				'title' => $i,
			);
		}
	}elseif($p<$max){
		for($i=$p+1;$i<$max;$i++){
			$a[] = array(
				'link' => $href.'?p='.$i,
				'text' => $i,
				'name' => $i,
				'title' => $i,
			);
		}
	}
	if ($p<$max){
		$a[] = array(
			'link' => $href.'?p='.$max,
			'text' => 'Last',
			'name' => 'Last',
			'title' => 'Last',
		);
	}
	return $a;
}	
function get_curl($url,$attr = array()) {
		$curl = curl_init();
		$a = array(
			'useheader' => false,
			// 'useragent' => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36',
			'useragent' => 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Maxthon/4.2.1.1000 Chrome/30.0.1551.0 Safari/537.36',
			'referer' => '',
			'autoreferer' => true,
			'usehttpheader' => true,
			'ucookie' => '',
			'encoding' => '',
			'timeout' => 45,
			'host' => cut($url,'ttp://','/',0,0),
			'follow' => true,
			'mpost' => false,
			'mpostfield' => '',
		);
		foreach ($a AS $key => $default){
			if (isset($attr[$key])) $$key=$attr[$key];
			else $$key = $default;
		}
		$header[0] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
		$header[] = "Accept-Language: en-us,en;q=0.5";
		$header[] = "Accept-Encoding: gzip,deflate";
		$header[] = "Accept-Language: en-US";
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$header[] = "Keep-Alive: 200";
		$header[] = "Pragma: no-cache";
		$header[] = "Connection: keep-alive";
		// $header[] = "DNT: 1";
		if ($host) $header[] = "Host: $host";
		
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		
		if($useheader){curl_setopt($curl, CURLOPT_HEADER, 1);}
		if($useragent!=""){curl_setopt($curl, CURLOPT_USERAGENT, $useragent);}
		if($usehttpheader){curl_setopt($curl, CURLOPT_HTTPHEADER, $header);}
		if($ucookie!=""){curl_setopt($curl, CURLOPT_COOKIE, $ucookie);}
		if($referer!=""){curl_setopt($curl, CURLOPT_REFERER, $referer);}
		if($mpost){curl_setopt($curl, CURLOPT_POST, 1);}
		if($mpostfield!=""){curl_setopt($curl, CURLOPT_POSTFIELDS, $mpostfield);}
		if($autoreferer){curl_setopt($curl, CURLOPT_AUTOREFERER, 1);}
		/*if($encoding!=""){*/curl_setopt($curl, CURLOPT_ENCODING, $encoding);//}
		if($timeout!=""){curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);}
		if($follow){curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);}

		$result = curl_exec($curl);
		return $result;
	}
	function cut($bandau,$batdau,$ketthuc,$laydau=1,$laycuoi=1){
		$ban = ' '.$bandau;
		if (!$batdau || !$ketthuc) return '';
		$a = strpos($ban,$batdau);
		if ($a == 0) return '';
		$b = strpos($ban, $ketthuc, $a+strlen($batdau));
		if ($b == 0) return '';
		if ($laydau<>1) $a = $a + strlen($batdau);
		if ($laycuoi==1) $b = $b + strlen($ketthuc);
		return substr($ban,$a,$b - $a);
	}
	function _att($d,$r){
		$out = array ();
		foreach ($d AS $k=>$v){
			if (isset($r[$k])) $out[$k] = $r[$k];
			else $out[$k] = $v;
		}
		return $out;
	}
	function _cut3($x,$a,$stt=1){
		if($a=='<a>'){
			$b = 'a';
			$a = '<a ';
		}else $b = cut($a,'<',' ',0,0);
		if (!$b) $b = cut($a,'<','>',0,0);
		if (!$b) $b = cut($a.'###','<','###',0,0);
		if (!$b) return;
		$c = '<'.$b;
		$b = '</'.$b.'>';
		$x = str_replace(strtoupper($c),$c,$x);
		$x = str_replace(strtoupper($b),$b,$x);
		$_a = 0;
		for($i=1;$i<=$stt;$i++){
			if($_a+1 < strlen($x)){
				$_a = stripos($x,$a,$_a+1);
			}else{
				return '';
			}
		}
		if(!$_a) return '';
		$_b = $_a;
		$_c = stripos($x,$b,$_b+1);
		$qu = 0;
		$t = substr($x,$_b,$_c-$_b);
		$qu += substr_count($t,$c,strlen($c));
		$_b = $_c;
		while($qu > 0 && $qu < 500){
			$_c = stripos($x,$b,$_b+1);
			$t = substr($x,$_b,$_c-$_b);
			$qu += substr_count($t,$c);
			$_b = $_c;
			$qu--;
		}
		if(!$_c) return '';
		return trim(substr($x,$_a,$_c-$_a+strlen($b)));
		
	}
	function _cut2($b,$q){	
		if (!$q) return $b;
		if (!$b) return '';
		
		$q1 = explode("[+]",$q);
		$out = '';
		foreach ($q1 AS $q){
			$r = $b;
			$_q = explode("\n",$q);
			foreach ($_q AS $__q){
				if($__q){
					$__c = explode('|',$__q);
					if($__c[1]) {
						$__c = $__c[1];
						$r = _cut3($r,$__q,$__c);
					}
					else $r = _cut3($r,$__q);
				}
			}
			$out .= $r;
		}
		return $out	;
	}
	function _strip_str($b,$q){
		if (!$q) return $b;
		if (!$b) return '';
		$r = $b;
		$_q = explode("\n",$q);
		foreach ($_q AS $__q){
			if($__q){
				$_r = explode('|',$__q);
				if (count($_r) > 1) $d = $_r[1];
				else $d = '';
				if (strpos(' '.$__q,'[start]') && strpos($__q,'[to]') && strpos($__q,'[end]')) {
					$count = intval(cut($__q,'[end]','[count]',0,0));
					$f = _cut3($b,cut($__q,'[start]','[end]',0,0));
					if ($count == 0){
						while ($f) {
							$r = str_replace($f,$d,$r);
							$f = cut($r,cut($__q,'[start]','[to]',0,0),cut($__q,'[to]','[end]',0,0));
						}
					}else{
						for ($c = 1; $c <= $count; $c++){
							if ($f) $r = str_replace($f,$d,$r);
							$f = cut($r,cut($__q,'[start]','[to]',0,0),cut($__q,'[to]','[end]',0,0));
						}
					}
				}elseif (strpos(' '.$__q,'[start]') && strpos($__q,'[end]')) {
					$count = intval(cut($__q,'[end]','[count]',0,0));
					$f = cut($b,cut($__q,'[start]','[to]',0,0),cut($__q,'[to]','[end]',0,0));
					if ($count == 0){
						while ($f) {
							$r = str_replace($f,$d,$r);
							$f = cut($r,cut($__q,'[start]','[to]',0,0),cut($__q,'[to]','[end]',0,0));
						}
					}else{
						for ($c = 1; $c <= $count; $c++){
							if ($f) $r = str_replace($f,$d,$r);
							$f = cut($r,cut($__q,'[start]','[to]',0,0),cut($__q,'[to]','[end]',0,0));
						}
					}
				}	
				else{
					$r = str_ireplace($_r[0],$d,$r);
				}
			}
		}
		return $r;
	}
	function _strip2($b,$q){
		if (!$q) return $b;
		if (!$b) return '';
		$r = $b;
		$r = $b;
		$_q = explode("\n",$q);
		foreach ($_q AS $__q){
			if($__q){
				$_r = explode('|',$__q);
				if (count($_r) > 1) $d = $_r[1];
				else $d = '';
				if (strpos(' '.$__q,'[start]') && strpos($__q,'[to]') && strpos($__q,'[end]')) {
					$count = intval(cut($__q,'[end]','[count]',0,0));
					$f = cut($r,cut($__q,'[start]','[to]',0,0),cut($__q,'[to]','[end]',0,0));
					if ($count == 0){
						while ($f) {
							$r = str_replace($f,$d,$r);
							$f = cut($r,cut($__q,'[start]','[to]',0,0),cut($__q,'[to]','[end]',0,0));
						}
					}else{
						for ($c = 1; $c <= $count; $c++){
							if ($f) $r = str_replace($f,$d,$r);
							$f = cut($r,cut($__q,'[start]','[to]',0,0),cut($__q,'[to]','[end]',0,0));
						}
					}
				}elseif (strpos(' '.$__q,'[start]') && strpos($__q,'[end]')) {
					$count = intval(cut($__q,'[end]','[count]',0,0));
					$f = _cut3($b,cut($__q,'[start]','[end]',0,0));
					if ($count == 0){
						while ($f) {
							$r = str_replace($f,$d,$r);
							$f = _cut3($r,cut($__q,'[start]','[end]',0,0));
						}
					}else{
						for ($c = 1; $c <= $count; $c++){
							if ($f) $r = str_replace($f,$d,$r);
							$f = _cut3($r,cut($__q,'[start]','[end]',0,0));
						}
					}
				}
				else{
					$r = str_ireplace($_r[0],$d,$r);
				}
			}
		}
		return $r;
	}
	function highlight_keywords($b,$q){
		if (!$q) return $b;
		if (!$b) return '';
		$r = $b;
		$tags = array(
			'b',
			'strong',
			'i',
			'em',
			'u',
		);
		$_q = explode("\n",$q);
		foreach ($_q AS $__q){
			if($__q){
				if (strpos(' '.$r,$__q)){
					$_d = explode($__q,$r);
					$r = $_d[0];
					for($j=1;$j<count($_d)-1;$j++){
						$__d = $_d[$j];
						$d = $tags[mt_rand(0,4)];
						$r = $r. "<$d>".$__q."</$d>".$__d;
					}
					$r = $r.$_d[count($_d)-1];
				}
			}
		}
		return $r;
	}
function save_images($img,$ind,$title,$upload_dir) 
{
						if (cut($img,'src="','"')){
							$_src = cut($img,'src="','"',0,0);
						}elseif(cut($img,"src='","'")){
							$_src = cut($img,"src='","'",0,0);
						}
						//$_img_from_src = file_get_contents($_src);
						if (strpos($_src,'.jpg')) $ext = '.jpg';
						elseif (strpos($_src,'.png')) $ext = '.png';
						elseif (strpos($_src,'.gif')) $ext = '.gif';
						elseif (strpos($_src,'.jpeg')) $ext = '.jpeg';
						if (preg_match('/([a-zA-Z0-9\-]*)/',replace_title($title),$mm))
							$_img_name = $mm[0].'-'.$ind.$ext;
						
						$_img_name = str_replace(' ','',$_img_name);
						// $_img_name = str_replace(' ','',$_img_name);
						// $_img_name = str_replace('','',$_img_name);
						$_src = str_replace(
							array(' '),
							array('%20'),
							$_src
						);
						
						$curl = curl_init($_src);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($curl, CURLOPT_HEADER, 0);
						$header[0] = "Host: ".cut($_src,'ttp://','/',0,0);
						curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36');
						curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
						$_img_from_src = curl_exec($curl);
						curl_close($curl);
						
						file_put_contents($upload_dir['path'].'/'.$_img_name,$_img_from_src);
						$_img_size = getimagesize($upload_dir['path'].'/'.$_img_name);
						$_img = '<img src="'.$upload_dir['url'].'/'.$_img_name.'" width="'.$_img_size[0].'px" height="'.$_img_size[1].'px" alt="'.$title.' '.$ind.'" /><br/>';
						return $_img;
}
	function cat_list($x='') {
		global $mysql;
		$q = $mysql->query("SELECT id, name FROM cat");
		while($r = mysql_fetch_array($q)){
		if (strpos(' '.$x,",".$r['id'].",")) $first = $first.'
		<input name="cat[]" id="cat" type="checkbox" value="'.$r['id'].'" checked/> '.$r['name'].'<br/>
		';
		else $sec = $sec.'
		<input name="cat[]" id="cat" type="checkbox" value="'.$r['id'].'"/> '.$r['name'].'<br/>
		';
		}
		echo $first;
		echo $sec;
	}
	function sitelist($x='') {
		global $mysql;
		$q = $mysql->query("SELECT site_id, site_url FROM table_site");
		while($r = mysql_fetch_array($q)){
		
		if (strpos(' '.$x,",".$r['site_id'].",")) $first = $first.'
		<input name="link_site[]" id="link_site" type="checkbox" value="'.$r['site_id'].'" checked="checked" /> '.$r['site_url'].'<br/>
		';
		else $sec = $sec.'
		<input name="link_site[]" id="link_site" type="checkbox" value="'.$r['site_id'].'"/> '.$r['site_url'].'<br/>
		';
		}
		echo $first;
		echo $sec;
		?>
		<a href="javascript:checkall()" id="chonhet">Chọn hết</a>
		<a href="javascript:ncheckall()" id="bochonhet">Bỏ Chọn hết</a>
		<script>
			$("#bochonhet").hide();
			function checkall() {
				$("[name='link_site[]'").each(function (i){
					if ($(this).attr("checked") != "checked") $(this).click();
				});
				$("#chonhet").hide();
				$("#bochonhet").show();
			}
			function ncheckall() {
				$("[name='link_site[]'").each(function (i){
					if ($(this).attr("checked") == "checked") $(this).click();
				});
				$("#bochonhet").hide();
				$("#chonhet").show();
			}
		</script>
		<?
	}
function get_bl($p) {
	$d = $_SERVER['SERVER_NAME'];
	$d = str_replace('www.','',$d);
	$d = trim($d,'/');
	$d = strtolower(trim($d));
	echo echo_($d,$p);
	return;
}
function _get_bl($p) {
	$d = $_SERVER['SERVER_NAME'];
	$d = str_replace('www.','',$d);
	$d = trim($d,'/');
	$d = strtolower(trim($d));
	return echo_($d,$p);
}
function _link($z){
	global $r_s;
	return 'http://'.$r_s['url'].'/'.$z.'.html';
}
	function get_post($w='',$o='p.id DESC',$l='0,15'){
		global $mysql,$r_s;
		$sql = "SELECT p.*,r.slug AS rewrite FROM post AS p, rewrite AS r WHERE 
			p.site='".$r_s['id']."' AND
			r._id=p.id AND
			r.type='post'";
		if ($w) $sql .= " AND 
			$w
		";
		if ($o) $sql .= "ORDER BY $o
		";
		if ($l) $sql .= "LIMIT $l";
		$q = $mysql->query($sql);
		$posts = array();
		while($r = mysql_fetch_array($q)){
			$tag = trim($r['tag'],',');
			if ($tag) {
				$tags = get_tax($tag,1);
			}else $tags = array();
			$p = array(
				'id' => $r['id'],
				'title' => $r['title'],
				'excerpt' => $r['excerpt'],
				'content' => $r['content'],
				'link' => _link($r['rewrite']),
				'tag' => $tags,
				'thumb' => $r['thumb'],
			);
			$posts[] = $p;
		}
		return $posts;
	}
	function get_product($w='',$o='p.id DESC',$l='0,15'){
		global $mysql,$r_s;
		$sql = "SELECT p.*,r.slug AS rewrite FROM post AS p, rewrite AS r WHERE 
			p.site='".$r_s['id']."' AND
			r._id=p.id AND
			r.type='product'";
		if ($w) $sql .= " AND 
			$w
		";
		if ($o) $sql .= "ORDER BY $o
		";
		if ($l) $sql .= "LIMIT $l";
		$q = $mysql->query($sql);
		$posts = array();
		while($r = mysql_fetch_array($q)){
			$tag = trim($r['tag'],',');
			if ($tag) {
				$tags = get_tax($tag,1);
			}else $tags = array();
			$p = array(
				'id' => $r['id'],
				'title' => $r['title'],
				'excerpt' => $r['excerpt'],
				'content' => $r['content'],
				'link' => _link($r['rewrite']),
				'tag' => $tags,
				'thumb' => $r['thumb'],
				'amazon' => $r['amazon'],
				'info' => $r['info'],
			);
			$posts[] = $p;
		}
		return $posts;
	}
	function get_tax($ids='0',$type=0){
		global $mysql;
		switch ($type){
			case 0:
			default:
				$rtype = 'cat';
				break;
			case 2:
				$rtype = 'tag';
				break;	
		}
		$id = explode(',',$ids);
		if (count($id)>1){
			$tax = array();
			$q_t = $mysql->query("SELECT t.*, r.slug AS rew FROM tax AS t, rewrite AS r WHERE t.id IN ($ids) AND r.type='$rtype' AND r._id=t.id AND t.type=$type");
			while($r_c = mysql_fetch_array($q_t)){
				$tax[] = array(
					'id' => $r_c['id'],
					'title' => $r_c['title'],
					'name' => $r_c['title'],
					'slug' => $r_c['slug'],
					'rewrite' => _link($r_c['rew']),
					'link' => _link($r_c['rew']),
					'description' => $r_c['description'],
				);
			}
		}else{
			$q_t = $mysql->query("SELECT t.*, r.slug AS rew FROM tax AS t, rewrite AS r WHERE t.id = $ids AND r.type='$rtype' AND r._id=t.id AND t.type=$type");
			$r_c = mysql_fetch_array($q_t);
			$tax = array(
				'id' => $r_c['id'],
				'title' => $r_c['title'],
				'name' => $r_c['title'],
				'slug' => $r_c['slug'],
				'rewrite' => _link($r_c['rew']),
				'link' => _link($r_c['rew']),
				'description' => $r_c['description'],
			);
		}
		return $tax;
	}
function getModel($name){
	$className = "{$name}Model";
	return new $className;
}
function getSingleton($name){

}