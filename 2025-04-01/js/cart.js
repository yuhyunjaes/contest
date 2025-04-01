window.addEventListener('DOMContentLoaded', ()=>{
    document.querySelectorAll('.item_price_box').forEach(item=>{
        let cart_item_total_price = 0;
        cart_item_total_price = Number(item.innerText);
        item.textContent = '상품금액 '+cart_item_total_price.toLocaleString()+'원';
    })
    document.querySelectorAll('.onlyone').forEach(item=>{
        let cart_item_total_price = 0;
        cart_item_total_price = Number(item.innerText);
        item.textContent = cart_item_total_price.toLocaleString()+'원';
    })
    document.querySelectorAll('.item_shop_post_box').forEach(item=>{
        let cart_item_total_price = 0;
        cart_item_total_price = Number(item.innerText);
        item.textContent = '배송비 '+cart_item_total_price.toLocaleString()+'원';
    })
    document.querySelectorAll('.total_show_hap').forEach(item=>{
        let cart_item_total_price = 0;
        cart_item_total_price = Number(item.innerText);
        item.textContent =  cart_item_total_price.toLocaleString()+'원';
    })
    document.querySelectorAll('.total_show_post').forEach(item=>{
        let cart_item_total_price = 0;
        cart_item_total_price = Number(item.innerText);
        if(cart_item_total_price === 0) {
            item.textContent = '무료'
        } else {
            item.textContent =  cart_item_total_price.toLocaleString()+'원';
        }
    })
    document.querySelectorAll('.total_post_hap_show').forEach(item=>{
        let cart_item_total_price = 0;
        cart_item_total_price = Number(item.innerText);
        item.textContent =  cart_item_total_price.toLocaleString()+'원';
    })
})