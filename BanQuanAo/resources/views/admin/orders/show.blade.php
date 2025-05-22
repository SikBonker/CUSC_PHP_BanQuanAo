{{-- filepath: d:\xampp\htdocs\PHP_CUSC\Laravel\BanQuanAo\resources\views\admin\orders\show.blade.php --}}
<h1>Chi tiết Đơn hàng</h1>

<table>
    <tr>
        <td><strong>Mã Đơn hàng:</strong></td>
        <td>{{ $order->OrderID }}</td>
    </tr>
    <tr>
        <td><strong>Khách hàng:</strong></td>
        <td>{{ $order->customer->Name }}</td>
    </tr>
    <tr>
        <td><strong>Trạng thái:</strong></td>
        <td>{{ $order->Status }}</td>
    </tr>
    <tr>
        <td><strong>Tổng tiền:</strong></td>
        <td>{{ number_format($order->TotalAmount, 0, ',', '.') }} đ</td>
    </tr>
    <tr>
        <td><strong>Ngày tạo:</strong></td>
        <td>{{ $order->created_at }}</td>
    </tr>
</table>
<br>
<a href="{{ route('admin.orders.index') }}">Quay lại danh sách</a>