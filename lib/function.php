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
	
	
	function die_message($error_no){
		if($error_no == 768 and !isset($_GET['step'])){
			if (file_exists( _invest_template . 'install' . 
							ds . 'installation.php')){
				require_once _invest_template . 
							'install' . ds . 'installation.php';
			}else{
				die('It seems that some of the files are missing. Kindly 
					download the Package Again are retry it');
			}
		}else{
			die('check steps');
		}
	}
	
	
	//Using this function for Debuging Function
	function go($abc = array()){
		echo '<pre>';
		print_r($abc);
		echo '</pre>';
	}
	
?>