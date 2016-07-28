<?php

// No direct access
defined( '_JEXEC' ) or die;

/**
 * Model to see the current entries
 * @author Александр Шевченко
 */
class ProjectsModelProjects extends JModelList
{
	/**
	 * Method to auto-populate the model state.
	 * @param   string $ordering An optional ordering field.
	 * @param   string $direction An optional direction (asc|desc).
	 * @return  void
	 */
	protected function populateState( $ordering = null, $direction = null )
	{
		parent::populateState( $ordering, $direction );
		$input = JFactory::getApplication()->input;
		$params = JComponentHelper::getParams( 'com_projects' );
		$this->setState( 'list.start', $input->get( 'start' ) );
		$this->setState( 'list.limit', $params->get( 'limit', 10 ) );
	}

	/**
	 * Method for receiving a request to view records
	 * @return JDatabaseQuery
	 */
	protected function getListQuery()
	{
		$query = $this->getDbo()->getQuery( true );
		$query->select( '*' )->from( '#__projects' )->where( 'published=1' );
		return $query;
	}
}