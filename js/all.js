const lii = [
    {
        itname:'이뮨 멀티비타민&미네랄',
        itprice:65000,
        itpost:2500,
        itimg:'image/건강식품/1.PNG',
        ithap:1
    },
    {
        itname:'센트룸',
        itprice: 27000,
        itpost: 2500,
        itimg:'image/건강식품/2.PNG',
        ithap:1
    }
]
window.addEventListener('DOMContentLoaded', () => {

const vecon = document.getElementById('ve_con')
,controlbox = document.getElementById('controlbox')
,video = document.getElementById('vi')
,ply = document.getElementById('ply')
,sto = document.getElementById('sto')
,speedup = document.getElementById('speed_up')
,speeddown = document.getElementById('speed_down')
,rese = document.getElementById('rese')
,showspeed = document.getElementById('show_speed')
,loop = document.getElementById('loop')
,loopbtn = document.getElementById('loopbtn')
,auto = document.getElementById('auto')
,autobtn = document.getElementById('autobtn')
,stop = document.getElementById('stop');

    let speed;

    function btnUpdate() {
        if(!video.paused) {
            ply.style.opacity = '0';
            ply.style.pointerEvents = 'none';
            sto.style.opacity = '1';
            sto.style.pointerEvents = 'all';
        } else {
            ply.style.opacity = '1';
            ply.style.pointerEvents = 'all';
            sto.style.opacity = '0';
            sto.style.pointerEvents = 'none';
        }
        video.addEventListener('ended', () =>{
            ply.style.opacity = '1';
            ply.style.pointerEvents = 'all';
            sto.style.opacity = '0';
            sto.style.pointerEvents = 'none';
        })
    }

    ply.addEventListener('click', ()=>{
        video.play();
        btnUpdate();
    })
    sto.addEventListener('click', ()=>{
        video.pause();
        btnUpdate();
    })
    

    let timer;

    function non() {
        vecon.addEventListener('mouseleave', () => {
            controlbox.style.opacity = '0';
            controlbox.style.pointerEvents = 'none';
        });
    }

    vecon.addEventListener('mousemove', () => {
        controlbox.style.opacity = '1';
        controlbox.style.pointerEvents = 'all';

        if (timer) {
            clearTimeout(timer);
        }
        timer = setTimeout(() => {
            controlbox.style.opacity = '0';
            controlbox.style.pointerEvents = 'none';
        }, 3000);
    });
    non();

    speedup.addEventListener('click', ()=>{
        if(parseFloat(video.playbackRate.toFixed(1)) < 2) {
            speed = video.playbackRate += 0.1;
            showspeed.textContent = parseFloat(speed.toFixed(1))+'배';
        }
    })

    rese.addEventListener('click', ()=>{
        video.playbackRate = 1;
        showspeed.textContent = video.playbackRate+'배';
    })

    speeddown.addEventListener('click', ()=>{
        if(parseFloat(video.playbackRate.toFixed(1)) > 0.2) {
            speed = video.playbackRate -= 0.1;
            showspeed.textContent = parseFloat(speed.toFixed(1))+'배';
        }
    })
    function loopp1() {
        video.addEventListener('ended', ()=>{
            video.currentTime = 0;
            video.play();
            ply.style.opacity = '0';
            ply.style.pointerEvents = 'none';
            sto.style.opacity = '1';
            sto.style.pointerEvents = 'all';
        })
    }
    function loopp2() {
        video.addEventListener('ended', ()=>{
            video.pause();
            ply.style.opacity = '1';
            ply.style.pointerEvents = 'all';
            sto.style.opacity = '0';
            sto.style.pointerEvents = 'none';
        })
    }

    loopbtn.addEventListener('click', ()=>{
        if(loop.checked) {
            loopp1();
            loopbtn.textContent = '켜짐';
        }else {
            loopp2();
            loopbtn.textContent = '꺼짐';
        }
    })
    const on = localStorage.getItem('key2');
    
    if(on === 'on') {
        video.autoplay = true; 
        video.muted = true;
        autobtn.textContent = '켜짐';
        ply.style.opacity = '0';
        ply.style.pointerEvents = 'none';
        sto.style.opacity = '1';
        sto.style.pointerEvents = 'all';
    } else {
        video.autoplay = false; 
        video.muted = false;
        autobtn.textContent = '꺼짐';
        ply.style.opacity = '1';
        ply.style.pointerEvents = 'all';
        sto.style.opacity = '0';
        sto.style.pointerEvents = 'none';
    }

    autobtn.addEventListener('click', ()=>{
        if(auto.checked) {
            localStorage.setItem('key2', 'on');
            autobtn.textContent = '켜짐';
        } else{
            localStorage.removeItem('key2');
            autobtn.textContent = '꺼짐';
        }
    })

    stop.addEventListener('click',()=>{
        video.currentTime = 0;
        video.pause();
        ply.style.opacity = '1';
        ply.style.pointerEvents = 'all';
        sto.style.opacity = '0';
        sto.style.pointerEvents = 'none';
    });
    document.getElementById('last_by').addEventListener('click',()=>{
        if(document.getElementById('price_box').innerText !== "0원") {
            document.getElementById('end_text').innerHTML = `
                방금 비회원 <span>${document.getElementById('ran').value}</span>님이 <br>
                <span>${document.getElementById('price_box').textContent}</span>을 결제하셨습니다!
            `;
            document.getElementById('modal_non').click();
            document.querySelector('.end_box').style.height = '100vh';
            setTimeout(()=>{
                document.querySelector('.end_box').style.height = '0';
                document.querySelectorAll('.cart-list').forEach(item=>{
                    item.remove();
                })
                document.getElementById('no_obj').style.display = 'block';
                document.getElementById('price_box').textContent = '0원';
            }, 3000);
        } else {
            alert('담긴상품이 없습니다.');
        }
    })


    document.querySelectorAll('.item').forEach(items =>{
        items.addEventListener('dragstart',events =>{
            events.dataTransfer.setData('items', events.target.innerText)
        })
    })
    function over(event) {
        event.preventDefault();
    }
    

    function drop(event) {
        event.preventDefault();
    
        const name = event.dataTransfer.getData('items');
        const cart = document.getElementById('shopbox');
        const cartli = document.querySelectorAll('.naa');
        
        lii.forEach(item=>{
            let non = 0;
            cartli.forEach(list=>{
                if(list.innerText === name) {
                    non = 1;
                }
            })
            if(non === 0 && item.itname === name) {
                item.ithap = 1;
                const newitem = document.createElement('div')
                newitem.innerHTML = `
                <span class="naa">${item.itname}</span>
                <img src="${item.itimg}"></img>
                <span class="pri">${item.itprice}</span>
                <span class="po">${item.itpost}</span>
                <div class="hap_box">
                <button class="down" onclick="down(event)">-</button>
                <span class="hap">${item.ithap}</span>
                <button class="up" onclick="up(event)">+</button>
                </div>
                `;
                newitem.classList.add('cart-list');
                newitem.draggable = true;
                cart.appendChild(newitem);
            } else if(non === 1 && item.itname === name){
                alert('이미 추가된 상품입니다.')
            }
        })
        noupdate();
        total();
        
    }

    function noupdate() {
        const cali = document.querySelectorAll('.cart-list').length;
        if(cali === 0) {
            document.getElementById('no_obj').style.display = 'block';
        } else {
            document.getElementById('no_obj').style.display = 'none';
        }
    }


    document.getElementById('shopbox').addEventListener('dragover', over);
    document.getElementById('shopbox').addEventListener('drop', drop);

    document.getElementById('shopbox').addEventListener('dragstart', event => {
        if (event.target.classList.contains('cart-list')) {
            event.dataTransfer.setData('remo', event.target.innerText);
        }
    });

    function over1(event) {
        event.preventDefault()
    }
    
    function drop1(event) {
        event.preventDefault();
        
        const remo = event.dataTransfer.getData('remo');
        const ctlist = document.querySelectorAll('.cart-list');
        ctlist.forEach(item=> {
            if(item.innerText === remo) {
                item.remove();
            }
        })
        noupdate();
        total();

    }
    document.getElementById('shop_item').addEventListener('dragover', over1);
    document.getElementById('shop_item').addEventListener('drop', drop1);


    function ran() {
        const data = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
        let result = '';
        for(let i = 1;i <= 6;i++) {
            const random = Math.floor(Math.random() * data.length);
            result += data[random];
        }
        return result;
    }
    
    document.getElementById('ran').value = ran();
});

