<h1>Danh sách Khách hàng</h1>

{{-- Success message --}}
@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

{{-- Add new customer button --}}
<a href="{{ route('admin.customers.create') }}" style="margin-bottom: 10px; display: inline-block;">Thêm mới khách hàng</a>

{{-- Customers table --}}
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->CustomerID }}</td>
                <td>{{ $customer->Name }}</td>
                <td>{{ $customer->Email }}</td>
                <td>{{ $customer->Phone }}</td>
                <td>{{ $customer->Address }}</td>
                <td>
                    <a href="{{ route('admin.customers.show', $customer->CustomerID) }}">Xem</a>
                    <a href="{{ route('admin.customers.edit', $customer->CustomerID) }}">Sửa</a>
                    <form action="{{ route('admin.customers.destroy', $customer->CustomerID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>