<?php //var_dump($_SESSION); 
?>
<?php //var_dump($_POST['password']); 
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>ひと言掲示板 CodeIgniter ver.</title>
    <style>
        body {
            background: #f7f7f7;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="h1 m-5 text-center">ログイン</h1>

        <?php if (validation_errors() !== "") {
            echo "<ul class='alert alert-danger'>" . validation_errors("<li>", "</li>") . "</ul>";
        } ?>
        <?php
        if (!empty($error_message)) {
            echo "<ul class='alert alert-danger'>";
            foreach ($error_message as $value) {
                echo "<li class='m-1'>" . $value . "</li>";
            }
            echo "</ul>";
        } ?>

        <div>
            <?= form_open('bbs_index/login') ?>
            <div class="mb-3 form-group row">
                <label for="email" class="col-form-label col-sm-2">メールアドレス</label>
                <div class="col-sm-10">
                    <input type="text" id="email" name="email" class="form-control" value="<?= set_value('email') ?>">
                </div>
            </div>

            <div class="mb-3 form-group row">
                <label for="password" class="col-form-label col-sm-2">パスワード</label>
                <div class="col-sm-10">
                    <input type="password" id="password" name="password" class="form-control" value="">
                </div>
            </div>
            <input type="submit" value="ログイン" name="btn_login" class="btn btn-primary col-4 offset-4 mb-3" style="background-color: #37a1e5; border-color: #37a1e5">
            </form>
            <a href="<?= base_url('bbs_index/register') ?>" class="btn btn-secondary col-sm-4 offset-4 mb-5">新規会員登録</a>
        </div>
    </div>