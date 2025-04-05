// 드래그된 상품과 비교후 데이터를 삽입하기 위한 데이터
const item_list = [
    {
        name:'이뮨 멀티비타민&미네랄',
        price:'75000',
        image:'건강식품/1.png',
        post:2500
    },
    {
        name:'센트룸',
        price:'27000',
        image:'건강식품/2.png',
        post:2500
    },
    {
        name:'닥터브라이언',
        price:'2000',
        image:'건강식품/3.png',
        post:2500
    }
];
// 로드되었을때 전시영역, 주문영역에 있는 데이터를 드래그 시작하면 데이터를 전달함
window.addEventListener('DOMContentLoaded', ()=> {
    document.querySelectorAll('.item').forEach(item=>{
        item.addEventListener('dragstart', event=>{
            event.dataTransfer.setData('item', event.target.innerText);
        })
    })
    
    document.getElementById('show_cart').addEventListener('dragstart',event=>{
        if(event.target.classList.contains('cart-list')) {
            event.dataTransfer.setData('remo', event.target.querySelector('.item_name').innerText);
        }
    })

    document.querySelector('.ran').textContent = ran();
})

// 드래그로 추가된 상품들의 가격을 모두 합쳐 총가격
function total_price() {
let price = 0;
let total = 0;
let item_hap = 0;
let post = 0;
    document.querySelectorAll('.cart-list').forEach(item =>{
        price = item.querySelector('.item_price').textContent;
        item_hap = item.querySelector('.hap_box').textContent;
        post = item.querySelector('.post_box').textContent;
        total += price * item_hap;
    })
    if(total < 20000) {
        total = Number(total) + Number(post);
    }

    document.getElementById('happ').innerHTML ='합계 <span class="laet_won">'+total.toLocaleString()+'</span>원';
}

// 수량 증가 버튼 클릭시 수량이 증가함과 동시 금액 변경
let tot = 0;
let hap_box = 0;
let total_wonn = 0;
function up(event) {
    let hap = event.target.parentElement.parentElement.querySelector('.hap_box').innerText;
    hap = Number(hap) + 1;
    event.target.parentElement.parentElement.querySelector('.hap_box').innerText = hap;

    tot = event.target.parentElement.parentElement.querySelector('.item_price').innerText;
    hap_box = event.target.parentElement.parentElement.querySelector('.hap_box').innerText;
    total_wonn = tot * hap_box;
    event.target.parentElement.parentElement.querySelector('.item_now_price').textContent = total_wonn.toLocaleString();
    total_price();
}
// 수량 증감 버튼 클릭시 수량이 줄어듦과 동시 금액 변경 만약 수량이 1미만이면 아이템 삭제제
function down(event) {
    let hap = event.target.parentElement.parentElement.querySelector('.hap_box').innerText;
    hap = Number(hap) - 1;
    event.target.parentElement.parentElement.querySelector('.hap_box').innerText = hap;
    if(hap <= 0) {
        event.target.parentElement.parentElement.remove();
    }

    tot = event.target.parentElement.parentElement.querySelector('.item_price').innerText;
    hap_box = event.target.parentElement.parentElement.querySelector('.hap_box').innerText;
    total_wonn = tot * hap_box;
    event.target.parentElement.parentElement.querySelector('.item_now_price').textContent = total_wonn.toLocaleString();

    total_price();
}

// 드래그 오버 활성화
function over(event) {
    event.preventDefault();
}

// 드랍시 드래그 시작할떄 데이터와 상품 데이터를 비교후 상품 데이터를 새로운 div를 만들어 넣음
function drop(event) {
    event.preventDefault();
    
    const name = event.dataTransfer.getData('item');
    const item_name = document.querySelectorAll('.item_name');
    let swh = 0;
    item_list.forEach(item=>{
        
        item_name.forEach(list=>{
            if(list.innerText === name) {
                swh = 1;
            }
        })

        if(swh == 0 && item.name === name) {
            const show_cart = document.getElementById('show_cart');
            const new_item = document.createElement('div');
            new_item.classList.add('cart-list');
            new_item.draggable = true;
            show_cart.appendChild(new_item);
            new_item.innerHTML = `
                <img src="image/${item.image}" alt="">
                <p class="item_name">${item.name}</p>
                <p class="item_price">${item.price}</p>
                <div class="up_down_hap">
                    <button class="down_box" onclick="down(event)">-</button>
                    <p class="hap_box">1</p>
                    <button class="up_box" onclick="up(event)">+</button>
                </div>
                <p class="post_box">${item.post}</p>
                <p class="item_now_price">${item.price}</p>
            `;
        } else if(swh == 1 && item.name === name) {
            alert('이미 추가된 상품입니다.')
        }
    })
    total_price()
}

// show_cart 이벤트 실행시 함수 실행
document.getElementById('show_cart').addEventListener('drop', drop);
document.getElementById('show_cart').addEventListener('dragover', over);


function over1(event) {
    event.preventDefault();
}
// 주문 영역에 있는 상품을 드래그 시작하면 데이터 전달이 되는데 전달을 받은후 전시영역에 그상품이 있다면 전시영역에서 제거
function drop1(event) {
    event.preventDefault();

    const remo = event.dataTransfer.getData('remo');
    document.querySelectorAll('.item_name').forEach(item=>{
        if(item.innerText === remo) {
            item.parentElement.remove();
        }
    })
    total_price();
}
// show_shop_box_container_body에서 이벤트 실행시 함수 실행
document.getElementById('show_shop_box_container_body').addEventListener('dragover', over1);
document.getElementById('show_shop_box_container_body').addEventListener('drop', drop1);

// 랜덤함수
function ran() {
    const ran_item = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890";
    let result = '';
    for(let i = 1;i <=6;i++) {
        const random = Math.floor(Math.random() * ran_item.length);
        result += ran_item[random];
    }
    return result;
}

// 주문하기 버튼을 클릭시 총금액 0원 이라면 결제가X 0원 이상시 결제 내용과 비회원 아이디를 출력
function last() {
    const total_won = document.querySelector('.laet_won').innerText;
    if(total_won == 0) {
        alert('담긴상품이 없습니다.')
    } else {
        const user_name = document.querySelector('.ran').innerText;
    document.querySelector('.last_box').style.display = 'block';
    document.getElementById('modal1').click();
    document.querySelectorAll('.cart-list').forEach(item=>{
        item.remove();
    })
    document.querySelector('.laet_won').textContent = 0;
    document.querySelector('.last_text').innerHTML = `
       방금 비회원 ${user_name}님이 <br> ${total_won}원을 결제하셨습니다!
    `;
    setTimeout(()=>{
        document.querySelector('.last_box').style.display = 'none';
    }, 3000)
    }
}