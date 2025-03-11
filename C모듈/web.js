const id = document.getElementById('id'),password = document.getElementById('password'),repassword = document.getElementById('repassword'),email = document.getElementById('email');
const sp = document.getElementById('sp');
repassword.addEventListener('keyup', function() {
    if(repassword.value === password.value) {
        document.getElementById('re').textContent = '비밀번호 일치';
        document.getElementById('re').style.color = 'blue';
    } else {
        document.getElementById('re').textContent = '비밀번호 불일치';
        document.getElementById('re').style.color = 'red';
    }

    if (repassword.value.length === 0) {
        document.getElementById('re').textContent = '비밀번호 불일치';
    }
})

password.addEventListener('click', function() {
    if(sp.innerText === '값 없음' || sp.innerText === '이미 존재하는 아이디입니다.') {
        alert('아이디 중복확인을 해주세요');
        id.focus();
        password.readOnly = true;
    }
})
repassword.addEventListener('click', function() {
    if(sp.innerText === '값 없음' || sp.innerText === '이미 존재하는 아이디입니다.') {
        alert('아이디 중복확인을 해주세요');
        id.focus();
        repassword.readOnly = true;
    }
})
email.addEventListener('click', function() {
    if(sp.innerText === '값 없음' || sp.innerText === '이미 존재하는 아이디입니다.') {
        alert('아이디 중복확인을 해주세요');
        id.focus();
        email.readOnly = true;
    }
})

document.getElementById('forr').addEventListener('submit', function(event) {
    if(id.value.length === 0) {
        alert('아이디를 입력해주세요');
        id.focus();
        event.preventDefault();
    } 
    else if(sp.innerText === '값 없음') {
        alert('아이디 중복확인 버튼을 눌러주세요');
        document.getElementById('aa').focus();
        event.preventDefault();
    }
    else if(sp.innerText === '이미 존재하는 아이디입니다.') {
        alert('이미 존재하는 아이디입니다')
        id.focus();
        event.preventDefault();
    }
    else if(password.value.length === 0) {
        alert('비밀번호를 입력해주세요');
        password.focus();
        event.preventDefault();
    }
    else if(repassword.value !== password.value) {
        alert('비밀번호가 일치하지 않습니다.');
        repassword.focus();
        event.preventDefault();
    }
    else if(email.value.length === 0) {
        alert('이메일을 입력해주세요');
        email.focus();
        event.preventDefault();
    }
})

id.addEventListener('input', function() {
    document.getElementById('aa').href = "web.php?id="+id.value;
})

id.addEventListener('click', function(){
    if(sp.innerText === '사용 가능한 아이디입니다.') {
        alert('아이디 수정이 불가합니다.');
    }
})
function home() {
    alert('모든 내용이 초기화됩니다.')
    location = 'web.php';
}

document.getElementById('aa').addEventListener('mouseover',function() {
    if(sp.innerText === '사용 가능한 아이디입니다.') {
        this.style.pointerEvents = 'none';
    }
})