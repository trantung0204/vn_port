jQuery.ready(function () {
	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		// CKEDITOR.replace( 'editor_edit_content' );
	 //    CKEDITOR.replace( 'editor_add_content' );
	  	//CKEDITOR.replace( 'econtent' );
	  	CKEDITOR.editorConfig = function( config ) {
	        // Define changes to default configuration here. For example:
	        // config.language = 'fr';
	        // config.uiColor = '#AADC6E';
	        config.width = '400px';

	    };

	    $('#posts-table').DataTable({
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
	            {data: 'DT_Row_Index', className: 'tx-center', searchable: false},
	            {data: 'thumbnail', className: 'tx-center'},
	            {data: 'title', className: 'tx-center'},
	            {data: 'user_id', className: 'tx-center'},
	            {data: 'status', className: 'tx-center'},
	            {data: 'created_at', className: 'tx-center'},
	            {data: 'action', className: 'tx-center'},
	        ],
	    });
	})
})