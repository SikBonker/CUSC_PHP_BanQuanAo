<h1>Chỉnh sửa Thương hiệu</h1>

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

{{-- Form to edit the brand --}}
<form action="{{ route('admin.brands.update', $brand->BrandID) }}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td><label for="BrandName">Tên Thương hiệu:</label></td>
            <td><input type="text" name="BrandName" id="BrandName" value="{{ old('BrandName', $brand->BrandName) }}" required></td>
        </tr>
    </table>
    <br>
    <button type="submit">Cập nhật</button>
    <a href="{{ route('admin.brands.index') }}">Hủy</a>
</form>