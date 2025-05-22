<h1>Danh sách Sản phẩm</h1>

{{-- Success message --}}
@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

{{-- Add new product button --}}
<a href="{{ route('admin.products.create') }}" style="margin-bottom: 10px; display: inline-block;">Thêm mới sản phẩm</a>

{{-- Products table --}}
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Kích thước</th>
            <th>Màu sắc</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->ProductID }}</td>
                <td>{{ $product->ProductName }}</td>
                <td>{{ $product->category->CategoryName }}</td>
                <td>{{ $product->brand->BrandName ?? 'Không có thương hiệu' }}</td>
                <td>{{ $product->Size }}</td>
                <td>{{ $product->Color }}</td>
                <td>{{ number_format($product->Price, 0, ',', '.') }} VND</td>
                <td>{{ $product->Stock }}</td>
                <td>
                    @if ($product->Picture)
                        <img src="{{ asset('storage/products/' . $product->Picture) }}" alt="Hình ảnh sản phẩm" style="width: 100px; height: 100px; object-fit: cover;">
                    @else
                        <span>Không có hình ảnh</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->ProductID) }}">Sửa</a>
                    <form action="{{ route('admin.products.destroy', $product->ProductID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>