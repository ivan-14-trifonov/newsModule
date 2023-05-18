<?php

class Controller_News extends Controller
{

    function __construct()
    {
        
        // Номер страницы из GET-запроса
        $pageNumber = $_GET["page"];
        if ($pageNumber == "") {
            $pageNumber = 1;
        }
        
        // Сколько новостей на странице
        $newsOnPage = 5;
        
        $this->model = new Model_News($pageNumber, $newsOnPage);
        $this->view = new View();
	}
	
	function action_index()
	{
	    // Получаем список новостей для заданной страницы
	    $data = $this->model->get_data();		
	    $this->view->generate('news_view.php', 'template_view.php', $data);
	    
	    error_reporting(E_ALL ^ E_WARNING);
	}
}