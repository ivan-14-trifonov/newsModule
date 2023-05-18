<?php

class Model_News extends Model
{
    
    // Текущая страница
    private $currentPage;
    
    // Количество новостей
    private $numbOfNews;
    
    // Количество новостей на странице
    private $newsOnPage;

    // Список новостей для данной страницы
    private $newsList = [];

    function __construct($pageNumber, $newsOnPage)
    {
        $this->currentPage = $pageNumber;
        $this->newsOnPage = $newsOnPage;
 
        require_once __DIR__ . '/model_view.php';

        // Подключение к БД
        global $db;

        // Количество новостей в БД
        $response = $db->query('SELECT COUNT(*) FROM `news`')->fetch(PDO::FETCH_LAZY);
        $this->numbOfNews = $response["COUNT(*)"];

        // Считываем новости из БД
        $shift = ($pageNumber - 1) * $newsOnPage;
        $response = $db->query("SELECT * FROM `news` order by `idate` DESC LIMIT 5 OFFSET ".$shift)->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($response); $i++) {
            $this->newsList[] = new Model_View(false, $response[$i], null);
        }
    }
    
    /**
     * Возвращает номер текущей страницы,
     * общее число новостей,
     * количество новостей на каждой странице,
     * список новостей в виде масссива объектов News
     */
    public function get_data()
    {
        $data = [
            'currentPage' => $this->currentPage,
            'numbOfNews' => $this->numbOfNews,
            'newsOnPage' => $this->newsOnPage,
            'newsList' => $this->newsList,
            ];
            
        return $data;
    }

}