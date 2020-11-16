<?php

header('content-type: application/json');

require_once '../../vendor/autoload.php';

use App\Classes\Slider;
use App\Classes\WorkMenu;


$slider = new Slider();
$workMenu = new WorkMenu();
$data = [
    'error' => false
];
// Add slider
if(isset($_POST['action']) && $_POST['action'] === 'slider-save'){
    $titel = $_POST['titel'];
    $subtitel = $_POST['subtitel'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $url_1 = $_POST['url_1'];
    $status = $_POST['status'];

    $image = $_FILES['image']['name'];
    $image = explode( '.' , $image);
    $imageEx = end( $image );
    $image = uniqid() . rand(222222, 999999). '.' .$imageEx ;

    if($slider->slider_save( $titel , $subtitel , $start_date , $end_date , $url_1 , $status , $image )){
        move_uploaded_file($_FILES['image']['tmp_name'], '../../img/slider/' . $image);
        $data['message'] = 'Slaider save success.' ;
    }else{
        $data['false'] = true ;
        $data['message'] = 'Slaider not save.' ;
    }

    echo json_encode($data);

}
// update slide

if(isset($_POST['action']) && $_POST['action'] === 'slider-update'){
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $subtitel = $_POST['subtitel'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $url_1 = $_POST['url_1'];
    $status = $_POST['status'];
    $old_img = $_POST['old_img'];

    if($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $image = explode( '.' , $image);
        $imageEx = end( $image );
        $image = uniqid() . rand(222222, 999999). '.' .$imageEx ;
    }else{
        $image = $old_img;
    }
    
    if($slider->slider_update( $id, $titel , $subtitel , $start_date , $end_date , $url_1 , $image , $status )){
        if($old_img !== $image){
            move_uploaded_file($_FILES['image']['tmp_name'], '../../img/slider/' . $image);
            file_exists('../../img/slider/' . $old_img) ? unlink('../../img/slider/' . $old_img) : '';
        }
        $data['message'] = 'Slaider update success.' ;
    }else{
        $data['false'] = true ;
        $data['message'] = 'Slaider not update.' ;
    }

    echo json_encode($data);

}

// Slider Delete


if (isset($_POST['action']) && $_POST['action'] === 'Slider_Delete_id') {
    $id     = $_POST['id'];
    $result = $slider->getSlider($id);
    $row    = $result->fetch_assoc();

    if ($slider->sliderdelete($id)) {
        file_exists('../../img/sliders/' . $row['image']) ? unlink('../../img/sliders/' . $row['image']) : '';
        $data['message'] = 'Slider delete success.';
    } else {
        $data['error']   = true;
        $data['message'] = 'Slider not deleted.';
    }

    echo json_encode($data);
}

// Status update
if (isset($_POST['action']) && $_POST['action'] === 'change_status'){
    $id = $_POST['id'];
    $result = $slider->getSlider($id);
    $row = $result->fetch_assoc();
    $status = $row['status']== 1 ? 0 : 1 ;

   if($slider->changeStatus($id,$status)){
       $data['status']= $status;
       $data['message'] = 'Status update success.';
   } else {
       $data['error']   = true;

       $data['message'] = 'Status not updated';
   }
    echo json_encode($data);
}

// Add slider menu
if(isset($_POST['action']) && $_POST['action'] === 'save_work_menu'){
    $name = $_POST['name'];
    $status = $_POST['status'];

    if($workMenu->save_work_menu($name,$status)){
        $data['message'] = 'Work menu save success.' ;
    }else{
        $data['false'] = true ;
        $data['message'] = 'Work menu not save.' ;
    }

    echo json_encode($data);

}





















    // if (isset($_POST['action']) && $_POST['action'] == 'Slider_Delete_id') {
    //     $id = $_POST['id'];
    //     $result = $slider->getSlider($id);
    //     $row = $result->fetch_assoc();
    //     if ($slider->sliderdelete($id)) {
    //         print_r($id);
            
    //     } else {
                
    //     }
 // }