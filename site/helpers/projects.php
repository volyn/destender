<?php

// No direct access
defined( '_JEXEC' ) or die;

/**
 * Component helper
 * @author Александр Шевченко
 */
class ProjectsHelper
{
	/**
	* @var array $menuIds  List Id depending of view component
	*/
	static $menuIds = array();
	
	/**
	* Create sef links
	* @param $option string
	* @param $view string
	* @param $query string
	* @return string link
	* @throws Exception
	*/
	static function getRoute( $option, $view, $query = '' )
	{
		if ( empty( self::$menuIds[$option . '.' . $view] ) ) {
			$items = JMenuSite::getInstance( 'site' )->getItems( 'component', $option );
			foreach ( $items as $item ) {
				if ( isset( $item->query['view'] ) && $item->query['view'] === $view ) {
					self::$menuIds[$option . '.' . $view] = $item->id;
				}
			}
		}
		return JRoute::_( 'index.php?view=' . $view . $query . '&Itemid=' . self::$menuIds[$option . '.' . $view] );
	}

	static function setDocument( $title = '', $basepath, $metadesc = '', $metakey = '' )
	{
		$doc = JFactory::getDocument();
		$doc->addScript( $basepath . '/components/com_projects/assets/scripts/projects.js' );
		$doc->addStyleSheet( $basepath . '/components/com_projects/assets/styles/projects.css' );
		$app = JFactory::getApplication();
		if ( empty( $title ) ) {
			$title = $app->get( 'sitename' );
		} elseif ( $app->get( 'sitename_pagetitles', 0 ) == 1 ) {
			$title = JText::sprintf( 'JPAGETITLE', $app->get( 'sitename' ), $title );
		} elseif ( $app->get( 'sitename_pagetitles', 0 ) == 2 ) {
			$title = JText::sprintf( 'JPAGETITLE', $title, $app->get( 'sitename' ) );
		}
		$doc->setTitle( $title );
		if ( trim( $metadesc ) ) {
			$doc->setDescription( $metadesc );
		}
		if ( trim( $metakey ) ) {
			$doc->setMetaData( 'keywords', $metakey );
		}
	}

}