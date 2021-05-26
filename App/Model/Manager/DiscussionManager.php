<?php

namespace App\Model\Manager;

use Exception;
use PDOException;
use App\PdoFactory;
use App\Model\Entity\Discussion;

class DiscussionManager
{
    public static function selectDiscussion()
    {
        try{
            $list_discussion = array();
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM discussion");
            $request->execute();
            while ($result = $request->fetch()) {
                //Loading data of the sender.
                $sender = ProfileManager::selectProfileFromId($result["discussion_idsender"]);
                $discussion = new Discussion($result["discussion_id"], $result["discussion_content"], $sender);
                array_push($list_discussion, $discussion);
            }
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $list_discussion;
    }
}
