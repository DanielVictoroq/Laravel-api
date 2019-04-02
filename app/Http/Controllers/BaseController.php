<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\Auth;

class BaseController extends Controller
{
    public function JobsGetAll(JobsController $jobs){
        return $jobs->index();
    }
}