/**
 * 画像選択画面を表示する
 */
function displaySelectImage() {
    const btn = document.querySelector('.applicant-item__image-select');
    const hiddenInput = document.querySelector('.applicant-item__content.image');

    btn.addEventListener('click', function () {
        hiddenInput.click();
    });
}
displaySelectImage();

/**
 * 選択された画像を表示する
 */
function displayImage() {
    const img = document.querySelector('.applicant-item__image');
    const input = document.querySelector('.applicant-item__content');

    // ファイルが選択された時の処理
    input.addEventListener('change', function () {
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            // ファイルが読み込まれた時の処理
            reader.onload = function (e) {
                // imgの要素に指定
                img.src = e.target.result;
            }

            // ファイルデータをURLに変換
            reader.readAsDataURL(file);
        } else {
            img.src = 'https://dummyimage.com/100x100/000/000';
        }
    });
}
displayImage();