
<h1>Thêm mới Danh mục</h1>

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

{{-- Form to create a new category --}}
<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="CategoryName">Tên danh mục:</label>
        <input type="text" name="CategoryName" id="CategoryName" value="{{ old('CategoryName') }}" required>
    </div>
    <br>
    <button type="submit">Lưu</button>
    <a href="{{ route('admin.categories.index') }}">Hủy</a>
</form>