<?php //var_dump($_SESSION); 
?>
<?php //var_dump($_POST); 
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>確認画面</title>
    <style>
        body {
            background: #f7f7f7;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="m-5 text-center">確認画面</h1>

        <div class="position-relative m-5">
            <div class="progress" style="height: 1px;">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width:4rem; height:2rem;">入力</button>
            <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 4rem; height:2rem;">確認</button>
            <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 4rem; height:2rem;">完了</button>
        </div>

        <p class="h5 m-4 text-center">登録内容をご確認ください。</p>

        <ul>
            <?php
            if (!empty($error_message)) {
                echo "<ul class='alert alert-danger'>";
                foreach ($error_message as $value) {
                    echo "<li class='m-1'>" . $value . "</li>";
                }
                echo "</ul>";
            } ?>
        </ul>

        <table class="table table-striped">
            <tbody class="">
                <tr>
                    <th scope="row">名前</th>
                    <td><?= set_value('member_name') ?></td>
                </tr>
                <tr>
                    <th scope="row">カナ</th>
                    <td><?= set_value('member_name_kana') ?></td>
                </tr>
                <tr>
                    <th scope="row">電話番号</th>
                    <td><?= set_value('member_tel') ?></td>
                </tr>
                <tr>
                    <th scope="row">メールアドレス</th>
                    <td><?= set_value('member_email') ?></td>
                </tr>
                <tr>
                    <th scope="row">生まれ年</th>
                    <td><?= set_value('member_birth') ?></td>
                </tr>
                <tr>
                    <th scope="row">パスワード</th>
                    <td><?= $_SESSION['asterisk'] ?></td>
                </tr>
                <tr>
                    <th scope="row">性別</th>
                    <td><?= $_SESSION['gender'] ?></td>
                </tr>
                <tr>
                    <th scope="row">メールマガジン送付</th>
                    <td><?= $_SESSION['subscribe'] ?></td>
                </tr>
            </tbody>
        </table>

        <div>
            <form method="post" action="<?= base_url('bbs_index/register') ?>">
                <input type="hidden" name="member_name" value="<?= set_value('member_name') ?>">
                <input type="hidden" name="member_name_kana" value="<?= set_value('member_name_kana') ?>">
                <input type="hidden" name="member_tel" value="<?= set_value('member_tel') ?>">
                <input type="hidden" name="member_email" value="<?= set_value('member_email') ?>">
                <input type="hidden" name="member_birth" value="<?= set_value('member_birth') ?>">
                <input type="hidden" name="member_pass" value="<?= set_value('member_password') ?>">
                <input type="hidden" name="member_gender" value="<?= set_value("member_gender") ?>">
                <input type="hidden" name="member_subscribe" value="<?= set_value("member_subscribe") ?>">

                <input type="submit" value="戻る" name="btn_confirm" class="btn btn-secondary col-sm-2 offset-3">
                <a href="<?= base_url('bbs_index/register_completed') ?>" class="btn btn-primary col-sm-2 offset-2">登録</a>
            </form>
        </div>
    </div>
</body>

</html>