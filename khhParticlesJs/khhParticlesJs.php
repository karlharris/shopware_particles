<?php

namespace khhParticlesJs;

use Shopware\Components\Plugin;
use Enlight_Event_EventArgs;
use Shopware\Components\Theme\LessDefinition;
use Doctrine\Common\Collections\ArrayCollection;

class khhParticlesJs extends Plugin
{
	/**
     * subscribe events
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
    	return [
    		'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onPostDispatchSecure',
    		'Theme_Compiler_Collect_Plugin_Less' 					=> 'addLessFiles',
            'Theme_Compiler_Collect_Plugin_Javascript' 				=> 'addJsFiles'
    	];
    } // end getSubscribedEvents()

    /**
     * add particles.js div
     *
     * @param Enlight_Event_EventArgs 	$args
     *
     * @return void
     */
    public function onPostDispatchSecure(Enlight_Event_EventArgs $args)
    {
    	$controller = $args->get('subject');
    	$controller->View()->addTemplateDir($this->getPath().'/Resources/views');
    } // end onPostDispatchSecure()

    /**
     * add custom less files to compiler
     *
     * @param Enlight_Event_EventArgs   $args
     * @return array
     */
    public function addLessFiles(Enlight_Event_EventArgs $args)
    {
    	$addLessFiles = array(
    		__DIR__.'/Resources/views/frontend/_public/src/less/particles.less'
    	);

    	$less = new LessDefinition([], $addLessFiles);
    	return new ArrayCollection([$less]);
    } // end addLessFiles()

    /**
     * add js files
     *
     * @param Enlight_Event_EventArgs  $args
     *
     * @return ArrayCollection
     */
    public function addJsFiles(Enlight_Event_EventArgs $args)
    {
		return new ArrayCollection([
			__DIR__.'/Resources/views/frontend/_public/src/js/particles.js',
			__DIR__.'/Resources/views/frontend/_public/src/js/particles.custom.js'
		]);
    } // end addJsFiles()
} // end khhParticlesJs

?>