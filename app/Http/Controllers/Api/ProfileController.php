<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

  /**
   * API endpoint api/user-list to get a list of users
   * @return string
   */
  public function getList() {
    $users = User::get();

    $response = [
      'success' => TRUE,
      'list' => $users
    ];
    return json_encode($response);
  }


  public function getProfile($uid) {
    $response = ['success'=>false];

    if (is_numeric($uid)) {
      $user = User::find($uid);
      if ($user) {
        $response['success'] = TRUE;
        $response['profile'] = $user->profile;
      }
    }

    return json_encode($response);
  }

  public function postSave(Request $request, $uid) {
    $response = ['success'=>false, 'message'=>''];

    if (is_numeric($uid)) {
      $user = User::find($uid);
      if ($user) {
        $profile = $user->profile;
        $response['profile'] = $profile;
        $validator = $this->profileValidator($request->all());
        if (!$validator->fails()) {
          $profile->update($request->all());
          $response['success'] = TRUE;
        } else {
          $response['error_message'] = 'Validation failed';
        }
      }
    }

    return json_encode($response);
  }

  /**
   * Create/Edit recurly category validator
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function profileValidator(array $data) {
    $rules = [
      'first_name' => 'required|string|max:128',
      'last_name' => 'required|string|max:128',
    ];
    return Validator::make($data, $rules);
  }
}
