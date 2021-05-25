<?php

namespace App\Model\Manager;

use App\Model\Entity\Profile;
use Exception;
use PDOException;
use App\PdoFactory;
use Discussion;

class ProfileManager
{
    public static function selectProfile()
    {
        try{
            $list_profile = array();
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM profile");
            $request->execute();
            while ($result = $request->fetch()) {
                $profile = new Profile($result["profile_id"], $result["profile_name"], $result["profile_firstname"], $result["profile_birthday"], $result["profile_picture"], $result["profile_cv"]);
                array_push($list_profile, $profile);
            }
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $list_profile;
    }

    public static function selectProfileFromId(int $profileId)
    {
        $profile = null;
        try{
            $profile = array();
            $request = PdoFactory::getPdo()->prepare("SELECT * FROM profile WHERE profile_id = :profile_id");
            $request->execute(array(":profile_id" => $profileId));
            if($request->rowCount() > 0){
                $result = $request->fetch();
                $profile = new Profile($result["profile_id"], $result["profile_name"], $result["profile_firstname"], $result["profile_birthday"], $result["profile_picture"], $result["profile_cv"]);
            }
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $profile;
    }
}
