
<h1>Danh sách Chi tiết Đơn hàng</h1>

{{-- Success message --}}
@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

{{-- Add new order detail button --}}
<a href="{{ route('admin.orderdetails.create') }}" style="margin-bottom: 10px; display: inline-block;">Thêm mới chi tiết đơn hàng</a>

{{-- Order details table --}}
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Mã Đơn hàng</th>
            <th>Tên Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orderdetails as $orderdetail)
            <tr>
                <td>{{ $orderdetail->OrderDetailID }}</td>
                <td>{{ $orderdetail->order->OrderID }}</td>
                <td>{{ $orderdetail->product->ProductName }}</td>
                <td>{{ $orderdetail->Quantity }}</td>
                <td>{{ number_format($orderdetail->UnitPrice, 0, ',', '.') }} VND</td>
                <td>
                    <a href="{{ route('admin.orderdetails.edit', $orderdetail->OrderDetailID) }}">Sửa</a>
                    <form action="{{ route('admin.orderdetails.destroy', $orderdetail->OrderDetailID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>