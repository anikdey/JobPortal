<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/31/2016
 * Time: 3:27 PM
 */

namespace App\Services;
use Symfony\Component\HttpFoundation\Request;

interface DepartmentService {

    public function getDepartmentWithPagination($itemsPerPage);

    public function getAllDepartment();

    public function saveDepartment(Request $request);

    public function findDepartmentById($id);

    public function updateDepartmentById($id, Request $request);

    public function deleteDepartmentById($id);

    public function getLastInsertedId();

    public function generateUniqueDepartmentId();
} 