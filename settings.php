
<?php

// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();                                                                                                
                                                                                                                                    
// This is used for performance, we don't need to know about these settings on every page in Moodle, only when                      
// we are looking at the admin settings pages.                                                                                      
if ($ADMIN->fulltree) {                                                                                                             
                                                                                                                                    
    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.                         
    $settings = new theme_boost_admin_settingspage_tabs('themesettingboost_materialized', get_string('configtitle', 'theme_boost_materialized'));             
                                                                                                                                    
    // Each page is a tab - the first is the "General" tab.                                                                         
    $page = new admin_settingpage('theme_boost_materialized_general', get_string('generalsettings', 'theme_boost_materialized'));                             
                                                                                                                                    
    // Replicate the preset setting from boost.                                                                                     
    $name = 'theme_boost_materialized/preset';                                                                                                   
    $title = get_string('preset', 'theme_boost_materialized');                                                                                   
    $description = get_string('preset_desc', 'theme_boost_materialized');                                                                        
    $default = 'default.scss';                                                                                                      
                                                                                                                                    
    // We list files in our own file area to add to the drop down. We will provide our own function to                              
    // load all the presets from the correct paths.                                                                                 
    $context = context_system::instance();                                                                                          
    $fs = get_file_storage();                                                                                                       
    $files = $fs->get_area_files($context->id, 'theme_boost_materialized', 'preset', 0, 'itemid, filepath, filename', false);                    
                                                                                                                                    
    $choices = [];                                                                                                                  
    foreach ($files as $file) {                                                                                                     
        $choices[$file->get_filename()] = $file->get_filename();                                                                    
    }                                                                                                                               
    // These are the built in presets from Boost.                                                                                   
    $choices['default.scss'] = 'default.scss';                                                                                      
    $choices['plain.scss'] = 'plain.scss';                                                                                          
                                                                                                                                    
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);                                     
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
                                                                                                                                    
    // Preset files setting.                                                                                                        
    $name = 'theme_boost_materialized/presetfiles';                                                                                              
    $title = get_string('presetfiles','theme_boost_materialized');                                                                               
    $description = get_string('presetfiles_desc', 'theme_boost_materialized');                                                                   
                                                                                                                                    
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,                                         
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));                                                               
    $page->add($setting);     

    // Variable $brand-color.                                                                                                       
    // We use an empty default value because the default colour should come from the preset.                                        
    $name = 'theme_boost_materialized/brandcolor';                                                                                               
    $title = get_string('brandcolor', 'theme_boost_materialized');                                                                               
    $description = get_string('brandcolor_desc', 'theme_boost_materialized');                                                                    
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
                                                                                                                                    
    // Must add the page after definiting all the settings!                                                                         
    $settings->add($page);                                                                                                          
                                                                                                                                    
    // Advanced settings.                                                                                                           
    $page = new admin_settingpage('theme_boost_materialized_advanced', get_string('advancedsettings', 'theme_boost_materialized'));                           
                                                                                                                                    
    // Raw SCSS to include before the content.                                                                                      
    $setting = new admin_setting_configtextarea('theme_boost_materialized/scsspre',                                                              
        get_string('rawscsspre', 'theme_boost_materialized'), get_string('rawscsspre_desc', 'theme_boost_materialized'), '', PARAM_RAW);                      
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
                                                                                                                                    
    // Raw SCSS to include after the content.                                                                                       
    $setting = new admin_setting_configtextarea('theme_boost_materialized/scss', get_string('rawscss', 'theme_boost_materialized'),                           
        get_string('rawscss_desc', 'theme_boost_materialized'), '', PARAM_RAW);                                                                  
    $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
    $page->add($setting);                                                                                                           
                                                                                                                                    
    $settings->add($page);                        
}
// if (is_siteadmin()) {

//     $settings = new theme_boost_admin_settingspage_tabs('themesettingboost_materialized', get_string('configtitle', 'theme_boost_materialized'));
//     $ADMIN->add('themes', new admin_category('theme_boost_materialized', 'boost_materialized'));

//     /* Header Settings */
//     $temp = new admin_settingpage('theme_boost_materialized_header', get_string('generalheading', 'theme_boost_materialized'));

//     // Logo file setting.
//     $name = 'theme_boost_materialized/logo';
//     $title = get_string('logo', 'theme_boost_materialized');
//     $description = get_string('logodesc', 'theme_boost_materialized');
//     $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
//     $setting->set_updatedcallback('theme_reset_all_caches');
//     $temp->add($setting);

