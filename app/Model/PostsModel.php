<?php 
namespace App\Model;

use Core\Model;

class PostsModel extends Model
{
    private static $table = 'post';

    /**
     * Fetch all posts from database
     *
     * @return array of posts
     * 
     */
    public function fetchAll(){
        return $this->query(
            "SELECT * FROM ".self::$table,
        )->fetchAll();
    }

    public function fetchOne($id){
        return $this->prepare("SELECT *
        FROM ".self::$table." WHERE id = ?",
         $id
        )->fetch();
    }
}


