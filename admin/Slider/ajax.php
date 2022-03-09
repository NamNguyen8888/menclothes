<?php
   require_once('../../database/dbhelper.php');
  if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action=$_POST['action'];
        switch($action){
            case 'delete':
                if(isset($_POST['Id'])){
                    $Id=$_POST['Id'];
                    $sql='delete from Slider where Id='.$Id;
                    execute($sql);
                }
                break;
        }
    }
}
?>