<?php
namespace App\Model;

    use Core\Model;

    class CategoriesModel extends Model
    {
        private static $table = 'category';
        
    public function fetchNtoN($table_entry_id){
        $pdoStatement = $this->prepare(
            "SELECT * FROM category 
            JOIN post_category ON category.id = post_category.category_id
            WHERE post_category.post_id = ?", 
            $table_entry_id);
        return $pdoStatement->fetchAll();
    }


    public function getCategory($category_id){
        $pdoStatement = $this->prepare("SELECT categories.nom FROM categories WHERE categories.id = ?", $category_id);
        return $pdoStatement->fetch();
    }

}


