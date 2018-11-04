@extends('admins.layouts.master')
@section('content')
<section class="content" id="content-section">
	<div class="row">
		<div class="col-xs-12">
            <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Danh sách bài viết</h3><br>
	              <a class="btn btn-success " id="add_button">Thêm bài viết</a> 
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="posts-table"  class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>#</th>
	                  <th>Ảnh bìa</th>
	                  <th>Tiêu đề</th>
	                  <th>Tác giả</th>
	                  <th>Loại tin</th>
	                  <th>Thời gian</th>
	                  <th>Hành động</th>
	                </tr>
	                </thead>

	                <tfoot>
	                <tr>
	                  <th>#</th>
	                  <th>Ảnh bìa</th>
	                  <th>Tiêu đề</th>
	                  <th>Tác giả</th>
	                  <th>Loại tin</th>
	                  <th>Thời gian</th>
	                  <th>Hành động</th>
	                </tr>
	                </tfoot>
	              </table>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->

			<div class="modal fade" id="show">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			          <h4 class="modal-title" id="product_name">Thông tin bài</h4>
			        </div>
			        <div class="modal-body">
			          <h3 style="color: #969696; font-weight: lighter;" id="product_description"></h3>
			          <div id="product_content">
			            
			          </div>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			    </div>
			</div>

		    <div class="modal fade" id="edit">
		        <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h4 class="modal-title">Sửa thông tin bài viết</h4>
		        </div>
		        <div class="modal-body">

		        </div>
		        <div class="modal-footer">
		          <button id="edit-submit"  type="submit" class="btn btn-primary">Xác nhận</button>
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
			            <label for="add_name">Tên sản phẩm</label>
			            <input name="add_name" type="text" id="add_name" class="form-control" placeholder="Tên sản phẩm" required="true">
			            <input type="hidden" name="add_code" id="add_code">
			          </div>
			          <div class="form-group">
			            <label for="add_category_id">Danh mục</label>
			            
			            <select name="add_category_id" id="add_category_id" class="form-control" required="required">
			                <option value=""></option>
			            </select>
			          </div>
			        <div class="modal-footer">
			          <button id="add-submit"  type="submit" class="btn btn-primary">Xác nhận</button>
			        </form>
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
</style>
@endsection

@section('js')
<script type="text/javascript">
	var asset='{{ asset('') }}';
</script>
<script src="{{ asset('admin_assets/js/ajax_post.js') }}"></script>
@endsection