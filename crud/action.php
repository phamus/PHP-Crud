<?php
	include_once("config/db.php");

	/**
	 * 
	 */
	class Dataoperations extends Database
	{
        public function insert_record($table,$fields){
            //insert into Table_name 
            $sql ="";
            $sql .= "Insert into ".$table;
            $sql .= " (".implode(",",array_keys($fields)).") Values ";
            $sql .= "('".implode("','",array_values($fields))."')";
            $query = mysqli_query($this->con,$sql);
            if($query){
                return true;
            }
        }

        public function fetch_record($table){
            $sql = "SELECT * FROM ".$table;
            $array = array();
            $query = mysqli_query($this->con,$sql);

            while($row = mysqli_fetch_assoc($query)){
                $array[] = $row;
            }

            return $array;
        }


        public function select_record($table,$where){
            $sql = "";
            $condition= "";

            foreach($where as $key =>$value){
                //$id = '5' and first_name = 'name'
                $condition .= $key ." = '" . $value . "' And ";
            }
            $condition = substr($condition,0,-5);
            $sql .= "SELECT * FROM ".$table." WHERE ".$condition;
            $query = mysqli_query($this->con,$sql);
             $row = mysqli_fetch_array($query);

            return $row;
        }


        public function update_record($table, $where,$field){
            $sql= "";
            $condition = "";
            foreach($where as $key =>$value){
                //$id = '5' and first_name = 'name'
                $condition .= $key ."='" . $value . "' And ";
            }
            $condition = substr($condition,0,-5);
            foreach($field as $key => $value){
                //Update user set value where id="5"
                $sql.=$key. "='".$value."', ";
            }
                $sql = substr($sql,0,-2);
                $sql ="Update ".$table." Set ".$sql." WHERE ".$condition;
                if($query=mysqli_query($this->con,$sql)){
                    return true;
                }

        }

        public function delete_record($table,$where){
            $sql ="";
            $condition = "";
            foreach($where as $key =>$value){
                //$id = '5' and first_name = 'name'
                $condition .= $key ."='" . $value . "' And ";
            }
            $condition = substr($condition,0,-5);
            $sql = "DELETE FROM ".$table." WHERE ".$condition;
            if($query=mysqli_query($this->con,$sql)){
                return true;
            }
            
        }

    }
    
    $obj = new Dataoperations;
    if(isset($_POST["submit"])){
        $myArray = array(
            "first_name"=> $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "status"=>$_POST["status"]

        );

        if( $obj -> insert_record("user",$myArray));
        header("Location:index.php?msg=Record Inserted");
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $where = array("id"=>$id);
        $myArray = array(
            "first_name"=> $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "status"=>$_POST["status"]
         );
         if($obj ->update_record('user',$where,$myArray)){
             header("Location:index.php?msg=Update successful");
         }
        
    }

    if(isset($_GET["delete"])){
        $id = $_GET['id'] ?? null;
        $where = array("id"=>$id);
       if($obj -> delete_record("user",$where)){
        header("Location:index.php?msg=Deleted successful");
       }  
    }

?>