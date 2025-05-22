-- Tạo CSDL
CREATE DATABASE ClothingStore;
USE ClothingStore;

-- Bảng Khách hàng
CREATE TABLE Customers (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Email VARCHAR(100) UNIQUE,
    Phone VARCHAR(20),
    Address TEXT,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng Danh mục sản phẩm
CREATE TABLE Categories (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    CategoryName VARCHAR(50)
);

CREATE TABLE Brands (
    BrandID INT AUTO_INCREMENT PRIMARY KEY,
    BrandName VARCHAR(100) NOT NULL
);
-- Bảng Sản phẩm
CREATE TABLE Products (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(100),
    CategoryID INT,
    BrandID INT,
    Picture VARCHAR(100),
    Size VARCHAR(10),
    Color VARCHAR(30),
    Price DECIMAL(10,2),
    Stock INT,
    Description TEXT,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID),
    FOREIGN KEY (BrandID) REFERENCES Brands(BrandID)
);


-- Bảng Đơn hàng
CREATE TABLE Orders (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT,
    OrderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status VARCHAR(20) DEFAULT 'Pending',
    TotalAmount DECIMAL(10,2),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- Bảng Chi tiết đơn hàng
CREATE TABLE OrderDetails (
    OrderDetailID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT,
    ProductID INT,
    Quantity INT,
    UnitPrice DECIMAL(10,2),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

-- Thêm dữ liệu mẫu

-- Danh mục
INSERT INTO Categories (CategoryName) VALUES
('Áo thun'), ('Áo sơ mi'), ('Quần jeans'), ('Váy'), ('Áo khoác');

-- Khách hàng
INSERT INTO Customers (Name, Email, Phone, Address) VALUES
('Nguyễn Văn A', 'a@example.com', '0909123456', '123 Đường ABC, Quận 1, TP.HCM'),
('Trần Thị B', 'b@example.com', '0912345678', '456 Đường XYZ, Quận 3, TP.HCM');

INSERT INTO Brands (BrandName) VALUES
('LocalBrandX'), ('LocalBrandY'), ('Levi’s'), ('Zara'), ('H&M');

-- Sản phẩm
INSERT INTO Products (ProductName, CategoryID, BrandID, Size, Color, Price, Stock, Description) VALUES
('Áo thun nam basic', 1, 1, 'M', 'Đen', 150000, 50, 'Áo thun cotton 100%'),
('Áo sơ mi trắng nữ', 2, 2, 'S', 'Trắng', 200000, 30, 'Áo sơ mi công sở nữ tay dài'),
('Quần jeans nữ rách gối', 3, 3, 'S', 'Xanh', 400000, 25, 'Chất jeans co giãn, form skinny'),
('Váy xòe công sở', 4, 4, 'M', 'Hồng', 350000, 20, 'Váy công sở kiểu dáng thanh lịch'),
('Áo khoác bomber nam', 5, 5, 'L', 'Xanh rêu', 500000, 15, 'Áo khoác bomber cá tính nam');

-- Đơn hàng
INSERT INTO Orders (CustomerID, Status, TotalAmount) VALUES
(1, 'Completed', 550000),
(2, 'Pending', 400000);

-- Chi tiết đơn hàng
INSERT INTO OrderDetails (OrderID, ProductID, Quantity, UnitPrice) VALUES
(1, 1, 2, 150000),
(1, 4, 1, 250000),
(2, 3, 1, 400000);

