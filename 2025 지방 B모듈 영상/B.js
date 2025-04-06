const item_list = [
    {
        name: '이뮨 멀티비타민&미네랄',
        pirce:'75,000',
        post:'2,500',
        img:'건강식품/1.PNG',
        real_price: 75000,
        real_post: 2500
    },
    {
        name: '센트룸',
        pirce:'27,000',
        post:'2,500',
        img:'건강식품/2.PNG',
        real_price: 27000,
        real_post: 2500
    },
    {
        name: '닥터브라이언',
        pirce:'2,000',
        post:'2,500',
        img:'건강식품/3.PNG',
        real_price: 2000,
        real_post: 2500
    },
    {
        name: '액티브 멀티포맨',
        pirce:'30,000',
        post:'2,500',
        img:'건강식품/4.PNG',
        real_price: 30000,
        real_post: 2500
    },
    {
        name: '네이처메이드B12',
        pirce:'30,000',
        post:'2,500',
        img:'건강식품/5.PNG',
        real_price: 30000,
        real_post: 2500
    }

    ,{
        name: 'PANTONE PD충전 보조배터리',
        pirce:'24,400',
        post:'2,500',
        img:'디지털/1.PNG',
        real_price: 24400,
        real_post: 2500
    },
    {
        name: 'Bowie D05 무선 블루투스 5.3 헤드셋 ',
        pirce:'36,900',
        post:'2,500',
        img:'디지털/2.PNG',
        real_price: 36900,
        real_post: 2500
    },
    {
        name: '독거미 F99 기계식 키보드',
        pirce:'70,750',
        post:'2,500',
        img:'디지털/3.PNG',
        real_price: 70750,
        real_post: 2500
    },
    {
        name: '파이널마우스 스타라이트12 페가수스 미디엄',
        pirce:'1,254,000',
        post:'3,000',
        img:'디지털/4.jpg',
        real_price: 1254000,
        real_post: 3000
    },
    {
        name: '보이저5200 블루투스 이어폰',
        pirce:'146,000',
        post:'2,500',
        img:'디지털/5.PNG',
        real_price: 146000,
        real_post: 2500
    }

    ,{
        name: '명품 자동 장우산',
        pirce:'31,600',
        post:'2,500',
        img:'팬시/1.PNG',
        real_price: 31600,
        real_post: 2500
    },
    {
        name: '14K 윙블링 원터치 링 귀걸이(주문제작)',
        pirce:'250,000',
        post:'3,000',
        img:'팬시/2.PNG',
        real_price: 250000,
        real_post: 3000
    },
    {
        name: '14K 윙블링 메르시 목걸이(주문제작)',
        pirce:'265,000',
        post:'3,000',
        img:'팬시/3.PNG',
        real_price: 265000,
        real_post: 3000
    },
    {
        name: '게이밍 이어폰 VJJB NI',
        pirce:'38,900',
        post:'2,500',
        img:'팬시/4.PNG',
        real_price: 38900,
        real_post: 2500
    },
    {
        name: '인스탁스 미니 에보',
        pirce:'320,000',
        post:'3,000',
        img:'팬시/5.PNG',
        real_price: 320000,
        real_post: 3000
    }

    ,{
        name: '에스쁘아 솔리드 퍼퓸 4.2g',
        pirce:'26,000',
        post:'2,500',
        img:'향수/1.PNG',
        real_price: 26000,
        real_post: 2500
    },
    {
        name: '호텔도슨 향수 오드퍼퓸 75ml',
        pirce:'153,000',
        post:'2,500',
        img:'향수/2.PNG',
        real_price: 153000,
        real_post: 2500
    },
    {
        name: '랑방 레 플레르 EDT 90ml',
        pirce:'64,500',
        post:'2,500',
        img:'향수/3.PNG',
        real_price: 64500,
        real_post: 2500
    },
    {
        name: '몽블랑 익스플로러 EDP 60ml',
        pirce:'103,000',
        post:'2,500',
        img:'향수/4.PNG',
        real_price: 103000,
        real_post: 2500
    },
    {
        name: '캘빈클라인 One EDT 50ml',
        pirce:'58,900',
        post:'2,500',
        img:'향수/5.PNG',
        real_price: 58900,
        real_post: 2500
    }

    ,{
        name: '어노브 딥 데미지 트리트먼트 EX 더블',
        pirce:'29,800',
        post:'2,500',
        img:'헤어케어/1.PNG',
        real_price: 29800,
        real_post: 2500
    },
    {
        name: '려 루트젠 여성맞춤 볼륨 탈모증상케어 샴퓨 353ml',
        pirce:'21,900',
        post:'2,500',
        img:'헤어케어/2.PNG',
        real_price: 21900,
        real_post: 2500
    },
    {
        name: '라보에이치 두피쿨링&노세범 샴푸 333ml',
        pirce:'19,800',
        post:'2,500',
        img:'헤어케어/3.PNG',
        real_price: 19800,
        real_post: 2500
    },
    {
        name: '모로칸오일 헤어트리트먼트 100ml',
        pirce:'52,200',
        post:'2,500',
        img:'헤어케어/4.PNG',
        real_price: 52200,
        real_post: 2500
    },
    {
        name: '닥터포헤어 피토프레시 헤어쿨링 스프레이 150ml',
        pirce:'16,000',
        post:'2,500',
        img:'헤어케어/5.PNG',
        real_price: 16000,
        real_post: 2500
    }
]

