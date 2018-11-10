@extends('admins.layouts.master')
@section('content')
<section class="content" id="content-section">
	<div class="row">
		<div class="col-xs-12">
            <div class="box">
              	<form action="{{ route('introduce.update') }}" id="frm-introduce" method="POST" role="form">
              		@csrf
		            <div class="box-header">
		              <h1 class="box-title">Chỉnh sửa giới thiệu</h1><br>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#gioi_thieu"><i class="fa fa-caret-down" aria-hidden="true"></i> Giới thiệu</a>
						      </h4>
						    </div>
						    <div id="gioi_thieu" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="introduce" id="introduce" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>

	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#lich_su"><i class="fa fa-caret-down" aria-hidden="true"></i> Lịch sử hình thành</a>
						      </h4>
						    </div>
						    <div id="lich_su" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="history" id="history" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>

	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#tam_nhin"><i class="fa fa-caret-down" aria-hidden="true"></i> Tầm nhìn xứ mệnh</a>
						      </h4>
						    </div>
						    <div id="tam_nhin" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="duty" id="duty" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>

	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#so_do"><i class="fa fa-caret-down" aria-hidden="true"></i> Sơ đồ tổ chức</a>
						      </h4>
						    </div>
						    <div id="so_do" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="organization" id="organization" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>

	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#lanh_dao"><i class="fa fa-caret-down" aria-hidden="true"></i> Ban lãnh đạo</a>
						      </h4>
						    </div>
						    <div id="lanh_dao" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="host" id="host" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>            	
	              		
	              		{{-- <button type="submit" class="btn btn-primary" style="float: right;">Cập nhật</button> --}}
		            </div>
		            <!-- /.box-body -->
		            <div class="box-header">
		              <h1 class="box-title">Cơ sở vật chất, hạ tầng</h1><br>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            	
	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#dich_vu"><i class="fa fa-caret-down" aria-hidden="true"></i> Dịch vụ</a>
						      </h4>
						    </div>
						    <div id="dich_vu" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="service" id="service" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>  
		            	
	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#luong_lach"><i class="fa fa-caret-down" aria-hidden="true"></i> Luồng lạch</a>
						      </h4>
						    </div>
						    <div id="luong_lach" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="stream" id="stream" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>      	
		            	
	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#cau_cang"><i class="fa fa-caret-down" aria-hidden="true"></i> Cầu cảng</a>
						      </h4>
						    </div>
						    <div id="cau_cang" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="bridge" id="bridge" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>      	

	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#kho_bai"><i class="fa fa-caret-down" aria-hidden="true"></i> Kho bãi</a>
						      </h4>
						    </div>
						    <div id="kho_bai" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="storage" id="storage" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>      	

	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#thiet_bi"><i class="fa fa-caret-down" aria-hidden="true"></i> Hệ thống thiết bị</a>
						      </h4>
						    </div>
						    <div id="thiet_bi" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="equipment" id="equipment" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>      	

	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#giay_to"><i class="fa fa-caret-down" aria-hidden="true"></i> Giấy tờ chứng nhận</a>
						      </h4>
						    </div>
						    <div id="giay_to" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="degree" id="degree" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>      	

	              		<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" class="collapse-handle" href="#nang_luc"><i class="fa fa-caret-down" aria-hidden="true"></i> Năng lực tiếp nhận</a>
						      </h4>
						    </div>
						    <div id="nang_luc" class="panel-collapse collapse">
						      <div class="panel-body">
								<textarea name="capacity" id="capacity" class="form-control" rows="3" required="required"></textarea>
						      </div>
						    </div>
						  </div>
						</div>      	
	              		
	              		<button type="submit" class="btn btn-primary" style="float: right;">Cập nhật</button>
		            </div>
		            <!-- /.box-body -->
	            </form>
	          </div>
	          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
@endsection

@section('css')
	<style type="text/css" media="screen">
		.collapse-handle{
			display: inline-block;
			width: 100%;
			padding: 10px 15px;
			font-size: 1.2em;
		}
		.collapse-handle i{
			margin-right: 15px;
		}
		.panel-heading{
			padding: 0 !important;
		}
		.box-title{
			font-size: 2em !important;
		}
	</style>
@endsection

@section('js')
<script type="text/javascript">
	$(document).ready(function () {
		var asset='{{ asset('') }}';
		CKEDITOR.replace('introduce' );
		CKEDITOR.replace('history' );
		CKEDITOR.replace('duty' );
		CKEDITOR.replace('organization' );
		CKEDITOR.replace('host' );

		CKEDITOR.replace('service' );
		CKEDITOR.replace('stream' );
		CKEDITOR.replace('bridge' );
		CKEDITOR.replace('storage' );
		CKEDITOR.replace('equipment' );
		CKEDITOR.replace('degree' );
		CKEDITOR.replace('capacity' );
	    $.ajax({
			type: 'get',
			url: '{{ route('introduce.show') }}',

			success: function (response) {
				console.log(response.data);
				CKEDITOR.instances.introduce.setData(response.data[0].name);
				CKEDITOR.instances.history.setData(response.data[1].name);
				CKEDITOR.instances.duty.setData(response.data[2].name);
				CKEDITOR.instances.organization.setData(response.data[3].name);
				CKEDITOR.instances.host.setData(response.data[4].name);
				CKEDITOR.instances.stream.setData(response.data[5].name);
				CKEDITOR.instances.bridge.setData(response.data[6].name);
				CKEDITOR.instances.storage.setData(response.data[7].name);
				CKEDITOR.instances.equipment.setData(response.data[8].name);
				CKEDITOR.instances.degree.setData(response.data[9].name);
				CKEDITOR.instances.capacity.setData(response.data[10].name);
				CKEDITOR.instances.service.setData(response.data[11].name);
			},
			error: function (error) {
			}
		})
	})
	@if (session('success_msg'))
		toastr.success('{{ session('success_msg') }}');
	@endif
		
</script>
@endsection