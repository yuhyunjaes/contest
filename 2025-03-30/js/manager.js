function move1() {
    document.querySelector('.move_btn').style.top = '0';
    document.querySelector('.move_btn').textContent = '회원관리';
}
function move2() {
    document.querySelector('.move_btn').style.top = '50px';
    document.querySelector('.move_btn').textContent = '공지사항관리';
}
function move3() {
    document.querySelector('.move_btn').style.top = '100px';
    document.querySelector('.move_btn').textContent = '판매상품관리';
}
function itemupdate() {
    localStorage.setItem('new', 3);
    localStorage.setItem('itme', 4);
}
window.addEventListener('DOMContentLoaded', ()=>{

    const newitm = localStorage.getItem('new');
    const noreload = localStorage.getItem("key");
    const upp = localStorage.getItem("up");
    const it = localStorage.getItem("itme");
    if(it == 4) {
        document.getElementById('newitemopen1').click();
    }
    if(newitm == 3) {
        document.querySelector('.modal_btn3').click();
    }
    document.querySelectorAll('.cate_control').forEach(item=>{
        item.addEventListener('click', ()=>{
            localStorage.setItem('new', 3);
        })
    })
    
    if(noreload == 1) {
        document.querySelector('.modal_btn2').click();
    }
    if(upp == 2) {
        document.getElementById('up_notice_open').click();
    }
    const ser = document.getElementById('ser');
    document.getElementById('forr').addEventListener('submit', (event)=>{
        localStorage.setItem('key', 1);
        if(ser.value.length === 0) {
            alert('제목을 입력해주세요');
            ser.focus();
            event.preventDefault();
        }
    })
    document.querySelectorAll('.loa').forEach(item=>{
        item.addEventListener('click',()=>{
            localStorage.setItem('key', 1);
        })
    })
    const title = document.getElementById('title'),
    cate = document.getElementById('cate');
    document.getElementById('new_notice').addEventListener('submit', (event)=> {
        localStorage.setItem('key', 1);
        if(cate.value.length === 0) {
            alert('유형을 입력해주세요');
            cate.focus();
            event.preventDefault();
        }
        else if(title.value.length === 0) {
            alert('제목을 입력해주세요');
            title.focus();
            event.preventDefault();
        }
    })
    document.querySelectorAll('.updatebtn').forEach(item=>{
        item.addEventListener('click',()=>{
            localStorage.setItem('up', 2)
            localStorage.setItem('key', 1);
        })
    })

    document.getElementById('new_item_fo').addEventListener('submit',(event)=>{
        const itemname = document.getElementById('itemname'),
        itemprice = document.getElementById('itemprice'),
        itempost = document.getElementById('itempost'),
        itemdesc = document.getElementById('itemdesc'),
        itemboon = document.getElementById('itemboon'),
        categono = document.getElementById('categono'),
        im = document.getElementById('im');
        if(im.value.length === 0) {
            alert('상품이미지를 선택해주세요');
            im.focus();
            event.preventDefault();
        } else if(itemname.value.length === 0) {
            alert('제품명을 입력해주세요');
            itemname.focus();
            event.preventDefault();
        } else if(itemprice.value.length === 0) {
            alert('제품가격을 입력해주세요');
            itemprice.focus();
            event.preventDefault();
        } else if(itempost.value.length === 0) {
            alert('배송비용을 입력해주세요');
            itempost.focus();
            event.preventDefault();
        } else if(itemdesc.value.length === 0) {
            alert('제품설명을 입력해주세요');
            itemdesc.focus();
            event.preventDefault();
        } else if(itemboon.value.length === 0) {
            alert('결제혜택을 입력해주세요');
            itemboon.focus();
            event.preventDefault();
        } else if(categono.value == 'non') {
            alert('카테고리를 선택해주세요');
            categono.focus();
            event.preventDefault();
        }
    })

    localStorage.clear();

    document.getElementById('im').addEventListener('change', (event)=>{
        const show_img = document.getElementById('show_img');
        const file = event.target.files[0];
            if (file) {
            const reader = new FileReader();
    
            // 파일 읽기 완료 후 이미지 삽입
            reader.onload = function(e) {
              const img = document.createElement('img');
              img.src = e.target.result;
    
              // #box에 이미지 삽입
              show_img.innerHTML = '';  // 기존 내용 지우기
              show_img.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    })
    document.getElementById('im1').addEventListener('change', (event)=>{
        const show_img = document.getElementById('show_imgg');
        const file = event.target.files[0];
            if (file) {
            const reader = new FileReader();
    
            // 파일 읽기 완료 후 이미지 삽입
            reader.onload = function(e) {
              const img = document.createElement('img');
              img.src = e.target.result;
    
              // #box에 이미지 삽입
              show_img.innerHTML = '';  // 기존 내용 지우기
              show_img.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    })
})