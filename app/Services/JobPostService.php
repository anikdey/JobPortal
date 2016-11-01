<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/31/2016
 * Time: 3:45 PM
 */

namespace App\Services;

use Symfony\Component\HttpFoundation\Request;
interface JobPostService {

    public function getJobPostWithPagination($itemsPerPage);

    public function getAllJobPost();

    public function saveJobPost(Request $request);

    public function findJobPostById($id);

    public function findJobPostByAutoGeneratedId($jobAutoGeneratedId);

    public function updateJobPostById($id, Request $request);

    public function deleteJobPostById($id);

    public function getLastInsertedId();

    public function generateUniqueJobPostId();
} 