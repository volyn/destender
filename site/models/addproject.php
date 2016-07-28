<?php

// No direct access
defined( '_JEXEC' ) or die;

/**
 * Model for edit/create current element
 * @author Александр Шевченко
 */
class ProjectsModelAddproject extends JModelAdmin
{
	/**
	 * Method of loading the current form
	 * @param Array $data
	 * @param Boolean $loadData
	 * @return Object form data
	 */
	public function getForm( $data = array(), $loadData = true )
	{
		$form = $this->loadForm( '', 'addproject', array( 'control' => 'jform', 'load_data' => $loadData ) );
		if ( empty( $form ) ) {
			return false;
		}
		return $form;
	}

	/**
	 * Method of loading table for current item
	 * @param Sting $type (name table)
	 * @param String $prefix (prefix table)
	 * @param Array $config
	 * @return Tableprojects
	 */
	public function getTable( $type = 'projects', $prefix = 'Table', $config = array() )
	{
		return JTable::getInstance( $type, $prefix, $config );
	}

	/**
	 * Method of loading data to form
	 * @return Object
	 */
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState( 'com_projects.edit.addproject.data', array() );
		if ( empty( $data ) ) {
			$data = $this->getItem();
		}
		return $data;
	}

	/**
	 * save data
	 * @param array $data
	 * @return bool
	 */
	public function save( $data )
	{
		return parent::save( $data );
	}

}