CREATE TABLE notice (
id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
category text NOT NULL,
title text NOT NULL,
create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);