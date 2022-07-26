<?php
// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();                                                                                                
                                                                                                                                    
// A description shown in the admin theme selector.                                                                                 
$string['choosereadme'] = 'Theme adaptable_agid is a child theme of Boost. Done by alex for testing bootstrap themes.';                
// The name of our plugin.                                                                                                          
$string['pluginname'] = 'adaptable_agid';                                                                                                    
// We need to include a lang string for each block region.                                                                          
$string['region-side-pre'] = 'Right';


///used in settings.php
$string['advancedsettings'] = 'Advanced settings';                                                                                  
// The brand colour setting.                                                                                                        
$string['brandcolor'] = 'Brand colour';                                                                                             
// The brand colour setting description.                                                                                            
$string['brandcolor_desc'] = 'The accent colour.';     
// Name of the settings pages.                                                                                                      
$string['configtitle'] = 'Photo settings';                                                                                          
// Name of the first settings tab.                                                                                                  
$string['generalsettings'] = 'General settings';                                                                                                                                                                                     
// Preset files setting.                                                                                                            
$string['presetfiles'] = 'Additional theme preset files';                                                                           
// Preset files help text.                                                                                                          
$string['presetfiles_desc'] = 'Preset files can be used to dramatically alter the appearance of the theme. See <a href=https://docs.moodle.org/dev/Boost_Presets>Boost presets</a> for information on creating and sharing your own preset files, and see the <a href=http://moodle.net/boost>Presets repository</a> for presets that others have shared.';
// Preset setting.                                                                                                                  
$string['preset'] = 'Theme preset';                                                                                                 
// Preset help text.                                                                                                                
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';                                                  
// Raw SCSS setting.                                                                                                                
$string['rawscss'] = 'Raw SCSS';                                                                                                    
// Raw SCSS setting help text.                                                                                                      
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';       
// Raw initial SCSS setting.                                                                                                        
$string['rawscsspre'] = 'Raw initial SCSS';                                                                                         
// Raw initial SCSS setting help text.                                                                                              
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';



$string['about'] = 'About';
$string['aboutus'] = 'About Us';
$string['address'] = 'Address';
$string['calendar'] = 'Calendar';

$string['choosereadme'] = '<div class="clearfix"><div class="theme_screenshot"><img class=img-polaroid src="adaptable_agid/pix/screenshot.jpg" /><br/><p></p><h3>Theme Credits</h3><p><h3>Moodle adaptable_agid theme</h3><p>This theme is based on the Boost Moodle theme.</p><p>Authors: LMSACE Dev Team<br>Contact: info@lmsace.com<br>Website: <a href="http://www.lmsace.com">www.lmsace.com</a><br></p>';

