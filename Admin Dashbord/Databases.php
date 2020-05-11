<?php
 
 class databases 
 {
 
 	    public $con;  
      public function __construct()  
      {  
           $this->con = mysqli_connect("localhost","root","","info");  
           if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
      }
       public function insert($table_name, $data)  
      {  
           $string = "INSERT INTO ".$table_name." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')";  
           if(mysqli_query($this->con, $string))  
           {  
                return true;  
           }  
           else  
           {  
                echo mysqli_error($this->con);  
           }  
      } 
      public function delete($table_name,$packagenum)  
      {  
           $string = "DELETE FROM ".$table_name." WHERE packagenum='$packagenum' ";            
       
           if(mysqli_query($this->con, $string))  
           {  
                return true;  
           }  
           else  
           {  
                echo mysqli_error($this->con);  
           }  
      } 
      public function update($table_name,$data,$where_condition)  
      {  
            $query ='';  
            $condition='' ;  
           
           foreach($data as $key => $value)  
           {  

                $query .= $key . "='".$value."', ";  

           }   
            $query = substr($query, 0, -2);  
           
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . "='".$value."' AND ";  
           }    
             $condition = substr($condition, 0, -5);  

           $query1 = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";  

           while (mysqli_query($this->con, $query1))  
           {  
                if (true) {
                 	break;
                 } 
           }  
         
      }
      public function select($table_name)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }  
       public function select_where($table_name, $where_condition)  
      {  
           $condition = '';  
           $array = array();  
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . " = '".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           $query = "SELECT * FROM ".$table_name." WHERE " . $condition;  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_array($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      } 

 }

?>