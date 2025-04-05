const item_list = [
    {
        name:'이뮨 멀티비타민&미네랄',
        price:75000,
        show_price:'75,000',
        post:2500,
        show_post:'2,500',
        img:'건강식품/1.PNG'
    },
    {
        name:'센트룸',
        price:27000,
        show_price:'27,000',
        post:2500,
        show_post:'2,500',
        img:'건강식품/2.PNG'
    },
    {
        name:'닥터브라이언',
        price:2000,
        show_price:'2,000',
        post:2500,
        show_post:'2,500',
        img:'건강식품/3.PNG'
    },
    {
        name:'액티브 멀티포맨',
        price:30000,
        show_price:'30,000',
        post:2500,
        show_post:'2,500',
        img:'건강식품/4.PNG'
    },
    {
        name:'네이처메이드B12',
        price:30000,
        show_price:'30,000',
        post:2500,
        show_post:'2,500',
        img:'건강식품/5.PNG'
    }
]

window.addEventListener('DOMContentLoaded',()=>{
    document.querySelectorAll('.item').forEach(item=>{
        item.addEventListener('dragstart', event=>{
            event.dataTransfer.setData('item', event.target.innerText);
        })
    })
    document.getElementById('cart_box').addEventListener('dragstart',event=>{
        if(event.target.classList.contains('card_list')) {
            event.dataTransfer.setData('remo', event.target.innerText);
        }
    })

    document.querySelector('.user_id').textContent = ran();
})
let number_hap = 0;
function up(event) {
    const hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    number_hap = Number(hap);
    number_hap = number_hap + 1;
    event.target.parentElement.parentElement.querySelector('.hap').textContent = number_hap;

    total_price();

    let now_total = 0;
    const now_pr = event.target.parentElement.parentElement.querySelector('.item_price').innerText;
    const now_hp = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    now_total = Number(now_pr) * Number(now_hp);

    event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_total.toLocaleString();
}
function down(event) {
    const hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    number_hap = Number(hap);
    number_hap = number_hap - 1;
    event.target.parentElement.parentElement.querySelector('.hap').textContent = number_hap;
    if(number_hap <= 0) {
        event.target.parentElement.parentElement.remove();
    }
    total_price();
    
    let now_total = 0;
    const now_pr = event.target.parentElement.parentElement.querySelector('.item_price').innerText;
    const now_hp = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    now_total = Number(now_pr) * Number(now_hp);

    event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_total.toLocaleString();
}
function total_price() {
    let totalprice = 0;
    const card_list = document.querySelectorAll('.card_list');
    card_list.forEach(item=>{
        const price = item.querySelector('.item_price').innerText;
        const hap = item.querySelector('.hap').innerText;
        const post = item.querySelector('.item_post').innerText;
        totalprice += price * hap;
        if(totalprice < 20000) {
            totalprice = totalprice + Number(post);
        }
    })
    document.getElementById('totall').innerHTML = `합계 <span class="total_pr">${totalprice.toLocaleString()}</span>원`;
}

function over(event) {
    event.preventDefault();
}

function drop(event) {
    event.preventDefault();
    const items = event.dataTransfer.getData('item');
    const cart = document.getElementById('cart_box');
    const card_list = document.querySelectorAll('.item_name');
    item_list.forEach(item=>{
        let swi = 0;

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
                <p style="display:none;" class="item_price">${item.price}</p>
                <p style="display:none;" class="item_post">${item.post}</p>
                <div class="up_down_box">
                    <button onclick="down(event)">-</button>
                    <span class="hap">1</span>
                    <button onclick="up(event)">+</button>
                </div>
                <p class="real_price">${item.show_price}</p>
                <p class="real_post" >${item.show_post}</p>
                <p class="now_price">${item.show_price}</p>
            `;
        } else if(swi === 1 && item.name === items) {
            alert('이미 존재하는 상품입니다.')
        }
    })
    total_price();
}

document.getElementById('cart_box').addEventListener('dragover', over);
document.getElementById('cart_box').addEventListener('drop', drop);

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
    total_price();
}

document.getElementById('shop_show_container_body').addEventListener('dragover', over1);
document.getElementById('shop_show_container_body').addEventListener('dragover', drop1);

function ran() {
    const ran_index = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    let result = '';
    for(let i = 1;i <= 6;i++) {
        const random = Math.floor(Math.random() * ran_index.length);
        result += ran_index[random];
    }
    return result;
}