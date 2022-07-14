<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Validators\BaseValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UserController extends Controller
{
}
