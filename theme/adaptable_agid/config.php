<?php

// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();

global $PAGE;

// $THEME is defined before this page is included and we can define settings by adding properties to this global object.            

// The first setting we need is the name of the theme. This should be the last part of the component name, and the same             
// as the directory name for our theme.                                                                                             
// The plugin internal name.
$THEME->name = 'adaptable_agid';   

/* Set up regions for individual pages.  This is done
   to avoid being able to move regions (when configuring)
   to non-existent block regions for the page .  This is because
   Moodle shows all regions available even if they aren't used
   on that specific page. Please note that frontpage and dashboard
   page use $frontlayoutregions to avoid losing existing regions that
   are renamed. */

// The frontpage regions.
$frontlayoutregions = array(
    'side-post',
    'frnt-footer',
    'frnt-market-a',
    'frnt-market-b',
    'frnt-market-c',
    'frnt-market-d',
    'frnt-market-e',
    'frnt-market-f',
    'frnt-market-g',
    'frnt-market-h',
    'frnt-market-i',
    'frnt-market-j',
    'frnt-market-k',
    'frnt-market-l',
    'frnt-market-m',
    'frnt-market-n',
    'frnt-market-o',
    'frnt-market-p',
    'frnt-market-q',
    'frnt-market-r',
    'frnt-market-s',
    'frnt-market-t',
    'news-slider-a',
    'course-tab-one-a',
    'course-tab-two-a',
    'my-tab-one-a',
    'my-tab-two-a',
    'course-section-a'
);

// The course page regions.
$courselayoutregions = array(
    'side-post',
    'frnt-footer',
    'course-top-a',
    'course-top-b',
    'course-top-c',
    'course-top-d',
    'news-slider-a',
    'course-tab-one-a',
    'course-tab-two-a',
    'my-tab-one-a',
    'my-tab-two-a',
    'course-bottom-a',
    'course-bottom-b',
    'course-bottom-c',
    'course-bottom-d',
    'course-section-a'
);

$standardregions = array('side-post');
$regions = $standardregions;

if ( (is_object($PAGE)) && ($PAGE->pagelayout) ) {
    switch ($PAGE->pagelayout) {
        case "frontpage":
            $regions = $frontlayoutregions;
            break;
        case "mycourses":
            $regions = $courselayoutregions;
            break;
        case "mydashboard":
            $regions = $frontlayoutregions;
            break;
        case "course":
            $regions = $courselayoutregions;
            break;
    }
}

// The theme HTML DOCTYPE.
$THEME->doctype = 'html5';
// This is a critical setting. We want to inherit from theme_boost because it provides a great starting point for SCSS bootstrap4   
// themes. We could add more than one parent here to inherit from multiple parents, and if we did they would be processed in        
// order of importance (later themes overriding earlier ones). Things we will inherit from the parent theme include                 
// styles and mustache templates and some (not all) settings.                                                                       
$THEME->parents = ['adaptable'];                                                                                                        
                                                                       

                                                                                                                                    
// This setting list the style sheets we want to include in our theme. Because we want to use SCSS instead of CSS - we won't        
// list any style sheets. If we did we would list the name of a file in the /style/ folder for our theme without any css file      
// extensions.                                                                                                                      
//$THEME->sheets = [];                                                                                                                
                                                                                                                                    
// This is a setting that can be used to provide some styling to the content in the TinyMCE text editor. This is no longer the      
// default text editor and "Atto" does not need this setting so we won't provide anything. If we did it would work the same         
// as the previous setting - listing a file in the /styles/ folder.                                                                 
//$THEME->editor_sheets = ["journal"];                                                                                                         
                                                                                                                                    
                                                             
// A dock is a way to take blocks out of the page and put them in a persistent floating area on the side of the page. Boost         
// does not support a dock so we won't either - but look at bootstrapbase for an example of a theme with a dock.                    
//$THEME->enable_dock = false;          

// Styles.
// $THEME->sheets = array(
//     'custom'
// );

//$THEME->supportscssoptimisation = false;
                                                                                                                                    
// This is an old setting used to load specific CSS for some YUI JS. We don't need it in Boost based themes because Boost           
// provides default styling for the YUI modules that we use. It is not recommended to use this setting anymore.                     
$THEME->yuicssmodules = array();                                                                                                    
$THEME->editor_sheets = array();

// $THEME->plugins_exclude_sheets = array(
//     'block' => array(
//         'html',
//     )
// );

// Disabling block docking.
//$THEME->enable_dock = false;

// Call the renderer.
// Most themes will use this rendererfactory as this is the one that allows the theme to override any other renderer.               
$THEME->rendererfactory = 'theme_overridden_renderer_factory';                                                                      
                                                                                                                                    
// This is a list of blocks that are required to exist on all pages for this theme to function correctly. For example               
// bootstrap base requires the settings and navigation blocks because otherwise there would be no way to navigate to all the        
// pages in Moodle. Boost does not require these blocks because it provides other ways to navigate built into the theme.            
$THEME->requiredblocks = '';   

