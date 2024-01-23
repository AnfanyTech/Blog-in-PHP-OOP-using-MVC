<?php
namespace App\Controller;

use App\Model\CategoriesModel;
use App\Model\PostsModel;
use Core\Controller;

class PostsController extends Controller{
    
    /**
     * Listing of articles with its categories at the homepage of the app
     *
     * @return void
     * 
     */
    public function index(){
      $posts = (new PostsModel())->fetchAll();
      $categories = (new CategoriesModel());
      return $this->render('index', ['posts'=>$posts, 'categories'=>$categories]);
    }


    /**
     * Single post with its categories
     *
     * @param int $id
     * 
     * @return void
     * 
     */
    public function read($id){
       $post = (new PostsModel())->fetchOne($id);
       $categories = (new CategoriesModel())->fetchNtoN($id);
       return $this->render('read', ['post'=>$post, 'categories'=>$categories]);
    }
}