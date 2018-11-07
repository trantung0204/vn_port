
$(document).ready(function () {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    var chargesTable=$('#charges-table').DataTable({
        autoWidth: true,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: asset + 'admin/charges/get_list_charges',
            type: 'post'
        },
        searching: true,
        columns: [
            {data: 'DT_RowIndex', className: 'tx-center', searchable: false},
            {data: 'name', className: 'tx-center'},
            {data: 'link', className: 'tx-center'},
            {data: 'status', className: 'tx-center'},
            {data: 'created_at', className: 'tx-center'},
            {data: 'action', className: 'tx-center'},
        ],
    });

    //add
    $('#add_button').on('click',function () {
    	$('#add').modal('show');
    	$('#add_name').val('');
    	$('#add_file').val('');
    })
    $('#add-form').on('submit',function (e) {
    	e.preventDefault();
        // alert(contractValue.getNumericString());
        var form = $('#add-form');

        $('span[class=error]').remove();

        if (!form.valid()) {
            return false;
        }
        var newPost = new FormData();
        var file = document.getElementById('add_file').files; 
        if (file.length>0) {
            newPost.append('link',file[0]);
        }
        newPost.append('name',$('#add_name').val());
        // console.log(newPost);
        $.ajax({
            url: asset + 'admin/charges',
            type: 'POST', // GET, POST, PUT, PATCH, DELETE,
            data: newPost,
            processData: false,
            contentType: false,
            success: function (res)
            {
                if (!res.err) {
                    toastr.success(res.msg);

                    chargesTable.ajax.reload(null, false);
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
            add_file: {
                required: true
            }
        },
        messages: {
            add_name: {
                required: 'Vui lòng nhập tiêu đề'
            },
            add_file: {
                required: 'Vui lòng đính kèm tệp biểu cước'
            }
        },
    });

    //edit
    $(document).on('click','.btn-edit',function () {

    	$('#edit').modal('show');
    	$.ajax({
            url: asset + 'admin/charges/'+$(this).attr('data-id'),
            type: 'GET', // GET, POST, PUT, PATCH, DELETE,
            processData: false,
            contentType: false,
            success: function (res)
            {
                if (!res.err) {
			    	$('#edit_name').val(res.data.name);
                    $('#edit_file').val('');
                    $('#edit_id').val(res.data.id);
                    $('.error.curent-file').remove();
			    	$('#edit_file').after('<span class="error curent-file">Tệp hiện tại: <a href="'+res.data.link.replace("public", asset+"storage")+'">Tải</a></span>');
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
        var newPost = new FormData();
        var file = document.getElementById('edit_file').files; 
        if (file.length>0) {
            newPost.append('link',file[0]);
        }
        newPost.append('name',$('#edit_name').val());
        // console.log(newPost);
        $.ajax({
            url: asset + 'admin/charges/'+$('#edit_id').val(),
            type: 'POST', // GET, POST, PUT, PATCH, DELETE,
            data: newPost,
            processData: false,
            contentType: false,
            success: function (res)
            {
                if (!res.err) {
                    toastr.success(res.msg);

                    chargesTable.ajax.reload(null, false);
                    $('#edit').modal('hide');

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
            }
        },
        messages: {
            edit_name: {
                required: 'Vui lòng nhập tiêu đề'
            }
        },
    });
    $(document).on('click','.btn-status',function () {
    	var status=1;
    	if ($(this).hasClass('btn-off')) {
    		status=0
    	}
    	$.ajax({
            url: asset + 'admin/charges/status/'+$(this).attr('data-id')+'/'+status,
            type: 'GET', // GET, POST, PUT, PATCH, DELETE,
            // data: newPost,
            processData: false,
            contentType: false,
            success: function (res)
            {
                if (!res.err) {
                    // toastr.success(res.msg);

                    chargesTable.ajax.reload(null, false);
                    // $('#edit').modal('hide');

                } else {
                    toastr.error(res.msg);
                }
            }
        });
    })

    $('#charges-table').on('click', '.btn-delete', function (event) {
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
			var url=asset + 'admin/charges/' + $(this).attr('data-id');
			$.ajax({
				type: 'delete',
				url: url,

				success: function (response) {
					//console.log(response);
					toastr.error(response.msg);
					chargesTable.ajax.reload(null, false);
				},
				error: function (error) {
					
				}
			})
		  } 
		});
    });
})
