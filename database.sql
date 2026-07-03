CREATE DATABASE IF NOT EXISTS purewellness
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE purewellness;

-- ===========================
-- ADMIN
-- ===========================

CREATE TABLE admins (

id INT AUTO_INCREMENT PRIMARY KEY,

full_name VARCHAR(100) NOT NULL,

email VARCHAR(150) UNIQUE NOT NULL,

password VARCHAR(255) NOT NULL,

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- ===========================
-- CATEGORIES
-- ===========================

CREATE TABLE categories (

id INT AUTO_INCREMENT PRIMARY KEY,

name VARCHAR(100) NOT NULL,

image VARCHAR(255),

status TINYINT(1) DEFAULT 1,

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- ===========================
-- BRANDS
-- ===========================

CREATE TABLE brands (

id INT AUTO_INCREMENT PRIMARY KEY,

name VARCHAR(100) NOT NULL,

logo VARCHAR(255),

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- ===========================
-- PRODUCTS
-- ===========================

CREATE TABLE products (

id INT AUTO_INCREMENT PRIMARY KEY,

category_id INT,

brand_id INT,

name VARCHAR(255) NOT NULL,

slug VARCHAR(255),

description TEXT,

price DECIMAL(10,2),

sale_price DECIMAL(10,2),

stock INT DEFAULT 0,

sku VARCHAR(80),

image VARCHAR(255),

featured TINYINT(1) DEFAULT 0,

status TINYINT(1) DEFAULT 1,

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

FOREIGN KEY(category_id) REFERENCES categories(id),

FOREIGN KEY(brand_id) REFERENCES brands(id)

);

-- ===========================
-- PRODUCT IMAGES
-- ===========================

CREATE TABLE product_images(

id INT AUTO_INCREMENT PRIMARY KEY,

product_id INT,

image VARCHAR(255),

FOREIGN KEY(product_id)
REFERENCES products(id)
ON DELETE CASCADE

);

-- ===========================
-- CUSTOMERS
-- ===========================

CREATE TABLE customers(

id INT AUTO_INCREMENT PRIMARY KEY,

first_name VARCHAR(100),

last_name VARCHAR(100),

phone VARCHAR(50),

email VARCHAR(150),

city VARCHAR(120),

address TEXT,

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- ===========================
-- ORDERS
-- ===========================

CREATE TABLE orders(

id INT AUTO_INCREMENT PRIMARY KEY,

customer_id INT,

total DECIMAL(10,2),

status ENUM(
'Në pritje',
'Në përpunim',
'Dërguar',
'Përfunduar',
'Anuluar'
) DEFAULT 'Në pritje',

notes TEXT,

created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

FOREIGN KEY(customer_id)
REFERENCES customers(id)

);

-- ===========================
-- ORDER ITEMS
-- ===========================

CREATE TABLE order_items(

id INT AUTO_INCREMENT PRIMARY KEY,

order_id INT,

product_id INT,

quantity INT,

price DECIMAL(10,2),

FOREIGN KEY(order_id)
REFERENCES orders(id)
ON DELETE CASCADE,

FOREIGN KEY(product_id)
REFERENCES products(id)

);

-- ===========================
-- SETTINGS
-- ===========================

CREATE TABLE settings(

id INT AUTO_INCREMENT PRIMARY KEY,

site_name VARCHAR(255),

phone VARCHAR(100),

email VARCHAR(255),

address TEXT,

facebook VARCHAR(255),

instagram VARCHAR(255),

tiktok VARCHAR(255),

logo VARCHAR(255)

);
INSERT INTO settings
(
site_name,
phone,
email,
address
)

VALUES(

'Purewellness.al',

'+355',

'info@purewellness.al',

'Rruga Osman Myderizi, Komuna e Parisit, Tirane, Albania'

);
