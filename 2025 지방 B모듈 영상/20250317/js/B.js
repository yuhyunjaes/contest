let l1 = ['PANTONE PD충전 보조배터리', 24400];
let l2 = ['Bowie D05 무선 블루투스 5.3 헤드셋', 36900];
let l3 = ['독거미 F99 기계식 키보드', 70750];
let l4 = ['파이널마우스 스타라이트12 페가수스 미디엄', 1128600];
let l5 = ['보이저5200 블루투스 이어폰', 146000];
let price = 0; 

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

    if (name === l1[0]) {
        price += l1[1]; 
    } else if (name === l2[0]) {
        price += l2[1]; 
    } else if (name === l3[0]) {
        price += l3[1];
    } else if (name === l4[0]) {
        price += l4[1];
    } else if (name === l5[0]) {
        price += l5[1];
    }
    document.getElementById('price').textContent = price+'원';

    const newItem = document.createElement('div');
    newItem.textContent = name;
    newItem.classList.add('cartlist');
    cart.appendChild(newItem);
}

document.getElementById('cart').addEventListener('dragover', up);
document.getElementById('cart').addEventListener('drop', bdrop);

function ran() {
    const index = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    let result = '';
    for(let i = 1;i <= 6;i++) {
        const random_index = Math.floor(Math.random() * index.length);
        result += index[random_index];
    }
    return result;
}
document.getElementById('idd').value = ran();