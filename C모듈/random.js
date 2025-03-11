function ran() {
    const data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    let result = '';
    for(let i = 1;i < 6;i++){
        const randomindex = Math.floor(Math.random() * data.length);
        result += data[randomindex];
    } 
    return result;
}
  
document.getElementById('bt').addEventListener('click', function(){
    document.getElementById('id').value = ran();
})
