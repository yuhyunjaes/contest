CREATE TABLE cart (
    user_id VARCHAR(150) NOT NULL,
    item_id int,
    hap int
);

SELECT i.img, i.category, i.name, COUNT(c.hap) FROM cart c JOIN item i ON c.item_id = id LEFT JOIN discount d ON i.id = d.id WHERE c.user_id = 'a123' GROUP BY i.img, i.category, i.name;