<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Classes\Users\Student as Student;

class StudentController
{
    private $studentDAO;


    public function Index($message = "")
    {
        require_once(VIEWS_PATH . "index.php");
    }

    public function __construct()
    {
        $this->studentDAO = new StudentDAO();
    }

    public function ShowListView()
    {
        $studentList = $this->studentDAO->GetAll();

      //  require_once(VIEWS_PATH . "/student-list.php");
    }

    public function ShowCompanyListView()
    {

        require_once(VIEWS_PATH . "validate-session.php");
        $companyList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "company-list.php");
    }


    public function Add($studentId, $careerId, $firstName, $lastName, $dni, $fileNumber, $gender, $birthDate, $email, $phoneNumber, $active, $userType)
    {
        $student = new Student();
        $student->setStudentId($studentId);
        $student->setCareerId($careerId);
        $student->setName($firstName);
        $student->setLastName($lastName);
        $student->setDni($dni);
        $student->setFileNumber($fileNumber);
        $student->setGender($gender);
        $student->setBirthDate($birthDate);
        $student->setEmail($email);
        $student->setPhoneNumber($phoneNumber);
        $student->setActive($active);
        $student->setUserType($userType);
        $this->studentDAO->Add($student);

        $this->ShowListView();
    }
}
