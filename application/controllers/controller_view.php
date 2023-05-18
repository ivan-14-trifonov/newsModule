<?php

class Controller_View extends Controller
{

    function __construct()
    {
        
        // Номер новости из GET-запроса
        $idNews = $_GET["id"];
        if ($idNews == "") {
            $idNews = 1;
        }
        
        $this->model = new Model_View(true, null, $idNews);
        $this->view = new View();
	}
	
	function action_index()
	{
	    // Получаем сновость с заданным id
	    $data = $this->model->get_data();		
	    $this->view->generate('view_view.php', 'template_view.php', $data);
	    
	    error_reporting(E_ALL ^ E_WARNING);
	}
}