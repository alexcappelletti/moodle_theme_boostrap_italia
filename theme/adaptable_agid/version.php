<?php
// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();                                                                                                
                                                                                                                                    
// This is the version of the plugin. version date (YYYYMMDDrr where rr is the release number)                                                                                               
$plugin->version = '2022072600';                                                                                                    
                                                                                                                                    
// This is the version of Moodle this plugin requires.                                                                              
$plugin->requires  = 2022041900.00; // 4.0 (Build: 20220419).          

$plugin->supported = array(400, 400);

// Adaptable version using SemVer (https://semver.org).
$plugin->release = '4.0.1.0';

// Adaptable maturity (do not use ALPHA or BETA versions in production sites).
$plugin->maturity = ALPHA; 

// This is the component name of the plugin - it always starts with 'theme_'                                                        
// for themes and should be the same as the name of the folder.                                                                     
$plugin->component = 'theme_adaptable_agid';                                                                                                 
                                                                                                                                    
// This is a list of plugins, this plugin depends on (and their versions).                                                          
$plugin->dependencies = [                                                                                                           
    'theme_boost'  => 2022041900,
    'theme_adaptable' => 2022051203                                                                                              
];