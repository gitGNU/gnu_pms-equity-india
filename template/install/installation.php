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
	
	if (!file_exists( _invest_install . 'config-db.php')){
		die('It seems that some of the files are missing. Kindly 
			download the Package Again are retry it');
	}else{
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Setup - PMS-Equity-India
			<?
				if(isset($_GET['step'])){
					echo " - Step 1";
				}
			?>
		</title>
		<link rel="stylesheet" href="css/install.css" type="text/css" />
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
	</head>
	<body>
		
		<h1 id="logo">
			<img alt="PMS-Equity-India" src="images/logo.png" />
			Portfolio Management Service - Equity - India
		</h1>
		<p class="set">Welcome to Setup of Portfolio Management Service - Equity - India. Before getting started, we need some information on the database. You will need to know the following items before proceeding.</p>
		<ol>
	<li>Database name</li>
	<li>Database username</li>
	<li>Database password</li>
	<li>Database host</li>
	<li>Table prefix (if you want to run more than one PMS) </li>
</ol>
<p><strong>If for any reason this automatic file creation doesn't work, don't worry. All this does is fill in the database information to a configuration file. You may also simply open <code>invest-config-sample.php</code> in a text editor, fill in your information, and save it as <code>invest-config.php</code>. </strong></p>
<p>In all likelihood, these items were supplied to you by your Web Host. If you do not have this information, then you will need to contact them before you can continue. If you&#8217;re all ready&hellip;</p>
	<?		
		
			if(!defined('FINSTAL')){
	?>
				<p class="step"><a href="install/config-db.php" class="button">Let&#8217;s go!</a></p>
	<?
			}else{
	?>
			<p class="step"><a href="./config-db.php" class="button">Let&#8217;s go!</a></p>
	<?
			}
			
		}
	?>
	</body>
</html>