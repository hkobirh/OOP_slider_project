<?php 

require_once 'inc/header.php';
require_once '../vendor/autoload.php';


use App\Classes\Slider;

$slider = new Slider();

$result = $slider->slider_data_get();

?>


<section class="p-2 slider_min_section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <h3> Manage Slider</h3>
            </div>
            <div class="col-6 text-right">
                <a href="addslider.php" class="btn btn-primary"> <i class="fa fa-plus"> </i> Add New Slider</a>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="slidermanage" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="s" >Sl No</th>
                        <th class="t" >Totel</th>
                        <th class="st">Sub Totel</th>
                        <th class="i">Image</th>
                        <th class="tl">Time Limit</th>
                        <th class="ss">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while ($slider_row = $result->fetch_assoc()) { ?>
                        <tr class="remove-row-<?= $slider_row['id'] ?>">
                        <td><?= $slider_row['id'] ?></td>
                        <td><?= $slider_row['titel'] ?></td>
                        <td><?= $slider_row['subtitel'] ?></td>
                        <td><img src="<?= $slider->base_url.'img/slider/'.$slider_row['image'] ?>" alt="" class="slider_image"></td>
                        <td><?= $slider_row['startdate'] . ' To ' . $slider_row['enddate'] ?></td>
                        <td id="td-change-status-<?=$slider_row['id']?>" style="color:<?=$slider_row['status'] == 1 ?'green':'red'?>"><?=$slider_row['status'] == 1 ?'Active':'Inactive'?></td>

                         <td>
                             <button id="button-change-status-<?=$slider_row['id']?>" data-id="<?=$slider_row['id']?>" class="change-status btn btn-sm btn-<?=$slider_row['status']==1 ? 'warning':'primary'?>"><i class="fa text-white fa-arrow-<?=$slider_row['status']==1 ? 'down':'up'?>"></i></button>
                            <a href="editslider.php?edit=<?= $slider_row['id'] ?> " class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <button id="Slider-Delete" class="btn Slider-Delete btn-sm btn-warning text-white" data-id="<?= $slider_row['id'] ?>" ><i class="fa fa-trash"></i></button>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="s" >Sl No</th>
                        <th class="t" >Totel</th>
                        <th class="st">Sub Totel</th>
                        <th class="i">Image</th>
                        <th class="tl">Time Limit</th>
                        <th class="ss">Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</section>



<?php require_once 'inc/footer.php' ?>