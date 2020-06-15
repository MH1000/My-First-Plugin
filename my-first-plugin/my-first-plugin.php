<?php

/**
 * Plugin Name: My First Plugin
 * Plugin URI: https://www.mathieuherbelet.fr
 * Description: Création de mon premier module WordPress
 * Version: 1.0.0 
 * Author Name: Mathieu HERBELET (mathieu.herbelet@hotmail.fr)  
 * Author: Mathieu HERBELET  
 * Domain Path: /languages  
 * Author URI: https://www.mathieuherbelet.fr/#about
 */


define('MY_FIRST_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));

class MyFirstClass
{
    public $pluginTitle = 'My First Plugin';
    public $pluginSlug = 'my-first-plugin-settings';
    public $pluginIdentifier = 'my-first-plugin';


    public function __construct()
    {
        add_action('admin_menu', [$this, 'admin_first_plugin_menu']);
        add_action('plugins_loaded', [$this, 'load_plugin_text_domain']);
    }

    /**
     * Ajout d'une page à l'administration ainsi qu’un menu associé grâce au plugin
     */
    public function admin_first_plugin_menu()
    {
        add_menu_page(
            __($this->pluginTitle, 'my-first-plugin'), // Page title
            __($this->pluginTitle, 'my-first-plugin'), // Menu title
            'manage_options',  // Capability
            $this->pluginSlug, // Slug
            [&$this, 'load_first_plugin_page'] // Callback page function
        );
    }

    /**
     * Inclut le fichier pour la page d'adminstration
     */
    public function load_first_plugin_page()
    {
        require_once MY_FIRST_PLUGIN_DIR_PATH . 'views/page.php';
    }

    /**
     * Chargement du domaine de texte, traduction des textes en français
     */
    public function load_plugin_text_domain()
    {
        load_plugin_textdomain($this->pluginIdentifier, FALSE, dirname(plugin_basename(__FILE__)) . '/languages/');
    }
}

new MyAwesomeClass();
