<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/31/2016
 * Time: 4:45 PM
 */

namespace App\ViewComposer;


use App\Services\DepartmentService;
use Illuminate\View\View;
class DepartmentComposer {

    private $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }


    public function compose(View $view)
    {

        $view->with('departments', $this->departmentService->getAllDepartment());

    }
} 