<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ひと言掲示板 CodeIgniter ver.</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('style/style.css')?>">
</head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<body data-spy="scroll" data-target="#h-nav" data-offset="86">
    <nav class="navbar navbar-light fixed-top" style="background-color: #37a1e5; box-shadow: 0 0 10px 0 gray;" id="h-nav">
        <ul class="nav navibar">
            <li class="nav-item">
                <a class="nav-link active" style="color: white;" aria-current="page" href="<?= base_url() ?>">Top</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: white;" href="<?= base_url('bbs_index/mypage') ?>">My page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: white;" href="<?= base_url('bbs_index/logout') ?>">Logout</a>
            </li>
            <div class="nav-item">
                <p class="nav-link" style="color: white;"><?= $_SESSION['member_data']['name'] . "さんのアカウント"; ?></p>
            </div>
        </ul>
    </nav>