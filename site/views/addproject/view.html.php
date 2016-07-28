<?php
// No direct access
defined( '_JEXEC' ) or die;

/**
 * View for  current element
 * @author Александр Шевченко
 */
class ProjectsViewAddproject extends JViewLegacy
{
	/**
	 * @var $form JForm
	 */
	public $form;
	/**
	 * @var $item stdClass
	 */
	public $item;
	/**
	 * @var $state JObject
	 */
	public $state;

	/**
	 * Method of display current template
	 * @param type $tpl
	 */
	public function display( $tpl = null )
	{
		$this->item = $this->get( 'Item' );
		$this->form = $this->get( 'Form' );
		$this->state = $this->get( 'State' );
		$this->loadHelper( 'projects' );
		projectsHelper::setDocument( 'view title', $this->baseurl );
		parent::display( $tpl );
	}

}