<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 11/1/2016
 * Time: 12:26 PM
 */

namespace App\Services;
use App\Model\Application;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;
use DB;

class ApplicantServiceImpl implements ApplicantService {

    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function getApplicationsWithPagination($itemsPerPage){
        return $this->application->paginate($itemsPerPage);
    }

    public function getAllApplication(){
        return $this->application->get();
    }

    public function saveApplication(Request $request){
        if($request->file('picture')) {
            $file = $request->file('picture');
            $pictureFileName = time().$file->getClientOriginalName();
            $file->storeAs("uploads/photos", $pictureFileName);
        } else {
            $pictureFileName = "";
        }

        if($request->file('cv')) {
            $file = $request->file('cv');
            $cvFileName = time().$file->getClientOriginalName();
            $file->storeAs("uploads/cvs", $cvFileName);
        } else {
            $cvFileName = "";
        }

        $this->application->fullName = $request->input('fullName');
        $this->application->jobId = $request->input('jobId');
        $this->application->departmentId = $request->input('departmentId');
        $this->application->mobileNumber = $request->input('mobileNumber');
        $this->application->email = $request->input('email');
        $this->application->address = $request->input('address');
        $this->application->expectedSalary = $request->input('expectedSalary');
        $this->application->picture = $pictureFileName;
        $this->application->cv = $cvFileName;
        $this->application->submissionDate = date("Y-m-d");
        $this->application->save();
    }

    public function findApplicationsByJobId($jobId){
        return $this->application->where('jobId', $jobId)->get();
    }

    public function findApplicationById($applicationId){
        return $this->application->find($applicationId);
    }

    public function deleteApplicationById($applicationId){
        $application = $this->findApplicationById($applicationId);
        if($application->picture) {
            Storage::delete('/uploads/photos/'.$application->picture);
        }
        if($application->cv) {
            Storage::delete('/uploads/cvs/'.$application->cv);
        }
        $application->delete($applicationId);
    }

    public function  ajaxSearchApplication(Request $request){
       // $jobTitle = $request->input('jobTitle');
        $departmentId = $request->input('departmentId');
      //  $minExpectedSalary = $request->input('minExpectedSalary');
      //  $maxExpectedSalary = $request->input('maxExpectedSalary');
        return $applications = $this->application
            ->where('departmentId', 'like', "%".$departmentId."%")
            //->whereBetween('expectedSalary', array($minExpectedSalary, $maxExpectedSalary))
            ->get();
    }

} 