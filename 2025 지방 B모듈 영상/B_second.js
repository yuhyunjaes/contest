const item_list = [
    {
        name:'이뮨 멀티비타민&미네랄',
        price: 75000,
        post:2500,
        img: '건강식품/1.PNG'
    },
    {
        name:'센트룸',
        price: 27000,
        post:2500,
        img: '건강식품/2.PNG'
    },
    {
        name:'닥터브라이언',
        price: 2000,
        post:2500,
        img: '건강식품/3.PNG'
    },
    {
        name:'액티브 멀티포맨',
        price: 30000,
        post:2500,
        img: '건강식품/4.PNG'
    },
    {
        name:'네이처메이드B12',
        price: 30000,
        post:2500,
        img: '건강식품/5.PNG'
    }
]
window.addEventListener('DOMContentLoaded', ()=>{
    document.querySelectorAll('.item').forEach(item=>{
        item.addEventListener('dragstart',event=>{
            event.dataTransfer.setData('item', event.target.textContent);
        })
    })

    document.getElementById('cart_box').addEventListener('dragstart',event=>{
        if(event.target.classList.contains('card_list')) {
            event.dataTransfer.setData('remo', event.target.innerText);
        }
    })

    document.getElementById('user_box').innerHTML = `
        <p>비회원 ID <span>${ran()}</span></p>
    `;
})
function total_price() {
    let total = 0;
    let hap = 0;
    let totalprice = 0;
    let post = 0;

    let now_pr = 0;
    document.querySelectorAll('.card_list').forEach(item =>{
        total = item.querySelector('.item_price').innerText;
        hap = item.querySelector('.hap').innerText;
        totalprice += Number(total) * Number(hap);
        post = item.querySelector('.item_post').innerText;
    })
    if(totalprice < 20000) {
        totalprice = totalprice + Number(post);
    }
    document.getElementById('total').innerHTML = `
        합계 <span class="total_price">${totalprice.toLocaleString()}</span>원
    `;
} 

let number_hap = 0;
function up(event) {
    const hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    number_hap = Number(hap);
    number_hap = number_hap + 1;
    event.target.parentElement.parentElement.querySelector('.hap').textContent = number_hap;
    total_price();

    let now_price = 0;
    let now_hap=0;
    item_list.forEach(item =>{
        if(item.name === event.target.parentElement.parentElement.querySelector('.item_name').innerText) {
            now_hap = event.target.parentElement.parentElement.querySelector('.hap').innerText
            now_price = item.price * Number(now_hap);
            event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_price.toLocaleString();;
        }
    })
}

function ran() {
    const ran_text = "QWERTYUIOPASDFGHJKLZXCVBNMQWERTYUIOPASDFGHJKLZXCVBNM123456789";
    let result = '';
    for(let i = 1;i <= 6;i++) {
        const random = Math.floor(Math.random() * ran_text.length);
        result += ran_text[random];
    }
    return result;
}

function down(event) {
    const hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    number_hap = Number(hap);
    number_hap = number_hap - 1;
    if(number_hap <= 0) {
        event.target.parentElement.parentElement.remove();
    }
    event.target.parentElement.parentElement.querySelector('.hap').textContent = number_hap.toLocaleString();;
    total_price();

    let now_price = 0;
    let now_hap=0;
    item_list.forEach(item =>{
        if(item.name === event.target.parentElement.parentElement.querySelector('.item_name').innerText) {
            now_hap = event.target.parentElement.parentElement.querySelector('.hap').innerText
            now_price = item.price * Number(now_hap);
            event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_price;
        }
    })
}

function over(event) {
    event.preventDefault();
}

function drop(event) {
    event.preventDefault();

    const items = event.dataTransfer.getData('item');
    const cart = document.getElementById('cart_box');
    const card_list = document.querySelectorAll('.item_name');
    let swi = 0;
    item_list.forEach(item => {
        card_list.forEach(item=>{
            if(item.innerText === items) {
                swi = 1;
            }
        })
        if(swi === 0 && item.name === items) {
            const new_item = document.createElement('div');
            new_item.classList.add('card_list');
            cart.appendChild(new_item);
            new_item.draggable = true;
            new_item.innerHTML = `
                <img src="image/${item.img}" alt="">
                <p class="item_name">${item.name}</p>
                <p class="item_price">${item.price}</p>
                <p class="item_post">${item.post}</p>
                <div class="up_down_box">
                    <button onclick="down(event)">-</button>
                    <span class="hap">1</span>
                    <button onclick="up(event)">+</button>
                </div>
                <p class="now_price">${item.price.toLocaleString()}</p>
            `;
        } else if(swi === 1&& item.name === items) {
            alert('이미 추가된 상품입니다.')
        }
        total_price()
    })
}
document.getElementById("cart_box").addEventListener('dragover', over);
document.getElementById("cart_box").addEventListener('drop', drop);

function over1(event) {
    event.preventDefault();
}
function drop1(event) {
    event.preventDefault();
    const remo = event.dataTransfer.getData('remo');
    const card_list = document.querySelectorAll('.card_list');
    card_list.forEach(item=>{
        if(item.innerText === remo) {
            item.remove();
        }
    })
    total_price()
}

document.getElementById('content_body').addEventListener('dragover', over1);
document.getElementById('content_body').addEventListener('drop', drop1);