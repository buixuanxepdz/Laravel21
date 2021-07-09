@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Thống kê</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
<div class="container-fluid">
        <!-- Main row -->
    <div class="row">
        <p style="text-align: center;font-size: 20px;font-weight: bold">Thống kê</p>
        <form action="" autocomplete="off" style="display: flex">
            @csrf
            <div class="col-md-2">
                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"> </p>
                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc">
            </div>
            <div class="col-md-2">
                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"> </p>
            </div>
            <div class="col-md-2">
                <p>Lọc theo: 
                    <select name="" class="dashboard-filter form-control" id="">
                        <option >-Chọn-</option>
                        <option value="7ngay">7 ngày qua</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="thangnay">Tháng này</option>
                        <option value="365ngayqua">365 ngày qua</option>
                    </select>
                </p>
            </div>
        </form>
        <div class="col-md-12">
            <div id="myfirstchart" style="height: 250px"></div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            preveText:"Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
            duration: "slow" 
        });
        $( "#datepicker2" ).datepicker({
            preveText:"Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
            duration: "slow" 
        });

       
  } );
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    chart30daysOrder();
  var chart =   new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  lineColors: ['#50C7C7','#42CFCF','#3BEBEB','#3BEBEB','#3BEBEB'],
  parseTime: false,
  hideHover: 'auto',

  // The name of the data record attribute that contains x-values.
  xkey: 'period',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['order','sales','profit','quantity'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Đơn hàng','Doanh Số','Lợi Nhuận','Số lượng']
});

    $('.dashboard-filter').change(function(){
        var dashboard_value = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{ route('backend.statisticalfilterday') }}",
            method:"POST",
            dataType:"JSON",
            data:{dashboard_value:dashboard_value,_token:_token},
            success:function(data)
            {
                chart.setData(data);
            }
        })
    });

    function chart30daysOrder(){
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{ route('backend.chart30day') }}",
            method:"POST",
            dataType:"JSON",
            data:{_token:_token},
            success:function(data)
            {
                chart.setData(data);
            }
        })
    }

 $('#btn-dashboard-filter').click(function(){
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            $.ajax({
                url:"{{ route('backend.statisticalfilter') }}",
                method:"POST",
                dataType:"JSON",
                data:{from_date:from_date,to_date:to_date,_token:_token},
                success:function(data)
                {
                    chart.setData(data);
                }
            })
        })
</script>
@endsection
