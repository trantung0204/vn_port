@extends('admins.layouts.master')
@section('content')
<section class="content" id="content-section">
	<div class="row">
		<div class="col-xs-12">
            <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Danh sách biểu cước</h3><br>
	              <a class="btn btn-success " id="add_button">Thêm biểu cước</a> 
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="charges-table"  class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>#</th>
	                  <th>Tên</th>
	                  <th>Tệp</th>
	                  <th>Hiển thị</th>
	                  <th>Thời gian</th>
	                  <th>Hành động</th>
	                </tr>
	                </thead>

	                <tfoot>
	                <tr>
	                  <th>#</th>
	                  <th>Tên</th>
	                  <th>Tệp</th>
	                  <th>Hiển thị</th>
	                  <th>Thời gian</th>
	                  <th>Hành động</th>
	                </tr>
	                </tfoot>
	              </table>
	            </div>
	            <!-- /.box-body -->
	        </div>
	        <!-- /.box -->

		    <div class="modal fade" id="edit">
		        <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h4 class="modal-title">Sửa thông tin biểu cước</h4>
		        </div>
		        <div class="modal-body">
			        <form id="edit-form" method="POST" role="form" >
			          {{csrf_field()}}<!-- sinh token -->
			          <input type="hidden" name="edit_id" id="edit_id" value="">
			          <div class="form-group">
			            <label for="edit_title">Tiêu đề</label>
			            <input name="edit_name" type="text" id="edit_name" class="form-control" placeholder="Tiêu đề" >
			          </div>
			          <div class="form-group">
			          	<label for="edit_file">Tệp biểu cước</label>
			            <input type="file" name="edit_file" id="edit_file" class="form-control">
			          </div>
		        </div>
		        <div class="modal-footer">
		          <button id="edit-submit"  type="submit" class="btn btn-primary">Cập nhật</button>
		        </form>
		          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		        </div>
		      </div>
		        </div>
		     </div> 

			<div class="modal fade" id="add">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			          <h4 class="modal-title">Thêm mới bài viết</h4>
			        </div>
			        <div class="modal-body">
			        <form id="add-form" method="POST" role="form" >
			          {{csrf_field()}}<!-- sinh token -->
			          <div class="form-group">
			            <label for="add_name">Tiêu đề</label>
			            <input name="add_name" type="text" id="add_name" class="form-control" placeholder="Tiêu đề" >
			          </div>
			          <div class="form-group">
			          	<label for="add_file">Tệp biểu cước</label>
						<input type="file" name="add_file" id="add_file" class="form-control">
			          </div>

			        <div class="modal-footer">
			          <button type="submit" class="btn btn-primary">Thêm mới</button>
			        </form>
		          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			        </div>
			      </div>
			    </div>
			</div> 
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
@endsection

@section('css')
<style type="text/css" media="screen">
	#add_button{
		margin-top: 20px;
	}
	.tx-center{
		text-align: center;
		vertical-align: middle !important;
	}
	.error{
		color: red;
	}
	.modal-body{
		max-height: 80vh;
		overflow: auto;
	}
	.btn-status{
		cursor: pointer;
		font-size: 1.5em;
	}
	.btn-on{
		color: #4AD261;
	}
	.btn-off{
		color: gray;
	}
	.btn-download{
		font-size: 1.5em;
	}
</style>
@endsection

@section('js')
<script type="text/javascript">
	var asset='{{ asset('') }}';
</script>
<script src="{{ asset('admin_assets/js/ajax_charges.js') }}"></script>
@endsection