window.addEventListener('DOMContentLoaded',()=>{

    let timer;
    document.querySelector('.video_container').addEventListener('mousemove',()=>{
        document.querySelector('.video_control').style.opacity = '1';
        document.querySelector('.video_control').style.pointerEvents = 'all';
        if(timer) {
            timer = clearTimeout(timer);
        }
        timer = setTimeout(()=>{
            document.querySelector('.video_control').style.opacity = '0';
            document.querySelector('.video_control').style.pointerEvents = 'none';    
        }, 3000)
    })
    mouse_lee()
    function mouse_lee() {
        document.querySelector('.video_container').addEventListener('mouseleave',()=>{
            document.querySelector('.video_control').style.opacity = '0';
            document.querySelector('.video_control').style.pointerEvents = 'none';
        })
    }


    document.querySelectorAll('.item').forEach(item=>{
        item.addEventListener('dragstart',event=>{
            event.dataTransfer.setData('item', event.target.querySelector('.item_shop_name').innerText);
        })
    })
    document.querySelector('.cart_box').addEventListener('dragstart',event=>{
        if(event.target.classList.contains('card_list')) {
            event.dataTransfer.setData('remo', event.target.querySelector('.item_name').innerText);
        }
    })
    document.querySelector('.user').innerHTML = `비회원ID <span class="last_id">${ran()}</span>`;


    const motto = [
        document.getElementById('motto1'),
        document.getElementById('motto2'),
        document.getElementById('motto3'),
        document.getElementById('motto4'),
        document.getElementById('motto5')
    ]
    const motto_img = [
        '신뢰혁신.jpg',
        '나눔혁신.jpg',
        '환경혁신.jpg',
        '미래혁신.jpg',
        '보안혁신.jpg'
    ]

    function show_text() {
        document.querySelectorAll('.motto_text').forEach(item=>{
            item.style.opacity = '1';
        })
    }
    function hide_text() {
        document.querySelectorAll('.motto_text').forEach(item=>{
            item.style.opacity = '0';
        })
    }
    function mouse_enter(index) {
        const img = motto_img[index];
        motto.forEach(mott=>{
            mott.style.backgroundImage = `url(image/motto/${img})`;
        })
        hide_text();
    }
    function mouse_le() {
        motto.forEach((mott,i)=>{
            mott.style.backgroundImage = `url(image/motto/${motto_img[i]})`;
        })
        show_text();
    }
    
    motto.forEach((mott,index)=>{
        mott.addEventListener('mouseenter',()=> mouse_enter(index));
        mott.addEventListener('mouseleave', mouse_le);
    })

    
    document.getElementById('loop').addEventListener('click',()=>{
        if(document.getElementById('loop').checked) {
            loop1();
        } else {
            loop2();
        }
    })

    document.getElementById('auto').addEventListener('click',()=>{
        if(document.getElementById('auto').checked) {
            localStorage.setItem('key', 0)
        } else {
            localStorage.removeItem('key');
        }
        auto()
    })
    auto()

})
function auto() {
    const key = localStorage.getItem('key');
    const video = document.getElementById('video');
    if(key == 0) {
        video.muted = true;
        video.autoplay = true;
        video.play();
        document.querySelector('.auto_text').textContent = '켜짐'; 
    } else {
        video.muted = false;
        video.autoplay = false;
        document.querySelector('.auto_text').textContent = '꺼짐'; 
    }
    btn_update()
}

