<?php
$conn = mysqli_connect("localhost", "root", "", "notice");
$sql = "
INSERT INTO notices (category, descript, da) VALUES ('nomal', '파주가람점 리뉴얼로 인한 영업 중단 안내', '2024.07.22');
INSERT INTO notices (category, descript, da) VALUES ('event', '<사적인TMI> EP.50 아비브 이벤트 당첨자 발표	', '2024.07.16');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '하월곡점 폐점으로 인한 영업종료 안내', '2024.07.31');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '셔터브리티 3기 대상자 발표', '2024.06.18');
INSERT INTO notices (category, descript, da) VALUES ('event', '[기프트몰라이브 - 기프트몰마켓 : 닥터지]이벤트 당첨자 발표', '2024.07.16');
INSERT INTO notices (category, descript, da) VALUES ('event', '[기프트몰라이브 - 기프트몰마켓]이벤트 당첨자 발표', '2024.07.30');
INSERT INTO notices (category, descript, da) VALUES ('event', '5월 [리액션 받으면 리워드 드려요] 이벤트 당첨자발표', '2024.06.14');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '포항장성점 리뉴얼로 인한 영업 중단 안내', '2024.07.28');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '현대아울렛가산점 리로케이션으로 인한 영업 중단 안내', '2024.07.15');
INSERT INTO notices (category, descript, da) VALUES ('event', '<마이프레셔스 Vol.26 불레따리편> 이벤트 당첨자 발표', '2024.07.12');
INSERT INTO notices (category, descript, da) VALUES ('event', '24년 7월 <헬스+출석체크인> 이벤트 당첨자 공지', '2024.08.08');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '양평점 리로케이션으로 인한 영업 중단 안내', '2024.07.31');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '현대백화점울산동구점 리뉴얼로 인한 영업 중단 안내', '2024.07.27');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '안산월피공원점 리뉴얼로 인한 영업 중단 안내', '2024.07.15');
INSERT INTO notices (category, descript, da) VALUES ('event', '7월 [기프트몰TV 보러갈래?] 이벤트 당첨자 발표', '2024.08.07');
INSERT INTO notices (category, descript, da) VALUES ('event', '<2406_컬러업 챌린지> 이벤트 당첨자 발표', '2024.07.12');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '[공지] 개인정보 처리방침 개정 안내 (v11.8)', '2024.07.25');
INSERT INTO notices (category, descript, da) VALUES ('event', '[기프트몰세일라이브 - 구매응모]이벤트 당첨자 발표', '2024.07.24');
INSERT INTO notices (category, descript, da) VALUES ('event', '[기프트몰라이브 - 쇼케이스 : 바이오힐보]이벤트 당첨자 발표', '2024.07.23');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '양주옥정점 리뉴얼로 인한 영업 중단 안내', '2024.07.10');
INSERT INTO notices (category, descript, da) VALUES ('event', '6월 [리액션 받으면 리워드 드려요] 이벤트 당첨자발표', '2024.07.08');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '[공지] 개인정보 처리방침 개정 안내 (v11.6)', '2024.03.28');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '[공지] 위치기반서비스 이용약관 개정 안내', '2024.01.16');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '광양중마점 리뉴얼로 인한 영업 중단 안내', '2024.07.07');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '[공지] 고정형 영상정보처리기기 운영/관리 방침 개정 안내', '2024.06.27');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '딘토 이벤트 조기 종료 안내', '2024.08.05');
INSERT INTO notices (category, descript, da) VALUES ('event', '5월 [그럼 해봐, 셔터브리티] 포스터 인증 당첨자 안내', '2024.06.17');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '청주 타운 리뉴얼로 인한 영업 중단 안내', '2024.06.06');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '[배송안내] 8/14(수)~8/15(목) 택배사 휴무 관련', '2024.08.06');
INSERT INTO notices (category, descript, da) VALUES ('nomal', '위치기반서비스 이용약관 개정 안내', '2024.05.31');
";
$result = mysqli_multi_query($conn, $sql);
if($result !== false) {
    echo'데이터 삽입성공';
}

?>