<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientsController extends Controller
{

  public function getPatient($pid) {
    $response = ['success'=>false];
    if (is_numeric($pid)) {
      $patient = Patient::find($pid);
      if ($patient) {
        $response['success'] = TRUE;
        $response['patient'] = $patient;
      }
    }

    return json_encode($response);
  }
}
