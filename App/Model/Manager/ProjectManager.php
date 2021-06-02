<?php

namespace App\Model\Manager;

use Exception;
use PDOException;
use App\PdoFactory;
use App\Model\Entity\Technology;
use App\Model\Entity\Project;

class ProjectManager
{
    public static function selectProject()
    {
        $list_project = array();
        try {
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM project");
            $request->execute();
            while ($result = $request->fetch()) {
                //Load data of category.
                $category = CategoryManager::selectCategoryFromId($result["project_categoryId"]);
                $project = new Project($result["project_id"], $result["project_title"], $result["project_content"], $result["project_thumbnail"], $result["project_startdate"], $result["project_enddate"], $result["project_picture"], $result["project_mainlink"], $result["project_infolink"], $category);
                array_push($list_project, $project);
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $list_project;
    }

    public static function loadTechnologyForProject(Project $project)
    {
        try {
            $request = PdoFactory::getPdo()->prepare("SELECT technology.technology_id, technology.technology_label, technology.technology_picture FROM technology, project_technology WHERE technology.technology_id = project_technology.technology_id AND project_technology.project_id = :project_id");
            $request->execute(array(':project_id' => $project->getId()));
            while ($result = $request->fetch()) {
                $technology = new Technology($result["technology_id"], $result["technology_label"], $result["technology_picture"]);
                $project->addTechnology($technology );
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
