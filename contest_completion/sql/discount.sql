CREATE TABLE discount (
    id int,
    category VARCHAR(50),
    hap int
);

INSERT INTO discount (id, category, hap) VALUES (1, '건강식품', 0);
INSERT INTO discount (id, category, hap) VALUES (2, '디지털', 0);
INSERT INTO discount (id, category, hap) VALUES (3, '팬시', 0);
INSERT INTO discount (id, category, hap) VALUES (4, '향수', 0);
INSERT INTO discount (id, category, hap) VALUES (5, '헤어케어', 0);



SELECT i.id, i.category, i.img, i.name, i.descript, i.price, i.post, i.boon, DATE_FORMAT(i.date, '%Y-%m-%d') AS date, c.hap FROM item i JOIN discount c ON i.id = c.id AND i.category = c.category