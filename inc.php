<?php
	if(!function_exists('bcmul'))
	{
		function bcmul($_ro, $_lo, $_scale=0)
		{
			return round($_ro*$_lo, $_scale);
		}
		function bcadd($_ro, $_lo, $_scale=0)
		{
			return round($_ro+$_lo,$_scale);
		}
		function bccomp($_ro, $_lo, $_scale=0)
		{
			return (((float)$_ro<(float)$_lo)?-1:(((float)$_ro>(float)$_lo)?1:0));
		}
	}
	function monize($str)
	{
		$out=$str;
		$out=str_replace(',','',$out);
		$out=str_replace('.','',$out);
		$j=-1;
		$tmp='';
		//$strr=explode(' ',$str);
		for($i=strlen($str)-1;$i>=0;$i--){
				//alert(txt[i]);
			if($j<2){
				$j++;
				$tmp=substr($str,$i,1) . $tmp;
			}else{
				$j=0;
				$tmp=substr($str,$i,1) . ',' . $tmp;
			}
		}                
		$out=$tmp;
	//	$out=($str);
	//	$out=strlen($str);
	//	$out=substr[strlen(
//echo enToPerNums($out);
		return enToPerNums($out);
	}
	function umonize($str){
		$out=$str;
		$out=str_replace(',','',$out);
		$out=str_replace('.','',$out);
		return($out);
	}
	function enToPerNums($inNum){
		$outp = $inNum;
		$outp = str_replace('0', '۰', $outp);
		$outp = str_replace('1', '۱', $outp);
		$outp = str_replace('2', '۲', $outp);
		$outp = str_replace('3', '۳', $outp);
		$outp = str_replace('4', '۴', $outp);
		$outp = str_replace('5', '۵', $outp);
		$outp = str_replace('6', '۶', $outp);
		$outp = str_replace('7', '۷', $outp);
		$outp = str_replace('8', '۸', $outp);
		$outp = str_replace('9', '۹', $outp);
//		$outp = perToEnNums($outp);
		return($outp);
	}
	function perToEnNums($inNum){
		$outp = $inNum;
		$outp = str_replace('۰', '0', $outp);
		$outp = str_replace('۱', '1', $outp);
		$outp = str_replace('۲', '2', $outp);
		$outp = str_replace('۳', '3', $outp);
		$outp = str_replace('۴', '4', $outp);
		$outp = str_replace('۵', '5', $outp);
		$outp = str_replace('۶', '6', $outp);
		$outp = str_replace('۷', '7', $outp);
		$outp = str_replace('۸', '8', $outp);
		$outp = str_replace('۹', '9', $outp);
		return($outp);
	}
	function loadTime(){
		//Server Version
		$ttt = time() + 8*60*60+30*60;
		//Local Version
		//$ttt = time();
 		return(enToPerNums(date("h:i",$tt)));
 	}
	function hamed_pdateBack($inp)
        {
		$inp = perToEnNums($inp);
                $out = FALSE;
                $tmp = explode("/",$inp);
                if (count($tmp)==3)
                {
                        $y=(int)$tmp[2];
                        $m=(int)$tmp[1];
                        $d=(int)$tmp[0];
                        if ($d>$y)
                        {
                                $tmp=$y;
                                $y=$d;
                                $d=$tmp;
                        }
                        if ($y<1000)
                        {
                                $y=$y+1300;
                        }
                        $inp="$y/$m/$d";
                        $out = audit_class::hamed_jalalitomiladi(audit_class::perToEn($inp));
                }
			return $out;
        }
?>
