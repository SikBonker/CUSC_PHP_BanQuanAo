<h1>Danh sách Đơn hàng</h1>

{{-- Success message --}}
@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

{{-- Add new order button --}}
<a href="{{ route('admin.orders.create') }}" style="margin-bottom: 10px; display: inline-block;">Thêm mới đơn hàng</a>

{{-- Orders table --}}
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Khách hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->OrderID }}</td>
                <td>{{ $order->customer->Name }}</td>
                <td>{{ $order->OrderDate }}</td>
                <td>{{ $order->Status }}</td>
                <td>{{ number_format($order->TotalAmount, 0, ',', '.') }} VND</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->OrderID) }}">Xem</a>
                    <a href="{{ route('admin.orders.edit', $order->OrderID) }}">Sửa</a>
                    <form action="{{ route('admin.orders.destroy', $order->OrderID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>