function nonenext() { 
    localStorage.setItem('key1', 'nonee');
}

let mess = localStorage.getItem('key1'); 

window.addEventListener('load', () => {
    if (mess == 'nonee') {
        document.getElementById('wrap').style.animation = 'popo';
        document.getElementById('loading').style.height = '0';
    }
    localStorage.removeItem('key1');
})
