<?php
    class database
    {
        public $conn;
        private $server = "127.0.0.1";
        private $user = "root";
        private $pass = "";
        private $db = "store";
        
        public function connect()
        {
            $this->conn = null;
            
            try
            {
                $this->conn = mysqli_connect($this->server, $this->user, $this->pass, $this->db);
                if (mysqli_connect_errno())
                    echo "Error in connecting " .mysqli_connect_error();
            }
            catch(mysqli_sql_exception $e)
            {
                echo $e ;
            }
            
            return $this->conn;
        }
        
        public function close()
        {
            mysqli_close($this->conn);
        }

    }
?>