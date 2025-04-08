const item_list = [
    {
        name:'이뮨 멀티비타민&미네랄',
        price:'65,000',
        post:'2,500',
        img:'건강식품/1.PNG',
        real_price: 65000,
        real_post: 2500 
    },
    {
        name:'센트룸',
        price:'27,000',
        post:'2,500',
        img:'건강식품/2.PNG',
        real_price: 27000,
        real_post: 2500 
    },
    {
        name:'닥터브라이언',
        price:'2,000',
        post:'2,500',
        img:'건강식품/3.PNG',
        real_price: 2000,
        real_post: 2500 
    },
    {
        name:'액티브 멀티포맨',
        price:'30,000',
        post:'2,500',
        img:'건강식품/4.PNG',
        real_price: 30000,
        real_post: 2500 
    },
    {
        name:'네이처메이드B12',
        price:'30,000',
        post:'2,500',
        img:'건강식품/5.PNG',
        real_price: 30000,
        real_post: 2500 
    },


    {
        name:'PANTONE PD충전 보조배터리',
        price:'24,400',
        post:'2,500',
        img:'디지털/1.PNG',
        real_price: 24400,
        real_post: 2500 
    },
    {
        name:'Bowie D05 무선 블루투스 5.3 헤드셋',
        price:'36,900',
        post:'2,500',
        img:'디지털/2.PNG',
        real_price: 36900,
        real_post: 2500 
    },
    {
        name:'독거미 F99 기계식 키보드',
        price:'70,750',
        post:'2,500',
        img:'디지털/3.PNG',
        real_price: 70750,
        real_post: 2500 
    },
    {
        name:'파이널마우스 스타라이트12 페가수스 미디엄',
        price:'1,128,600',
        post:'3,000',
        img:'디지털/4.jpg',
        real_price: 1128600,
        real_post: 3000 
    },
    {
        name:'보이저5200 블루투스 이어폰',
        price:'146,000',
        post:'2,500',
        img:'디지털/5.PNG',
        real_price: 146000,
        real_post: 2500 
    },


    {
        name:'명품 자동 장우산',
        price:'31,600',
        post:'2,500',
        img:'팬시/1.PNG',
        real_price: 31600,
        real_post: 2500 
    },
    {
        name:'14K 윙블링 원터치 링 귀걸이(주문제작)',
        price:'250,000',
        post:'3,000',
        img:'팬시/2.PNG',
        real_price: 250000,
        real_post: 3000 
    },
    {
        name:'14K 윙블링 메르시 목걸이(주문제작)',
        price:'265,000',
        post:'3,000',
        img:'팬시/3.PNG',
        real_price: 265000,
        real_post: 3000 
    },
    {
        name:'게이밍 이어폰 VJJB NI',
        price:'28,900',
        post:'2,500',
        img:'팬시/4.PNG',
        real_price: 28900,
        real_post: 2500 
    },
    {
        name:'인스탁스 미니 에보',
        price:'320,000',
        post:'3,000',
        img:'팬시/5.PNG',
        real_price: 320000,
        real_post: 3000 
    },


    {
        name:'에스쁘아 솔리드 퍼퓸 4.2g',
        price:'26,000',
        post:'2,500',
        img:'향수/1.PNG',
        real_price: 26000,
        real_post: 2500 
    },
    {
        name:'호텔도슨 향수 오드퍼퓸 75ml',
        price:'153,000',
        post:'2500',
        img:'향수/2.PNG',
        real_price: 153000,
        real_post: 2500 
    },
    {
        name:'랑방 레 플레르 EDT 90ml',
        price:'64,500',
        post:'2,5000',
        img:'향수/3.PNG',
        real_price: 64500,
        real_post: 2500 
    },
    {
        name:'몽블랑 익스플로러 EDP 60ml',
        price:'93,000',
        post:'2,500',
        img:'향수/4.PNG',
        real_price: 93000,
        real_post: 2500 
    },
    {
        name:'캘빈클라인 One EDT 50ml',
        price:'58,900',
        post:'2,500',
        img:'향수/5.PNG',
        real_price: 58900,
        real_post: 2500 
    },


    {
        name:'어노브 딥 데미지 트리트먼트 EX 더블',
        price:'29,800',
        post:'2,500',
        img:'헤어케어/1.PNG',
        real_price: 29800,
        real_post: 2500 
    },
    {
        name:'려 루트젠 여성맞춤 볼륨 탈모증상케어 샴퓨 353ml',
        price:'21,900',
        post:'2500',
        img:'헤어케어/2.PNG',
        real_price: 21900,
        real_post: 2500 
    },
    {
        name:'라보에이치 두피쿨링&노세범 샴푸 333ml',
        price:'19,800',
        post:'2,5000',
        img:'헤어케어/3.PNG',
        real_price: 19800,
        real_post: 2500 
    },
    {
        name:'모로칸오일 헤어트리트먼트 100ml',
        price:'52,200',
        post:'2,500',
        img:'헤어케어/4.PNG',
        real_price: 52200,
        real_post: 2500 
    },
    {
        name:'닥터포헤어 피토프레시 헤어쿨링 스프레이 150ml',
        price:'14,400',
        post:'2,500',
        img:'헤어케어/5.PNG',
        real_price: 14400,
        real_post: 2500 
    }
]

