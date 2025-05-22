{{-- filepath: d:\xampp\htdocs\PHP_CUSC\Laravel\BanQuanAo\resources\views\admin\Admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('admin.categories.index') }}">Quản lý Danh mục</a></li>
        <li><a href="{{ route('admin.brands.index') }}">Quản lý Thương hiệu</a></li>
        <li><a href="{{ route('admin.customers.index') }}">Quản lý Khách hàng</a></li>
        <li><a href="{{ route('admin.orders.index') }}">Quản lý Đơn hàng</a></li>
        <li><a href="{{ route('admin.orderdetails.index') }}">Quản lý Chi tiết Đơn hàng</a></li>
        <li><a href="{{ route('admin.products.index') }}">Quản lý Sản phẩm</a></li>
    </ul>
</body>
</html>