<?php
// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();                                                                                                
                                                                                                                                    
// A description shown in the admin theme selector.                                                                                 
$string['choosereadme'] = 'Theme sample is a child theme of Boost. Done by alex for testing.';                
// The name of our plugin.                                                                                                          
$string['pluginname'] = 'sample';                                                                                                    
// We need to include a lang string for each block region.                                                                          
$string['region-side-pre'] = 'Right';