@extends('admins.layouts.master')
@section('content')
<section class="content" id="content-section">
	<div class="row">
		<div class="col-xs-12">
            <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Danh sách quản trị viên</h3><br>
	              <a class="btn btn-success " id="add_button">Thêm tài khoản quản trị</a> 
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="users-table"  class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>#</th>
	                  <th>Tên</th>
	                  <th>Email</th>
	                  <th>Thời gian</th>
	                  <th>Hành động</th>
	                </tr>
	                </thead>

	                <tfoot>
	                <tr>
	                  <th>#</th>
	                  <th>Tên</th>
	                  <th>Email</th>
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
		          <h4 class="modal-title">Sửa thông tin quản trị viên</h4>
		        </div>
		        <div class="modal-body">
			        <form id="edit-form" method="POST" role="form" >
			          {{csrf_field()}}<!-- sinh token -->
			          <input type="hidden" name="edit_id" id="edit_id" value="">
			          <div class="form-group">
			            <label for="edit_name">Tên</label>
			            <input name="edit_name" type="text" id="edit_name" class="form-control" placeholder="Tên" >
			          </div>
			          <div class="form-group">
			            <label for="edit_email">Email</label>
			            <input name="edit_email" type="text" id="edit_email" class="form-control" placeholder="Email" >
			          </div>
			          <div class="form-group">
			            <label for="curent_password">Mật khẩu hiện tại <b class="error">*</b></label>
			            <input name="curent_password" type="password" id="curent_password" class="form-control" placeholder="Mật khẩu hiện tại" >
			          </div>
			          <div class="form-group">
			            <label for="new_password">Mật khẩu mới (Nếu muốn đổi mật khẩu)</label>
			            <input name="new_password" type="password" id="new_password" class="form-control" placeholder="Mật khẩu mới" >
			          </div>
			          <div class="form-group">
			            <label for="new_password_2">Nhập lại mật khẩu mới</label>
			            <input name="new_password_2" type="password" id="new_password_2" class="form-control" placeholder="Nhập lại mật khẩu mới" >
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
			          <h4 class="modal-name">Thêm mới tài khoản quản trị</h4>
			        </div>
			        <div class="modal-body">
			        <form id="add-form" method="POST" role="form" >
			          {{csrf_field()}}<!-- sinh token -->
			          <div class="form-group">
			            <label for="add_name">Tên <b class="error">*</b></label>
			            <input name="add_name" type="text" id="add_name" class="form-control" placeholder="Tiêu đề" >
			          </div>
			          <div class="form-group">
			            <label for="add_email">Email <b class="error">*</b></label>
			            <input name="add_email" type="text" id="add_email" class="form-control" placeholder="Email" >
			          </div>
			          <div class="form-group">
			            <label for="password">Mật khẩu <b class="error">*</b></label>
			            <input name="password" type="password" id="password" class="form-control" placeholder="Mật khẩu" >
			          </div>
			          <div class="form-group">
			            <label for="password_2">Nhập lại mật khẩu <b class="error">*</b></label>
			            <input name="password_2" type="password" id="password_2" class="form-control" placeholder="Nhập lại mật khẩu" >
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
<script src="{{ asset('admin_assets/js/ajax_user.js') }}"></script>
@endsection