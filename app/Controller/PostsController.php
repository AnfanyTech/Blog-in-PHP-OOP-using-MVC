<?php
namespace App\Controller;

use App\Model\PostsModel;
use Core\Controller;

class PostsController extends Controller{
    
    //Listing of articles at the homepage of the app
    public function index(){
      $data = (new PostsModel())->getConnexionObject('blogphpoopmvc', 'root', '');
      var_dump($data);
    }
}