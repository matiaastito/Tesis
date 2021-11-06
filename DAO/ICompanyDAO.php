<?php

namespace DAO;

use Classes\Enterprise\Company as Company;

interface IJobPositionDAO
{
    function Add(Company $company);
    function GetAll();
    function Remove($cuil);
}
