<?php
	class mysqli_class extends mysqli
	{
		public $host = 'localhost';
		public $db = '';
		public $user = '';
		public $pass = '';
		function __construct()
		{
			$conf= new conf;
            $host = $conf->host;
            $db =$conf->db;
            $user = $conf->user;
            $pass = $conf->pass;
			parent::__construct($host,$user,$pass,$db);
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
		}
		public function ex_sql($sql,&$q)
		{
			$this->query("SET NAMES 'utf8'");
            $sql = $this->arabicToPersian($sql);
			$result = $this->query($sql,MYSQLI_USE_RESULT);
			while ($row = $result->fetch_assoc())
            	$q[]= $row;
			$result->close();
            //$this->close();
			$out = 'ok';
			return($out);
		}
		public function ex_sqlx($sql,$close=TRUE)
		{
            $sql = $this->arabicToPersian($sql);
            $this->query($sql);
			return('ok');
		}
        public function ex_sqlx_multi($sql)
        {
            $sql = $this->arabicToPersian($sql);
            $this->multi_query($sql);
            return('ok');
        }
		function loadField($table)
		{
			$out = array();
			$my = new mysql_class;
			$my->oldSql = TRUE;
			$my->ex_sql("select * from `$table` where 1=0",$q);
			while($r = mysqli_fetch_field($q))
				$out[] = $r->name;
			return $out;
		}
		function insert_id($ln='')
		{
			return($this->insert_id);
		}
        public function arabicToPersian($inp)
        {
			$out = str_replace(
			array('ي', 'ك'),
			array('ی', 'ک'),
			$inp);
				        return($out);
        }
	}
?>
