<?php

require_once 'inc/header.php';
require_once '../vendor/autoload.php';


use App\Classes\WorkMenu;


$workMenu = new WorkMenu();

$result = $workMenu->works_menu();
?>

    <section class="p-2 slider_min_section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h3> Manage Menu</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="addslider.php" class="btn btn-primary"> <i class="fa fa-plus"> </i> Add New Menu</a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="slidermanage" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  while ($menu_row = $result->fetch_assoc()){ ?>
                        <tr class="remove-row-<?= $menu_row['id'] ?>">
                            <td><?= $menu_row['id'] ?></td>
                            <td><?= $menu_row['name'] ?></td>
                            <td><?= $menu_row['slug'] ?></td>
                            <td id="td-change-status-<?=$menu_row['id']?>" style="color:<?=$slider_row['status'] == 1 ?'green':'red'?>"><?=$menu_row['status'] == 1 ?'Active':'Inactive'?></td>

                            <td>
                                <button id="button-change-status-<?=$menu_row['id']?>" data-id="<?=$menu_row['id']?>" class="change-status btn btn-sm btn-<?=$menu_row['status']==1 ? 'warning':'primary'?>"><i class="fa text-white fa-arrow-<?=$menu_row['status']==1 ? 'down':'up'?>"></i></button>
                                <a href="editslider.php?edit=<?= $menu_row['id'] ?> " class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <button id="Slider-Delete" class="btn Slider-Delete btn-sm btn-warning text-white" data-id="<?= $menu_row['id'] ?>" ><i class="fa fa-trash"></i></button>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </section>



<?php require_once 'inc/footer.php' ?>