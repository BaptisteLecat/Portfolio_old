<?php 

namespace App\Model\Manager;

use App\Model\Entity\SocialNetwork;
use App\PdoFactory;
use \PDOException;
use \Exception;

class SocialNetworkManager
{
    public static function selectSocialNetwork()
    {
        $list_socialNetwork = array();
        try {
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM socialnetwork");
            $request->execute();
            while ($result = $request->fetch()) {
                $socialNetwork = new SocialNetwork($result["socialnetwork_id"], $result["socialnetwork_label"], $result["socialnetwork_picture"], $result["socialnetwork_link"]);
                array_push($list_socialNetwork, $socialNetwork);
            }

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $list_socialNetwork;
    }
}
