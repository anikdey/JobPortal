<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class DepartmentController extends Controller
{

    private $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }


    public function index() {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $departments = $this->departmentService->getDepartmentWithPagination(10);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.department.index")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('departments', $departments)
                ;
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function create() {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.department.create")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ;
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function saveDepartment(Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $rules = array(
                'departmentName' => 'required|unique:departments',
            );
            $messages = array(
                'departmentName.required' => 'Department name is required.',
                'departmentName.unique' => 'Department name has already been taken.',
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return Redirect::to('/admin/department/add-new-department')->withErrors($validator)->withInput();
            } else {
                $this->departmentService->saveDepartment($request);
                Session::flash('message', 'Department added.');
                return Redirect::to('admin/department-list');
            }
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function showDepartmentById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $department = $this->departmentService->findDepartmentById($id);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.department.show")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('department', $department)
                ;
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function editDepartmentById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $department = $this->departmentService->findDepartmentById($id);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.department.edit")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('department', $department)
                ;
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function updateDepartmentById($id, Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $rules = array(
                'departmentName' => 'required',
            );
            $messages = array(
                'departmentName.required' => 'Department name is required.',
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return Redirect::to('/admin/department/edit/'.$id)->withErrors($validator)->withInput();
            } else {
                $this->departmentService->updateDepartmentById($id, $request);
                Session::flash('message', 'Department updated.');
                return Redirect::to('admin/department-list');
            }
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function deleteDepartmentById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $this->departmentService->deleteDepartmentById($id);
            Session::flash('message', 'Department deleted.');
            return Redirect::to('admin/department-list');
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

}
