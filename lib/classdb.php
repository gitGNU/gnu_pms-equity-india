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
	
	
	define('MySQL_CEI','1.00');
	define('OBJECT','OBJECT',true);
	define('ARRAY_A','ARRAY_A',true);
	define('ARRAY_N','ARRAY_N',true);
	
	
	class DBConnect{
	
		//We are not going to store the DB Password and the reason is that if there is
		//any error or theft then the password is saved as not provided as direct access
		//storing in class
		
		
		/** Database 	Hostname
		 *  @access 	private
		 *  @var 		string
		**/
		private $db_host;
		
		/** Database 	Username
		 *  @access 	private
		 *  @var 		string
		**/
		private $db_user;
		
		/** Database 	DB_NAME
		 *  @access 	private
		 *  @var 		string
		**/
		private $db_name;
		
		/** Whether the database queries are ready to start executing.
		 *  @access 	private
		 *  @var 		string
		**/
		private $ready = false;
		
		
		private $_new_link=false;
		
		
		public function __construct($db_host, $db_user, $db_pass, $db_name, $new_link){
			$this->reset();
			$this->db_host=$db_host;
			$this->db_user=$db_user;
			$this->db_name=$db_name;
			$this->_new_link=$new_link;
			$this->db_connect($db_pass);
		}
		
		public function reset(){
			unset($this->dbh);
		}
		
		
		public function db_connect($password = ''){
			if(!$this->ready){
				$this->dbh = @mysql_connect($this->db_host,$this->db_user, $password, $this->_new_link);
				if($this->dbh){
					$this->ready = true;
					$this->select($this->db_name, $this->dbh );
				}
			}
		}
		
		public function select($db_name, $dbh = null){
			if(is_null($dbh)){
				$dbh = $this->dbh;
			}
			if (mysql_select_db( $db_name, $dbh ) ){
				$this->ready = true;
			}
		}
		
		public function get_results($query=null, $output = OBJECT){
			if ($query){
				$this->query($query);
			}
			// Send back array of objects. Each row is an object
			if ( $output == OBJECT ){
				return $this->last_result;
			}elseif ( $output == ARRAY_A || $output == ARRAY_N ){
				if ( $this->last_result ){
					$i=0;
					foreach( $this->last_result as $row ){
						$new_array[$i] = get_object_vars($row);
						if ( $output == ARRAY_N ){
							if(strlen(array_values($new_array[$i]))>0){
								$new_array[$i] = array_values($new_array[$i]);
							}
						}
						$i++;
					}
					return $new_array;
				}else{
					return null;
				}
			}
		}
		
		public function query($query){
			$this->flush();
			$query = trim($query);
			$this->last_query = $query;
			$this->num_queries++;
			$this->result = @mysql_query($query,$this->dbh);
			$is_insert = false;
			if ( $str = @mysql_error($this->dbh) ){
				$is_insert = true;
				echo $str.'<br>';
				echo $query.'<hr/>';
				$this->error=$str;
				return false;
			}
			$is_insert = false;
			if ( preg_match("/^(insert|delete|update|replace|truncate|drop|create|alter)\s+/i",$query) ){
				$this->rows_affected = @mysql_affected_rows($this->dbh);
				if ( preg_match("/^(insert|replace)\s+/i",$query) ){
					$this->insert_id = @mysql_insert_id($this->dbh);
				}
				$return_val = $this->insert_id;
			}else{
				// Store Query Results
				$num_rows=0;
				while ( $row = @mysql_fetch_object($this->result) )
				{
					// Store relults as an objects within main array
					$this->last_result[$num_rows] = $row;
					$num_rows++;
				}

				@mysql_free_result($this->result);

				// Log number of rows the query returned
				$this->num_rows = $num_rows;

				// Return number of rows selected
				$return_val = $this->num_rows;
			}
			return $return_val;
		}
		
		public function insert($system_type=array(), $table){
			$fileds;
			$values;
			if(is_array($system_type)){
				foreach($system_type as $key => $value){
					if(strlen($fileds)>0){
						$fileds.= ", ".$key."";
						$values.=", '".addslashes($value)."'";
					}else{
						$fileds= "".$key."";
						$values="'".addslashes($value)."'";
					}
				}
				$new_query = "insert into ".$table."(".$fileds.") values(".$values.")";
				return $this->query($new_query);
			}
		}

		
		public function update($query){
			return $this->query($query);
		}
		
		public function execute($query){
			@mysql_query($query,$this->dbh);
		}
		
		public function rows(){
			return $this->num_rows;
		}
		
		public function search_query($query=array(), $table_name){
			$new_query='';
			foreach($query as $key => $value){
				if(strlen($new_query)>0){
					$new_query.= " and ($key = '".addslashes($value)."')";
				}else{
					$new_query = " ($key = '".addslashes($value)."')";
				}
			}
			if($table_name == 'system_type'){
				return $this->get_results("select id from $table_name where ".$new_query, ARRAY_A);
			}else{
				return $this->get_results("select * from $table_name where ".$new_query, ARRAY_A);
			}
		}
		
		public function flush(){
			$this->last_result = null;
			$this->col_info = null;
			$this->last_query = null;
		}
	}
?>