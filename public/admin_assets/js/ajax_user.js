
$(document).ready(function () {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    var usersTable=$('#users-table').DataTable({
        autoWidth: true,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: asset + 'admin/users/get_list_users',
            type: 'post'
        },
        searching: true,
        columns: [
            {data: 'DT_RowIndex', className: 'tx-center', searchable: false},
            {data: 'name', className: 'tx-center'},
            {data: 'email', className: 'tx-center'},
            {data: 'created_at', className: 'tx-center'},
            {data: 'action', className: 'tx-center'},
        ],
    });

    //add
    $('#add_button').on('click',function () {
    	$('#add').modal('show');
    	$('#add_name').val('');
        $('#add_email').val('');
        $('#password').val('');
    	$('#password_2').val('');
    })
    $('#add-form').on('submit',function (e) {
    	e.preventDefault();
        // alert(contractValue.getNumericString());
        var form = $('#add-form');

        $('span[class=error]').remove();

        if (!form.valid()) {
            return false;
        }
        $.ajax({
            url: asset + 'admin/users',
            type: 'POST', // GET, POST, PUT, PATCH, DELETE,
            data: {
                name: $('#add_name').val(),
                email: $('#add_email').val(),
                password: $('#password').val(),
            },
            success: function (res)
            {
                if (!res.err) {
                    toastr.success(res.msg);

                    usersTable.ajax.reload(null, false);
                    $('#add').modal('hide');

                } else {
                    toastr.error(res.msg);
                }
            }
        });
    })
    $('#add-form').validate({
        errorElement: "span",
        rules: {
            add_name: {
                required: true
            },
            add_email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_2: {
                equalTo: "#password"
            }
        },
        messages: {
            add_name: {
                required: 'Vui lòng nhập tên'
            },
            add_email: {
                required: 'Vui lòng nhập email',
                email: 'Vui lòng nhập email đúng định dạng'
            },
            password: {
                required: 'Vui lòng nhập mật khẩu',
                minlength: 'Vui lòng nhập mật khẩu tối thiểu 6 ký tự'
            },
            password_2: {
                equalTo: 'Xác nhận mật khẩu chưa trùng khớp'
            }
        },
    });

    //edit
    $(document).on('click','.btn-edit',function () {

    	$('#edit').modal('show');
    	$.ajax({
            url: asset + 'admin/users/'+$(this).attr('data-id'),
            type: 'GET', // GET, POST, PUT, PATCH, DELETE,
            processData: false,
            contentType: false,
            success: function (res)
            {
                if (!res.err) {
                    $('#edit_id').val(res.data.id);
			    	$('#edit_name').val(res.data.name);
                    $('#edit_email').val(res.data.email);
                    $('#curent_password').val('');
                    $('#new_password').val('');
                    $('#new_password_2').val('');
			    } else {
                    toastr.error(res.msg);
                }
            }
        });
    })
    $('#edit-form').on('submit',function (e) {
    	e.preventDefault();
        // alert(contractValue.getNumericString());
        var form = $('#edit-form');

        $('span[class=error]').remove();

        if (!form.valid()) {
            return false;
        }
        $.ajax({
            url: asset + 'admin/users/'+$('#edit_id').val(),
            type: 'POST', // GET, POST, PUT, PATCH, DELETE,
            data: {
                name: $('#edit_name').val(),
                email: $('#edit_email').val(),
                password: $('#curent_password').val(),
                new_password: $('#new_password').val(),
            },
            success: function (res)
            {
                if (!res.err) {

                    usersTable.ajax.reload(null, false);
                    if (res.save) {
                        toastr.success(res.msg);
                        $('#edit').modal('hide');
                    }else{
                        toastr.warning(res.msg);
                    }

                } else {
                    toastr.error(res.msg);
                }
            }
        });
    })
    $('#edit_file').on('change',function () {
        $('.error.curent-file').remove();
    })
    $('#edit-form').validate({
        errorElement: "span",
        rules: {
            edit_name: {
                required: true
            },
            edit_email: {
                required: true,
                email: true
            },
            curent_password: {
                required: true,
            },
            new_password: {
                minlength: 6
            },
            new_password_2: {
                equalTo: "#new_password"
            }
        },
        messages: {
            edit_name: {
                required: 'Vui lòng nhập tên'
            },
            edit_email: {
                required: 'Vui lòng nhập email',
                email: 'Vui lòng nhập email đúng định dạng'
            },
            curent_password: {
                required: 'Vui lòng nhập mật khẩu',
            },
            new_password: {
                minlength: 'Vui lòng nhập mật khẩu tối thiểu 6 ký tự'
            },
            new_password_2: {
                equalTo: 'Xác nhận mật khẩu chưa trùng khớp'
            }
        },
    });

    $('#users-table').on('click', '.btn-delete', function (event) {
        event.preventDefault();

        swal({
		  title: "Bạn có chắc muốn xoá?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			//var id=$(this).data('id');
			var url=asset + 'admin/users/' + $(this).attr('data-id');
			$.ajax({
				type: 'delete',
				url: url,

				success: function (response) {
					//console.log(response);
					toastr.error(response.msg);
					usersTable.ajax.reload(null, false);
				},
				error: function (error) {
					
				}
			})
		  } 
		});
    });
})
