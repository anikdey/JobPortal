<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 11/1/2016
 * Time: 12:25 PM
 */

namespace App\Services;

use Symfony\Component\HttpFoundation\Request;

interface ApplicantService {

    public function getApplicationsWithPagination($itemsPerPage);

    public function getAllApplication();

    public function saveApplication(Request $request);

    public function findApplicationsByJobId($jobId);

    public function findApplicationById($applicationId);

    public function deleteApplicationById($applicationId);

    public function  ajaxSearchApplication(Request $request);

//public function updateDepartmentById($id, Request $request);

    //public function getLastInsertedId();

    //public function generateUniqueDepartmentId();
} 