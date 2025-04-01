window.addEventListener('DOMContentLoaded', function() {
    const motto = [
        document.getElementById('motto1'),
        document.getElementById('motto2'),
        document.getElementById('motto3'),
        document.getElementById('motto4'),
        document.getElementById('motto5')
        ];
        
        const images = [
        '신뢰혁신.jpg',
        '나눔혁신.jpg',
        '환경혁신.jpg',
        '미래혁신.jpg',
        '보안혁신.jpg'
        ];

        function non() {
            const motto_text = document.querySelectorAll('.motto_text');
            motto_text.forEach((tex)=>{
                tex.style.opacity = '0';
            })
        }
        function yes() {
            const motto_text = document.querySelectorAll('.motto_text');
            motto_text.forEach((tex)=>{
                tex.style.opacity = '1';
            })
        }
        yes()

        function mouente(index) {
            const image = images[index];
            motto.forEach(mott => {
                mott.style.backgroundImage = `url(image/motto/${image})`;
            });
            non();
        }
        
        function mounone() {
            motto.forEach((mott, i) => {
                mott.style.backgroundImage = `url(image/motto/${images[i]})`;
            });
            yes();
        }
        
        motto.forEach((mott, index) => {
            mott.addEventListener('mouseenter', () => mouente(index));
            mott.addEventListener('mouseleave', mounone);
        }) ;
});