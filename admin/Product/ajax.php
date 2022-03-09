<?php
    require_once('../../database/dbhelper.php');
  if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action=$_POST['action'];
        switch($action){
            case 'delete':
                if(isset($_POST['IdProduct'])){
                    $IdProduct=$_POST['IdProduct'];
                    $sql='delete from products where IdProduct='.$IdProduct;
                    execute($sql);
                }
                break;
        }
    }
}
?>