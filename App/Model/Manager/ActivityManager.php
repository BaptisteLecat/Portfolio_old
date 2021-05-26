<?php

namespace App\Model\Manager;

use Exception;
use PDOException;
use App\PdoFactory;
use App\Model\Entity\Course;
use App\Model\Entity\Experience;

class ActivityManager
{
    public static function selectActivity()
    {
        try{
            $list_activity = array();
            //First select course Activities.
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM activity, course WHERE course.course_id = activity.activity_id");
            $request->execute();
            while ($result = $request->fetch()) {
                $course = new Course($result["activity_id"], $result["activity_title"], $result["activity_date"], $result["activity_picture"]);
                array_push($list_activity, $course);
            }

            //Then select experience Activities.
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM activity, experience WHERE experience.experience_id = activity.activity_id");
            $request->execute();
            while ($result = $request->fetch()) {
                $experience = new Experience($result["activity_id"], $result["activity_title"], $result["activity_date"], $result["activity_picture"]);
                array_push($list_activity, $experience);
            }
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $list_activity;
    }
}
