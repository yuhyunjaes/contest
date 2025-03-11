CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- 주문 고유 ID
    user_id INT NOT NULL,  -- 주문을 한 회원의 ID
    total_amount DECIMAL(10, 2) NOT NULL,  -- 주문 총 금액
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- 주문일
    FOREIGN KEY(user_id) REFERENCES users(id)  -- 회원 테이블과 연관된 외래 키
);
