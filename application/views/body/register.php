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
    <title>ひと言掲示板 CodeIgniter ver.</title>
    <style>
        body {
            background: #f7f7f7;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="m-5 text-center">会員登録</h1>

        <div class="position-relative m-5">
            <div class="progress" style="height: 1px;">
                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width:4rem; height:2rem;">入力</button>
            <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 4rem; height:2rem;">確認</button>
            <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 4rem; height:2rem;">完了</button>
        </div>

        <?php if (validation_errors() !== "") {
            echo "<ul class='alert alert-danger'>" . validation_errors("<li>", "</li>") . "</ul>";
        } ?>

        <div>
            <?= form_open('bbs_index/register') ?>
            <div class="mb-3 form-group row">
                <label for="name" class="col-form-label col-sm-2">名前</label>
                <div class="col-sm-10">
                    <input type="text" id="name" name="member_name" class="form-control" placeholder="山田太郎" value="<?= set_value('member_name') ?>">
                </div>
            </div>

            <div class="mb-3 form-group row">
                <label for="name_kana" class="col-form-label col-sm-2">カナ</label>
                <div class="col-sm-10">
                    <input type="text" id="name_kana" name="member_name_kana" class="form-control" placeholder="ヤマダタロウ" value="<?= set_value('member_name_kana') ?>">
                </div>
            </div>

            <div class="mb-3 form-group row">
                <label for="tel" class="col-form-label col-sm-2">電話</label>
                <div class="col-sm-10">
                    <input type="tel" id="tel" name="member_tel" class="form-control" placeholder="xxxxxxxxxxx（英数字ハイフンなし）" value="<?= set_value('member_tel') ?>">
                </div>
            </div>

            <div class="mb-3 form-group row">
                <label for="email" class="col-form-label col-sm-2">メールアドレス</label>
                <div class="col-sm-10">
                    <input type="text" id="email" name="member_email" class="form-control" placeholder="example@xxx.com" value="<?= set_value('member_email') ?>">
                </div>
            </div>

            <div class="mb-3 form-group row">
                <label for="birth" class="col-form-label col-sm-2">生まれ年</label>
                <div class="col-sm-10">
                    <select name="member_birth" id="brith" class="form-select">
                        <option value="">--</option>
                        <?php foreach (range(2021, 1900) as $year) : ?>
                            <option value="<?= $year ?>" <?= set_select('member_birth', $year) ?>><?= $year ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label for="password" class="col-form-label col-sm-2">パスワード</label>
                <div class="col-sm-10">
                    <input type="password" id="password" name="member_password" class="form-control" value="">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2">
                    <p>性別</p>
                </div>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input type="radio" id="male" name="member_gender" value="1" class="form-check-input" <?= set_radio("member_gender", "1", true) ?>>
                        <label for="male" class="form-check-label">男性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="female" name="member_gender" value="2" class="form-check-input" <?= set_radio("member_gender", "2") ?>>
                        <label for="female" class="form-check-label">女性</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2">
                    <p>メールマガジン送付</p>
                </div>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input type="radio" id="subscribe" name="member_subscribe" value="1" class="form-check-input" <?= set_radio("member_subscribe", "1", true) ?>>
                        <label for="subscribe" class="form-check-label">希望する</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="subscribe_no" name="member_subscribe" value="2" class="form-check-input" <?= set_radio("member_subscribe", "2") ?>>
                        <label for="subscribe_no" class="form-check-label">希望しない</label>
                    </div>
                </div>
            </div>
            <input type="submit" value="確認" name="btn_submit" class="btn btn-primary col-sm-2 offset-5 mb-5">
            </form>
        </div>
    </div>