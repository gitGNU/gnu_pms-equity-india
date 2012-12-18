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
	

	
	final class invest_version{
		
		/**
		*	Package Name the Package under which it is developed for 
		*	identification purposes only.
		*	@var		String			Package Name
		**/
		public $_Package_Name = 'Portfolio Mangement Services - Equity - India';
		
		/**
		*	Package Name the Package under which it is developed for 
		*	identification purposes only.
		*	@var		String			Package Name
		**/
		public $_Package_Short_Name = 'PMS-Equity-INDIA';
		
		
		/**
		*	Development is the continued process and thus each update/Release
		*	Number is provided for the Identification Purposes to mark the 
		*	error in particular Version of Development only. It is divided
		*	into two parts as major and minor for tracking the errors if
		*	Major is changed then it means major change in the Project and it
		*	Major is not changed then it means the mistakes of the pages are
		*	Debugged of the Earlier Release Version
		*	@var		String			Major Release version
		**/
		public $_Major_Release = '1';
		
		/**
		*	Kindly read the Release Version Major
		*	@var		String			Minor Release version
		**/
		public $_Minor_Release = '00';
		
		/**
		*	Development Package Status means the development circle of the 
		*	Project. Any project would go through 3 Stages i.e. i)Alpha [means
		*	it is not fully developed, it is still in development but 
		*	provided access to improve things at the development stage]
		*	ii)Beta [means that the product is at the product/final stage
		*	and access is provided to check the working, scale and other
		*	important work to make the product more meaning full] iii)Stable
		*	The product is final and ready to distribute to the developer or 
		*	Users
		*	@var		Array		
		**/
		public $_Development_stage = array(
											'Alpha' => false, 
											'Beta' => false, 
											'Static' => false
		);
		
		/**
		*	Copyright Notice Provided at the bottom of the Package to identify
		*	the true owner/Company takes the development Process
		*	@var		String			Copyright Notice
		**/
		public $_Copyright = "Copyright (C) 2008-2012 - Cee Emm Infotech";
		
		
		public function invest_version(){
			$this->_Development_stage['Alpha'] = true;
		}
		
		
		
	}
	
?>