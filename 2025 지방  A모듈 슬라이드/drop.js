let l1 = ['PANTONE PD충전 보조배터리', 24400];  // 가격을 숫자로 처리
let l2 = ['Bowie D05 무선 블루투스 5.3 헤드셋', 36900];
let price = 0;  // 가격 초기화는 숫자 0으로

document.querySelectorAll('.obj').forEach(item => {
    item.addEventListener('dragstart', (event) => {
        event.dataTransfer.setData('name', event.target.innerText);
    });
});

function up(event) {
    event.preventDefault();
}

function bdrop(event) {
    event.preventDefault();

    const name = event.dataTransfer.getData('name');
    const cart = document.getElementById('cart');

    const cart_item = cart.querySelectorAll('.cartlist');
    for (let item of cart_item) {
        if (item.innerText === name) {
            alert('이미 추가된 상품입니다.');
            return;
        } 
    }

    // 새로운 아이템 추가 전에 가격 계산
    if (name === l1[0]) {
        price += l1[1];  // 가격 합산
    } 

    // 새로운 아이템과 가격 박스를 추가
    const newItem = document.createElement('div');
    newItem.textContent = name;
    newItem.classList.add('cartlist');

    // 새로운 카트 아이템과 가격을 카트에 추가
    cart.appendChild(newItem);
}

document.getElementById('cart').addEventListener('dragover', up);
document.getElementById('cart').addEventListener('drop', bdrop);
