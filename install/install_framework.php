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
	defined('_invest_instal') or die('Direct Access to the File is Prohibited');
	
	
	//Directory Seprator
	if(!defined('ds')){
		define('ds', DIRECTORY_SEPARATOR);
	}
	
	//Setting time zone to India
	if(function_exists('date_default_timezone_set')) date_default_timezone_set("Asia/Calcutta");
	
	$parts = explode(ds, _invest);
	
	define('_invest_root', dirname(dirname(__FILE__)) . ds) ;
	
	define('_invest', true);
	
	define('_invest_lib', _invest_root. 'lib'. ds);
	
	define('_invest_error', _invest_lib .  'error'. ds);
	
	define('_invest_version', _invest_lib .  'version'. ds);
	
	define('_invest_install', _invest_root.  'install'. ds);
	
	define('_invest_template', _invest_root . 'template'. ds);
	define('INSTALL', 768);
	//Mysql Connection and DB Management Class
	require_once _invest_lib . 'classdb.php';
	
	//Invest Version Class
	require_once _invest_version . 'invest_version.php';
	
	//Handling Errors
	require_once _invest_error . 'invest_error.php';
	
	
	
	
	//Functions
	require_once _invest_install_root . '/function.php';
	
	

?>
