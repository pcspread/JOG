/**
 * ハンバーガーメニューを開閉する
 */
function openMenu() {
    const burger = document.querySelector('.burger');
    const borders = document.querySelectorAll('.burger-border');
    const nav = document.querySelector('.header-nav');
    const mask = document.querySelector('.mask');

    burger.addEventListener('click', function () {
        borders.forEach(border => {
            border.classList.toggle('rotate');
        })
        nav.classList.toggle('append');
        mask.classList.toggle('append');
    });
}
openMenu();

/**
 * 上方に移動するボタンの出現と消失
 */
function displayUpper() {
    const upper = document.querySelector('.upper');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 0) {
            upper.style.display = 'block';
        } else {
            upper.style.display = 'none';
        }
    });
}
displayUpper();