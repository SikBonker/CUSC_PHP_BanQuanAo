<h1>Thêm mới Sản phẩm</h1>

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

{{-- Form to create a new product --}}
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td><label for="ProductName">Tên sản phẩm:</label></td>
            <td><input type="text" name="ProductName" id="ProductName" value="{{ old('ProductName') }}" required></td>
        </tr>
        <tr>
            <td><label for="CategoryID">Danh mục:</label></td>
            <td>
                <select name="CategoryID" id="CategoryID" required>
                    <option value="">-- Chọn Danh mục --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="BrandID">Thương hiệu:</label></td>
            <td>
                <select name="BrandID" id="BrandID" required>
                    <option value="">-- Chọn Thương hiệu --</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->BrandID }}">{{ $brand->BrandName }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="Size">Kích thước:</label></td>
            <td><input type="text" name="Size" id="Size" value="{{ old('Size') }}"></td>
        </tr>
        <tr>
            <td><label for="Color">Màu sắc:</label></td>
            <td><input type="text" name="Color" id="Color" value="{{ old('Color') }}"></td>
        </tr>
        <tr>
            <td><label for="Price">Giá:</label></td>
            <td><input type="number" name="Price" id="Price" value="{{ old('Price') }}" required></td>
        </tr>
        <tr>
            <td><label for="Stock">Số lượng:</label></td>
            <td><input type="number" name="Stock" id="Stock" value="{{ old('Stock') }}" required></td>
        </tr>
        <tr>
            <td><label for="Description">Mô tả:</label></td>
            <td><textarea name="Description" id="Description">{{ old('Description') }}</textarea></td>
        </tr>
        <tr>
            <td><label for="Picture">Hình ảnh:</label></td>
            <td><input type="file" name="Picture" id="Picture"></td>
        </tr>
    </table>
    <br>
    <button type="submit">Lưu</button>
    <a href="{{ route('admin.products.index') }}">Hủy</a>
</form>