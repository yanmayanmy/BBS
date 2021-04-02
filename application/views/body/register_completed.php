<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title><?= $title ?></title>
    <style>
    body{
        background: #f7f7f7;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="m-5 text-center"><?= $title ?></h1>

        <div class="position-relative m-5">
            <div class="progress" style="height: 1px;">
                <div class="progress-bar" role="progressbar" style="width: <?php if(!empty($error_message)){echo 75;}else{echo 100;} ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width:4rem; height:2rem;">入力</button>
            <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 4rem; height:2rem;">確認</button>
            <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-<?php if(!empty($error_message)){echo "secondary";}else{echo "primary";} ?> rounded-pill" style="width: 4rem; height:2rem;">完了</button>
        </div>
        
        <h2 class="m-4 text-center"><?= $message ?></h2>

        <ul>
            <?php 
                if(!empty($error_message)){
                    echo "<ul class='alert alert-danger'>";
                    foreach($error_message as $value){ 
                        echo "<li class='m-1'>".$value."</li>"; 
                    } 
                    echo "</ul>";
            } ?>
        </ul> 
        
        <a href="<?= base_url() ?>" class="btn btn-primary col-sm-2 offset-5">ログイン画面へ</a>
    </div>
</body>
</html>