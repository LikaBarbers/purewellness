CREATE DATABASE purewellness CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE purewellness;

-- =====================
-- Tabela e Administratorëve
-- =====================

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(120) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================
-- Kategoritë
-- =====================

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================
-- Produktet
-- =====================

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    image VARCHAR(255),
    featured TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY(category_id) REFERENCES categories(id)
);

-- =====================
-- Porositë
-- =====================

CREATE TABLE orders (

    id INT AUTO_INCREMENT PRIMARY KEY,

    first_name VARCHAR(100),

    last_name VARCHAR(100),

    phone VARCHAR(30),

    email VARCHAR(120),

    city VARCHAR(100),

    address TEXT,

    notes TEXT,

    total DECIMAL(10,2),

    status ENUM('Në pritje','Në përpunim','Dërguar','Përfunduar','Anuluar')
    DEFAULT 'Në pritje',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =====================
-- Artikujt e Porosisë
-- =====================

CREATE TABLE order_items (

    id INT AUTO_INCREMENT PRIMARY KEY,

    order_id INT,

    product_id INT,

    quantity INT,

    price DECIMAL(10,2),

    FOREIGN KEY(order_id) REFERENCES orders(id) ON DELETE CASCADE,

    FOREIGN KEY(product_id) REFERENCES products(id)

);
INSERT INTO categories(name) VALUES
('Skincare'),
('Wellness'),
('Supplements'),
('Body Care'),
('Hair Care');
