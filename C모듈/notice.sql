CREATE TABLE notices (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- 공지사항 고유 ID
    title VARCHAR(255) NOT NULL,  -- 공지사항 제목
    content TEXT NOT NULL,  -- 공지사항 내용
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- 작성 일자
);
