<?php

namespace DAO;

use Classes\Company as Company;

interface ICompanyDAO
{
    function Add(Company $company);
    function GetAll();
    function getByCuil($cuil);
    function Remove($cuil);
}
