## アプリケーション情報

■ アプリケーション名<br />
・JOG<br />

■ プロダクト概要<br />
簡易版アルバイト求人サイト<br />
東京23区を対象とした、企業が求人を投稿し、ユーザーが閲覧して興味のある企業に応募する(多くの求人を求める企業が使用)<br />

■ トップ画像<br />
![Alt text](image-8.png)

## アプリケーション URL
https://waterfall32-breeze.com/

## 使用技術(実行環境)
■ 使用言語<br />
HTML<br />
CSS<br />
JavaScript<br />
PHP 8.1.2<br />

■ 使用フレームワーク<br />
Laravel Framework 10.28.0<br />

■ 認証スターターキット<br />
未使用<br />

■ メール認証<br />
Mailpit(local環境)<br />

## 機能一覧
新規登録<br />
ログイン<br />
メール認証<br />
パスワード変更(パスワード忘れ時)<br />
求人一覧表示<br />
求人検索<br />
求人のお気に入り登録<br />
求人のお気に入り登録解除<br />
求人詳細表示<br />
求人へ応募<br />
応募結果表示<br />
ログインユーザー訪問件数表示<br />
応募件数表示<br />
応募一覧表示<br />
応募詳細表示<br />
求人新規追加<br />
求人詳細表示(企業側)<br />
求人詳細変更<br />

## テーブル設計
![Alt text](image-1.png)
![Alt text](image-2.png)
![Alt text](image-3.png)
![Alt text](image-4.png)

## ER 図
![Alt text](image-6.png)

## 画面遷移図
![Alt text](image-5.png)

## 環境構築
■ 開発環境<br />
[土台]<br />
Docker(Laravel Sail)<br />
LinuxOS<br />
[操作]<br />
ubuntu<br />
VSCode<br />
[サーバー]<br />
nginx<br />
[データベース]<br />
mysql<br />
[管理]<br />
Git<br />
GitHub<br />

## その他
■ ログイン用ダミーデータ<br />
[企業側ユーザー]<br />
・5件<br />
・メールアドレス：test1@test.com～test5@test.com<br />
・パスワード　　：test1111(共通)<br />

[一般ユーザー]<br />
・2件<br />
・メールアドレス：test6@test.com～test7@test.com<br />
・パスワード　　：test1111(共通)<br />
