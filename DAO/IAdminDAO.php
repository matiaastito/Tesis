<?php

namespace DAO;

use Classes\Users\Admin as Admin;

interface IAdminDAO
{
    function getByEmail($email);
    function GetAll();
}
