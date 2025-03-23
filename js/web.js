function nonenext() { 
    localStorage.setItem('key', 'nonee');
}

let mess = localStorage.getItem('key'); 

window.addEventListener('load', () => {
    if (mess == 'nonee') {
        document.getElementById('wrap').style.animation = 'popo';
        document.getElementById('loading').style.height = '0';
    }
    localStorage.removeItem('key');
})
