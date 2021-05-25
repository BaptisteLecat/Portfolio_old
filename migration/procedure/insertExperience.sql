
---------------------------------------
----------INSERT_EXPERIENCE----------
---------------------------------------

DROP PROCEDURE IF EXISTS INSERT_EXPERIENCE;
DELIMITER |
CREATE PROCEDURE INSERT_EXPERIENCE (IN _title VARCHAR(255), IN _date DATE, _picture VARCHAR(255))  
BEGIN
	DECLARE _activityId integer unsigned default null; -- valeur de retour pour connaitre l'id de l'insertion.

	INSERT INTO activity (activity_title, activity_date, activity_picture) VALUES (_title, _date, _picture); -- Insertion des valeurs dans la table mère
    set _activityId = last_insert_id(); -- récupération de l'id pour donné le meme id à la table fille
    INSERT INTO experience (experience_id) VALUES (_activityId); -- insertion dans la table fille

	SELECT _activityId; -- retour de l'id
END |
DELIMITER ;

call INSERT_EXPERIENCE("SUPERU", "2020-06-15", "super");