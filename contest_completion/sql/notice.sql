CREATE TABLE notices (
id INT AUTO_INCREMENT Primary Key,
category VARCHAR(250),
descript text,
da TIMESTAMP NOT NULL DEFAULT current_timestamp()
);