<?php
require_once 'model/TemplateLogic.php';
require_once 'model/HtmlModel.php';

class TemplatesController
{
	public function __construct()
	{
		$this->TemplateLogic = new TemplateLogic();
		$this->HtmlModel = new HtmlModel();
	}

	public function __destruct()
	{ }
	public function handleRequest()
	{
		try {
			$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
			switch ($op) {
				case 'getTemplateForm':
					$this->collectCreateTemplateForm();
					break;
				case 'search':
					$this->collectSearchTemplate();
					break;
				case 'createTemplate':
					$this->collectCreateTemplate();
					break;
				case 'TemplateDetails':
					$this->collectTemplate($_REQUEST['id']);
					break;
				case 'readpage':
					$this->collectTemplatePages($_REQUEST['p']);
					break;
				default:
					$this->collectReadTemplates();
					break;
			}
		} catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
	}
	public function collectCreateTemplateForm()
	{
		//include 'view/createTemplateForm.php';
	}
	public function collectCreateTemplate()
	{
		// $formData = $_REQUEST;
		// $createTemplate = $this->TemplatesLogic->createTemplate($formData);
		// include 'view/createTemplate.php';
	}
	public function collectTemplate($id)
	{
		// $TemplateDetails = $this->TemplatesLogic->readTemplate($id);
		// include 'view/TemplateDetail.php';
	}
	public function collectSearchTemplate()
	{
		// $search = $_REQUEST;
		// $Templates = $this->TemplatesLogic->searchTemplate($search);
		// $TemplatesSearch = $this->htmlController->search();
		// $TemplatesTable = $this->htmlController->createTable($Templates);
		// include 'view/Template.php';
	}

	public function collectReadTemplates()
	{
		// $Templates = $this->TemplatesLogic->readTemplates();
		// $TemplatesSearch = $this->htmlController->search();
		// $TemplatesTable = $this->htmlController->createTable($Templates);
		// include 'view/Template.php';
	}

	public function collectTemplatePages()
	{
		// $items_per_page = 4;
		// $position = (($_REQUEST['p'] - 1) * $items_per_page);
		// $result = $this->TemplatesLogic->readPages($position, $items_per_page);
		// return $result;
		// include 'view/Template.php';
	}
}