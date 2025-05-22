<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Trang chủ</title>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="logo">ClothingStore</a>
            <ul class="nav-links">
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/products">Sản phẩm</a></li>
                <li><a href="/about">Giới thiệu</a></li>
                <li><a href="/contact">Liên hệ</a></li>
            </ul>
            <div class="nav-icons">
                <a href="/cart" class="cart-icon">🛒</a>
                <a href="/login" class="login-btn">Đăng nhập</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="title">Tất cả sản phẩm</h2>

        <div class="product-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/products/' . ($product->Picture ?? 'no-image.jpg')) }}" alt="{{ $product->ProductName }}" class="product-image">
                    <div class="product-info">
                        <div>
                            <h3 class="product-name">{{ $product->ProductName }}</h3>
                            <p class="product-details">
                                {{ $product->category->CategoryName ?? 'Không có danh mục' }} | {{ $product->Color }} | Size: {{ $product->Size }}
                            </p>
                            <p class="product-price">{{ number_format($product->Price, 0, ',', '.') }} đ</p>
                        </div>
                        <a href="#" class="add-to-cart-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="cart-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13l-1.5-7" />
                            </svg>
                            Thêm vào giỏ
                        </a>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
    
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <h3>ClothingStore</h3>
                <p>Chúng tôi cung cấp thời trang chất lượng, phong cách và giá cả hợp lý.</p>
            </div>
            <div class="footer-links">
                <h4>Liên kết nhanh</h4>
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/products">Sản phẩm</a></li>
                    <li><a href="/about">Giới thiệu</a></li>
                    <li><a href="/contact">Liên hệ</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>Liên hệ</h4>
                <p>Email: support@clothingstore.com</p>
                <p>Hotline: 0909 123 456</p>
                <p>Địa chỉ: 123 Lê Lợi, Quận 1, TP.HCM</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 ClothingStore. All rights reserved.</p>
        </div>
    </footer>
    
</body>
</html>

