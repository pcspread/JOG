<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="This is the jog site JOG.This is a portfolio site." />
    <title>JOG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layouts/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth/reset_email.css') }}">
</head>
<body>
    <header class="header">
        <h1 class="email-title">パスワード変更確認メール</h1>
    </header>

    <main class="main">
        <div class="email-content">
            <p class="email-content__text">
                この度は、JOGをご利用いただき、誠にありがとうございます。
            </p>
            <p class="email-content__text">
                こちらは、パスワード変更用の確認メールです。
                下記ボタンをクリックいただくと、パスワード変更ページへ移動します。
            </p>
            <a class="email-click" href="http://localhost/reset/password?token={{ $token }}" target="_blank">パスワード変更</a>
        </div>
    </main>
</body>
</html>