window.addEventListener('DOMContentLoaded', ()=>{

    const item = document.querySelectorAll('.item');
    item.forEach((ite, index)=>{
        ite.innerHTML = `
            <img src="image/${item_list[index].img}" alt="">
            <p class="i_name">${item_list[index].name}</p>
            <p class="i_price">${item_list[index].price}</p>
            <p class="i_post">배송비용 ${item_list[index].post}</p>
        `;
        ite.addEventListener('dragstart',event=>{
            event.dataTransfer.setData('item', event.target.querySelector('.i_name').innerText)
        })
    })

    document.querySelector('.cart_box').addEventListener('dragstart',event=>{
        if(event.target.classList.contains('card_list')) {
            event.dataTransfer.setData('remo', event.target.querySelector('.item_name').innerText);
        }
    })
    
    document.querySelector('.ran_id').textContent = ran();

})

function total_price() {
    let totalprice = 0;
    document.querySelectorAll('.card_list').forEach(item=>{
        const now_price = item.querySelector('.real_price').innerText;
        const now_hap = item.querySelector('.hap').innerText;
        const now_post = item.querySelector('.real_post').innerText;
        totalprice += Number(now_price) * Number(now_hap);
        if(totalprice < 20000) {
            totalprice = totalprice + Number(now_post);
        }
    })
    document.querySelector('.total_price').textContent = totalprice.toLocaleString();
}

function over(event) {
    event.preventDefault();
}
function drop(event) {
    event.preventDefault();

    const items = event.dataTransfer.getData('item');
    const cart = document.querySelector('.cart_box');
    const item_name = document.querySelectorAll('.item_name')

    item_list.forEach(item=>{
        let swi = 0;

        item_name.forEach(item=>{
            if(item.innerText === items) {
                swi = 1;
            }
        })


        if(swi === 0 && items === item.name) {
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
                    <button class="down" onclick="down(event)">-</button>
                    <span class="hap">1</span>
                    <button class="up" onclick="up(event)">+</button>
                </div>
                <p style="display: none;" class="real_price">${item.real_price}</p>
                <p style="display: none;" class="real_post">${item.real_post}</p>
                <p class="now_price">${item.price}</p>
            `;
        }
        else if(swi === 1 && items === item.name) {
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

    document.querySelectorAll('.card_list').forEach(item=>{
        if(item.querySelector('.item_name').innerText === remo) {
            item.remove();
        }
    })
    total_price()

}

let now_hap = 0;
let now_pr = 0;
function up(event) {
    const hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    now_hap = Number(hap) + 1;
    
    event.target.parentElement.parentElement.querySelector('.hap').innerText = now_hap;

    total_price()

    const now_ha = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    const now_prr = event.target.parentElement.parentElement.querySelector('.real_price').innerText;
    now_pr = Number(now_prr) * Number(now_ha);
    event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_pr.toLocaleString();
}
function down(event) {
    const hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    now_hap = Number(hap) - 1;
    if(now_hap <= 0) {
        event.target.parentElement.parentElement.remove();
    }
    
    event.target.parentElement.parentElement.querySelector('.hap').innerText = now_hap;

    total_price()

    const now_ha = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    const now_prr = event.target.parentElement.parentElement.querySelector('.real_price').innerText;
    now_pr = Number(now_prr) * Number(now_ha);
    event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_pr.toLocaleString();
}

document.querySelector('.show_cart_body').addEventListener('dragover', over1);
document.querySelector('.show_cart_body').addEventListener('drop', drop1);

document.querySelector('.cart_box').addEventListener('dragover', over);
document.querySelector('.cart_box').addEventListener('drop', drop);

function ran() {
    const random_index = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    let result = '';
    for(let i = 1;i <= 7;i++) {
        const random = Math.floor(Math.random() * random_index.length);
        result += random_index[random];
    }
    return result;
}

function order() {
    const total = document.querySelector('.total_price').innerText;
    const ran_idd = document.querySelector('.ran_id').innerText;
    if (total === '0') {
        alert('담긴 상품이 없습니다.')
    } else {
        document.querySelectorAll('.card_list').forEach(item=>{
            item.remove();
        })
        document.querySelector('.last_text').style.opacity = '1';
        document.querySelector('.last_text').style.pointerEvents = 'all';
        document.getElementById('open_modal_close').click();
        document.querySelector('.last_text_p').innerHTML = `
            방금 비회원 <span>${ran_idd}</span>님이 <br> <span>${total}</span>원을 구매하셨습니다!
        `;
        document.querySelector('.openn').style.pointerEvents = 'none';
        document.querySelector('.total_price').textContent = 0;
        setTimeout(()=>{
            document.querySelector('.last_text').style.opacity = '0';
            document.querySelector('.openn').style.pointerEvents = 'all';
        document.querySelector('.last_text').style.pointerEvents = 'none';
        }, 3000)
    }
}