CREATE TABLE user (
    user_id VARCHAR(150) NOT NULL PRIMARY KEY,
    hash_password TEXT NULL,
    salt TEXT NULL,
    user_name VARCHAR(100) NULL,
    email VARCHAR(150) NULL UNIQUE,
    created_at TIMESTAMP NOT NULL DEFAULT current_timestamp()
);