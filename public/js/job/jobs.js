/**
 * 背景色を変化させる
 */
function changeColor() {
    const search = document.querySelector('.search-group');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 70) {
            search.style.backgroundColor = '#006695';
            search.style.color = '#FFF';
        } else {
            search.style.backgroundColor = '#FFF';
            search.style.color = '#000';
        }
    });
}
changeColor();