<h1>Thêm mới Chi tiết Đơn hàng</h1>

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

{{-- Form to create a new order detail --}}
<form action="{{ route('admin.orderdetails.store') }}" method="POST">
    @csrf
    <table>
        <tr>
            <td><label for="OrderID">Mã Đơn hàng:</label></td>
            <td>
                <select name="OrderID" id="OrderID" required>
                    <option value="">-- Chọn Đơn hàng --</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->OrderID }}">{{ $order->OrderID }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="ProductID">Sản phẩm:</label></td>
            <td>
                <select name="ProductID" id="ProductID" required>
                    <option value="">-- Chọn Sản phẩm --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->ProductID }}">{{ $product->ProductName }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="Quantity">Số lượng:</label></td>
            <td><input type="number" name="Quantity" id="Quantity" value="{{ old('Quantity') }}" required></td>
        </tr>
        <tr>
            <td><label for="UnitPrice">Đơn giá:</label></td>
            <td><input type="text" name="UnitPrice" id="UnitPrice" value="{{ old('UnitPrice') }}" required></td>
        </tr>
    </table>
    <br>
    <button type="submit">Lưu</button>
    <a href="{{ route('admin.orderdetails.index') }}">Hủy</a>
</form>