function loop1() {
    const video = document.getElementById('video');
    video.addEventListener('ended',()=>{
        video.currentTime = 0;
        video.play();
    })
    document.querySelector('.loop_text').textContent = '켜짐';
    btn_update()
}
function loop2() {
    const video = document.getElementById('video');
    video.addEventListener('ended',()=>{
        video.currentTime = 0;
        video.pause();
    })
    document.querySelector('.loop_text').textContent = '꺼짐';
    btn_update()
}
function total_price() {
    let totalprice = 0;
    document.querySelectorAll('.card_list').forEach(item=>{
        const price = item.querySelector('.real_price').innerText;
        const hap = item.querySelector('.hap').innerText;
        const post = item.querySelector('.real_post').innerText;
        totalprice += Number(price) * Number(hap);
        if(totalprice < 20000) {
            totalprice = totalprice + Number(post);
        }
    })
    document.querySelector('.total').innerHTML = `합계 <span class="last_price">${totalprice.toLocaleString()}</span>원`;    
}
let now_hap = 0;
let now_price;
function up(event) {

    const hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    now_hap = Number(hap) + 1;
    event.target.parentElement.parentElement.querySelector('.hap').textContent = now_hap;
    
    total_price()
    
    const item_now_hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    const item_now_price = event.target.parentElement.parentElement.querySelector('.real_price').innerText;
    now_price = Number(item_now_price) * Number(item_now_hap);
    event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_price.toLocaleString();
}
function down(event) {
    const hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    now_hap = Number(hap) - 1;
    if(now_hap <= 0) {
        event.target.parentElement.parentElement.remove();
    }
    event.target.parentElement.parentElement.querySelector('.hap').textContent = now_hap;

    total_price()


    const item_now_hap = event.target.parentElement.parentElement.querySelector('.hap').innerText;
    const item_now_price = event.target.parentElement.parentElement.querySelector('.real_price').innerText;
    now_price = Number(item_now_price) * Number(item_now_hap);
    event.target.parentElement.parentElement.querySelector('.now_price').textContent = now_price.toLocaleString();
}
function ran() {
    const random_index = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    let result = '';
    for(let i = 1;i <= 6;i++) {
        const random = Math.floor(Math.random() * random_index.length);
        result += random_index[random];
    }
    return result;
}

function over(event) {
    event.preventDefault();
}

function drop(event) {
    event.preventDefault();

    const items = event.dataTransfer.getData('item');
    const cart = document.querySelector('.cart_box');
    const item_name = document.querySelectorAll('.item_name');

    item_list.forEach(item=>{
        let swi = 0;

        item_name.forEach(item=>{
            if(item.innerText === items) {
                swi = 1;
            }
        })

        if(swi === 0 && item.name === items) {
            const new_item = document.createElement('div');
            new_item.classList.add('card_list');
            new_item.draggable = true;
            cart.appendChild(new_item);
            new_item.innerHTML = `
                <img src="image/${item.img}" alt="">
                <p class="item_name">${item.name}</p>
                <p class="item_price">${item.pirce}</p>
                <p class="item_post">${item.post}</p>
                <div class="up_down_box">
                    <button onclick="down(event)">-</button>
                    <span class="hap">1</span>
                    <button onclick="up(event)">+</button>
                </div>
                <p style="display:none" class="real_price">${item.real_price}</p>
                <p style="display:none" class="real_post">${item.real_post}</p>
                <p class="now_price">${item.pirce}<p>
            `;
        } else if(swi === 1 && item.name === items) {
            alert('이미 존재하는 상품입니다.');
        }
    })
    total_price()
}

