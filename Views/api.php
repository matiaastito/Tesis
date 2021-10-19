<?php

use Controllers\StudentController as StudentController;
use DAO\StudentDAO as StudentDAO;

$jsonStudents = new StudentController();

$ch = curl_init();

$url = 'https://utn-students-api.herokuapp.com/api/Student';

$header = array(
    'x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'
);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$response = curl_exec($ch);

$arrayToDecode = json_decode($response, true);
/*
for ($i = 0; $i < 20; $i++) {
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
