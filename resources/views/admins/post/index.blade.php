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
	                  <th>Công khai</th>
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
	                  <th>Công khai</th>
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
			        <form id="edit-form" method="POST" role="form" >
			          {{csrf_field()}}<!-- sinh token -->
			          <input type="hidden" name="edit_id" id="edit_id" value="">
			          <div class="form-group">
			            <label for="edit_title">Tiêu đề</label>
			            <input name="edit_title" type="text" id="edit_title" class="form-control" placeholder="Tiêu đề bài viết" >
			          </div>
			          <div class="form-group">
			            <label for="edit_description">Mô tả</label>
			            <textarea name="edit_description" id="edit_description" class="form-control" rows="3" placeholder="Mô tả"></textarea>
			          </div>
			          <div class="form-group">
			            <label for="edit_content">Nội dung</label>
			            <textarea name="edit_content" id="edit_content" class="form-control" rows="3" placeholder="Nội dung"></textarea>
			          </div>
			          <div class="form-group">
			          	<div class="row">
			          		<div class="col-md-6">
					            <label for="edit_thumbnail">Ảnh bìa</label>
					            <input type="file" name="edit_thumbnail" id="edit_thumbnail" class="form-control">
			          		</div>
			          		<div class="col-md-6">
					            <div id="edit_preview_img">
					            	
					            </div>
			          		</div>
			          	</div>
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
			            <label for="add_title">Tiêu đề</label>
			            <input name="add_title" type="text" id="add_title" class="form-control" placeholder="Tiêu đề bài viết" >
			          </div>
			          <div class="form-group">
			            <label for="add_description">Mô tả</label>
			            <textarea name="add_description" id="add_description" class="form-control" rows="3" placeholder="Mô tả"></textarea>
			          </div>
			          <div class="form-group">
			            <label for="add_content">Nội dung</label>
			            <textarea name="add_content" id="add_content" class="form-control" rows="3" placeholder="Nội dung"></textarea>
			          </div>
			          <div class="form-group">
			          	<div class="row">
			          		<div class="col-md-6">
					            <label for="add_thumbnail">Ảnh bìa</label>
					            <input type="file" name="add_thumbnail" id="add_thumbnail" class="form-control">
			          		</div>
			          		<div class="col-md-6">
					            <div id="add_preview_img">
					            	
					            </div>
			          		</div>
			          	</div>
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
		height: 80vh;
		overflow: auto;
	}
	.btn-status{
		cursor: pointer;
		font-size: 1.5em;
	}
	.btn-private{
		color: gray;
	}
	.btn-public{
		color: green;
	}
</style>
@endsection

@section('js')
<script type="text/javascript">
	var asset='{{ asset('') }}';
</script>
<script src="{{ asset('admin_assets/js/ajax_post.js') }}"></script>
@endsection