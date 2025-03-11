CREATE TABLE guest_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- 비회원 주문 고유 ID
    guest_id VARCHAR(255) NOT NULL,  -- 비회원의 고유 ID (랜덤 값으로 생성)
    total_amount DECIMAL(10, 2) NOT NULL,  -- 주문 총 금액
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- 주문일
);
