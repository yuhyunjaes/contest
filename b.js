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
window.addEventListener('DOMContentLoaded', ()=> {
    document.querySelectorAll('.item').forEach(item=>{
        item.addEventListener('dragstart', event=>{
            event.dataTransfer.setData('item', event.target.innerText);
        })
    })
})
let real_hap = 0;

function up(event) {
    let hap = event.target.parentElement.parentElement.querySelector('.hap_box').innerText;
    hap = Number(hap) + 1;
    event.target.parentElement.parentElement.querySelector('.hap_box').innerText = hap;
}

function down(event) {
    let hap = event.target.parentElement.parentElement.querySelector('.hap_box').innerText;
    hap = Number(hap) - 1;
    event.target.parentElement.parentElement.querySelector('.hap_box').innerText = hap;
    if(hap <= 0) {
        event.target.parentElement.parentElement.remove();
    }
}

let price = 0;
function total_price() {
    document.querySelectorAll('.cart-list').forEach(item =>{
        alert(item.innerHTML)
    })
}

function over(event) {
    event.preventDefault();
}

function drop(event) {
    event.preventDefault();
    total_price();
    
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
            `;
        } else if(swh == 1 && item.name === name) {
            alert('이미 추가된 상품입니다.')
        }
    })

}
document.getElementById('show_cart').addEventListener('drop', drop);
document.getElementById('show_cart').addEventListener('drop', over);

