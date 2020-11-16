<?php 

    require_once 'inc/header.php';
    // require_once '../vendor/autoload.php';
   $id =  isset($_GET['edit']) ? $_GET['edit'] : '' ;

    use App\Classes\Slider;

    $slider = new Slider();

    $result = $slider->slider_data_edit($id);
    // if( $result->num_rows == 0) {
    //     header('location: sliders.php');
    // }
    $edit_slider = $result->fetch_assoc();


?>


<section class="p-2 slider_min_section mb-3">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <h3> Update Slider</h3>
            </div>
            <div class="col-6 text-right">
                <a href="sliders.php" class="btn btn-primary"> <i class="fas fa-tasks"></i> Manage Slider</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3> Update Slider</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" data-url="slider-update" id="update-form" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $edit_slider['id']?>">
                            <div class="form-group row" >
                                <label for="titel" class="col-sm-2 col-form-label">Titel</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="titel" id="titel" value="<?= $edit_slider['titel']?>" placeholder="Enter your slider titel ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="subtitel" class="col-sm-2 col-form-label">Sub Titel</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="subtitel" id="subtitel" value="<?= $edit_slider['subtitel']?>" placeholder="Enter your slider sub titel ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control datepick " name="start_date" value="<?= $edit_slider['startdate']?>" id="startdate" placeholder="Enter your slider start date ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="enddate" class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control datepick" name="end_date" id="enddate" value="<?= $edit_slider['enddate']?>" placeholder="Enter your slider end date ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url_1" class="col-sm-2 col-form-label">Url 1</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" name="url_1" id="url_1" value="<?= $edit_slider['url_1']?>" placeholder="Enter your slider button url ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label"> Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" onchange="imageview(this)">
                                    <img src="<?= $slider->base_url.'img/slider/'.$edit_slider['image'] ?>" alt="image" class="image_preview">
                                    <input type="hidden" name="old_img" value="<?= $edit_slider['image']?>">


                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 mt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="active" value="1" name="status" <?= $edit_slider['status'] == 1 ? 'checked' : '' ?>  class="custom-control-input ">
                                        <label class="custom-control-label " for="active">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="inactive" value="0" name="status" <?= $edit_slider['status'] == 0 ? 'checked' : '' ?> class="custom-control-input ">
                                        <label class="custom-control-label " for="inactive">Inactive</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right ">
                                <button class="btn btn-primary " type="submit "><i class="fa fa-check "></i> Update Slider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'inc/footer.php' ?>

<?php require_once 'inc/footer.php' ?>