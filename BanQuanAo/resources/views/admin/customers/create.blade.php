<h1>Thêm mới Khách hàng</h1>

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

{{-- Form to create a new customer --}}
<form action="{{ route('admin.customers.store') }}" method="POST">
    @csrf
    <table>
        <tr>
            <td><label for="Name">Tên khách hàng:</label></td>
            <td><input type="text" name="Name" id="Name" value="{{ old('Name') }}" required></td>
        </tr>
        <tr>
            <td><label for="Email">Email:</label></td>
            <td><input type="email" name="Email" id="Email" value="{{ old('Email') }}" required></td>
        </tr>
        <tr>
            <td><label for="Phone">Số điện thoại:</label></td>
            <td><input type="text" name="Phone" id="Phone" value="{{ old('Phone') }}" required></td>
        </tr>
        <tr>
            <td><label for="Address">Địa chỉ:</label></td>
            <td><textarea name="Address" id="Address" required>{{ old('Address') }}</textarea></td>
        </tr>
    </table>
    <br>
    <button type="submit">Lưu</button>
    <a href="{{ route('admin.customers.index') }}">Hủy</a>
</form>