CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- 사용자 고유 ID
    username VARCHAR(255) NOT NULL,          -- 사용자 이름 (ID)
    email VARCHAR(255) NOT NULL,             -- 사용자 이메일
    password_hash VARCHAR(255) NOT NULL,     -- 암호화된 비밀번호 해시값
    salt VARCHAR(255) NOT NULL,              -- salt값
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  -- 회원 가입 날짜와 시간
    UNIQUE(username),                       -- 사용자 이름은 고유해야 함
    UNIQUE(email)                           -- 이메일도 고유해야 함
);
