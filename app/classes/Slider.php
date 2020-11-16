<?php

namespace App\Classes;



class Slider extends Config
{ 
    //slider save 
    public function slider_save( $titel , $subtitel , $start_date , $end_date , $url_1 , $status , $image){
        session_start();
        $id = $_SESSION['user_id'];
    
        $result = $this->conn->query("INSERT INTO `sliders`( `titel`,`subtitel`,`startdate`,`enddate`,`url_1`, `image`,`status`,`user_id`) VALUES ( '$titel','$subtitel','$start_date','$end_date','$url_1','$image','$status','$id')");
        
        return $result ? true : false ;
    }
    //slider update 
    public function slider_update( $id , $titel , $subtitel , $start_date , $end_date , $url_1 , $image , $status){
        session_start();
        $user_id = $_SESSION['user_id'];
    
        $result = $this->conn->query( "UPDATE `sliders` SET `titel`='$titel',`subtitel`='$subtitel',`startdate`='$start_date',`enddate`='$end_date',`url_1`='$url_1',`image`='$image',`status`='$status',`user_id`='$user_id' WHERE `id`='$id'" );
        
        return $result ? true : false ;
    }

    // slider data get 
    public function slider_data_get(){

        return  $this->conn->query("SELECT * FROM `sliders` ORDER BY `id` DESC");

    }
    // slider data get Edit 
    public function slider_data_edit($id){

        return  $this->conn->query("SELECT * FROM `sliders` WHERE `id`='$id'");

    }
    // Data get
    public function getSlider($id){

        return $this->conn->query("SELECT * FROM `sliders` WHERE `id`='$id' ");
    }


    // Slider Delete all function

    public function sliderdelete($id)
    {
        return $this->conn->query(" DELETE FROM `sliders` WHERE `id`='$id'");
    }

    // Status update function

    public function changeStatus($id,$status)
    {
        return $this->conn->query("UPDATE `sliders` SET `status`='$status' WHERE `id`='$id' ");
    }






}