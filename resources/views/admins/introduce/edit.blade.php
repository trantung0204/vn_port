@extends('admins.layouts.master')
@section('content')
<section class="content" id="content-section">
	<div class="row">
		<div class="col-xs-12">
            <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Chỉnh sửa giới thiệu</h3><br>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              	<form action="{{ route('introduce.update') }}" id="frm-introduce" method="POST" role="form">
	              		@csrf
	              		<div class="form-group">
	              			<label for="">Giới thiệu</label>
	              			<textarea name="introduce" id="introduce" class="form-control" rows="3" required="required"></textarea>
	              		</div>
	              	
	              		
	              	
	              		<button type="submit" class="btn btn-primary" style="float: right;">Cập nhật</button>
	              	</form>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
@endsection

@section('css')

@endsection

@section('js')
<script type="text/javascript">
	$(document).ready(function () {
		var asset='{{ asset('') }}';
		CKEDITOR.replace('introduce' );
		CKEDITOR.editorConfig = function( config ) {
	        config.width = '400px';
	    };
	    $.ajax({
			type: 'get',
			url: '{{ route('introduce.show') }}',

			success: function (response) {
				CKEDITOR.instances.introduce.setData(response.data);
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