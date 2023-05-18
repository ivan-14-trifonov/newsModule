<header>
    <h1>Новости</h1>
    <div class="hr"></div>
</header>

<main>
    <?php foreach ($data['newsList'] as $news): ?>
    <?php $newsData = $news->get_data();?>
    <article class="news">
        <time class="newsDate" datetime=<?= gmdate("Y-m-d", $newsData['idate'])?>>
            <?= gmdate("d.m.Y", $newsData['idate'])?>
        </time>
        <a href="view.php?id=<?=$newsData['id']?>"><?=$newsData['title']?></a>
        <p class="newsText"><?=$newsData['announce']?></p>
    </article>
    
    <?php endforeach ?>
    <div class="hr"></div>
</main>

<footer>
    <h2>Страницы:</h2>
    
    <?php $pagesList = range(1, ceil($data['numbOfNews'] / $data['newsOnPage']))?>
    
    <?php foreach ($pagesList as $pages): ?>
    <a href="http://i14t.h1n.ru/newsModule/news.php?page=<?=$pages?>" class=<? if ($pages == $data['currentPage']) {?>"linkToCurrent"<?} else { } ?>"linkToPage">
        <?=$pages?>
    </a>
    <?php endforeach ?>
    
    </footer>
    
</div>