document.querySelector('.cart_box').addEventListener('dragover', over);
document.querySelector('.cart_box').addEventListener('drop', drop);

function over1(event) {
    event.preventDefault();
}

function drop1(event) {
    event.preventDefault();

    const remo = event.dataTransfer.getData('remo');
    const name = document.querySelectorAll('.item_name');
    name.forEach(item=>{
        if(item.innerText === remo) {
            item.parentElement.remove();
        }
    })
    total_price()
}

document.querySelector('.show_body').addEventListener('dragover', over1);
document.querySelector('.show_body').addEventListener('drop', drop1);

function last() {
    const last_item_price = document.querySelector('.last_price').innerText;
    const last_user_id = document.querySelector('.last_id').innerText;
    if(last_item_price === '0') {
       alert('담긴 상품이 없습니다.')
    } else {
        document.querySelectorAll('.card_list').forEach(item=>{
            item.remove();
        })
        document.querySelector('.modal_open_btn').style.pointerEvents = 'none';
        document.querySelector('.last_price').textContent = 0;
        document.querySelector('.last_box').style.opacity = '1';
        document.getElementById('close_modalbox').click();
        document.querySelector('.last_text').innerHTML = `방금 비회원 <span>${last_user_id}</span>님이 <br> <span>${last_item_price}</span>원을 결제하셨습니다!`;
        setTimeout(()=>{
            document.querySelector('.last_box').style.opacity = '0';
            document.querySelector('.modal_open_btn').style.pointerEvents = 'all';
        }, 3000)
    }
}

function btn_update() {
    const video = document.getElementById('video');
    if(!video.paused) {
        document.querySelector('.start').style.opacity = '0';
        document.querySelector('.start').style.pointerEvents = 'none';
        document.querySelector('.stop').style.opacity = '1';
        document.querySelector('.stop').style.pointerEvents = 'all';
    } else {
        document.querySelector('.start').style.opacity = '1';
        document.querySelector('.start').style.pointerEvents = 'all';
        document.querySelector('.stop').style.opacity = '0';
        document.querySelector('.stop').style.pointerEvents = 'none';
    }
    video.addEventListener('ended',()=>{
        if(!video.paused) {
            document.querySelector('.start').style.opacity = '0';
            document.querySelector('.start').style.pointerEvents = 'none';
            document.querySelector('.stop').style.opacity = '1';
            document.querySelector('.stop').style.pointerEvents = 'all';
        } else {
            document.querySelector('.start').style.opacity = '1';
            document.querySelector('.start').style.pointerEvents = 'all';
            document.querySelector('.stop').style.opacity = '0';
            document.querySelector('.stop').style.pointerEvents = 'none';
        }
    })
}
function start() {
    const video = document.getElementById('video');
    video.play();
    btn_update()
}
function stop() {
    const video = document.getElementById('video');
    video.pause();
    btn_update()
}
function skip(ski) {
    const video = document.getElementById('video');
    video.currentTime += ski;
    btn_update()
}
function all_stop() {
    const video = document.getElementById('video');
    video.currentTime = 0;
    video.pause();
    btn_update()
}

function speedup() {
    const video = document.getElementById('video');
    if(parseFloat(video.playbackRate.toFixed(1)) < 2) {
        video.playbackRate += 0.1;
    }
    document.querySelector('.now_speed').textContent = parseFloat(video.playbackRate.toFixed(1))+'x';
}
function speed() {
    const video = document.getElementById('video');
    video.playbackRate = 1;
    document.querySelector('.now_speed').textContent = parseFloat(video.playbackRate.toFixed(1))+'x';
}
function speeddown() {
    const video = document.getElementById('video');
    if(parseFloat(video.playbackRate.toFixed(1)) > 0.2) {
        video.playbackRate -= 0.1;
    }
    document.querySelector('.now_speed').textContent = parseFloat(video.playbackRate.toFixed(1))+'x';
}