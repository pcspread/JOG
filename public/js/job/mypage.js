/**
 * カードのホバー時の設定
 */
function hoverCard() {
    const cards = document.querySelectorAll('.group-click');

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