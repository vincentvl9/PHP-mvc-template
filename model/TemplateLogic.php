<?php
require_once 'model/DataHandler.php';

class TemplateLogic
{

  public function __construct()
  {
    $this->DataHandler = new DataHandler("localhost", "mysql", "test", "root", "");
  }
  public function __destruct()
  { }

  public function readTemplates()
  {
    try {
      $sql = "SELECT * FROM Templates";
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }

  public function readPages($position, $items_per_page)
  {
		$sql = "SELECT * FROM Templates LIMIT $position,$items_per_page";
		$pages = $this->DataHandler->countPages('SELECT COUNT(*) FROM Templates');
    $result = $this->DataHandler->readsData($sql);
    return $result;
  }

  public function searchTemplate()
  {
    
    $result = 'Hello from TemplateLogic! <br />';
    //$search["search"]
    //$sql = "SELECT * FROM Templates WHERE Template_name LIKE '%$search_value%' OR other_Template_details LIKE '%$search_value%'";
    //$result = $this->DataHandler->searchData($sql);
    // $result = $this->DataHandler->readsData($sql);
    return $result;
  }

  public function readTemplate($id)
  {
    try {
      $sql = "SELECT * FROM Templates WHERE Template_id = " . $id;
      $result = $this->DataHandler->readsData($sql);
      return $result;
    } catch (exception $e) {
      throw $e;
    }
  }


//   Change to fit your database and/or view
  public function createTemplate($formData)
  {
    $Template_type_code = $formData["Template_type_code"];
    $supplier_id = $formData["supplier_id"];
    $Template_name = $formData["Template_name"];
    $Template_price = $formData["Template_price"];
    $other_Template_details = $formData["other_Template_details"];

    try {
      $sql = "INSERT INTO Templates (Template_id, Template_type_code, supplier_code, Template_name, Template_price, other_Template_details)
        VALUES ('' ,'$Template_type_code' ,'$supplier_id' ,'$Template_name' ,'$Template_price' ,'$other_Template_details')";
      $result = $this->DataHandler->createData($sql);
      return $result = 1 ? "Template succesvol aangemaakt" : "Er is wat fout gegaan bij het aanmaken van het Template";
    } catch (exception $e) {
      throw $e;
    }
  }
}