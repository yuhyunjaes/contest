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

window.addEventListener('DOMContentLoaded', ()=>{
    const noreload = localStorage.getItem("key");
    const upp = localStorage.getItem("up");
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
    localStorage.clear();
})