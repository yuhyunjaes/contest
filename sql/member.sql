CREATE TABLE user (
user_id varchar(150) NOT NULL PRIMARY KEY,
hash_password text NOT NULL,
salt text NOT NULL,
email text NOT NULL UNIQUE,
user_name text NOT NULL,
create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);