//     // Custom CSS file.
//     $name = 'theme_boost_materialized/customcss';
//     $title = get_string('customcss', 'theme_boost_materialized');
//     $description = get_string('customcssdesc', 'theme_boost_materialized');
//     $default = '';
//     $setting = new admin_setting_configtextarea($name, $title, $description, $default);
//     $setting->set_updatedcallback('theme_reset_all_caches');
//     $temp->add($setting);

//     $settings->add($temp);

//     /* Front Page Settings */
//     $temp = new admin_settingpage('theme_boost_materialized_frontpage', get_string('frontpageheading', 'theme_boost_materialized'));

//      // Who we are title.
//     $name = 'theme_boost_materialized/whoweare_title';
//     $title = get_string('whoweare_title', 'theme_boost_materialized');
//     $description = '';
//     $default = get_string('whoweare_title_default', 'theme_boost_materialized');
//     $setting = new admin_setting_configtext($name, $title, $description, $default);
//     $temp->add($setting);

//      // Who we are content.
//     $name = 'theme_boost_materialized/whoweare_description';
//     $title = get_string('whoweare_description', 'theme_boost_materialized');
//     $description = get_string('whowearedesc', 'theme_boost_materialized');
//     $default = get_string('whowearedefault', 'theme_boost_materialized');
//     $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
//     $temp->add($setting);

//     $settings->add($temp);

//     /* Slideshow Settings Start */
//     $temp = new admin_settingpage('theme_boost_materialized_slideshow', get_string('slideshowheading', 'theme_boost_materialized'));
//     $temp->add(new admin_setting_heading('theme_boost_materialized_slideshow', get_string('slideshowheadingsub', 'theme_boost_materialized'),
//         format_text(get_string('slideshowdesc', 'theme_boost_materialized'), FORMAT_MARKDOWN)));

//     // Display Slideshow.
//     $name = 'theme_boost_materialized/toggleslideshow';
//     $title = get_string('toggleslideshow', 'theme_boost_materialized');
//     $description = get_string('toggleslideshowdesc', 'theme_boost_materialized');
//     $yes = get_string('yes');
//     $no = get_string('no');
//     $default = 1;
//     $choices = array(1 => $yes , 0 => $no);
//     $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
//     $temp->add($setting);

//     // Number of slides.
//     $name = 'theme_boost_materialized/numberofslides';
//     $title = get_string('numberofslides', 'theme_boost_materialized');
//     $description = get_string('numberofslides_desc', 'theme_boost_materialized');
//     $default = 1;
//     $choices = array(
//         1 => '1',
//         2 => '2',
//         3 => '3',
//         4 => '4',
//         5 => '5',
//         6 => '6',
//         7 => '7',
//         8 => '8',
//         9 => '9',
//         10 => '10',
//         11 => '11',
//         12 => '12',
//     );
//     $temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

//     $numberofslides = get_config('theme_boost_materialized', 'numberofslides');
//     for ($i = 1; $i <= $numberofslides; $i++) {

//         // This is the descriptor for Slide One.
//         $name = 'theme_boost_materialized/slide' . $i . 'info';
//         $heading = get_string('slideno', 'theme_boost_materialized', array('slide' => $i));
//         $information = get_string('slidenodesc', 'theme_boost_materialized', array('slide' => $i));
//         $setting = new admin_setting_heading($name, $heading, $information);
//         $temp->add($setting);

//         // Slide Image.
//         $name = 'theme_boost_materialized/slide' . $i . 'image';
//         $title = get_string('slideimage', 'theme_boost_materialized');
//         $description = get_string('slideimagedesc', 'theme_boost_materialized');
//         $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
//         $setting->set_updatedcallback('theme_reset_all_caches');
//         $temp->add($setting);

//         // Slide Caption.
//         $name = 'theme_boost_materialized/slide' . $i . 'caption';
//         $title = get_string('slidecaption', 'theme_boost_materialized');
//         $description = get_string('slidecaptiondesc', 'theme_boost_materialized');
//         $default = get_string('slidecaptiondefault', 'theme_boost_materialized', array('slideno' => sprintf('%02d', $i) ));
//         $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
//         $temp->add($setting);

//         // Slider button.
//         $name = 'theme_boost_materialized/slide' . $i . 'urltext';
//         $title = get_string('slidebutton', 'theme_boost_materialized');
//         $description = get_string('slidebuttondesc', 'theme_boost_materialized');
//         $default = 'lang:knowmore';
//         $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
//         $temp->add($setting);

