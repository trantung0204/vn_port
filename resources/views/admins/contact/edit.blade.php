@extends('admins.layouts.master')
@section('content')
<section class="content" id="content-section">
	<div class="row">
		<div class="col-xs-12">
            <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Chỉnh sửa liên hệ</h3><br>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              	<form action="{{ route('contact.update') }}" id="frm-contact" method="POST" role="form">
	              		@csrf
	              		<div class="form-group">
	              			<label for="contact">Liên hệ</label>
	              			<textarea name="contact" id="contact" class="form-control" rows="3" required="required"></textarea>
	              		</div>
	              		<div class="form-group">
	              			<label for="map"><a href="https://www.google.com/maps/" target="_blank" title="">Bản đồ</a></label>
	              			<textarea name="map" id="map" class="form-control" rows="3" required="required"></textarea>
	              		</div>
	              		<div class="form-group" id="map-preview">

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
		CKEDITOR.replace('contact' );
		CKEDITOR.editorConfig = function( config ) {
	        config.width = '400px';
	    };
	    $.ajax({
			type: 'get',
			url: '{{ route('contact.show') }}',

			success: function (response) {
				CKEDITOR.instances.contact.setData(response.contact);
				$('#map').val(response.map);
				$('#map-preview').html(response.map);
			},
			error: function (error) {
			}
		})
		$('#map').on('change',function () {
			$('#map-preview').html($(this).val());
		})
	})
	@if (session('success_msg'))
		toastr.success('{{ session('success_msg') }}');
	@endif
		
</script>
@endsection