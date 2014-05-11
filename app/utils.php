<?php
    /** 
     * 截取UTF8编码字符串从首字节开始指定宽度(非长度), 适用于字符串长度有限的如新闻标题的等宽度截取 
     * 中英文混排情况较理想. 全中文与全英文截取后对比显示宽度差异最大,且截取宽度远大越明显. 
     * @param string $str   UTF-8 encoding 
     * @param int[option] $width 截取宽度 
     * @param string[option] $end 被截取后追加的尾字符 
     * @param float[option] $x3<p> 
     *  3字节（中文）字符相当于希腊字母宽度的系数coefficient（小数） 
     *  中文通常固定用宋体,根据ascii字符字体宽度设定,不同浏览器可能会有不同显示效果</p> 
     * 
     * @return string 
     * @author waiting 
     * http://waiting.iteye.com 
     */  
    function u8_title_substr($str, $width = 0, $end = '...', $x3 = 0) {  
        global $CFG; // 全局变量保存 x3 的值  
        if ($width <= 0 || $width >= strlen($str)) {  
            return $str;  
        }  
        $e = '';
        $arr = str_split($str);  
        $len = count($arr);  
        $w = 0;  
        $width *= 10;  
      
        // 不同字节编码字符宽度系数  
        $x1 = 11;   // ASCII  
        $x2 = 16;  
        $x3 = $x3===0 ? ( $CFG['cf3']  > 0 ? $CFG['cf3']*10 : $x3 = 21 ) : $x3*10;  
        $x4 = $x3;  
      
        // http://zh.wikipedia.org/zh-cn/UTF8  
        for ($i = 0; $i < $len; $i++) {  
            if ($w >= $width) {  
                $e = $end;  
                break;  
            }  
            $c = ord($arr[$i]);  
            if ($c <= 127) {  
                $w += $x1;  
            }  
            elseif ($c >= 192 && $c <= 223) { // 2字节头  
                $w += $x2;  
                $i += 1;  
            }  
            elseif ($c >= 224 && $c <= 239) { // 3字节头  
                $w += $x3;  
                $i += 2;  
            }  
            elseif ($c >= 240 && $c <= 247) { // 4字节头  
                $w += $x4;  
                $i += 3;  
            }  
        }  
        return implode('', array_slice($arr, 0, $i) ). $e;  
    }  
    
    function chinese_substr($string, $length, $encoding  = 'utf-8') {   
        $string = trim($string);   
        
        if($length && strlen($string) > $length) {   
            //截断字符   
            $wordscut = '';   
            if(strtolower($encoding) == 'utf-8') {   
                //utf8编码   
                $n = 0;   
                $tn = 0;   
                $noc = 0;   
                while ($n < strlen($string)) {   
                    $t = ord($string[$n]);   
                    if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {   
                        $tn = 1;   
                        $n++;   
                        $noc++;   
                    } elseif(194 <= $t && $t <= 223) {   
                        $tn = 2;   
                        $n += 2;   
                        $noc += 2;   
                    } elseif(224 <= $t && $t < 239) {   
                        $tn = 3;   
                        $n += 3;   
                        $noc += 2;   
                    } elseif(240 <= $t && $t <= 247) {   
                        $tn = 4;   
                        $n += 4;   
                        $noc += 2;   
                    } elseif(248 <= $t && $t <= 251) {   
                        $tn = 5;   
                        $n += 5;   
                        $noc += 2;   
                    } elseif($t == 252 || $t == 253) {   
                        $tn = 6;   
                        $n += 6;   
                        $noc += 2;   
                    } else {   
                        $n++;   
                    }   
                    if ($noc >= $length) {   
                        break;   
                    }   
                }   
                if ($noc > $length) {   
                    $n -= $tn;   
                }   
                $wordscut = substr($string, 0, $n);   
            } else {   
                for($i = 0; $i < $length - 1; $i++) {   
                    if(ord($string[$i]) > 127) {   
                        $wordscut .= $string[$i].$string[$i + 1];   
                        $i++;   
                    } else {   
                        $wordscut .= $string[$i];   
                    }   
                }   
            }   
            $string = $wordscut;   
        }   
        return trim($string);   
    }  

	function html_abstract($html, $start, $length) {
		$html = strip_tags($html);
		$html = str_replace("&nbsp;", "", $html);
		$html = mb_substr($html, $start, $length);
		return $html;
	}


	/*
	* digitInt(22.45, 0.1) = 22.40
	*/
	function digitInt($num, $to){
		return intval($num / $to) * $to; 
	} 

	function cleanDirectory($dir)
	{
		if (!$dh = @opendir($dir))
			return;
		while (false !== ($obj = readdir($dh)))
		{
			if ($obj=='.' || $obj=='..')
				continue;
			@unlink($dir.'/'.$obj);
		}
		closedir($dh);
	}

	/** 
	* 将一个字串中含有全角的数字字符、字母、空格或'%+-()'字符转换为相应半角字符 
	* @access public 
	* @param string $str 待转换字串 
	* @return string $str 处理后字串 
	*/ 
	function make_semiangle($str) 
	{ 
		$arr = array('０' => '0', '１' => '1', '２' => '2', '３' => '3', '４' => '4','５' => '5', '６' => '6', '７' => '7', '８' => '8', '９' => '9', 'Ａ' => 'A', 'Ｂ' => 'B', 'Ｃ' => 'C', 'Ｄ' => 'D', 'Ｅ' => 'E','Ｆ' => 'F', 'Ｇ' => 'G', 'Ｈ' => 'H', 'Ｉ' => 'I', 'Ｊ' => 'J', 'Ｋ' => 'K', 'Ｌ' => 'L', 'Ｍ' => 'M', 'Ｎ' => 'N', 'Ｏ' => 'O','Ｐ' => 'P', 'Ｑ' => 'Q', 'Ｒ' => 'R', 'Ｓ' => 'S', 'Ｔ' => 'T','Ｕ' => 'U', 'Ｖ' => 'V', 'Ｗ' => 'W', 'Ｘ' => 'X', 'Ｙ' => 'Y','Ｚ' => 'Z', 'ａ' => 'a', 'ｂ' => 'b', 'ｃ' => 'c', 'ｄ' => 'd','ｅ' => 'e', 'ｆ' => 'f', 'ｇ' => 'g', 'ｈ' => 'h', 'ｉ' => 'i','ｊ' => 'j', 'ｋ' => 'k', 'ｌ' => 'l', 'ｍ' => 'm', 'ｎ' => 'n','ｏ' => 'o', 'ｐ' => 'p', 'ｑ' => 'q', 'ｒ' => 'r', 'ｓ' => 's', 'ｔ' => 't', 'ｕ' => 'u', 'ｖ' => 'v', 'ｗ' => 'w', 'ｘ' => 'x', 'ｙ' => 'y', 'ｚ' => 'z','（' => '(', '）' => ')', '〔' => '[', '〕' => ']', '【' => '[','】' => ']', '〖' => '[', '〗' => ']', '“' => '"', '”' => '"', '｛' => '{', '｝' => '}', '《' => '<','》' => '>','％' => '%', '＋' => '+', '—' => '-', '－' => '-', '～' => '-','：' => ':', '。' => '.', '、' => ',', '，' => ',', '；' => ';', '？' => '?', '！' => '!', '…' => '...', '‖' => '|', '｀' => '`', '‘' => '`', '｜' => '|', '〃' => '"','　' => ' '); 
		return strtr($str, $arr); 
	} 

	function getFileExt($filename) 
	{ 
		$ret = ""; 
		$pos = strrpos($filename, "."); 
		if ($pos)
			$ret = substr($filename, $pos+1, strlen($filename) - $pos); 
		return ($ret);
	}

	function getIp() {
		static $ip = false;
		if ($ip !== false)
			return $ip;
		foreach (array(
			'HTTP_CLIENT_IP',
			'HTTP_X_FORWARDED_FOR',
			'HTTP_X_FORWARDED',
			'HTTP_FORWARDED_FOR',
			'HTTP_FORWARDED',
			'REMOTE_ADDR') as $aah)
		{
			if (!isset($_SERVER[$aah]))
				continue;
			$ips = $_SERVER[$aah];
			$curip = explode('.', $ips);
			if (count($curip) !== 4)
				break; // If they've sent at least one invalid IP, break out
			foreach ($curip as &$sup)
				if (($sup = intval($sup)) < 0 or $sup > 255)
					break 2;
			$curip_bin = $curip[0] << 24 | $curip[1] << 16 | $curip[2] << 8 | $curip[3];
			foreach (array(
				// hexadecimal ip ip mask
				array(0x7F000001, 0xFFFF0000), // 127.0.*.*
				array(0x0A000000, 0xFFFF0000), // 10.0.*.*
				array(0xC0A80000, 0xFFFF0000), // 192.168.*.*
			) as $ipmask) {
				if (($curip_bin & $ipmask[1]) === ($ipmask[0] & $ipmask[1]))
					break 2;
			}
			return $ip = $ips;
		}
		return $ip = $_SERVER['REMOTE_ADDR'];
	}


	/**
	 * TimeStamp to time_str
	 */
	function getDateTimeStr($timestamp)
	{
		if (intval($timestamp) > 0)
			return date('Y-m-d H:i:s', $timestamp);
		else
			return '';
	}

	function getTimeStr($timestamp)
	{
		if (intval($timestamp) > 0)
			return date('H:i:s', $timestamp);
		else
			return '';
	}

	function getAgeStr($timestamp)
	{
		$ret = '';
		$day = $timestamp / 86400; // day (24*3600s)
		$month = 0;
		$year = 0;
		if ($day > 30) 
		{
			$month = $day / 30;
			$day = $day % 30;
		}
		if ($month > 12) 
		{
			$year = $month / 12;
			$month = $month % 12;
		}
		if ($year > 0) 
			$ret .= intval($year) . '年';
		$ret .= intval($month) . '个月';
		return $ret;
	}

	function getDateStr($timestamp)
	{
		if ($timestamp > 0)
			return date('Y-m-d', $timestamp);
	}

	// Timestr Format: 2009-11-27
	function getDateStamp($dt)
	{
		return mktime(0,0,0, intval(substr($dt,5,2)), intval(substr($dt,8,2)), intval(substr($dt,0,4)));
		//return mktime(0,0,0, substr($dt,5,2), substr($dt,8,2), substr($dt,0,4));
	}

	function getServerUrl()
	{
		global $_serverUrl;
		$port = $_SERVER['SERVER_PORT'];
		if (isset($_serverUrl))
			return $_serverUrl;
		// generate
		if ($port != 80)
			$_serverUrl = 'http://' . $_SERVER['HTTP_HOST'] . ':' . $port;
		else
			$_serverUrl = 'http://' . $_SERVER['HTTP_HOST'];
		return $_serverUrl;
	}

	function getContextPath()
	{
		$path = $_SERVER['PHP_SELF'];
		$pos = strrpos($path, '/');
		if ($pos >= 0) 
			return substr($path, 0, $pos+1);
		else
			return $path;
	}

	function getDbConfig($key, $default = null)
	{
		$value = Q::ini('dbconfig/'.$key, $default);
		if ($value === null){
			loadDbConfig();
			$value = Q::ini('dbconfig/'.$key);
		}
		return $value;
	}

	function loadDbConfig()
	{
		$config = array();
		// 载入数据库配置
		$cacheId = 'common.dbconfig';
		$arc = Q::cache($cacheId);
		if ($arc !== false)
		{
			$config['dbconfig'] = $arc;
			Q::replaceIni($config);
			return;
		}
		$arc = array();
		$cfgGroup = ConfigGroup::find()->setColumns('configgroup_id, key')->getAll()->toHashMap('configgroup_id', 'key');
		$configs = Config::find()->getAll();
		foreach ($configs as $item)
		{
			$section = $cfgGroup[$item->configgroup_id];
			switch ($item->type)
			{
			case 0: //int
				$value = $item->v_int;
				break;
			case 1: //float
				$value = $item->v_float;
				break;
			case 2: //varchar
				$value = $item->v_varchar;
				break;
			case 3: //text
				$value = $item->v_text;
				break;
			}
			if (!isset($arc[$section])) {
				$arc[$section] = array();
				$arc[$section][$item->key] = $value;
			}
			else
				$arc[$section][$item->key] = $value;
		}

		Q::writeCache($cacheId, $arc);

		// set config
		$config['dbconfig'] = $arc;
		Q::replaceIni($config);

	}

	/*
	* 类似于Q::ini()的参数
	*/
	function getCode($key, $default = null)
	{
		$value = Q::ini('code/'.$key, $default);
		if ($value === null && count(Q::ini('code'))==0 ){
			loadCode();
			$value = Q::ini('code/'.$key);
		}
		return $value;
	}

	/*
	* Q::ini('code')
	*/
	function loadCode()
	{
		$config = array();
		$cg_id_to_key = array();

		// 代码缓存
		$cacheId = 'common.code';
		$arc = Q::cache($cacheId);
		if ($arc !== false)
		{
			$config['code'] = $arc;
			Q::replaceIni($config);
			return;
		}
		
		// 数据库读取
		$arc = array();
		$codeGroups = CodeGroup::find()->asArray()->all()->query();
		foreach ($codeGroups as &$cg)
		{
			$arc[$cg['key']] = array(
				'id' => $cg['codegroup_id'],
				'key' => $cg['key'],
				'desc' => $cg['desc'],
				'children' => array(),
			);
			$arc[$cg['codegroup_id']] = &$arc[$cg['key']];
			$cg_id_to_key[$cg['codegroup_id']] = $cg['key'];
		}
		$codes = Code::find('status = 1')->asArray()->all()->query();
		foreach ($codes as &$cd)
		{
			$key = $cg_id_to_key[$cd['codegroup_id']];
			$arc[$key]['children'][$cd['key']] = array(
				'id' => $cd['code_id'],
				'key' => $cd['key'],
				'text' => $cd['text'],
				'value' => $cd['value'],
			);
			$arc[$key]['children'][$cd['value']] = &$arc[$key]['children'][$cd['key']];
		}
		foreach ($arc as &$a)
		{
			$a['count'] = count($a['children'])/2;
		}


		Q::writeCache($cacheId, $arc);

		$config['code'] = $arc;
		Q::replaceIni($config);
	}



	//===================================
	//
	// 功能：IP地址获取真实地址函数
	// 参数：$ip - IP地址
	// 作者：[Discuz!] (C) Comsenz Inc.
	//
	//===================================
	function getIpLocation($ip) {
		//IP数据文件路径
		$dat_path = '../app/QQWry.Dat';

		//检查IP地址
		if(!preg_match('/^\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}$/', $ip)) {
			return 'IP Address Error';
		}
		//打开IP数据文件
		if(!$fd = @fopen($dat_path, 'rb')){
			return 'IP date file not exists or access denied';
		}

		//分解IP进行运算，得出整形数
		$ip = explode('.', $ip);
		$ipNum = $ip[0] * 16777216 + $ip[1] * 65536 + $ip[2] * 256 + $ip[3];

		//获取IP数据索引开始和结束位置
		$DataBegin = fread($fd, 4);
		$DataEnd = fread($fd, 4);
		$ipbegin = implode('', unpack('L', $DataBegin));
		if($ipbegin < 0) $ipbegin += pow(2, 32);
		$ipend = implode('', unpack('L', $DataEnd));
		if($ipend < 0) $ipend += pow(2, 32);
		$ipAllNum = ($ipend - $ipbegin) / 7 + 1;
		
		$BeginNum = 0;
		$EndNum = $ipAllNum;
		
		$ip1num = 0;
		$ip2num = 0;
		$ipAddr1 = '';
		$ipAddr2 = '';
		 
		//使用二分查找法从索引记录中搜索匹配的IP记录
		while($ip1num>$ipNum || $ip2num<$ipNum) {
			$Middle= intval(($EndNum + $BeginNum) / 2);

			//偏移指针到索引位置读取4个字节
			fseek($fd, $ipbegin + 7 * $Middle);
			$ipData1 = fread($fd, 4);
			if(strlen($ipData1) < 4) {
				fclose($fd);
				return 'System Error';
			}
			//提取出来的数据转换成长整形，如果数据是负数则加上2的32次幂
			$ip1num = implode('', unpack('L', $ipData1));
			if($ip1num < 0) $ip1num += pow(2, 32);
			
			//提取的长整型数大于我们IP地址则修改结束位置进行下一次循环
			if($ip1num > $ipNum) {
				$EndNum = $Middle;
				continue;
			}
			
			//取完上一个索引后取下一个索引
			$DataSeek = fread($fd, 3);
			if(strlen($DataSeek) < 3) {
				fclose($fd);
				return 'System Error';
			}
			$DataSeek = implode('', unpack('L', $DataSeek.chr(0)));
			fseek($fd, $DataSeek);
			$ipData2 = fread($fd, 4);
			if(strlen($ipData2) < 4) {
				fclose($fd);
				return 'System Error';
			}
			$ip2num = implode('', unpack('L', $ipData2));
			if($ip2num < 0) $ip2num += pow(2, 32);

			//没找到提示未知
			if($ip2num < $ipNum) {
				if($Middle == $BeginNum) {
					fclose($fd);
					return 'Unknown';
				}
				$BeginNum = $Middle;
			}
		}

		//下面的代码读晕了，没读明白，有兴趣的慢慢读
		$ipFlag = fread($fd, 1);
		if($ipFlag == chr(1)) {
			$ipSeek = fread($fd, 3);
			if(strlen($ipSeek) < 3) {
				fclose($fd);
				return 'System Error';
			}
			$ipSeek = implode('', unpack('L', $ipSeek.chr(0)));
			fseek($fd, $ipSeek);
			$ipFlag = fread($fd, 1);
		}

		if($ipFlag == chr(2)) {
			$AddrSeek = fread($fd, 3);
			if(strlen($AddrSeek) < 3) {
				fclose($fd);
				return 'System Error';
			}
			$ipFlag = fread($fd, 1);
			if($ipFlag == chr(2)) {
				$AddrSeek2 = fread($fd, 3);
				if(strlen($AddrSeek2) < 3) {
					fclose($fd);
					return 'System Error';
				}
				$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
				fseek($fd, $AddrSeek2);
			} else {
				fseek($fd, -1, SEEK_CUR);
			}

			while(($char = fread($fd, 1)) != chr(0))
				$ipAddr2 .= $char;

			$AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));
			fseek($fd, $AddrSeek);

			while(($char = fread($fd, 1)) != chr(0))
				$ipAddr1 .= $char;
		} else {
			fseek($fd, -1, SEEK_CUR);
			while(($char = fread($fd, 1)) != chr(0))
				$ipAddr1 .= $char;

			$ipFlag = fread($fd, 1);
			if($ipFlag == chr(2)) {
				$AddrSeek2 = fread($fd, 3);
				if(strlen($AddrSeek2) < 3) {
					fclose($fd);
					return 'System Error';
				}
				$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
				fseek($fd, $AddrSeek2);
			} else {
				fseek($fd, -1, SEEK_CUR);
			}
			while(($char = fread($fd, 1)) != chr(0)){
				$ipAddr2 .= $char;
			}
		}
		fclose($fd);

		//最后做相应的替换操作后返回结果
		if(preg_match('/http/i', $ipAddr2)) {
			$ipAddr2 = '';
		}
		$ipaddr = "$ipAddr1 $ipAddr2";
		$ipaddr = preg_replace('/CZ88.Net/is', '', $ipaddr);
		$ipaddr = preg_replace('/^s*/is', '', $ipaddr);
		$ipaddr = preg_replace('/s*$/is', '', $ipaddr);
		if(preg_match('/http/i', $ipaddr) || $ipaddr == '') {
			$ipaddr = 'Unknown';
		}

		return $ipaddr;
	}
