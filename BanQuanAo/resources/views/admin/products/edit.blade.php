<h1>Chỉnh sửa Sản phẩm</h1>

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

{{-- Form to edit the product --}}
<form action="{{ route('admin.products.update', $product->ProductID) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td><label for="ProductName">Tên sản phẩm:</label></td>
            <td><input type="text" name="ProductName" id="ProductName" value="{{ old('ProductName', $product->ProductName) }}" required></td>
        </tr>
        <tr>
            <td><label for="CategoryID">Danh mục:</label></td>
            <td>
                <select name="CategoryID" id="CategoryID" required>
                    <option value="">-- Chọn Danh mục --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->CategoryID }}" {{ $category->CategoryID == $product->CategoryID ? 'selected' : '' }}>
                            {{ $category->CategoryName }}
                        </option>
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
                        <option value="{{ $brand->BrandID }}" {{ $brand->BrandID == $product->BrandID ? 'selected' : '' }}>
                            {{ $brand->BrandName }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="Size">Kích thước:</label></td>
            <td><input type="text" name="Size" id="Size" value="{{ old('Size', $product->Size) }}" required></td>
        </tr>
        <tr>
            <td><label for="Color">Màu sắc:</label></td>
            <td><input type="text" name="Color" id="Color" value="{{ old('Color', $product->Color) }}" required></td>
        </tr>
        <tr>
            <td><label for="Price">Giá:</label></td>
            <td><input type="text" name="Price" id="Price" value="{{ old('Price', $product->Price) }}" required></td>
        </tr>
        <tr>
            <td><label for="Stock">Số lượng:</label></td>
            <td><input type="number" name="Stock" id="Stock" value="{{ old('Stock', $product->Stock) }}" required></td>
        </tr>
        <tr>
            <td><label for="Picture">Hình ảnh:</label></td>
            <td>
                <input type="file" name="Picture" id="Picture">
                @if ($product->Picture)
                    <div style="margin-top: 10px;">
                        <p><strong>Tên file hiện tại:</strong> {{ $product->Picture }}</p>
                    </div>
                @endif
            </td>
        </tr>
    </table>
    <br>
    <button type="submit">Cập nhật</button>
    <a href="{{ route('admin.products.index') }}">Hủy</a>
</form>