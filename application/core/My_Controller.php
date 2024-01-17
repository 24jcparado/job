<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

  function checkSession($user_type=false) {
    if(isset($_SESSION['user'])) {
      if($_SESSION['user']['user_type']!=$user_type) {
        redirect(ucfirst($_SESSION['user']['user_type']));
      }
    } elseif($user_type) {
      redirect('welcome');
    }
  }

  function prompt($message, $type=0) {
    if($type) {
      $_SESSION['error'] = $message;
    } else {
      $_SESSION['success'] = $message;
    }
  }

  function chart(){
    $this->get_model->getPlantilla();
  }

  // function xss($data) {
  //   return $this->security->xss_clean($data);
  // }

  function redirect() {
    redirect($_SERVER['HTTP_REFERER']);
  }

  // function dd($data) {
  //   echo "<pre>";print_r(var_dump($data));die;
  // }

  function upload($file_name){
    // file_name and folder_name is the same
    $name = $_FILES[$file_name]['name'];
    $exname = explode('.', $name);
    $ext = end($exname);
    $location = 'assets/document/'.$file_name.'/'.$_FILES[$file_name]['name'];

    if(file_exists($location)){
      $i = 0;
      list($base, $exts) = explode('.', $name);
      while(file_exists($location)){
        $i++;
        $name = $base.$i.'.'.$exts;
        $location = 'assets/document/'.$file_name.'/'.$name;
      }
    }

    move_uploaded_file($_FILES[$file_name]['tmp_name'], $location);
    return $name;
  }
  function calculateRowspan($result, $value) {
      $count = 0;
      foreach ($result as $row) {
          if ($row['given_name'] == $value) {
              $count++;
          }
      }
      return $count;
  }

}