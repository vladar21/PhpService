<h1><?= $title ?></h1>

<?php if (!empty($news) and is_array($news)) : ?>
    <ul>
        <?php foreach ($news as $news_item): ?>
            <li><a href="<?= 'news/' . $news_item['slug'] ?>"><?= $news_item['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <h3>No News</h3>
    <p>Unable to find any news for you.</p>
<?php endif ?>