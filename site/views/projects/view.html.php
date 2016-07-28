<?php
// No direct access
defined( '_JEXEC' ) or die;

/**
 * View for  current element
 * @author Александр Шевченко
 */
class ProjectsViewProjects extends JViewLegacy
{
	/**
	 * @var $items stdClass[]
	 */
	public $items;
	/**
	 * @var $pagination JPagination
	 */
	public $pagination;
	/**
	 * @var $state JObject
	 */
	public $state;

	/**
	 * Execute and display a template script.
	 * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
	 * @return  mixed  A string if successful, otherwise a Error object.
	 */
	public function display( $tpl = null )
	{
		$this->items = $this->get( 'Items' );
		$this->pagination = $this->get( 'Pagination' );
		$this->state = $this->get( 'State' );
		$this->loadHelper( 'projects' );
		projectsHelper::setDocument( 'view title', $this->baseurl );
		parent::display( $tpl );
	}
}