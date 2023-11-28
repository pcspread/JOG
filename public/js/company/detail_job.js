/**
 * 削除確認を行う
 */
function confirmDel() {
    if (window.confirm('削除してもよろしいですか？')) {
        return true;
    } else {
        return false;
    }
}