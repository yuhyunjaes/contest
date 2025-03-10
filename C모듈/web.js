const id = document.getElementById('id'),password = document.getElementById('password'),repassword = document.getElementById('repassword'),email = document.getElementById('email');

repassword.addEventListener('keyup', function() {
    if(repassword.value === password.value) {
        document.getElementById('re').textContent = '비밀번호 일치';
    } else {
        document.getElementById('re').textContent = '비밀번호 불일치';
    }

    if (repassword.value.length === 0) {
        document.getElementById('re').textContent = '비밀번호 불일치';
    }
})

document.getElementById('forr').addEventListener('submit', function(event) {
    if(id.value.length === 0) {
        alert('아이디를 입력해주세요');
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