// This is a feature that tells the blocks library not to use the "Add a block" block. We don't want this in boost based themes because
// it forces a block region into the page when editing is enabled and it takes up too much room.
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;

$THEME->hidefromselector = false; 

// This is the function that returns the SCSS source for the main file in our theme. We override the boost version because          
// we want to allow presets uploaded to our own theme file area to be selected in the preset list.                                  
// $THEME->scss = function($theme) {                                                                                                   
//     return theme_adaptable_agid_get_agid($theme);                                                                               
// };
//$THEME->sheets = ['theme'];
//$THEME->javascripts_footer = array('theme');

// $THEME->layouts = array(
//         // Most backwards compatible layout without the blocks - this is the layout used by default.
//     'base' => array(
//         'file' => 'columns2.php',
//         'regions' => array(),
//     ),
//     // Standard layout with blocks, this is recommended for most pages with general information.
//     'standard' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-post'),
//         'defaultregion' => 'side-post',
//     ),
//     // Main course page.
//     'course' => array(
//         'file' => 'course.php',
//         'regions' => $regions,
//         'defaultregion' => 'side-post',
//         'options' => array('langmenu' => true),
//     ),
//     'coursecategory' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-post'),
//         'defaultregion' => 'side-post',
//     ),
//     // Part of course, typical for modules - default page layout if $cm specified in require_login().
//     'incourse' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-post', 'course-section-a'),
//         'defaultregion' => 'side-post',
//     ),
//     // The site home page.
//     'frontpage' => array(
//         'file' => 'frontpage.php',
//         'regions' => $regions,
//         'defaultregion' => 'side-post'
//     ),
//     // Server administration scripts.
//     'admin' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-post'),
//         'defaultregion' => 'side-post',
//     ),
//         // My courses page.
//     'mycourses' => array(
//         'file' => 'dashboard.php',
//         'regions' => $regions,
//         'defaultregion' => 'side-post',
//         'options' => array('langmenu' => true),
//     ),
//     // My dashboard page.
//     'mydashboard' => array(
//         'file' => 'dashboard.php',
//         'regions' => $regions,
//         'defaultregion' => 'side-post',
//         'options' => array('langmenu' => true),
//     ),
//     // My public page.
//     'mypublic' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-post'),
//         'defaultregion' => 'side-post'
//     ),
//     // Login page.
//     'login' => array(
//         'file' => 'login.php',
//         'regions' => array(),
//         'options' => array('langmenu' => true, 'nonavbar' => true),
//     ),
//     // Pages that appear in pop-up windows - no navigation, no blocks, no header.
//     'popup' => array(
//         'file' => 'columns1.php',
//         'regions' => array(),
//         'options' => array('nofooter' => true, 'nonavbar' => true),
//     ),
//     // No blocks and minimal footer - used for legacy frame layouts only!
//     'frametop' => array(
//         'file' => 'columns1.php',
//         'regions' => array(),
//         'options' => array('nofooter' => true, 'nocoursefooter' => true),
//     ),
//     // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible.
//     'embedded' => array(
//         'file' => 'embedded.php',
//         'regions' => array()
//     ),
//     /* Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
//        This must not have any blocks, and it is good idea if it does not have links to
//        other places - for example there should not be a home link in the footer... */
//     'maintenance' => array(
//         'file' => 'maintenance.php',
//         'regions' => array(),
//         'options' => array('nofooter' => true, 'nonavbar' => true, 'nocoursefooter' => true, 'nocourseheader' => true),
//     ),

//     // Should display the content and basic headers only.
//     'print' => array(
//         'file' => 'columns1.php',
//         'regions' => array(),
//         'options' => array('nofooter' => true, 'nonavbar' => false),
//     ),
//     // The pagelayout used when a redirection is occuring.
//     'redirect' => array(
//         'file' => 'embedded.php',
//         'regions' => array(),
//     ),
//     // The pagelayout used for reports.
//     'report' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-post'),
//         'defaultregion' => 'side-post',
//     ),
//     // The pagelayout used for safebrowser and securewindow.
//     'secure' => array(
//         'file' => 'secure.php',
//         'regions' => array('side-post', 'course-section-a'),
//         'options' => array('nofooter' => true, 'nonavbar' => true),
//         'defaultregion' => 'side-post',
//     ),
// );

// Select the opposite sidebar when switch to RTL.
// $THEME->blockrtlmanipulations = array(
//     'side-pre' => 'side-post',
//     'side-post' => 'side-pre'
// );

// $THEME->scss = function(theme_config $theme) {
//     return theme_adaptable_agid_get_agid($theme);
// };

// //$THEME->csspostprocess = 'theme_adaptable_agid_process_customcss';
// $THEME->haseditswitch = false;
// $THEME->usescourseindex = false;
