<?php

namespace DAO;

use DAO\IStudentDAO as IStudentDAO;
use Models\Student as Student;

class StudentDAO implements IStudentDAO
{
    private $studentList = array();
    private $fileName = ROOT . "Data/students.json";

    /*  public function Add(CellPhone $cellPhone)
        {
            $this->RetrieveData();
            
            $cellPhone->setId($this->GetNextId());
            
            array_push($this->cellPhoneList, $cellPhone);

            $this->SaveData();
        }
        */

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->studentList;
    }

    /* public function Remove($id)
        {            
            $this->RetrieveData();
            
            $this->cellPhoneList = array_filter($this->cellPhoneList, function($cellPhone) use($id){                
                return $cellPhone->getId() != $id;
            });
            
            $this->SaveData();
        }
        */

    private function RetrieveData()
    {
        $this->studentList = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();

            foreach ($contentArray as $content) {
                $student = new Student();
                /* $cellPhone->setId($content["id"]);
                     $cellPhone->setCode($content["code"]);
                     $cellPhone->setBrand($content["brand"]);
                     $cellPhone->setModel($content["model"]);
                     $cellPhone->setPrice($content["price"]);
                     */

                array_push($this->studentList, $student);
            }
        }
    }

    private function SaveData()
    {
        $arrayToEncode = array();

        foreach ($this->studentList as $student) {
            $valuesArray = array();
            /* $valuesArray["id"] = $cellPhone->getId();
                $valuesArray["code"] = $cellPhone->getCode();
                $valuesArray["brand"] = $cellPhone->getBrand();
                $valuesArray["model"] = $cellPhone->getModel();
                $valuesArray["price"] = $cellPhone->getPrice();
                */
            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

    /*  private function GetNextId()
        {
            $enrrolment = 0;

            foreach($this->studentList as $student)
            {
                $enrrolment = ($student->getEnrrolment() > $enrrolment) ? $student->getEnrrolment() : $enrrolment;
            }

            return $enrrolment + 1;
        }
        */
}
