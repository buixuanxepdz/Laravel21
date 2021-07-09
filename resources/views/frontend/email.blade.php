<font face="Arial">
    <div>
        <div></div>
        <h3><font color="#FF9600">Thông tin khách hàng</font></h3>
        <p>
            <strong class="info">Khách hàng:</strong>{{ $info['name'] }}
        </p>
        <p>
            <strong class="info">Email:</strong>{{ $info['email'] }}
        </p>
        <p>
            <strong class="info">Số điện thoại:</strong>{{ $info['phone'] }}
        </p>
        <p>
            <strong class="info">Địa chỉ:</strong>{{ $info['address'] }}
        </p>
    </div>
    <div>
        <h3><font color="#FF9600">Hóa đơn mua hàng</font></h3>
        <table border="1" cellspacing="0">
            <tr>
                <td><strong>Tên sản phẩm</strong></td>
                <td><strong>Giá</strong></td>
                <td><strong>Số lượng</strong></td>
                <td><strong>Thành tiền</strong></td>
            </tr>
            @foreach ($cart as $item)
            <tr>
                <td style="text-align: center"><strong>{{ $item->name }}</strong></td>
                <td><strong style="text-align: center">{{ number_format($item->price) }}đ</strong></td>
                <td style="text-align: center"><strong>{{ $item->qty }}</strong></td>
                <td><strong style="text-align: right">{{ number_format($item->price*$item->qty) }}đ</strong></td>
            </tr>
            @endforeach
            <tr>
                <td><strong>Thuế:</strong></td>
                <td colspan="3" style="text-align: right"> <strong>{{ number_format($tax) }}đ</strong> </td>
            </tr>
            <tr>
                <td><strong>Tổng tiền:</strong></td>
                <td colspan="3" style="text-align: right"><strong>{{ number_format($total) }}đ</strong></td>
            </tr>
        </table>
    </div>
    <div>
        <h3><font color="#FF9600">Quý khách đã dặt hàng thành công</font></h3>
    </div>
</font>