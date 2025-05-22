<h1>Chỉnh sửa Khách hàng</h1>

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

{{-- Form to edit the customer --}}
<form action="{{ route('admin.customers.update', $customer->CustomerID) }}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td><label for="Name">Tên khách hàng:</label></td>
            <td><input type="text" name="Name" id="Name" value="{{ old('Name', $customer->Name) }}" required></td>
        </tr>
        <tr>
            <td><label for="Email">Email:</label></td>
            <td><input type="email" name="Email" id="Email" value="{{ old('Email', $customer->Email) }}" required></td>
        </tr>
        <tr>
            <td><label for="Phone">Số điện thoại:</label></td>
            <td><input type="text" name="Phone" id="Phone" value="{{ old('Phone', $customer->Phone) }}" required></td>
        </tr>
        <tr>
            <td><label for="Address">Địa chỉ:</label></td>
            <td><textarea name="Address" id="Address" required>{{ old('Address', $customer->Address) }}</textarea></td>
        </tr>
    </table>
    <br>
    <button type="submit">Cập nhật</button>
    <a href="{{ route('admin.customers.index') }}">Hủy</a>
</form>