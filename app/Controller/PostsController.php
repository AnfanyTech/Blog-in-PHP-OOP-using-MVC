<?php
namespace App\Controller;

use App\Model\CategoriesModel;
use App\Model\PostsModel;
use Core\Controller;

class PostsController extends Controller{
    
    //Listing of articles with its categories at the homepage of the app
    public function index(){
      $posts = (new PostsModel())->fetchAll();
      $categories = (new CategoriesModel());
      return $this->render('index', ['posts'=>$posts, 'categories'=>$categories]);
    }
}