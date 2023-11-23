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

/**
 * カードのホバー時の設定
 */
function hoverCard() {
    const cards = document.querySelectorAll('.job-click');

    cards.forEach(card => {
        card.addEventListener('mouseover', function () {
            card.parentElement.style.backgroundColor = '#CCC';
        });
        card.addEventListener('mouseleave', function () {
            card.parentElement.style.backgroundColor = '#EEE';
        });
    });
}
hoverCard();