//         // Slide Description Text.
//         $name = 'theme_boost_materialized/slide' . $i . 'url';
//         $title = get_string('slideurl', 'theme_boost_materialized');
//         $description = get_string('slideurldesc', 'theme_boost_materialized');
//         $default = 'http://www.example.com/';
//         $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
//         $temp->add($setting);

//     }

//     /* Slideshow Settings End*/

//     $settings->add($temp);

//     /* Footer Settings start */
//     $temp = new admin_settingpage('theme_boost_materialized_footer', get_string('footerheading', 'theme_boost_materialized'));

//     // Footer Logo file setting.
//     $name = 'theme_boost_materialized/footerlogo';
//     $title = get_string('footerlogo', 'theme_boost_materialized');
//     $description = get_string('footerlogodesc', 'theme_boost_materialized');
//     $setting = new admin_setting_configstoredfile($name, $title, $description, 'footerlogo');
//     $setting->set_updatedcallback('theme_reset_all_caches');
//     $temp->add($setting);

//     /* Footer Content */
//     $name = 'theme_boost_materialized/footnote';
//     $title = get_string('footnote', 'theme_boost_materialized');
//     $description = get_string('footnotedesc', 'theme_boost_materialized');
//     $default = get_string('footnotedefault', 'theme_boost_materialized');
//     $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
//     $temp->add($setting);

//     // INFO Link.
//     $name = 'theme_boost_materialized/infolink';
//     $title = get_string('infolink', 'theme_boost_materialized');
//     $description = get_string('infolink_desc', 'theme_boost_materialized');
//     $default = get_string('infolinkdefault', 'theme_boost_materialized');
//     $setting = new admin_setting_configtextarea($name, $title, $description, $default);
//     $temp->add($setting);

//     // Copyright.
//     $name = 'theme_boost_materialized/copyright_footer';
//     $title = get_string('copyright_footer', 'theme_boost_materialized');
//     $description = '';
//     $default = get_string('copyright_default', 'theme_boost_materialized');
//     $setting = new admin_setting_configtext($name, $title, $description, $default);
//     $temp->add($setting);

//     /* Address , Email , Phone No */
//     $name = 'theme_boost_materialized/address';
//     $title = get_string('address', 'theme_boost_materialized');
//     $description = '';
//     $default = get_string('defaultaddress', 'theme_boost_materialized');
//     $setting = new admin_setting_configtext($name, $title, $description, $default);
//     $temp->add($setting);

//     $name = 'theme_boost_materialized/emailid';
//     $title = get_string('emailid', 'theme_boost_materialized');
//     $description = '';
//     $default = get_string('defaultemailid', 'theme_boost_materialized');
//     $setting = new admin_setting_configtext($name, $title, $description, $default);
//     $temp->add($setting);

//     $name = 'theme_boost_materialized/phoneno';
//     $title = get_string('phoneno', 'theme_boost_materialized');
//     $description = '';
//     $default = get_string('defaultphoneno', 'theme_boost_materialized');
//     $setting = new admin_setting_configtext($name, $title, $description, $default);
//     $temp->add($setting);

//     /* Facebook, Pinterest, Twitter, Google+ Settings */
//     $name = 'theme_boost_materialized/fburl';
//     $title = get_string('fburl', 'theme_boost_materialized');
//     $description = get_string('fburldesc', 'theme_boost_materialized');
//     $default = get_string('fburl_default', 'theme_boost_materialized');
//     $setting = new admin_setting_configtext($name, $title, $description, $default);
//     $temp->add($setting);

//     $name = 'theme_boost_materialized/pinurl';
//     $title = get_string('pinurl', 'theme_boost_materialized');
//     $description = get_string('pinurldesc', 'theme_boost_materialized');
//     $default = get_string('pinurl_default', 'theme_boost_materialized');
//     $setting = new admin_setting_configtext($name, $title, $description, $default);
//     $temp->add($setting);

//     $name = 'theme_boost_materialized/twurl';
//     $title = get_string('twurl', 'theme_boost_materialized');
//     $description = get_string('twurldesc', 'theme_boost_materialized');
//     $default = get_string('twurl_default', 'theme_boost_materialized');
//     $setting = new admin_setting_configtext($name, $title, $description, $default);
//     $temp->add($setting);

//     $name = 'theme_boost_materialized/gpurl';
//     $title = get_string('gpurl', 'theme_boost_materialized');
//     $description = get_string('gpurldesc', 'theme_boost_materialized');
//     $default = get_string('gpurl_default', 'theme_boost_materialized');
//     $setting = new admin_setting_configtext($name, $title, $description, $default);
//     $temp->add($setting);

//     $settings->add($temp);
//     /*  Footer Settings end */
// }