function skiptime(skip) {
    document.getElementById('vi').currentTime += skip;
}
let hap = 0;
function up(event) {
    const partext = event.target.parentElement.parentElement.querySelector('.naa').innerText;
    lii.forEach(item=>{
        if(item.itname === partext) {
            hap = item.ithap += 1;
            event.target.parentElement.querySelector('.hap').textContent = hap;
        }
    })
    total();
}

function down(event) {
    const partext = event.target.parentElement.parentElement.querySelector('.naa').innerText;
    lii.forEach(item=>{
        if(item.itname === partext && hap >= 1){
            hap = item.ithap -= 1;
            event.target.parentElement.querySelector('.hap').textContent = hap;
        }
        if(hap === 0) {
            event.target.parentElement.parentElement.remove();
        }
    })
    total();
}

function total() {
    let price;
    let total = 0;
    let post = 0;
    document.querySelectorAll('.cart-list').forEach(item =>{
        price = Number(item.querySelector('.pri').textContent);
        hap = Number(item.querySelector('.hap').textContent);
        post = Number(item.querySelector('.po').textContent);
        total += price * hap;
        if(total >= 20000) {
            total;
        } else {
            total = total + post;
        }
    })
    document.getElementById('price_box').textContent = total.toLocaleString()+'원';
}