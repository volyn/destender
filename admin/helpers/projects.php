<?php

defined( '_JEXEC' ) or die;

/**
 * Class ProjectsHelper
 */
class ProjectsHelper
{
	/**
	 * Добавление подменю
	 * @param String $vName
	 */
	static function addSubmenu( $vName )
	{
		JHtmlSidebar::addEntry(
			JText::_( 'PROJECT_SUBMENU' ),
			'index.php?option=com_projects&view=projects',
			$vName == 'projects' );
		JHtmlSidebar::addEntry(
			JText::_( 'USER_SUBMENU' ),
			'index.php?option=com_projects&view=users',
			$vName == 'users' );
		JHtmlSidebar::addEntry(
			JText::_('JCATEGORIES'),
			'index.php?option=com_categories&extension=com_projects',
			$vName == 'categories');
	}

	/**
	 * Получаем доступные действия для текущего пользователя
	 * @return JObject
	 */
	public static function getActions()
	{
		$user = JFactory::getUser();
		$result = new JObject;
		$assetName = 'com_projects';
		$actions = JAccess::getActions( $assetName );
		foreach ( $actions as $action ) {
			$result->set( $action->name, $user->authorise( $action->name, $assetName ) );
		}
		return $result;
	}
}