<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public $successStatus = 200;
function register(Request $req){
    $user= new User;
    $user->name=$req->input('name');
    $user->email=$req->input('email');
    $user->password=Hash::make($req->input('password'));
$user->save();
return $req->input();
}


public function login(Request $req){ 
$user =User ::where('email',$req->email)->first();
if(!$user|| !Hash::check($req->password,$user->password)){
    return["error"=>"Email Password Not Match"];
}
return $user;
}


}
