<?php
// No direct access
defined( '_JEXEC' ) or die;

/**
 * Controller
 * @author Александр Шевченко
 */
class ProjectsControllerAddproject extends JControllerForm
{

	/**
	 * Class constructor
	 * @param array $config
	 */
	function __construct( $config = array() )
	{
		$this->view_list = 'Addproject';
		parent::__construct( $config );
	}

	/**
	 * @return bool
	 */
	public function allowSave()
	{
		return true;
	}
	
}