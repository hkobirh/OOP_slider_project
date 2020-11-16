<?php require_once 'inc/header.php' ?>


    <section class="p-2 slider_min_section mb-3">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h3> Add New Menu</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="work_menu.php" class="btn btn-primary"> <i class="fas fa-tasks"></i> Manage Menu</a>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3> Add New Menu</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" data-url="save_work_menu" id="create-form"  enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="Name" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" >
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
                                    <button class="btn btn-primary " type="submit "><i class="fa fa-check "></i> Add Menu</button>
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