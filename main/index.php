<?php
        include_once("../kernel.php");
        if(isset($_REQUEST['version']))
        {
            $ver = -1;
            $my = new mysqli_class;
            $my->ex_sql("select max(ver) as ver from tabligh", $q);
            if(count($q)>0)
                $ver = $q[0]['ver'];
            die("$ver");   
        }
        if(isset($_REQUEST['get_version']))
        {
            $my = new mysqli_class;
            $ver = (int)$_REQUEST['get_version'];
            $my->ex_sql("select addr,tarikh_payan,tarikh from tabligh where ver=$ver", $q);
            /*
            $addr = '';
            $tarikh ='';
            $tarikh_payan = '';
            if(count($q)>0)
            {
                $addr = $q[0]['addr'];
                $tarikh = $q[0]['tarikh'];
                $tarikh_payan = $q[0]['tarikh_payan'];
            }
             * 
             */
            $ou = json_encode($q==null?array():$q);
            die($ou);
        }    
?>