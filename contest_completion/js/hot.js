window.addEventListener('DOMContentLoaded', ()=>{
    const new_cart = localStorage.getItem('new_cart');
    if(new_cart == 1) {
        document.getElementById('loginbox').click();
    }
    localStorage.removeItem('new_cart');

    document.querySelectorAll('.item_price').forEach(item=>{
        let price = Number(item.innerText);
        item.textContent = price.toLocaleString()+'원';
    })
    document.querySelectorAll('.del').forEach(item=>{
        let price = Number(item.innerText);
        item.textContent = price.toLocaleString()+'원';
    })
    document.querySelectorAll('.itpost').forEach(item=>{
        let price = Number(item.innerText);
        item.textContent = price.toLocaleString();
    })
})