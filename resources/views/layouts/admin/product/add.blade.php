@extends('layouts.admin.admin')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm
					<small>- Thêm</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-8 col-lg-offset-2" style="padding-bottom:120px">
				<form action="admin/product/add" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="form-group">
						<label>Chuyên mục <span class="text-danger">*</span></label>
						<select class="form-control" name="Product_Cat">
						@foreach($cat as $r)
							<option value="{{$r->Cat_ID}}">{{$r->Cat_Name}}</option>
						@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Tên sản phẩm <span class="text-danger">*</span></label>
						<input class="form-control" name="Product_Name" placeholder="Nhập tên sản phẩm" />
					</div>
					<div class="form-group">
						<label>Mã sản phẩm</label>
						<input class="form-control" name="Product_MID" placeholder="VD:SP01" />
					</div>
					 <div class="form-group">
						<label>Hình đại diện <span class="text-danger">*</span></label>
						<input type="file" name="Product_Thumbnail" multiple>
					</div>
					 <div class="form-group">
						<label>Giá thị trường</label>
						<input class="form-control" name="Product_PriceMarket" placeholder="Nhập giá bán" />
					</div>
					<div class="form-group">
						<label>Giá bán <span class="text-danger">*</span></label>
						<input class="form-control" name="Product_Price" placeholder="Nhập giá bán" />
					</div>
					<div class="form-group">
						<label>Mô tả <span class="text-danger">*</span></label>
						<textarea class="form-control" name="Product_Description" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Nội dung giới thiệu</label>
						<textarea id="summernote" class="form-control" rows="3" name="Product_Content"></textarea>
					</div>
					<div class="form-group">
						<label>Size sản phẩm <span class="text-danger">*</span></label>
						<input class="form-control" name="Product_Size" placeholder="VD:L,M,S,..." />
					</div>
					<div class="form-group">
						<label>Màu sắc</label>
						<input class="form-control" name="Product_Color" placeholder="VD:L,M,S,..." />
					</div>
					
					<div class="form-group">
						<label>Từ khóa</label>
						<input class="form-control" name="Product_Keywords" placeholder="Nhập từ khóa, vd: áo dài, quần jean,..." />
					</div>
					<div class="form-group">
						<label>Trạng thái</label>
						<label class="radio-inline">
							<input type="radio" name="Product_Show" value="0" checked>Ẩn
						</label>
						<label class="radio-inline">
							<input name="Product_Show" value="1" type="radio">Hiện
						</label>
					</div>
					<button type="submit" class="btn btn-default">Thêm</button>
					<button type="reset" class="btn btn-default">Làm lại</button>
				<form>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
@endsection
@section('script')
<script>
	$(document).ready(function() {
	  $('#summernote').summernote({
		  height: 300,                 // set editor height
		  minHeight: null,             // set minimum height of editor
		  maxHeight: null,             // set maximum height of editor
		  focus: true                  // set focus to editable area after initializing summernote
		});
	});
</script>
@endsection