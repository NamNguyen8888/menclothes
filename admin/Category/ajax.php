<?php
    require_once('../../database/dbhelper.php');

  if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action=$_POST['action'];
        switch($action){
            case 'delete':
                if(isset($_POST['IdCategory'])){
                    $IdCategory=$_POST['IdCategory'];
                    $sql='delete from category where IdCategory='.$IdCategory;
                    execute($sql);
                }
                break;
        }
    }
}
?>