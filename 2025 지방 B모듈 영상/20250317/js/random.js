const text = document.getElementById('ran');

function ran() {
    const index = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    let result = '';
    for(let i = 1;i <= 6;i++) {
        const random = Math.floor(Math.random() * index.length);
        result += index[random];
    }
    return result;
}

document.getElementById('btn').addEventListener('click', function(){
    text.value = ran();
})