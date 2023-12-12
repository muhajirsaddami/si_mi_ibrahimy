<?php

// jika tanpa namespace gunakan ini 
// function autoConfig($class)
// {
//     // $pecah = explode("\\", $class);
//     // $file = "Master/" . end($pecah) . ".php";
//     $file = "Config/" .$class . ".php";
//     if (is_readble($file)) {
//         require $file;
//     }
//}

// function autoMaster ($class)
// {
//      $file = "Master/" . $class . ".php";
//      if (is_readable($file)) {
//      require $file;
//      }
//}

// spl_autoload_register("autoConfig");
// spl_autoload_register("autoMaster");
// -------------------------------


// jika menggunkan namespace (dengan namespace sesuai nama folder) gunakan ini 
function autoload($class)
{
    $file = $class . ".php";
    // echo $file;
    if (is_readable($file)){
        require($file);
    }
}
spl_autoload_register('autoload');

//-----------------------------------

// jika menggunakan namespace (dengan namespace unik/tidak sama dengan folder) gunakan ini 
// function autoload($class)
// {
//      $pecah = explode("\\", $class);
//      //print_r(end($pecah));
//      $file = "Master/" . end($pecah) . ".php";
//      if (is_readable($file)){
//          require $file;
//      }    
//}
// spl_autoload_register('autoload');
// -------------------------------------------------