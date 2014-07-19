<?php
    
    class DBLink
    {
        public $DataBase;
        
        private $name,$password;
        
        public 
        
        function __construct()
        {
            $this->name="name";
            $this->password="pass";
        }
        
        function DBLinking()
        {
            $DB = mysqli_connect("domain.di.uoa.gr",$this->name,$this->password,"std10179db");
            if(!$DB)
            {
                printf("Connect failed: %s\n",mysqli_connect_error());
            }
            else
            {
                $this->DataBase = $DB;
                mysqli_query($DB,"set names utf8");
                return true;
            }
        }
        
        function DBclose_link()
        {
            mysqli_close($this->DataBase);
        }
    }
    
?>
