<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hello cac ban</title>
    <link rel="stylesheet" href="">
</head>
<body>
<ul>
@foreach($list as $l)
 </br>
    <li>
        <div>
            <a href="#">
               Name: {{ $l['name'] }} 
            </a>
        </div>
    </li>
    <li>
        <div>
            <a href="#">
               status: 
                @if($l['status']==1)
                    Đã hoàn thành
                @elseif($l['status']==0)
                    Chưa Làm
                @else
                    Không thực hiện
                @endif 
            </a>
        </div>
    </li>
@endforeach
</ul>
@if($l['status']==1)
    Đã hoàn thành
@endif
</body>
</html>