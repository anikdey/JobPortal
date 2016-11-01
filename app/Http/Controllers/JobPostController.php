<?php

namespace App\Http\Controllers;

use App\Services\ApplicantService;
use App\Services\JobPostService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class JobPostController extends Controller{

    private $jobPostService;
    private $applicantService;

    public function __construct(JobPostService $jobPostService, ApplicantService $applicantService)
    {
        $this->jobPostService = $jobPostService;
        $this->applicantService = $applicantService;
    }


    public function index() {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $jobPosts = $this->jobPostService->getJobPostWithPagination(10);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.jobPost.index")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('jobPosts', $jobPosts)
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
            return view("admin.jobPost.create")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ;
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function saveJob(Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $rules = array(
                'jobTitle' => 'required',
                'departmentId' => 'required',
                'deadline' => 'required',
                'jobDescription' => 'required',
            );
            $messages = array(
                'jobTitle.required' => 'Job title is required.',
                'departmentId.required' => 'Department is required.',
                'deadline.required' => 'Deadline is required.',
                'jobDescription.required' => 'Description is required.',
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return Redirect::to('/admin/job/post-new-job')->withErrors($validator)->withInput();
            } else {
                $this->jobPostService->saveJobPost($request);
                Session::flash('message', 'Job posted.');
                return Redirect::to('admin/job-list');
            }
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function showJobPostById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $jobPost = $this->jobPostService->findJobPostById($id);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.jobPost.show")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('jobPost', $jobPost)
                ;
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function editJobPostById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $jobPost = $this->jobPostService->findJobPostById($id);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.jobPost.edit")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('jobPost', $jobPost)
                ;
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function updateJobPostById($id, Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $rules = array(
                'jobTitle' => 'required',
                'departmentId' => 'required',
                'deadline' => 'required',
                'jobDescription' => 'required',
            );
            $messages = array(
                'jobTitle.required' => 'Job title is required.',
                'departmentId.required' => 'Department is required.',
                'deadline.required' => 'Deadline is required.',
                'jobDescription.required' => 'Description is required.',
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return Redirect::to('/admin/job/edit/'.$id)->withErrors($validator)->withInput();
            } else {
                $this->jobPostService->updateJobPostById($id, $request);
                Session::flash('message', 'Job post updated.');
                return Redirect::to('admin/job-list');
            }
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }






    public function showApplicationsByJobId($jobId) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $applications = $this->applicantService->findApplicationsByJobId($jobId);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.jobPost.applicationsToJob")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('applications', $applications)
                ;
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }





    public function ajaxDeleteApplicationById(Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $this->applicantService->deleteApplicationById($request->input('applicationId'));
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }


    public function deleteJobPostById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $this->jobPostService->deleteJobPostById($id);
            Session::flash('message', 'Job post deleted.');
            return Redirect::to('admin/job-list');
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }
}
