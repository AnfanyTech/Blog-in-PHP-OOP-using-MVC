<?php
namespace Core;

abstract class Controller
{
    public function render($front_page, $data_from_db = [])
    {
      $characters = explode("\\", get_called_class());
      $path_front_page = str_replace('controller', '', strtolower(end($characters)))."/".$front_page.".php";

        ob_start();
        extract($data_from_db);
        require_once dirname(__DIR__).'/public/'.$path_front_page;

        $content = ob_get_clean();
        require_once dirname(__DIR__).'/public/template/template.php';

    }
}
