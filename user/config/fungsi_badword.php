<?php
function sensor($teks){
    $w = mysqli_query($teks,"SELECT * FROM katajelek");
    while ($r = mysqli_fetch_array($w)){
        $teks = str_ireplace($r['kata'], $r['ganti'], $teks);       
    }
    return $teks;
}  
?>
