
$(document).ready(function () {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	// CKEDITOR.replace( 'editor_edit_content' );
 //    CKEDITOR.replace( 'editor_add_content' );
  	CKEDITOR.replace( 'add_content' );
  	CKEDITOR.replace( 'edit_content' );
  	CKEDITOR.editorConfig = function( config ) {
        // Define changes to default configuration here. For example:
        // config.language = 'fr';
        // config.uiColor = '#AADC6E';
        config.width = '400px';

    };

    var postsTable=$('#posts-table').DataTable({
        autoWidth: true,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: asset + 'admin/posts/get_list_posts',
            type: 'post'
        },
        searching: true,
        columns: [
            {data: 'DT_RowIndex', className: 'tx-center', searchable: false},
            {data: 'thumbnail', className: 'tx-center'},
            {data: 'title', className: 'tx-center'},
            {data: 'user_id', className: 'tx-center'},
            {data: 'status', className: 'tx-center'},
            {data: 'created_at', className: 'tx-center'},
            {data: 'action', className: 'tx-center'},
        ],
    });

    //add
    $('#add_button').on('click',function () {
    	$('#add').modal('show');
    	$('#add_title').val('');
    	$('#add_description').val('');
    	CKEDITOR.instances.add_content.setData('');
    	$('#add_thumbnail').val('');
    })
    $('#add-form').on('submit',function (e) {
    	e.preventDefault();
        // alert(contractValue.getNumericString());
        var form = $('#add-form');

        $('span[class=error]').remove();

        if (!form.valid()) {
            return false;
        }
        if (CKEDITOR.instances.add_content.getData()=='') {
        	$('#cke_add_content').after('<span id="add_content-error" class="error">Vui lòng nhập nội dung</span>');
        	return false;
        }
        var newPost = new FormData();
        var file = document.getElementById('add_thumbnail').files; 
        if (file.length>0) {
            newPost.append('thumbnail',file[0]);
        }
        newPost.append('title',$('#add_title').val());         
        newPost.append('description',$('#add_description').val());         
        newPost.append('content',CKEDITOR.instances.add_content.getData());
        // console.log(newPost);
        $.ajax({
            url: asset + 'admin/posts',
            type: 'POST', // GET, POST, PUT, PATCH, DELETE,
            data: newPost,
            processData: false,
            contentType: false,
            success: function (res)
            {
                if (!res.err) {
                    toastr.success(res.msg);

                    postsTable.ajax.reload(null, false);
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
            add_title: {
                required: true
            },
            add_description: {
                required: true
            },
            add_content: {
                required: true
            },
            add_thumbnail: {
                required: true
            }
        },
        messages: {
            add_title: {
                required: 'Vui lòng nhập tiêu đề'
            },
            add_description: {
                required: 'Vui lòng nhập mô tả'
            },
            add_content: {
                required: 'Vui lòng nhập nội dung'
            },
            add_thumbnail: {
                required: 'Vui lòng chọn ảnh bìa'
            }
        },
    });
    $("#add_thumbnail").change(function(){
		$('#add_preview_img').html("");
		$('#add_preview_img').append("<img class='img-responsive center-block' style='height:400px;border-radius:5px;' src='"+URL.createObjectURL(event.target.files[0])+"'>");
	});

    //edit
    $(document).on('click','.btn-edit',function () {

    	$('#edit').modal('show');
    	$.ajax({
            url: asset + 'admin/posts/'+$(this).attr('data-id'),
            type: 'GET', // GET, POST, PUT, PATCH, DELETE,
            processData: false,
            contentType: false,
            success: function (res)
            {
                if (!res.err) {
			    	$('#edit_title').val(res.data.title);
			    	$('#edit_id').val(res.data.id);
			    	$('#edit_description').val(res.data.description);
			    	CKEDITOR.instances.edit_content.setData(res.data.content);
			    	$('#edit_preview_img').html('');
			    	$('#edit_preview_img').append("<img class='img-responsive center-block' style='height:400px;border-radius:5px;' src='"+res.data.thumbnail.replace("public", asset+"/storage")+"'>");
                } else {
                    toastr.error(res.msg);
                }
            }
        });
    })
    $("#edit_thumbnail").change(function(){
		$('#edit_preview_img').html("");
		$('#edit_preview_img').append("<img class='img-responsive center-block' style='height:400px;border-radius:5px;' src='"+URL.createObjectURL(event.target.files[0])+"'>");
	});
    $('#edit-form').on('submit',function (e) {
    	e.preventDefault();
        // alert(contractValue.getNumericString());
        var form = $('#edit-form');

        $('span[class=error]').remove();

        if (!form.valid()) {
            return false;
        }
        var newPost = new FormData();
        var file = document.getElementById('edit_thumbnail').files; 
        if (file.length>0) {
            newPost.append('thumbnail',file[0]);
        }
        newPost.append('title',$('#edit_title').val());         
        newPost.append('description',$('#edit_description').val());         
        newPost.append('content',CKEDITOR.instances.edit_content.getData());
        // console.log(newPost);
        $.ajax({
            url: asset + 'admin/posts/'+$('#edit_id').val(),
            type: 'POST', // GET, POST, PUT, PATCH, DELETE,
            data: newPost,
            processData: false,
            contentType: false,
            success: function (res)
            {
                if (!res.err) {
                    toastr.success(res.msg);

                    postsTable.ajax.reload(null, false);
                    $('#edit').modal('hide');

                } else {
                    toastr.error(res.msg);
                }
            }
        });
    })
    $('#edit-form').validate({
        errorElement: "span",
        rules: {
            add_title: {
                required: true
            },
            add_description: {
                required: true
            },
            add_content: {
                required: true
            }
        },
        messages: {
            add_title: {
                required: 'Vui lòng nhập tiêu đề'
            },
            add_description: {
                required: 'Vui lòng nhập mô tả'
            },
            add_content: {
                required: 'Vui lòng nhập nội dung'
            }
        },
    });
    $(document).on('click','.btn-status',function () {
    	var status=1;
    	if ($(this).hasClass('btn-public')) {
    		status=0
    	}
    	$.ajax({
            url: asset + 'admin/posts/status/'+$(this).attr('data-id')+'/'+status,
            type: 'GET', // GET, POST, PUT, PATCH, DELETE,
            // data: newPost,
            processData: false,
            contentType: false,
            success: function (res)
            {
                if (!res.err) {
                    // toastr.success(res.msg);

                    postsTable.ajax.reload(null, false);
                    // $('#edit').modal('hide');

                } else {
                    toastr.error(res.msg);
                }
            }
        });
    })

    $('#posts-table').on('click', '.btn-delete', function (event) {
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
			var url=asset + 'admin/posts/' + $(this).attr('data-id');
			$.ajax({
				type: 'delete',
				url: url,

				success: function (response) {
					//console.log(response);
					toastr.error(response.msg);
					postsTable.ajax.reload(null, false);
				},
				error: function (error) {
					
				}
			})
		  } 
		});
    });
})
