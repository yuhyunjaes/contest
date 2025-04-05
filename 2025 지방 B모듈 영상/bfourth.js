const item_list = [
    {
        name:'이뮨 멀티비타민&미네랄',
        price:75000,
        post:2500,
        img:'건강식품/1.PNG',
        real_price:'75,000',
        real_post:'2,500',
    },
    {
        name:'센트룸',
        price:27000,
        post:2500,
        img:'건강식품/2.PNG',
        real_price:'27,000',
        real_post:'2,500',
    },
    {
        name:'닥터브라이언',
        price:2000,
        post:2500,
        img:'건강식품/3.PNG',
        real_price:'2,000',
        real_post:'2,500',
    },
    {
        name:'액티브 멀티포맨',
        price:30000,
        post:2500,
        img:'건강식품/4.PNG',
        real_price:'30,000',
        real_post:'2,500',
    },
    {
        name:'네이처메이드B12',
        price:30000,
        post:2500,
        img:'건강식품/5.PNG',
        real_price:'30,000',
        real_post:'2,500',
    },

    {
        name:'PANTONE PD충전 보조배터리',
        price:24400,
        post:2500,
        img:'디지털/1.PNG',
        real_price:'24,400',
        real_post:'2,500',
    },
    {
        name:'Bowie D05 무선 블루투스 5.3 헤드셋',
        price:36900,
        post:2500,
        img:'디지털/2.PNG',
        real_price:'36,900',
        real_post:'2,500',
    },
    {
        name:'독거미 F99 기계식 키보드',
        price:70750,
        post:2500,
        img:'디지털/3.PNG',
        real_price:'70,750',
        real_post:'2,500',
    },
    {
        name:'파이널마우스 스타라이트12 페가수스 미디엄',
        price:1254000,
        post:3000,
        img:'디지털/4.jpg',
        real_price:'1,254,000',
        real_post:'3,000',
    },
    {
        name:'보이저5200 블루투스 이어폰',
        price:146000,
        post:2500,
        img:'디지털/5.PNG',
        real_price:'146,000',
        real_post:'2,500',
    },

    {
        name:'명품 자동 장우산',
        price:31600,
        post:2500,
        img:'팬시/1.PNG',
        real_price:'31,600',
        real_post:'2,500',
    },
    {
        name:'14K 윙블링 원터치 링 귀걸이(주문제작)',
        price:250000,
        post:3000,
        img:'팬시/2.PNG',
        real_price:'250,000',
        real_post:'3,000',
    },
    {
        name:'14K 윙블링 메르시 목걸이(주문제작)',
        price:265000,
        post:3000,
        img:'팬시/3.PNG',
        real_price:'265,000',
        real_post:'3,000',
    },
    {
        name:'게이밍 이어폰 VJJB NI',
        price:38900,
        post:2500,
        img:'팬시/4.PNG',
        real_price:'38,900',
        real_post:'2,500',
    },
    {
        name:'인스탁스 미니 에보',
        price:320000,
        post:3000,
        img:'팬시/5.PNG',
        real_price:'320,000',
        real_post:'3,000',
    },

    {
        name:'에스쁘아 솔리드 퍼퓸 4.2g',
        price:26000,
        post:2500,
        img:'향수/1.PNG',
        real_price:'26,000',
        real_post:'2,500',
    },
    {
        name:'호텔도슨 향수 오드퍼퓸 75ml',
        price:153000,
        post:2500,
        img:'향수/2.PNG',
        real_price:'153,000',
        real_post:'2,500',
    },
    {
        name:'랑방 레 플레르 EDT 90ml',
        price:64500,
        post:2500,
        img:'향수/3.PNG',
        real_price:'64,500',
        real_post:'2,500',
    },
    {
        name:'몽블랑 익스플로러 EDP 60ml',
        price:103000,
        post:2500,
        img:'향수/4.PNG',
        real_price:'103,000',
        real_post:'2,500',
    },
    {
        name:'캘빈클라인 One EDT 50ml',
        price:58900,
        post:2500,
        img:'향수/5.PNG',
        real_price:'58,900',
        real_post:'2,500',
    },

    {
        name:'어노브 딥 데미지 트리트먼트 EX 더블',
        price:29800,
        post:2500,
        img:'헤어케어/1.PNG',
        real_price:'29,800',
        real_post:'2,500',
    },
    {
        name:'려 루트젠 여성맞춤 볼륨 탈모증상케어 샴퓨 353ml',
        price:21900,
        post:2500,
        img:'헤어케어/2.PNG',
        real_price:'21,900',
        real_post:'2,500',
    },
    {
        name:'라보에이치 두피쿨링&노세범 샴푸 333ml',
        price:19800,
        post:2500,
        img:'헤어케어/3.PNG',
        real_price:'19,800',
        real_post:'2,500',
    },
    {
        name:'모로칸오일 헤어트리트먼트 100ml',
        price:52200,
        post:2500,
        img:'헤어케어/4.PNG',
        real_price:'52,200',
        real_post:'2,500',
    },
    {
        name:'닥터포헤어 피토프레시 헤어쿨링 스프레이 150ml',
        price:16000,
        post:2500,
        img:'헤어케어/5.PNG',
        real_price:'16,000',
        real_post:'2,500',
    }
]

