<?php
$pin_page="pin_pages";
/////////// pin pages ///////////////
if (isset($_POST['oldUrl'])) {
    $insert = array('page_link' => $_POST['oldUrl'],
                     'page_name'=>$_POST['page_name']);
    $condition =" AND page_name = '{$_POST['page_name']}'";
    $pindata=$user->select($pin_page,$condition);
        if(count($pindata)){
            echo "Page already on dashboard";
        }else{
            $user->insertdata($pin_page,$insert);

            echo "Page add on dashboard";

        }
     exit;
}

