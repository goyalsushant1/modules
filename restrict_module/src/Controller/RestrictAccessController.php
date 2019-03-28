<?php

namespace Drupal\restrict_module\Controller;

use \Drupal\Core\Controller\ControllerBase;

class RestrictAccessController extends ControllerBase
{

    /** * Returns a simple page. 
     * 
     *
     *  @return array
     *  A simple renderable array. 
     * 
     * 
     **/
    public function getContentPrint(){
    
    $db = \Drupal::database()
    ->select('node_field_data','data')
    ->fields('data', ['title','type'])->execute()->fetchAll();
    // print_r($resultArray);
    // kint($resultArray);
    // var_dump($resultArray);
    // die();
    // while ($comment = $result->fetchAssoc()) {
    //   print_r($comment);
    // }
    $str = '<table><thead><th>ID</th><th>Name</th></thead>';
    foreach($db as $key)
    {
      $str .='<tr>';
      foreach($key as $subkey)
      {
        $str .='<td>'.$subkey.'</td>';
      }
      $str .='</tr>';
    }
    $str .= '</table>';
    // $strArray = explode('.',$str);
    // foreach ($strArray as $key) {
    //   # code...
    //   echo $key.'<br>';
    // }
    // die();
    return [
      '#type' => '#markup',
      '#markup' => $str,
    ];
    
    }

}