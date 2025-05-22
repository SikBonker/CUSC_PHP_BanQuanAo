<h1>Thêm mới Thương hiệu</h1>

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

{{-- Form to create a new brand --}}
<form action="{{ route('admin.brands.store') }}" method="POST">
    @csrf
    <table>
        <tr>
            <td><label for="BrandName">Tên Thương hiệu:</label></td>
            <td><input type="text" name="BrandName" id="BrandName" value="{{ old('BrandName') }}" required></td>
        </tr>
    </table>
    <br>
    <button type="submit">Lưu</button>
    <a href="{{ route('admin.brands.index') }}">Hủy</a>
</form>