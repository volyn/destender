<?php

// No direct access
defined( '_JEXEC' ) or die;

/**
 * Model to see the current entries
 * @author Александр Шевченко
 */
class ProjectsModelProject extends JModelItem
{
	/**
	 * Method to auto-populate the model state.
	 * @return  void
	 */
	protected function populateState()
	{
		$input = JFactory::getApplication()->input;
		$params = JComponentHelper::getParams( 'com_projects' );
		list( $id, $alias ) = explode( ':', $input->getString( 'id', '' ) );
		$this->setState( 'item.id', $id );
		$this->setState( 'item.alias', str_replace( ':', '-', $alias ) );
		parent::populateState();
	}


	/**
	 * Return a record
	 * @return object
	 * @throws Exception
	 */
	public function getItem()
	{
		$query = $this->getDbo()->getQuery( true )
			->select( '*' )
			->from( '#__projects' )
			->where( 'published=1' )
			->where( 'id=' .  $this->getDbo()->q( $this->getState( 'item.id', 0 ) ) )
			->where( 'alias=' . $this->getDbo()->q( $this->getState( 'item.alias', '' ) ) );
		$item = $this->getDbo()->setQuery( $query )->loadObject();
		if ( empty( $item->id ) ) {
			throw new Exception( 'No entry found', 404 );
		}
		return $item;
	}
}