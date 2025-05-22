{{-- filepath: d:\xampp\htdocs\PHP_CUSC\Laravel\BanQuanAo\resources\views\admin\customers\show.blade.php --}}
<h1>Chi tiết Khách hàng</h1>

<table>
    <tr>
        <td><strong>ID:</strong></td>
        <td>{{ $customer->CustomerID }}</td>
    </tr>
    <tr>
        <td><strong>Tên:</strong></td>
        <td>{{ $customer->Name }}</td>
    </tr>
    <tr>
        <td><strong>Email:</strong></td>
        <td>{{ $customer->Email }}</td>
    </tr>
    <tr>
        <td><strong>Số điện thoại:</strong></td>
        <td>{{ $customer->Phone }}</td>
    </tr>
    <tr>
        <td><strong>Địa chỉ:</strong></td>
        <td>{{ $customer->Address }}</td>
    </tr>
</table>
<br>
<a href="{{ route('admin.customers.index') }}">Quay lại danh sách</a>