$string['configtitle'] = 'adaptable_agid';
$string['connectus'] = 'Connect with us';
$string['contact'] = 'Contact';
$string['copyright_footer'] = 'Copyright';
$string['copyright_default'] = 'Copyright &copy; 2017 - Developed by <a href="http://lmsace.com">LMSACE.com</a>. Powered by <a href="https://moodle.org">Moodle</a>';
$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = 'Whatever CSS rules you add to this textarea will be reflected in every page, making for easier customization of this theme.';
$string['defaultaddress'] = '308 Negra Narrow Lane, Albeeze, New york, 87104';
$string['defaultemailid'] = 'info@example.com';
$string['defaultphoneno'] = '(000) 123-456';
$string['emailid'] = 'Email';
$string['fburl'] = 'Facebook';
$string['fburl_default'] = 'https://www.facebook.com/yourfacebookid';
$string['fburldesc'] = 'The Facebook url of your organisation.';
$string['fcourses'] = 'Featured Courses';
$string['fcoursesdesc'] = 'Please Choose the Featured Courses';
$string['featuredcoursesheading'] = 'Featured Courses';
$string['footbgimg'] = 'Background Image';
$string['footbgimgdesc'] = 'Background Image size should be following size 1345 X 517';
$string['footerheading'] = 'Footer';
$string['footerlogo'] = 'Footer Logo';
$string['footerlogodesc'] = 'Please upload your custom footer logo here if you want to add it to the footer.<br>The image should be 80px high and any reasonable width (minimum:205px) that suits.';
$string['footnote'] = 'Footnote';
$string['footnotedefault'] = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and tronic typesetting, sheets taining Lorem Ipsum passages.</p>';
$string['footnotedesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site.';
$string['frontpageheading'] = 'Front page';
$string['gpurl'] = 'Google+';
$string['gpurl_default'] = 'https://www.google.com/+yourgoogleplusid';
$string['gpurldesc'] = 'The Google+ url of your organisation.';
$string['headerheading'] = 'Header';
$string['generalheading'] = "General";
$string['homebanner'] = 'Home Page Banner';
$string['homebanner_slogan'] = 'We have the largest collection of courses';
$string['homebannerdesc'] = 'The image should be 1345px X 535px.';
$string['infoblockheading'] = 'Info Block';
$string['infoblocktext'] = 'Info Block Text';
$string['infoblocktextdefault'] = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries <a href="javascript:void(0);">ReadMore <i class="fa fa-angle-double-right"></i></a></p>';
$string['infoblocktextdesc'] = 'The text of the info block';
$string['infoblocktitle'] = 'Info Block Title';
$string['infoblocktitledefault'] = 'Who we are';
$string['infoblocktitledesc'] = 'The title of the info block';
$string['infolink'] = 'Info Links';
$string['infolinkdefault'] = 'Moodle community|https://moodle.org
Moodle free support|https://moodle.org/support
Moodle Docs|http://docs.moodle.org|Moodle Docs
Moodle.com|http://moodle.com/';
$string['infolink_desc'] = 'You can configure a custom Info Links here to be shown by themes. Each line consists of some menu text, a link URL (optional), a tooltip title (optional) and a language code or comma-separated list of codes (optional, for displaying the line to users of the specified language only), separated by pipe characters.For example:
<pre> Moodle community|https://moodle.org
Moodle free support|https://moodle.org/support
Moodle development|https://moodle.org/development
Moodle Docs|http://docs.moodle.org|Moodle Docs
German Moodle Docs|http://docs.moodle.org/de|Documentation in German|de
Moodle.com|http://moodle.com/ </pre>';
$string['logo'] = 'Logo';
$string['logodesc'] = 'Please upload your custom logo here if you want to add it to the header. <br>The image should be 50px high and any reasonable width (minimum:235px) that suits.';
$string['newcourses'] = 'New courses';
$string['newsblockcontent'] = 'News & Events Block Content';
$string['newsblockcontentdesc'] = 'Whatever you add to this textarea will be displayed in the News & Events Block.';
$string['newsblockheading'] = 'News & Events Block';
$string['newseventbg'] = 'News & Events Block Background Image';
$string['newseventbgdesc'] = 'The image should be 1345px X 760px.';
$string['newseventcontent'] = '<div class="row"><div class="col-lg-6 col-md-6 col-sm-6"><div class="embed-wrap"><div class="embed-responsive embed-responsive-16by9"><iframe src="https://www.youtube.com/embed/fNE7pyDyw3Y" allowfullscreen="" frameborder="0" height="391" width="545"></iframe></div></div></div><div class="col-lg-6 col-md-6 col-sm-6"><div class="info-wrap"><h2 class="nomargint">news &amp; events of 2015</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, sheets taining Lorem Ipsum passages, and more recently  into electronic typesetting, sheets taining Lorem Ipsum passages, and more recentwith desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><div class="readmore-btn"><a href="#">Read More</a></div></div></div></div>';
$string['numberofslides'] = 'Number of slides';
$string['numberofslides_desc'] = 'Number of slides on the slider.';
$string['numberoftmonials'] = 'Number of Testimonials';
$string['numberoftmonials_desc'] = 'Number of Testimonials on the Home Page.';
$string['phoneno'] = 'Phone No';
$string['pinurl'] = 'Pinterest';
$string['pinurl_default'] = 'https://in.pinterest.com/yourpinterestname/';
$string['pinurldesc'] = 'The Pinterest url of your organisation.';
$string['pluginname'] = 'adaptable_agid';
$string['readmore'] = 'Read More';
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
$string['knowmore'] = 'Know More';
$string['sb1_default_cnt'] = '<p>Lorem Ipsum is simply dummy text of <br class="visible-lg">the printing and typesetting industry.</p>';
$string['sb1_default_title'] = 'Learn Online Courses';
$string['sb2_default_cnt'] = '<p>Lorem Ipsum is simply dummy text of <br class="visible-lg">the printing and typesetting industry.</p>';
$string['sb2_default_title'] = 'Become an Instructor';
$string['sb3_default_cnt'] = '<p>Lorem Ipsum is simply dummy text of <br class="visible-lg">the printing and typesetting industry.</p>';
$string['sb3_default_title'] = 'Enroll Courses';
$string['sb4_default_cnt'] = '<p>Lorem Ipsum is simply dummy text of <br class="visible-lg">the printing and typesetting industry.</p>';
$string['sb4_default_title'] = 'Earn Money';
$string['signup'] = 'Sign up';
$string['sitefblock1'] = 'Site Feature First Block';
$string['sitefblock2'] = 'Site Feature Second Block';
$string['sitefblock3'] = 'Site Feature Third Block';
$string['sitefblock4'] = 'Site Feature Fourth Block';
$string['sitefblockbuttontext'] = 'Link text';
$string['sitefblockbuttontextdesc'] = 'Text to appear on the button.';
$string['sitefblockbuttonurl'] = 'Link URL';
$string['sitefblockbuttonurldesc'] = 'URL the button will point to.';
$string['sitefblockcontent'] = 'Content';
$string['sitefblockcontentdesc'] = 'Content to display in the Site Features Block.  Keep it short and sweet.';
$string['sitefblockimage'] = 'Image';
$string['sitefblockimagedesc'] = 'This provides the option of displaying an image above the text in the Site Features Block';
$string['sitefblockimgcolors'] = 'Image Background colour';
$string['sitefblockimgcolorsdesc'] = 'Change the colours on the Site Feature Blocks Image Background color';
$string['sitefblocksheading'] = 'Site Feature blocks';
$string['sitefblocktitle'] = 'Title';
$string['sitefblocktitledesc'] = 'Title to show in this Site Features Block';
$string['sitefblockurltarget'] = 'Link target';
$string['sitefblockurltargetdesc'] = 'Choose how the link should be opened';
$string['sitefblockurltargetnew'] = 'New page';
$string['sitefblockurltargetparent'] = 'Parent frame';
$string['sitefblockurltargetself'] = 'Current page';
$string['sitefeaturebg'] = 'Site Features Background Image';
$string['sitefeaturebgdesc'] = 'The image should be 1345px X 379px.';
$string['sitenews'] = 'Site News';
$string['slidecapbgcolor'] = 'Slide Caption Background colour';
$string['slidecapbgcolordesc'] = 'What colour the slide caption background should be.';
$string['slidecapcolor'] = 'Slide Caption text colour';
$string['slidecapcolordesc'] = 'What colour the slide caption text should be.';
$string['slidecaption'] = 'Slide caption';
$string['slidecaptiondefault'] = 'Bootstrap Based Slider - {$a->slideno}';
$string['slidecaptiondesc'] = 'Enter the caption text to use for the slide';
$string['slidebuttonurl'] = 'Slide button link';
$string['slidebuttonurldesc'] = 'Enter the target destination of the slide\'s image button link';

$string['slidebutton'] = 'Slider button';
$string['slidebuttondesc'] = 'Enter the target destination of the slide\'s image button text,
either language key or Text.For ex: lang:display or Display';

$string['slideimage'] = 'Slide image';
$string['slideimagedesc'] = 'The image should be 1366px X 385px.';
$string['slidedescbgcolor'] = 'Slide Description Background colour';
$string['slidedescbgcolordesc'] = 'What colour the slide description background should be.';
$string['slidedesccolor'] = 'Slide Description text colour';
$string['slidedesccolordesc'] = 'What colour the slide description text should be.';
$string['slideno'] = 'Slide {$a->slide}';
$string['slidenodesc'] = 'Enter the settings for slide {$a->slide}.';
$string['slideshowdesc'] = 'This creates a slide show of up to twelve slides for you to promote important elements of your site.  The show is responsive where image height is set according to screen size.If no image is selected for a slide, then the default_slide images in the pix folder is used.';
$string['slideshowheading'] = 'Slide show';
$string['slideshowheadingsub'] = 'Slide show for the front page';
$string['slideurl'] = 'Slide link';
$string['slideurldesc'] = 'Enter the target destination of the slide\'s image link';
$string['toggleslideshow'] = 'Slide show display';
$string['toggleslideshowdesc'] = 'Choose if you wish to hide or show the slide show.';
$string['twurl'] = 'Twitter';
$string['twurl_default'] = 'https://twitter.com/yourtwittername';
$string['twurldesc'] = 'The Twitter url of your organisation.';
$string['whoweare_title'] = 'Title';
$string['whoweare_title_default'] = 'Who we are';
$string['whoweare_description'] = 'Description';
$string['whowearedesc'] = '';
$string['whowearedefault'] = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and tronic typesetting, sheets taining Lorem Ipsum passages.<br><a href="#">Read More &raquo;</a></p>';

$string['readmore'] = "ReadMore";
$string['contact_us'] = "Contact us";
$string['info'] = "Info";
$string['phone'] = "Phone";
$string['email'] = "E-mail";
$string['get_social'] = "Get Social";
$string['home'] = "Home";
$string['privacy:metadata'] = 'The adaptable_agid theme does not store any personal data about any user.';