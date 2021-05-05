@extends("layout.template")
@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách sản phẩm</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="{{ route('product.create') }}"><button type="button" class="btn btn-primary">Thêm mới</button></a>
                  </div>
                </div>
              </div>
              <div class="alert alert-primary" id="message" style="display:none">
              		
              	</div>
              @if(session('success'))
              	<div class="alert alert-primary">
              		{{ session('success') }}
              	</div>
              @endif
              @if(session('error'))
              	<div class="alert alert-danger">
              		{{ session('error') }}
              	</div>
              @endif
              @csrf
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table  table-bordered table-hover text-nowrap">
                  <thead>
                    <tr style="text-align:center;">
                      <th width="7%">STT</th>
                      <th width="20%">Tên</th>
                      <th width="35%">Mô tả</th>
                      <th width="15%">Giá</th>
                      <th width="15%">Ảnh</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if (count($products) > 0)
                  @foreach ($products as $product)
                    <tr id="tr_{{$product->id}}">
                      <td>{{ ++$i}}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->ProductDetail->description }}</td>
                      <td><span class="tag tag-success">{{ $product->ProductDetail->price }}</span></td>
                      <td><img src="{{ asset($product->ProductDetail->avatar) }}" style="max-height: 50px;"/></td>
                      <td>
                      	<a href="{{ route('product.edit',$product->id) }}"><i class="fas fa-edit"></i></a>
                      	<a href="#" onclick="deleteRecord({{$product->id}})"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                   @endforeach
                   @else
                   	<tr>
                   		<td colspan="6">Không có bản ghi tồn tại</td>
                   	</tr>
                   @endif
                  </tbody>
                </table>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              	{{ $products->links() }}
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
      
    </section>
    <script>
    	function deleteRecord(id){
    		if (confirm("Bạn chắc chắn muốn xóa bản ghi này?")){
    			let url = "{{ route('product.destroy', '') }}"+"/"+id;
                let token   = $('input[name="_token"]').val();
                console.log(url);
                console.log(token);
                
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                    _token: token
                    },
                    success: function(response) {
                        $("#tr_"+id).remove();
                        $("#message").html("Xóa thành công");
                        $("#message").show();
                    }
                });
    		}
    	}
    	function loadData(){
    		let url = "{{ route('product.index') }}";
    	}
    </script>
    <!-- /.content -->
 @endsection