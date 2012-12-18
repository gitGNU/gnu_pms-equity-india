<?

/*  Portfolio Mangement Services - Equity - India
    Copyright (C) 2012 Vineet Gupta <vineetgupta22@gmail.com>.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

	//All the files which are included for the purpose of the code must have this line
	defined('_invest') or die('Direct Access to the File is Prohibited');
	
	class Invest_error extends Exception{
		var $_invest_system_error_names = array( '1'=>'E_ERROR',
									'2'=>'E_WARNING',
									'4'=>'E_PARSE',
									'8'=>'E_NOTICE',
									'16'=>'E_CORE_ERROR',
									'32'=>'E_CORE_WARNING',
									'64'=>'E_COMPILE_ERROR',
									'128'=>'E_COMPILE_WARNING',
									'256'=>'E_USER_ERROR',
									'512'=>'E_USER_WARNING',
									'1024'=>'E_USER_NOTICE',
									'2048'=>'E_STRICT',
									'4096'=>'E_RECOVERABLE_ERROR',
									'8192'=>'E_DEPRECATED',
									'16384'=>'E_USER_DEPRECATED',
		);
		
		var $_invest_error_names = array('768' => 'INSTALL'
		);
		
		var $_invest_die_errors = array('768');
		
		
		public function __construct($version, $error_number, $error_message, $error_file = '', $error_line = ''){
			parent::__construct();
			$this->_version=$version;
			if(!$this->check_error_no(trim($error_number))){
				if($this->user_error($error_number)){
					if($this->user_die_error($this->_error)){
						die_message($this->_error);
					}else{
						die('This is not the Die Error');
					}
					//$this->print_error_die($error_message);
				}else{
					die('It is not the Investment Error neither System kindly check the Code');
				}
			}else{
				die('System Error Message');
			}
		}
		
		public function user_die_error($error_no){
			$found=false;
			foreach($this->_invest_die_errors as $k => $v){
				if($v == $error_no){
					$found=true;
					break;
				}
			}
			return $found;
		}
		
		
		public function user_error($error_number){
			$found=false;
			foreach($this->_invest_error_names as $k => $v){
				if($k == $error_number or $v === $error_number){
					$this->_error = $k;
					$found=true;
				}
			}
			return $found;
		}
		
		
		public function check_error_no($error_number){
			$found=false;
			foreach($this->_invest_system_error_names as $k => $v){
				if($k == $error_number or $v === $error_number){
					$this->_error = $v;
					$found=true;
				}
			}
			return $found;
		}
		
	}
	
	function invest_error($error_number, $error_message='', $error_file = '', $error_line = ''){
		global $version;
		if(!$error_file){
			$debug = debug_backtrace();
			$t = new Invest_error($version, $error_number, $error_message, $debug[0]['file'], $debug[0]['line']);
		}else{
			$t = new Invest_error($version, $error_number, $error_message, $error_file, $error_line);
		}
		return false;
	}
	
?>