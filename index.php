<?php
    //load and clean data.js to retrive only json string
    $data = file_get_contents('./resources/data.js');
    $data = str_replace(['var data = ', ';',], '', $data);
    //decode json to produce employees array
    $employees = json_decode($data,true);
    echo "<pre>";
    var_dump($employees);
?>