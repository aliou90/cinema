<?php
function data ($numInd, $nomInd, $prenomInd){
    $a = "CONCAT(UPPER(LEFT(".$nomInd.", 1)),SUBSTRING(".$nomInd.", 2))" ;
    $b = "CONCAT(UPPER(LEFT(".$prenomInd.", 1)),SUBSTRING(".$prenomInd.", 2))";
    $data = $numInd.','.$a.','.$b;
    Return $data;
}

echo data(1,'kidman', 'nicole');
?>