<?php

class Model_View extends Model
{
    
    // Идентификатор новости
    private $id;
    
    // Дата новости в формате UNIX TIMESTAMP
    private $idate;
	
    // Заголовок
    private $title;
	
    // Краткий анонс
    private $announce;
	
    // Полный текст
    private $content;
	
    // конструктор
    public function __construct($needDBQuery, $strFromDb, $idNews)
    {
        if ($needDBQuery) {
            global $db;
            $response = $db->query("SELECT * FROM `news` WHERE id = ".$idNews)->fetchAll(PDO::FETCH_ASSOC);
            $strFromDb = $response[0];
        }
        
        $this->id = $strFromDb['id'];
        $this->idate = $strFromDb['idate'];
        $this->title = $strFromDb['title'];
        $this->announce = $strFromDb['announce'];
        $this->content = $strFromDb['content'];
    }
    
    /**
     * Возвращает ассоциативный массив полей класса
     */
    public function get_data()
    {
        $data = [
            'id' => $this->id,
            'idate' => $this->idate,
            'title' => $this->title,
            'announce' => $this->announce,
            'content' => $this->content,
            ];
            
        return $data;
    }

}