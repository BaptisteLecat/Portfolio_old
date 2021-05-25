<?php

namespace App\Model\Manager;

use Exception;
use PDOException;
use App\PdoFactory;
use App\Model\Entity\Category;
use App\Model\Entity\Technology;

class CategoryManager
{
    public static function selectCategory()
    {
        $list_category = array();
        try {
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM category");
            $request->execute();
            while ($result = $request->fetch()) {
                $category = new Category($result["category_id"], $result["category_label"], $result["category_picture"]);
                array_push($list_category, $category);
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $list_category;
    }


    public static function selectCategoryFromId(int $categoryId)
    {
        $category = null;
        try {
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM category WHERE category_id = :category_id");
            $request->execute();
            if($request->rowCount() > 0){
                $result = $request->fetch();
                $category = new Category($result["category_id"], $result["category_label"], $result["category_picture"]);
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $category;
    }

    public static function loadTechnologyForCategory(Category $category)
    {
        try {
            $request = PdoFactory::getPdo()->prepare("SELECT technology.technology_id, technology.technology_label, technology.technology_picture FROM technology, category_technology WHERE technology.technology_id = category_technology.technology_id AND category_technology.category_id = :category_id");
            $request->execute(array(':category_id' => $category->getId()));
            while ($result = $request->fetch()) {
                $technology = new Technology($result["technology_id"], $result["technology_label"], $result["technology_picture"]);
                $category->addTechnology($technology);
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
