CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- 상품 고유 ID
    name VARCHAR(255) NOT NULL,  -- 상품 이름
    description TEXT,  -- 상품 설명
    price DECIMAL(10, 2) NOT NULL,  -- 상품 가격
    category VARCHAR(255) NOT NULL,  -- 상품 카테고리
    image VARCHAR(255),  -- 상품 이미지 경로
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- 상품 등록 일시
);
