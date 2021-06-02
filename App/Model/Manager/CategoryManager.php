<?php

namespace App\Model\Manager;

use Exception;
use PDOException;
use App\PdoFactory;
use App\Model\Entity\Category;
use App\Model\Entity\Project;
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

    public static function selectCategoryFromId(int $categoryId)
    {
        $category = null;
        try {
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM category WHERE category_id = :category_id");
            $request->execute(array(":category_id" => $categoryId));
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

    public static function loadProjectForCategory(Category $category)
    {
        try {
            $request = PdoFactory::getPdo()->prepare("SELECT project.project_id, project.project_title, project.project_content, project.project_thumbnail, project.project_startdate, project.project_enddate, project.project_picture, project.project_mainlink, project.project_infolink FROM project WHERE project.project_categoryId = :project_categoryId");
            $request->execute(array(':project_categoryId' => $category->getId()));
            while ($result = $request->fetch()) {
                $project = new Project($result["project_id"], $result["project_title"], $result["project_content"], $result["project_thumbnail"], $result["project_startdate"], $result["project_enddate"], $result["project_picture"], $result["project_mainlink"], $result["project_infolink"], $category);
                $category->addProject($project);
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
