// image preview
function imageview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(event) {
            $('.image_preview').attr('src', event.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }

}


$(document).ready(function() {
    $('#slidermanage').DataTable();

    const site_url = "http://localhost/finded_ssit5/";

    // create form
    $('#create-form').on('submit', function(event) {
        event.preventDefault();
        $('.loaderm').show();
        var formData = new FormData(this);
        formData.append('action', $(this).data('url'));
        $.ajax({
            url: site_url + "admin/slider/action.php",
            method: 'post',
            processData: false,
            contentType: false,
            // dataType: 'json',
            data: formData,
            success: function(result) {
                $('.loaderm').hide();
                if (!result.error) {
                    $('#create-form')[0].reset();
                    $('.image_preview').attr('src', "https://via.placeholder.com/80");
                    toastr.success(result.message);
                } else {
                    toastr.error(result.message);
                }
            }
        });
    });

    // Update form
    $('#update-form').on('submit', function(event) {
        const site_url = "http://localhost/finded_ssit5/";

        event.preventDefault();
        $('.loaderm').show();
        var formData = new FormData(this);
        formData.append('action', $(this).data('url'));
        $.ajax({
            url: site_url + "admin/slider/action.php",
            method: 'post',
            processData: false,
            contentType: false,
            // dataType: 'json',
            data: formData,
            success: function(result) {
                $('.loaderm').hide();
                if (!result.error) {
                    window.location = 'sliders.php'
                    toastr.success(result.message);
                } else {
                    toastr.error(result.message);
                }
            }
        });
    });

    // slider delete

    $('.Slider-Delete').on('click', function() {
        const Site_url = "http://localhost/finded_ssit5/admin/";

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(".loaderm").show();
                let id = $(this).data('id');
                $.ajax({
                    url: Site_url + 'slider/action.php',
                    method: 'POST',
                    dataType: 'json',
                    data: { id: id, action: 'Slider_Delete_id' },
                    success: function(result) {
                        $(".loaderm").hide();
                        if (!result.error) {
                            $('.remove-row-' + id).hide();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        } else {
                            toastr.error(result.message);
                        }
                    }
                });
            }
        })
    });


    $('.change-status').on('click', function(){

        const Site_url = "http://localhost/finded_ssit5/admin/";

        $('.loaderm').show();
        let id = $(this).data('id');
        $.ajax({
            url: Site_url + 'slider/action.php',
            method: 'POST',
            dataType: 'json',
            data: { id: id, action: 'change_status' },
            success:function (response){
                $('.loaderm').hide();
                if (!response.error) {
                    if(response.status){
                        $('#td-change-status-' + id).text('Active').css('color','green');
                        $('#button-change-status-' + id).addClass('btn-warning').removeClass('btn-primary');
                        $('#button-change-status-' + id).html('<i class="fa text-white fa-arrow-down"></i>');
                    }else{
                        $('#td-change-status-' + id).text('Inactive').css('color','red');
                        $('#button-change-status-' + id).addClass('btn-primary').removeClass('btn-warning');
                        $('#button-change-status-' + id).html('<i class="fa text-white fa-arrow-up"></i>');
                    }
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            }

        })
    });




    $('.datepick').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,

    });









});