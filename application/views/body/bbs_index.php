<?php //var_dump($_SESSION); ?>

<div class="container">
    <div class="d-flex justify-content-between">
        <h1 class="h1 mt-5 pt-3">ひと言掲示板</h1>
    </div>
    
    <!-- エラーメッセージ -->
        <?php if(validation_errors() !== ""){ 
            echo "<ul class='alert alert-danger'>" . validation_errors("<li>", "</li>") . "</ul>";
        } ?>
    

    <!-- 書き込みフォーム -->
    <?= form_open('bbs_index/add_bbs') //アクションURLを作成してくれる ?>
        <div>
            <label for="view_name">表示名</label>
            <input type="text" name="view_name" id="view_name" value="<?= set_value('view_name') ?>">
        </div>
        <div>
            <label for="message">ひと言メッセージ</label>
            <textarea name="message" id="message" value="<?= set_value('message') ?>"></textarea>
        </div>
        <input type="submit" name="btn_submit" value="書き込む">
    </form>
    <hr>

    <!-- 書き込み履歴 -->
    <section>
        <?php if(!empty($past_messages)): ?>
        <?php foreach($past_messages as $value): ?>
        <article>
            <div class="info">
                <h2><?= $value['view_name'] ?></h2>
                <time><?=date('Y年m月d日 H:i:s', strtotime($value['post_date'])) ?></time>
            </div>
            <p><?= nl2br($value['message']) ?></p>
        </article>
        <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>