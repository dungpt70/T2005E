@extends("layout.template")
@section("content")
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản lý sản phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Cập nhật sản phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
    	@csrf
    	@method("patch")
    <!-- /.card-header -->
      <div class="card-body">
      	@if($errors->any())
      		<div class="alert alert-danger">
      			<strong>Lỗi:</strong>
      			<ul>
      				@foreach($errors->all() as $error)
      					<li>{{ $error }}</li>
      				@endforeach
      			</ul>
      		</div>
      	@endif
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Tên sp" value="{{$product->name}}">
            </div>
            </div>
            <div class="col-md-6">
            	<div class="form-group">
                  <label>Mô tả sản phẩm</label>
                  <textarea class="form-control" rows="3" placeholder="Mô tả" name="description">{{ $product->ProductDetail->description }}</textarea>
                </div>
          	</div>
         </div>
         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Giá</label>
              <input type="text" class="form-control" id="price" name="price" placeholder="Giá sp" value="{{ $product->ProductDetail->price }}">
            </div>
            </div>
            <div class="col-md-6">
            	<div class="form-group">
                  <label>Ảnh đại diện</label>
                  <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="avatar" name="avatar">
                      </div>
                    </div>
                    <img alt="" src="{{ asset($product->ProductDetail->avatar) }}" style="max-width: 100%;">
                </div>
          	</div>
         </div>
         
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Cập nhật</button>
          <a class="btn btn-danger" href="{{ url('/product') }}">Quay lại</a>
        </div>
	</form>
	</div>
@endsection