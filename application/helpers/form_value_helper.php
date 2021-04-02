<?php

    // if(!function_exists('save_value'))
    // {
    //     //クライアントの入力値を保持
    //     function save_value($key, $option = "none" , $year = null)
    //     {
    //         if(($option === "none")){
    //             if(!empty($_SESSION[$key]))
    //             {
    //                 if($key === "birth")
    //                 {
    //                     if($_SESSION[$key] == $year)
    //                     { 
    //                         echo "selected";
    //                     }
    //                 }else{
    //                     echo $_SESSION[$key];
    //                 }
    //             }
    //         } elseif($option === "1") {
    //             if($_SESSION[$key] === "1")
    //             {
    //                 echo "checked";
    //             }elseif(empty($_SESSION[$key])){
    //                 echo "checked";
    //             }
    //         } elseif($option === "2") {
    //             if($_SESSION[$key] === "2")
    //             {
    //                 echo "checked";
    //             }
    //         }
    //     }
    // }

    //↓これでロード
    //$this->load->helper('form_value');//()内は_helper.phpより前