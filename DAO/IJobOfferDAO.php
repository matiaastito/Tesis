<?php

namespace DAO;

use Classes\Enterprise\JobOffer as JobOffer;

interface IJobOffferDAO
{
    function Add(JobOffer $jobOffer);
    function GetAll();
    
}