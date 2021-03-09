<?php

namespace Drupal\controlfield\customcontroller;

use Drupal\Core\Controller\ControllerBase;

class CustomController extends ControllerBase{
/**
 * 
 */
  public function getCustomData() {
    
    $query = \Drupal::database()->select('simple_form', 'n');
    $query->fields('n', ['name', 'phone', 'email', 'address']);
    $results = $query->execute()->fetchAll();
    $rows=array();

    foreach($results as $data){
      $rows[] = array(
        'name' => $data->name,
        'phone' => $data->phone,
        'email' => $data->email,
        'address' => $data->address,
      );
    }
    return [
      '#theme' => 'table_list',
      '#items' => $rows,
    ];
    
    //  $data = array('1','lalit','lalit');
    //return [
    //  '#theme' => 'table_list',
    //  '#table_data' => $data,
    //];
  }
}