<h1>Thêm mới Đơn hàng</h1>

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

{{-- Form to create a new order --}}
<form action="{{ route('admin.orders.store') }}" method="POST">
    @csrf
    <table>
        <tr>
            <td><label for="CustomerID">Khách hàng:</label></td>
            <td>
                <select name="CustomerID" id="CustomerID" required>
                    <option value="">-- Chọn Khách hàng --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->CustomerID }}">{{ $customer->Name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="Status">Trạng thái:</label></td>
            <td>
                <select name="Status" id="Status" required>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="TotalAmount">Tổng tiền:</label></td>
            <td><input type="text" name="TotalAmount" id="TotalAmount" value="{{ old('TotalAmount') }}" required></td>
        </tr>
    </table>
    <br>
    <button type="submit">Lưu</button>
    <a href="{{ route('admin.orders.index') }}">Hủy</a>
</form>