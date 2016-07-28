<?php
defined( '_JEXEC' ) or die; // No direct access

/**
 * Default Controller
 * @author Александр Шевченко
 */
class ProjectsController extends JControllerLegacy
{
	/**
	 * Methot to load and display current view
	 * @param Boolean $cachable
	 */
	function display( $cachable = false, $urlparams = array())
	{
		$this->default_view = 'projects';
		parent::display( $cachable, $urlparams);
	}

}