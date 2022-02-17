<?php

// helper functions()

function locationReturn($location){
    header("Location: $location");
}
/*
function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;

    if(!$result){
        die("QUERY_FAILED" . mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;
    return mysql_real_escape_string($connection,$string);
}

function fetch_array($result){
    return mysqli_fetch_assoc($result);
}

// get products

function get_products(){
    $query = query("SELECT * from product");
    confirm($query);

    while($row = mysqli_fetch_array($query)){

  

        echo $products;

    }
}
*/

?>