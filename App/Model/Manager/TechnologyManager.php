<?php

namespace App\Model\Manager;

use Exception;
use PDOException;
use App\PdoFactory;
use App\Model\Entity\Category;
use App\Model\Entity\Technology;

class TechnologyManager
{
    public static function selectTechnology()
    {
        $list_technology = array();
        try {
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM technology");
            $request->execute();
            while ($result = $request->fetch()) {
                $technology = new Technology($result["technology_id"], $result["technology_label"], $result["technology_picture"]);
                array_push($list_technology, $technology);
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $list_technology;
    }

    public static function loadCategoryForTechnology(Technology $technology)
    {
        try{
            $request = PdoFactory::getPdo()->prepare("SELECT category.category_id, category.category_label, category.category_picture FROM category, category_technology WHERE category.category_id = category_technology.category_id AND category_technology.technology_id = :technology_id");
            $request->execute(array(':technology_id' => $technology->getId()));
            while ($result = $request->fetch()) {
                $category = new Category($result["category_id"], $result["category_label"], $result["category_picture"]);
                $technology->addCategory($category);
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
