<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/31/2016
 * Time: 3:27 PM
 */

namespace App\Services;


use App\Model\Department;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
class DepartmentServiceImpl implements DepartmentService {

    private $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    public function getAllDepartment() {
        return $this->department->get();
    }

    public function getDepartmentWithPagination($itemsPerPage){
        return $this->department->paginate($itemsPerPage);
    }

    public function saveDepartment(Request $request){
        $this->department->autoGeneratedDepartmentId = $this->generateUniqueDepartmentId();
        $this->department->departmentName = $request->input('departmentName');
        $this->department->save();
    }

    public function findDepartmentById($id){
        return $this->department->find($id);
    }

    public function updateDepartmentById($id, Request $request){
        $department = $this->findDepartmentById($id);
        $department->departmentName = $request->input('departmentName');
        $department->save();
    }

    public function deleteDepartmentById($id){
        $department = $this->findDepartmentById($id);
        $department->delete($id);
    }

    public function getLastInsertedId(){
        $last_id = DB::table('departments')->where('id',DB::raw("(select max(`id`) from departments)"))->first();
        if($last_id){
            $id = $last_id->id+1;
            return $id;
        }else{
            $id =1;
            return $id;
        }
    }

    public function generateUniqueDepartmentId(){
        $generatedId = "DEPT-";
        for($i=strlen($this->getLastInsertedId()); $i <= 5; $i++) {
            $generatedId .=0;
        }
        return $generatedId.$this->getLastInsertedId();
    }


} 