<?php
/**
 * Created by PhpStorm.
 * User: sibin
 * Date: 9/10/2016
 * Time: 12:46 PM
 */

namespace  App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\InternshipField;

class AdminHomeController extends Controller{
  public function __construct(){

  }

  public function index(){
    return view('admin.home.index');
  }
  public function help(){

  }

}