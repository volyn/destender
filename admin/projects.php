<?php
defined( '_JEXEC' ) or die; // No direct access
/**
 * Component projects
 * @author Александр Шевченко
 */
$controller = JControllerLegacy::getInstance( 'projects' );
$controller->execute( JFactory::getApplication()->input->get( 'task' ) );
$controller->redirect();