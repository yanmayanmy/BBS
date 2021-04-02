<?php //var_dump($_POST) ?>
<?php //var_dump($_SESSION) ?>

<div class="container">
    <h1 class="h1 m-3">書き込み完了</h1>
    <p class="alert alert-success">掲示板へ以下の内容を書き込みました。</p>
        <!-- 書き込み内容 -->
    <section>
        <article>
            <div class="info">
                <h2><?= $view_name ?></h2>
                <time><?=date('Y年m月d日 H:i:s', strtotime($_SESSION['post_date'])) ?></time>
            </div>
            <p><?= nl2br($message) ?></p>
        </article>
    </section>
    <a href="<?= base_url() ?>" class="btn btn-primary mt-3">戻る</a>
</div>