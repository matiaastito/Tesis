<?php

use Controllers\StudentController as StudentController;
use Controllers\CareerController as CareerController;
use Controllers\JobPositionController as JobPositionController;
use DAO\StudentDAO as StudentDAO;

$jsonStudents = new StudentController();
$jsonCareer = new CareerController();
$jsonJobPosition = new JobPositionController();

$ch = curl_init();

$url = 'https://utn-students-api.herokuapp.com/api/Student';
//$url = 'https://utn-students-api.herokuapp.com/api/JobPosition';
//$url = 'https://utn-students-api.herokuapp.com/api/Career';

$header = array(
    'x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'
);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$response = curl_exec($ch);

$arrayToDecode = json_decode($response, true);


foreach($arrayToDecode as $row){
    var_dump($row['email']);
}


/*
for ($i = 0; $i < 200; $i++) {
    $jsonStudents->Add(
        $arrayToDecode[$i]['studentId'],
        $arrayToDecode[$i]['careerId'],
        $arrayToDecode[$i]['firstName'],
        $arrayToDecode[$i]['lastName'],
        $arrayToDecode[$i]['dni'],
        $arrayToDecode[$i]['fileNumber'],
        $arrayToDecode[$i]['gender'],
        $arrayToDecode[$i]['birthDate'],
        $arrayToDecode[$i]['email'],
        $arrayToDecode[$i]['phoneNumber'],
        $arrayToDecode[$i]['active'],
        "student",
    );
    
    
}
*/

/*
for ($i = 0; $i < 8; $i++) {
    $jsonCareer->Add(
        $arrayToDecode[$i]['careerId'],
        $arrayToDecode[$i]['description'],
        $arrayToDecode[$i]['active']
    );
    
}*/
/*
for ($i = 0; $i < 23; $i++) {
    $jsonJobPosition->Add(
        $arrayToDecode[$i]['jobPositionId'],
        $arrayToDecode[$i]['careerId'],
        $arrayToDecode[$i]['description']
    );
    
}
*/






