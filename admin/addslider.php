<?php require_once 'inc/header.php' ?>


<section class="p-2 slider_min_section mb-3">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <h3> Add New Slider</h3>
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
                        <h3> Add New Slider</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" data-url="slider-save" id="create-form"  enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="titel" class="col-sm-2 col-form-label">Titel</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="titel" id="titel" placeholder="Enter your slider titel ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="subtitel" class="col-sm-2 col-form-label">Sub Titel</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="subtitel" id="subtitel" placeholder="Enter your slider sub titel ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control datepick " name="start_date" id="startdate" placeholder="Enter your slider start date ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="enddate" class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control datepick" name="end_date" id="enddate" placeholder="Enter your slider end date ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url_1" class="col-sm-2 col-form-label">Url 1</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" name="url_1" id="url_1" placeholder="Enter your slider button url ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label"> Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" onchange="imageview(this)">
                                    <img src="https://via.placeholder.com/80" alt="image" class="image_preview">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 mt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="active" value="1" name="status" checked class="custom-control-input ">
                                        <label class="custom-control-label " for="active">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="inactive" value="0" name="status" class="custom-control-input ">
                                        <label class="custom-control-label " for="inactive">Inactive</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right ">
                                <button class="btn btn-primary " type="submit "><i class="fa fa-check "></i> Add Slider</button>
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