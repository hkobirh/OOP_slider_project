<?php

namespace App\Classes;



class WorkMenu extends Config
{
    //slider menu save
    public function save_work_menu($name,$status){
        session_start();
        $create = $_SESSION['user_id'];
        $slug = strtolower(str_replace(' ', '-', $name));

        $result = $this->conn->query("INSERT INTO `works_menu`( `name`, `slug`, `status`, `created_by`) VALUES ('$name','$slug','$status','$create')");

        return $result ? true : false ;
    }
    //Show slider menu
    public function works_menu(){
        $result = $this->conn->query("SELECT * FROM `works_menu` ORDER BY `id` DESC");

        return $result ? true : false ;
    }






}