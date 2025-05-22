<h1>Chỉnh sửa Danh mục</h1>

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

{{-- Form to edit the category --}}
<form action="{{ route('admin.categories.update', $category->CategoryID) }}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td><label for="CategoryName">Tên danh mục:</label></td>
            <td><input type="text" name="CategoryName" id="CategoryName" value="{{ old('CategoryName', $category->CategoryName) }}" required></td>
        </tr>
    </table>
    <br>
    <button type="submit">Cập nhật</button>
    <a href="{{ route('admin.categories.index') }}">Hủy</a>
</form>