<?php 
function redirect($page){
    return header("Location: ".__DIR__."/../".$page.".php");
    
 
}
 