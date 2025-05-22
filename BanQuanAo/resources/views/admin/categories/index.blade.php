<h1>Danh sách Danh mục</h1>

    {{-- Success message --}}
@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

{{-- Add new category button --}}
<a href="{{ route('admin.categories.create') }}" style="margin-bottom: 10px; display: inline-block;">Thêm mới danh mục</a>

{{-- Categories table --}}
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->CategoryID }}</td>
                <td>{{ $category->CategoryName }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->CategoryID) }}">Sửa</a>
                    <form action="{{ route('admin.categories.destroy', $category->CategoryID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>