window.addEventListener('DOMContentLoaded',()=>{
    document.querySelectorAll('.item').forEach(item=>{
        item.addEventListener('dragstart',event=>{
            event.dataTransfer.setData('item', event.target.querySelector('.show_item_name').innerText);
        })
    })

    document.getElementById('cart_box').addEventListener('dragstart',event=>{
        if(event.target.classList.contains('card_list')) {
            event.dataTransfer.setData('remo', event.target.innerText);
        }
    })

    document.querySelector('.id_box').innerHTML = `비회원 ID <span class="last_id">${ran()}</span>`;
})
function total_price() {
    let totalprice = 0;
    const card_list = document.querySelectorAll('.card_list');
    card_list.forEach(item=>{
        const price = item.querySelector('.real_price').innerText;
        const hap = item.querySelector('.hap').innerText;
        const post = item.querySelector('.real_post').innerText;
        totalprice += Number(price) * Number(hap);
        if(totalprice < 20000) {
            totalprice = totalprice + Number(post);
        }
        
    });
    document.querySelector('.total_price').innerHTML = `합계 <span class="last_total">${totalprice.toLocaleString()}</span>원`;
}

let hap = 0;
let now_prices = 0;
function up(event) {
    const event_hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    hap = Number(event_hap) + 1;
    event.target.parentElement.parentElement.querySelector('.hap').textContent = hap;
    total_price()

    const now_price = event.target.parentElement.parentElement.querySelector('.real_price').innerText;
    const now_hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    now_prices = Number(now_price) * Number(now_hap);
    event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_prices.toLocaleString();
}
function down(event) {
    const event_hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    hap = Number(event_hap) - 1;
    if(hap <= 0) {
        event.target.parentElement.parentElement.remove();
    }
    event.target.parentElement.parentElement.querySelector('.hap').textContent = hap;
    total_price()

    const now_price = event.target.parentElement.parentElement.querySelector('.real_price').innerText;
    const now_hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    now_prices = Number(now_price) * Number(now_hap);
    event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_prices.toLocaleString();
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
                <p class="item_price">${item.real_price}</p>
                <p class="item_post">${item.real_post}</p>
                <div class="up_down_box">
                    <button onclick="down(event)">-</button>
                    <span class="hap">1</span>
                    <button onclick="up(event)">+</button>
                </div>
                <p style="display:none;" class="real_price">${item.price}</p>
                <p style="display:none;" class="real_post">${item.post}</p>
                <p class="now_price">${item.real_price}</p>
            `;
        } else if(swi === 1 && item.name === items) {
            alert('이미 추가된 상품입니다.')
        }
    })
    total_price()
}

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

document.getElementById('shop_show_box').addEventListener('dragover', over1);
document.getElementById('shop_show_box').addEventListener('drop', drop1);

function ran() {
    const random_index = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    let result = '';
    for(i = 1;i <= 6;i++) {
        const random = Math.floor(Math.random() * random_index.length);
        result += random_index[random];
    }
    return result;
}

function last() {
    const last_total = document.querySelector('.last_total').innerText;
    const last_id = document.querySelector('.last_id').innerText;
    if(last_total === '0') {
        alert('장바구니에 담긴 상품이 없습니다.')
    } else {
        document.querySelectorAll('.card_list').forEach(item=>{
            item.remove();
        })
        document.querySelector('.total_price').innerHTML = `합계 <span class="last_total">0</span>원`;
        document.getElementById('close').click();
        document.querySelector('.last_box').style.opacity = '1';
        document.querySelector('.last_box').style.pointerEvents = 'all';
        document.querySelector('.last_text').innerHTML = `
            방금 비회원 <span>${last_id}</span>님이 <br> <span>${last_total}</span>원을 결제하셨습니다!
        `;
        setTimeout(()=>{
            document.querySelector('.last_box').style.opacity = '0';
            document.querySelector('.last_box').style.pointerEvents = 'none';
        },3000)
    }
}