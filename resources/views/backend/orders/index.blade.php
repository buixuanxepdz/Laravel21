@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Quản lý đơn hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
<style>
   
    .sortby{
        height: 33px;
        border-radius: 5px;
    }
.card-tools{
    width: 40% !important;
    display: flex !important;
    justify-content: space-between !important;
}
</style>
<div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Danh Mục Mới</h3> --}}
                       
                        <div class="card-tools">
                            <div>
                                <form action="" method="get" id="form_filter">
                                    <span style="margin-right: 5px">Sắp xếp theo</span>
                                        <select name="sortby" class="sortby" style="border:1px solid #ced4da;">
                                            <option {{ Request::get('sortby') == 'default' || !Request::get('sortby') ? "'selected = selected '" : "" }} value="default" selected="selected">Mặc định</option>
                                            <option {{ Request::get('sortby') == 'moi-nhat' ? "selected = 'selected '" : "" }} value="moi-nhat">Sản phẩm mới</option>
                                            <option {{ Request::get('sortby') == 'sp-cu' ? "selected = 'selected '" : "" }} value="sp-cu">Sản phẩm cũ</option>
                                            <option {{ Request::get('sortby') == 'tang-dan' ? "selected = 'selected '" : "" }} value="tang-dan">Thứ tự tăng dần</option>
                                            <option {{ Request::get('sortby') == 'giam-dan' ? "selected = 'selected '" : "" }} value="giam-dan">Thứ tự giảm dần</option>
                                        </select>
                                </form>
                            </div>
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input style="margin-top: 7px" type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Ghi chú</th>
                                <th>Trạng thái</th>
                                <th>Thời gian</th>
                                <th>Hành Động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders  as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->note }}</td>
                                <td>
                                    @if ($order->status == 0)
                                        <span style="background-color: rgb(247, 65, 65);padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                            Chưa xử lý<i class="fas fa-spinner" style="margin-left: 5px;"></i>
                                        </span>    
                                    @elseif($order->status ==1)
                                        <span style="background-color: rgb(28, 49, 243);padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                            Đã xác nhận<i class="fas fa-thumbs-up" style="margin-left: 5px;"></i>
                                        </span>
                                    @elseif($order->status ==2)
                                        <span  style="background-color: yellow;padding: 5px 10px;color:rgb(19, 95, 209);font-weight: bold;border-radius: 10px">
                                            Đang giao hàng<i class="fas fa-motorcycle" style="margin-left: 5px;"></i>
                                        </span>
                                    @else
                                        <span style="background-color:green;padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                            Đã hoàn thành <i class="fas fa-check-circle" style="margin-left: 5px;"></i>
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @if ($order->status == 3)
                                        <button class="btn btn-outline-success" type="button" disabled><i class="fas fa-file-signature" style="margin-right: 4px"></i>Cập nhật đơn hàng</button>
                                    @else
                                        <a class="btn btn-outline-success" href="{{ route('backend.order.edit',$order->id) }}"><i class="fas fa-file-signature" style="margin-right: 4px"></i>Cập nhật đơn hàng</a>
                                    @endif
                                    
                                    <form style="display: inline" action="{{ route('backend.order.destroy',$order->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        @if ($order->status == 3)
                                            <button disabled  type="submit" class="btn btn-outline-danger delete-confirm" data-name="{{ $order->name }}">
                                                <i class="fas fa-window-close" style="margin-right: 4px"></i>Hủy đơn hàng
                                            </button>
                                        @else
                                            <button  type="submit" class="btn btn-outline-danger delete-confirm" data-name="{{ $order->name }}">
                                                <i class="fas fa-window-close" style="margin-right: 4px"></i></i>Hủy đơn hàng
                                            </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                            </tbody>
                           
                        </table>
                        <div class="mt-3 float-right mr-5">
                             {!! $orders->appends(request()->input())->links() !!}
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    @if(Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}");
    </script>    
    @elseif(Session::has('error'))    
    <script>
        toastr.error("{!! Session::get('error') !!}");
    </script>
    @endif

    @if(Session::has('updatesuccess'))
    <script>
        toastr.success("{!! Session::get('updatesuccess') !!}");
    </script>    
    @elseif(Session::has('updateerror'))    
    <script>
        toastr.error("{!! Session::get('updateerror') !!}");
    </script>
    @endif

    @if(Session::has('deletesuccess'))
    <script>
        toastr.success("{!! Session::get('deletesuccess') !!}");
    </script>    
    @elseif(Session::has('deleteerror'))    
    <script>
        toastr.error("{!! Session::get('deleteerror') !!}");
    </script>
    @endif
    <script>
        $('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Bạn có muốn xóa khách hàng ${name}?`,
          text: "Nếu bạn xóa nó, bạn sẽ không thể khôi phục lại được",
          icon: "error",
          buttons: ["Không", "Xóa"],
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
    </script>
    <script>
    $(function(){
        $('.order').change(function(){
            $('#form_order').submit();
        });
    })
</script>
<script>
    $(function(){
        $('.sortby').change(function(){
            $('#form_filter').submit();
        });
    })
</script>
@endsection
