<?php //var_dump($_SESSION); 
?>
<?php //var_dump($_POST); 
?>

<body>
    <div class="container">
        <h1 class="h1 m-5 text-center">My Page</h1>

        <table class="table table-striped">
            <tbody class="">
                <tr>
                    <th scope="row">名前</th>
                    <td><?= $_SESSION['member_data']['name'] ?></td>
                </tr>
                <tr>
                    <th scope="row">カナ</th>
                    <td><?= $_SESSION['member_data']['name_kana'] ?></td>
                </tr>
                <tr>
                    <th scope="row">電話番号</th>
                    <td><?= $_SESSION['member_data']['tel'] ?></td>
                </tr>
                <tr>
                    <th scope="row">メールアドレス</th>
                    <td><?= $_SESSION['member_data']['email'] ?></td>
                </tr>
                <tr>
                    <th scope="row">生まれ年</th>
                    <td><?= $_SESSION['member_data']['birth'] ?></td>
                </tr>
                <tr>
                    <th scope="row">性別</th>
                    <td><?= $_SESSION['member_data']['gender'] === 1 ? "男性" : "女性" ?></td>
                </tr>
                <tr>
                    <th scope="row">メールマガジン送付</th>
                    <td><?= $_SESSION['member_data']['subscribe'] === 1 ? "希望する" : "希望しない" ?></td>
                </tr>
            </tbody>
        </table>

        <a href="<?= base_url() ?>" class="btn btn-primary col-sm-2 offset-5">戻る</a>
    </div>
</body>

</html>