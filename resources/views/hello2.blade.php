<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hello cac ban</title>
    <link rel="stylesheet" href="">
</head>
<body>
{{ 'Laravel Zent' }} hello cac ban!

<p>Tên tôi là: {{ $fullname }} </p>
<p>Tôi sinh năm {{ $year }}</p>
<p>Học tại: {{ $school }} </p>
<p>Mục tiêu: {{ $object }}</p>
// <?php 
//     foreach($menu as $m){
//     echo $m . "\n";
// }
// ?>
@for ($i = 0; $i < count($menu); $i++)
 </br>
    <li>
        <div>
            <a href="#">
                {{ $menu[$i] }} 
            </a>
        </div>
    </li>
@endfor
</ul>

@if ($records === 1)
    Có 1 
@elseif ($records > 1)
   Có nhiều
@else
    Không có
@endif

@php
    $i=0;
    $max = count($menu);
@endphp

@while($i < $max)
    {!! '<br>'.$menu[$i] !!}

    @php
        $i++;
    @endphp
@endwhile
</body>
</html>