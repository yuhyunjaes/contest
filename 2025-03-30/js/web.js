function nonenext() { 
    localStorage.setItem('key1', 'nonee');
}

let mess = localStorage.getItem('key1'); 

window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('forr').addEventListener('submit', function(event){
        const idd = document.getElementById('idd'),
        pass = document.getElementById('pass'),
        nam = document.getElementById('nam'),
        ema = document.getElementById('ema');
    
        if(idd.value.length === 0) {
            alert('아이디를 입력해주세요');
            idd.focus();
            event.preventDefault();
        } else if(pass.value.length === 0) {
            alert('비밀번호를 입력해주세요');
            pass.focus();
            event.preventDefault();
        } else if(nam.value.length === 0) {
            alert('이름을 입력해주세요');
            nam.focus();
            event.preventDefault();
        } else if(ema.value.length === 0) {
            alert('이메일을 입력해주세요');
            ema.focus();
            event.preventDefault();
        }
    })

    const logid = document.getElementById('logid'),
    logpass = document.getElementById('logpass');

    document.getElementById('forr1').addEventListener('submit', function(event){
        if(logid.value.length === 0) {
            alert('아이디를 입력해주세요');
            logid.focus();
            event.preventDefault();
        }else if(logpass.value.length === 0) {
            alert('비밀번호를 입력해주세요');
            logpass.focus();
            event.preventDefault();
        }
    })

    
    if (mess == 'nonee') {
        document.getElementById('wrap').style.animation = 'popo';
        document.getElementById('loading').style.height = '0';
    }
    localStorage.removeItem('key1');
})