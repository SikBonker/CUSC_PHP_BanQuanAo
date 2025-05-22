<h1>Chỉnh sửa Đơn hàng</h1>

{{-- Display validation errors --}}
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form to edit the order --}}
<form action="{{ route('admin.orders.update', $order->OrderID) }}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td><label for="CustomerID">Khách hàng:</label></td>
            <td>
                <select name="CustomerID" id="CustomerID" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->CustomerID }}" {{ $customer->CustomerID == $order->CustomerID ? 'selected' : '' }}>
                            {{ $customer->Name }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="Status">Trạng thái:</label></td>
            <td>
                <select name="Status" id="Status" required>
                    <option value="Pending" {{ $order->Status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $order->Status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ $order->Status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="TotalAmount">Tổng tiền:</label></td>
            <td><input type="text" name="TotalAmount" id="TotalAmount" value="{{ old('TotalAmount', $order->TotalAmount) }}" required></td>
        </tr>
    </table>
    <br>
    <button type="submit">Cập nhật</button>
    <a href="{{ route('admin.orders.index') }}">Hủy</a>
</form>