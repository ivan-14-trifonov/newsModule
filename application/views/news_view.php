<header>
    <h1>Новости</h1>
</header>

<main>
    <div class="allNewsOnPage row">
        <?php foreach ($data['newsList'] as $news): ?>
        <?php $newsData = $news->get_data();?>
        <div class="news col-md-4 col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <time class="newsDate" datetime=<?= gmdate("Y-m-d", $newsData['idate'])?>>
                        <?= gmdate("d.m.Y", $newsData['idate'])?>
                    </time>
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?=$newsData['title']?></h2>
                    <p class="card-text"><?=$newsData['announce']?></p>
                    <a href="view.php?id=<?=$newsData['id']?>" class="btn btn-primary">Подробнее...</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</main>

<footer>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php $pagesList = range(1, ceil($data['numbOfNews'] / $data['newsOnPage']))?>
            <?php foreach ($pagesList as $pages): ?>
            <li <? if ($pages == $data['currentPage']) {?>class="page-item active" aria-current="page"<?} else {?>class="page-item"<?} ?>>
                <a class="page-link" <? if ($pages == $data['currentPage']) {?>href="#"<?} else {?>href="http://i14t.h1n.ru/newsModule/news.php?page=<?=$pages?>"<?} ?>><?=$pages?></a>
            </li>
            <?php endforeach ?>
        </ul>
    </nav>
    
    </footer>
    
</div>