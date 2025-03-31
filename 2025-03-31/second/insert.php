<?php
    $conn = mysqli_connect("localhost", "root", "", "gifts");
    $sqls = "
        INSERT INTO discount (id, category, hap) VALUES (1, '건강식품', 0);
        INSERT INTO discount (id, category, hap) VALUES (2, '디지털', 0);
        INSERT INTO discount (id, category, hap) VALUES (3, '팬시', 0);
        INSERT INTO discount (id, category, hap) VALUES (4, '향수', 0);
        INSERT INTO discount (id, category, hap) VALUES (5, '헤어케어', 0);
    ";
    $result = mysqli_multi_query($conn, $sqls);
    if($result !== false) {
        echo'데이터 삽입 성공';
    }
?>