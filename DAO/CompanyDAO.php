<?php

namespace DAO;


use \Exception as Exception;
use DAO\ICompanyDAO as ICompanyDAO;
use Classes\Enterprise\Company as Company;
use DAO\Connection as Connection;

class CompanyDAO implements ICompanyDAO
{
    private $companyList = array();
    
    private $tableName = "company";


    public function Add(Company $company)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (cuil, legal_name, address, contact_number, email) VALUES (:cuil, :legal_name, :address, :contact_number, :email);";

            
            $parameters["cuil"] = $company->getCUIL();
            $parameters["legal_name"] = $company->getLegalName();
            $parameters["address"] = $company->getAddress();
            $parameters["contact_number"] = $company->getContactNumber();
            $parameters["email"] = $company->getEmail();


            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function GetAll()
    {
        $companyList = array();
        try {

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $company = new Company();
                $company->setId($row["id"]);
                $company->setLegalName($row["legal_name"]);
                $company->setContactNumber($row["contact_number"]);
                $company->setAddress($row["address"]);
                $company->setCUIL($row["cuil"]);
                $company->setEmail($row["email"]);



                array_push($companyList, $company);
            }

            return $companyList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function Remove($cuil)
    {
        try {
            $query = "DELETE FROM $this->tableName WHERE CUIL = $cuil";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Modify()
    {

        try {
            if ($_POST['legalName']) {
                $query = "UPDATE $this->tableName SET legal_name = '$_POST[legalName]' WHERE CUIL = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['address']) {
                $query = "UPDATE $this->tableName SET address='$_POST[address]' WHERE CUIL = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['contactNumber']) {
                $query = "UPDATE $this->tableName SET contact_number='$_POST[contactNumber]' WHERE CUIL = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
            if ($_POST['email']) {
                $query = "UPDATE $this->tableName SET email='$_POST[email]' WHERE CUIL = $_POST[cuil]";
                $this->connection = Connection::GetInstance();

                $this->connection->Execute($query);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function SearchByNombre($nombre)
    {

        $companyList = array();
        try {
            $query = "SELECT * FROM $this->tableName WHERE legal_name like '$nombre%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    $company = new Company();
                    $company->setId($row["id"]);
                    $company->setLegalName($row["legal_name"]);
                    $company->setContactNumber($row["contact_number"]);
                    $company->setAddress($row["address"]);
                    $company->setCUIL($row["CUIL"]);
                    $company->setEmail($row["email"]);



                    array_push($companyList, $company);
                }
            }

            return $companyList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


}
