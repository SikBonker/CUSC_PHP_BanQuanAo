<h1>Danh sách Thương hiệu</h1>

{{-- Display success message --}}
@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

{{-- Add new brand button --}}
<a href="{{ route('admin.brands.create') }}" style="margin-bottom: 10px; display: inline-block;">Thêm mới Thương hiệu</a>

{{-- Brands table --}}
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Thương hiệu</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->BrandID }}</td>
                <td>{{ $brand->BrandName }}</td>
                <td>
                    <a href="{{ route('admin.brands.edit', $brand->BrandID) }}">Sửa</a>
                    <form action="{{ route('admin.brands.destroy', $brand->BrandID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>