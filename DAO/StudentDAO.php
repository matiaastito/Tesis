<?php

namespace DAO;

use DAO\IStudentDAO as IStudentDAO;
use Classes\Users\Student as Student;

class StudentDAO implements IStudentDAO
{
    private $studentList = array();
    private $fileName = ROOT . "Data/students.json";

    public function Add(Student $student)
    {
        $this->RetrieveData();

        array_push($this->studentList, $student);

        $this->SaveData();
    }

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->studentList;
    }

    public function GetByEmail($email)
    {
        $student = null;

        $this->RetrieveData();

        $student = array_filter($this->studentList, function ($student) use ($email) {
            return $student->getEmail() == $email;
        });

        $student = array_values($student); //Reordering array indexes

        return (count($student) > 0) ? $student[0] : null;
    }


    private function RetrieveData()
    {
        $this->studentList = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();

            foreach ($contentArray as $content) {

                $student = new Student();
                $student->setStudentId($content["studentId"]);
                $student->setCareerId($content["careerId"]);
                $student->setName($content["firstName"]);
                $student->setLastName($content["lastName"]);
                $student->setDni($content["dni"]);
                $student->setFileNumber($content["fileNumber"]);
                $student->setGender($content["gender"]);
                $student->setBirthDate($content["birthDate"]);
                $student->setEmail($content["email"]);
                $student->setPhoneNumber($content["phoneNumber"]);
                $student->setActive($content["active"]);

                array_push($this->studentList, $student);
            }
        }
    }

    private function SaveData()
    {
        $arrayToEncode = array();

        foreach ($this->studentList as $student) {
            $valuesArray = array();
            $valuesArray["studentId"] = $student->getStudentId();
            $valuesArray["careerId"] = $student->getCareerId();
            $valuesArray["firstName"] = $student->getName();
            $valuesArray["lastName"] = $student->getLastName();
            $valuesArray["dni"] = $student->getDni();
            $valuesArray["fileNumber"] = $student->getFileNumber();
            $valuesArray["gender"] = $student->getGender();
            $valuesArray["birthDate"] = $student->getBirthDate();
            $valuesArray["email"] = $student->getEmail();
            $valuesArray["phoneNumber"] = $student->getPhoneNumber();
            $valuesArray["active"] = $student->getActive();
            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }
}
