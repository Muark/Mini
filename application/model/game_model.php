<?php

class GameModel
{

	public function getAllPhotos()
    {
        $query = $this->db->prepare('SELECT * FROM photo');
        $query->execute();
        return $query->fetchAll();
    }

    public function selectPhoto()
    {
    	$query = $this->db->prepare("SELECT name
								   FROM photo
								   WHERE id = :id");
		$query->execute(array(':id' => $_GET['id']));
		return $query->fetchAll();
    }

    public function getDistance() {
    $query = $this->db->prepare("SELECT *
								   FROM photo
								   WHERE id = :id");
	$query->execute(array(':id' => $_GET['id']));
	if($row = $query->fetch(PDO::FETCH_ASSOC)) {
		$lon1 = $row['lon'];
		$lat1 = $row['lat'];
	}
	$lon2 = $_GET['lngFld'];
	$lat2 = $_GET['latFld'];

	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$km = $miles * 1.609344;
	$km = round($km, 0);
	
	if ($km < 30) {
		$result = "Je zat er ". $km ." km naast, goed gedaan!";
	}
	elseif ($km > 30.001 && $km < 150) {
		$result = "Je zat er ". $km ." km naast, dat kan beter!";
	}
	elseif ($km > 150.001) {
		$result = "Je zat er ". $km ." km naast, niet eens in de buurt!";
	}
	else {
		$result = "Er is iets mis gegaan, probeer het opnieuw.";
	}

	$GLOBALS['result'] = $result;
	

	}


}
