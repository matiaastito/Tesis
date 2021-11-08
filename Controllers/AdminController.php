<?php

namespace Controllers;

use DAO\AdminDAO as AdminDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\StudentDAO as StudentDAO;
use Classes\Users\Admin as Admin;
use Classes\Company as Company;

class AdminController
{
    private $adminDAO;
    private $companyDAO;
    private $studentDAO;

    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
        $this->companyDAO = new CompanyDAO();
        $this->studentDAO = new StudentDAO();
    }

    public function ShowCompanyListView()
    {
        $companyList = $this->companyDAO->GetAll();

        require_once(VIEWS_PATH . "/company-list.php");
    }

    public function ShowStudentListView()
    {
        $studentList = $this->studentDAO->GetAll();
        require_once(VIEWS_PATH . "/student-list.php");
    }

    public function AddImg()
    {
        

//Si se quiere subir una imagen
var_dump($_FILES);
//if (isset($_POST["subir"])) {
   //Recogemos el archivo enviado por el formulario
   $archivo = $_FILES['archivo']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['archivo']['type'];
      $tamano = $_FILES['archivo']['size'];
      $temp = $_FILES['archivo']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, 'images/'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('images/'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            echo '<p><img src="images/'.$archivo.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   //}
   require_once(VIEWS_PATH . "/admin-home.php");
   
}

}

    public function ShowAdminListView()
    {
        $adminList = $this->adminDAO->GetAll();
        require_once(VIEWS_PATH . "admin-list.php");
    }

    public function Add($firstName, $lastName, $dni, $gender, $birhtDate, $email, $phoneNumber, $userType)
    {
        $admin = new Admin();
        $admin->setName($firstName);
        $admin->setLastName($lastName);
        $admin->setDni($dni);
        $admin->setGender($gender);
        $admin->setBirthDate($birhtDate);
        $admin->setEmail($email);
        $admin->setPhoneNumber($phoneNumber);
        $admin->setUserType($userType);


        $this->adminDAO->Add($admin);

        $this->ShowCompanyListView();
    }

    public function Remove($id)
    {
        $this->adminDAO->Remove($id);

        $this->ShowAdminListView();
    }
}
