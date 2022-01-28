<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * renderers/course_renderer.php
 *
 * @package    theme_boost_materialized
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @author    LMSACE Dev Team , lmsace.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . "/course/renderer.php");

/**
 * boost_materialized theme course renderer class
 *
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class theme_boost_materialized_core_course_renderer extends core_course_renderer {

    /**
     * Create the new course block to display in the frontpage.
     */
    public function new_courses() {
        /* New Courses */
        global $CFG;
        $newcourse = get_string('newcourses', 'theme_boost_materialized');
        $header = '<div id="frontpage-course-list"><h2>'.$newcourse.'</h2><div class="courses frontpage-course-list-all"><div class="row">'; $footer = '</div></div></div>';
        $cocnt = 1;
        $content = '';
        if ($ccc = get_courses('all', 'c.id DESC, c.sortorder ASC', 'c.id, c.shortname, c.visible')) {
            foreach ($ccc as $cc) {
                if ($cocnt > 8) {
                    break;
                }
                if ( $cc->visible == "0" || $cc->id == "1") {
                    continue;
                }
                $courseid = $cc->id;
                $course = get_course($courseid);
                $noimgurl = $this->output->image_url('no-image', 'theme');
                $courseurl = new moodle_url('/course/view.php', array('id' => $courseid ));
                if ($course instanceof stdClass) {
                    $course = new core_course_list_element($course);
                }
                $imgurl = '';
                $context = context_course::instance($course->id);
                foreach ($course->get_course_overviewfiles() as $file) {
                    $isimage = $file->is_valid_image();
                    $imgurl = file_encode_url("$CFG->wwwroot/pluginfile.php",
                    '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
                    $file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
                    if (!$isimage) {
                        $imgurl = $noimgurl;
                    }
                }
                if (empty($imgurl)) {
                    $imgurl = $noimgurl;
                }
                $icon = "fa-angle-double-right";
                if (right_to_left()) {
                    $icon = "fa-angle-double-left";
                }
                $content .= '<div class="col-md-3"><div class="fp-coursebox"><div class="fp-coursethumb"><a href="'.$courseurl.'"><img src="'.$imgurl.'" width="243" height="165" alt=""></a></div><div class="fp-courseinfo"><h5><a href="'.$courseurl.'">'.$course->get_formatted_name().'</a></h5><div class="readmore"><a href="'.$courseurl.'">'.get_string("readmore", "theme_boost_materialized").'<i class="fa '.$icon.'"></i></a></div></div></div></div>';
                if ( ( $cocnt % 4) == "0") {
                    $content .= '<div class="clearfix hidexs"></div>';
                }
                $cocnt++;
            }
        }
        $coursehtml = $header.$content.$footer;
        $frontpage = isset($CFG->frontpage) ? $CFG->frontpage : '';
        $frontpageloggedin = isset($CFG->frontpageloggedin) ? $CFG->frontpageloggedin : '';
        $f1pos = strpos($frontpage, '6');
        $f2pos = strpos($frontpageloggedin, '6');
        $btnhtml = '';
        if ($cocnt <= 1 && !$this->page->user_is_editing() && has_capability('moodle/course:create', context_system::instance())) {
            $btnhtml = $this->add_new_course_button();
        }
        if (!isloggedin() or isguestuser()) {
            if ($f1pos === false) {
                if ($cocnt > 1) {
                    echo $coursehtml;
                }
            }
        } else {
            if ($f2pos === false) {
                echo $coursehtml."<br/>".$btnhtml;
            }
        }
    }

    /**
     * Renderer for the frontpage available course
     * @return type|string
     */
    public function frontpage_available_courses() {
        global $CFG;
        $chelper = new coursecat_helper();
        $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED)->set_courses_display_options(array(
        'recursive' => true,
        'limit' => $CFG->frontpagecourselimit,
        'viewmoreurl' => new moodle_url('/course/index.php'),
        'viewmoretext' => new lang_string('fulllistofcourses')));
        $chelper->set_attributes(array('class' => 'frontpage-course-list-all'));
        $courses = core_course_category::get(0)->get_courses($chelper->get_courses_display_options());
        $totalcount = core_course_category::get(0)->get_courses_count($chelper->get_courses_display_options());
        $courseids = array_keys($courses);
        $newcourse = get_string('availablecourses');
        $header = '<div id="frontpage-course-list"><h2>'.$newcourse.'</h2><div class="courses frontpage-course-list-all"><div class="row">'; $footer = '</div></div></div>';
        $cocnt = 1;
        $content = '';
        if ($ccc = get_courses('all', 'c.sortorder ASC', 'c.id, c.shortname, c.visible')) {
            foreach ($courseids as $courseid) {
                $course = get_course($courseid);
                $noimgurl = $this->output->image_url('no-image', 'theme');
                $courseurl = new moodle_url('/course/view.php', array('id' => $courseid ));
                if ($course instanceof stdClass) {
                    $course = new core_course_list_element($course);
                }
                $imgurl = '';
                $context = context_course::instance($course->id);
                foreach ($course->get_course_overviewfiles() as $file) {
                    $isimage = $file->is_valid_image();
                    $imgurl = file_encode_url("$CFG->wwwroot/pluginfile.php",
                    '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
                    $file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
                    if (!$isimage) {
                        $imgurl = $noimgurl;
                    }
                }
                if (empty($imgurl)) {
                    $imgurl = $noimgurl;
                }
                $icon = "fa-angle-double-right";
                if (right_to_left()) {
                    $icon = "fa-angle-double-left";
                }
                $content .= '<div class="col-md-3"><div class="fp-coursebox"><div class="fp-coursethumb"><a href="'.$courseurl.'"><img src="'.$imgurl.'" width="243" height="165" alt=""></a></div><div class="fp-courseinfo"><h5><a href="'.$courseurl.'">'.$course->get_formatted_name().'</a></h5><div class="readmore"><a href="'.$courseurl.'">'.get_string("readmore", "theme_boost_materialized").'&nbsp; <i class="fa '.$icon.'"></i></a></div></div></div></div>';
                if (($cocnt % 4) == "0") {
                    $content .= '<div class="clearfix hidexs"></div>';
                }
                $cocnt++;
            }
        }
        $coursehtml = $header.$content.$footer;
        echo $coursehtml;
        if (!$totalcount && !$this->page->user_is_editing() && has_capability('moodle/course:create', context_system::instance())) {
            // Print link to create a new course, for the 1st available category.
            echo $this->add_new_course_button();
        }
    }

    /**
     * Renderer the course cat course box from the parent
     *
     * @param coursecat_helper $chelper
     * @param int $course
     * @param string $additionalclasses
     * @return $content
     */
    protected function coursecat_coursebox(coursecat_helper $chelper, $course, $additionalclasses = '') {
        global $CFG;
        if (!isset($this->strings->summary)) {
            $this->strings->summary = get_string('summary');
        }
        if ($chelper->get_show_courses() <= self::COURSECAT_SHOW_COURSES_COUNT) {
            return '';
        }
        if ($course instanceof stdClass) {
            $course = new core_course_list_element($course);
        }
        $content = '';
        $classes = trim('coursebox clearfix '. $additionalclasses);
        if ($chelper->get_show_courses() >= self::COURSECAT_SHOW_COURSES_EXPANDED) {
            $nametag = 'h3';
        } else {
            $classes .= ' collapsed';
            $nametag = 'div';
        }
        // Coursebox.
        if (empty($course->get_course_overviewfiles())) {
            $coursecontent = "content-block";
        } else {
            $coursecontent = "";
        }
        $content .= html_writer::start_tag('div', array(
            'class' => $classes.' '.$coursecontent,
            'data-courseid' => $course->id,
            'data-type' => self::COURSECAT_TYPE_COURSE,
        ));
        $content .= html_writer::start_tag('div', array('class' => 'info'));
        // Course name.
        $coursename = $chelper->get_course_formatted_name($course);
        $coursenamelink = html_writer::link(new moodle_url('/course/view.php', array('id' => $course->id)),
                                            $coursename, array('class' => $course->visible ? '' : 'dimmed'));
        $content .= html_writer::tag($nametag, $coursenamelink, array('class' => 'coursename'));
        // If we display course in collapsed form but the course has summary or course contacts, display the link to the info page.
        $content .= html_writer::start_tag('div', array('class' => 'moreinfo'));
        if ($chelper->get_show_courses() < self::COURSECAT_SHOW_COURSES_EXPANDED) {
            if ($course->has_summary() || $course->has_course_contacts() || $course->has_course_overviewfiles()) {
                $url = new moodle_url('/course/info.php', array('id' => $course->id));
                $image = html_writer::empty_tag('img', array('src' => $this->output->image_url('i/info'),
                    'alt' => $this->strings->summary));
                $content .= html_writer::link($url, $image, array('title' => $this->strings->summary));
                // Make sure JS file to expand course content is included.
                $this->coursecat_include_js();
            }
        }
        $content .= html_writer::end_tag('div'); // Moreinfo.
        // Print enrolmenticons.
        if ($icons = enrol_get_course_info_icons($course)) {
            $content .= html_writer::start_tag('div', array('class' => 'enrolmenticons'));
            foreach ($icons as $pixicon) {
                $content .= $this->render($pixicon);
            }
            $content .= html_writer::end_tag('div'); // Enrolmenticons.
        }
        $content .= html_writer::end_tag('div'); // Info.
        if (empty($course->get_course_overviewfiles())) {
            $class = "content-block";
        } else {
            $class = "";
        }
        $content .= html_writer::start_tag('div', array('class' => 'content '.$class));
        $content .= $this->coursecat_coursebox_content($chelper, $course);
        $content .= html_writer::end_tag('div'); // Content.
        $content .= html_writer::end_tag('div'); // Coursebox.
        return $content;
    }

    /**
     * Renders HTML to display one course module for display within a section.
     *
     * This function calls:
     * {@link core_course_renderer::course_section_cm()}
     *
     * @param stdClass $course
     * @param completion_info $completioninfo
     * @param cm_info $mod
     * @param int|null $sectionreturn
     * @param array $displayoptions
     * @return String
     */
    public function course_section_cm_list_item($course, &$completioninfo, cm_info $mod, $sectionreturn, $displayoptions = array()) {
        $output = '';
        $completioncolor_li = '';
        if(true){
            global $DB;
            $hours = 0;
            $mins = 0;
            $data = $completioninfo->get_data($mod, true);
            $weights = $DB->get_records_sql("
                SELECT intvalue
                FROM {customfield_data} d
                INNER JOIN {customfield_field} f ON d.fieldid=f.id
                WHERE
                    f.shortname in ('duration_hours', 'duration_mins') AND d.instanceid=?", array($mod->id));
            $i=0;
            foreach ($weights as $key => $value) {
                if($i==0)
                    $hours = $key/3600;
                else
                    $mins = $key/60;
                $i++;
            }
            $completioncolor_li = $data->completionstate == COMPLETION_INCOMPLETE ? "#fcf8e3" : "#dff0d8";
            $completioncolor_badge = $data->completionstate == COMPLETION_INCOMPLETE ? "#d58512" : "#398439";
            $displayoptions = array_merge($displayoptions , ["duration" => $hours. "h ". str_pad($mins, 2, 0, STR_PAD_LEFT). "m", "completioncolor" => $completioncolor_badge]);
        }
        if ($modulehtml = $this->course_section_cm($course, $completioninfo, $mod, $sectionreturn, $displayoptions)) {
            $modclasses = 'activity ' . $mod->modname . ' modtype_' . $mod->modname . ' ' . $mod->extraclasses;
            $output .= html_writer::tag('li', $modulehtml, array('class' => $modclasses, 'id' => 'module-' . $mod->id, 
                'style' => "background-color: ". $completioncolor_li. ";"));
        }
        return $output;
    }

        /**
     * Renders html for completion box on course page
     *
     * If completion is disabled, returns empty string
     * If completion is automatic, returns an icon of the current completion state
     * If completion is manual, returns a form (with an icon inside) that allows user to
     * toggle completion
     *
     * @param stdClass $course course object
     * @param completion_info $completioninfo completion info for the course, it is recommended
     *     to fetch once for all modules in course/section for performance
     * @param cm_info $mod module to show completion for
     * @param array $displayoptions display options, not used in core
     * @return string
     */
    public function course_section_cm_completion($course, &$completioninfo, cm_info $mod, $displayoptions = array()) {
        global $CFG, $DB, $USER;
        $output = '';

        $istrackeduser = $completioninfo->is_tracked_user($USER->id);
        $isediting = $this->page->user_is_editing();

        if (!empty($displayoptions['hidecompletion']) || !isloggedin() || isguestuser() || !$mod->uservisible) {
            return $output;
        }
        if ($completioninfo === null) {
            $completioninfo = new completion_info($course);
        }
        $completion = $completioninfo->is_enabled($mod);

        if ($completion == COMPLETION_TRACKING_NONE) {
            if ($isediting) {
                $output .= html_writer::span('&nbsp;', 'filler');
            }
            return $output;
        }

        $completionicon = '';

        if ($isediting || !$istrackeduser) {
            switch ($completion) {
                case COMPLETION_TRACKING_MANUAL :
                    $completionicon = 'manual-enabled'; break;
                case COMPLETION_TRACKING_AUTOMATIC :
                    $completionicon = 'auto-enabled'; break;
            }
        } else {
            $completiondata = $completioninfo->get_data($mod, true);
            if ($completion == COMPLETION_TRACKING_MANUAL) {
                switch($completiondata->completionstate) {
                    case COMPLETION_INCOMPLETE:
                        $completionicon = 'manual-n' . ($completiondata->overrideby ? '-override' : '');
                        break;
                    case COMPLETION_COMPLETE:
                        $completionicon = 'manual-y' . ($completiondata->overrideby ? '-override' : '');
                        break;
                }
            } else { // Automatic
                switch($completiondata->completionstate) {
                    case COMPLETION_INCOMPLETE:
                        $completionicon = 'auto-n' . ($completiondata->overrideby ? '-override' : '');
                        break;
                    case COMPLETION_COMPLETE:
                        $completionicon = 'auto-y' . ($completiondata->overrideby ? '-override' : '');
                        break;
                    case COMPLETION_COMPLETE_PASS:
                        $completionicon = 'auto-pass'; break;
                    case COMPLETION_COMPLETE_FAIL:
                        $completionicon = 'auto-fail'; break;
                }
            }
        }
        if ($completionicon) {
            $formattedname = html_entity_decode($mod->get_formatted_name(), ENT_QUOTES, 'UTF-8');
            if (!$isediting && $istrackeduser && $completiondata->overrideby) {
                $args = new stdClass();
                $args->modname = $formattedname;
                $overridebyuser = \core_user::get_user($completiondata->overrideby, '*', MUST_EXIST);
                $args->overrideuser = fullname($overridebyuser);
                $imgalt = get_string('completion-alt-' . $completionicon, 'completion', $args);
            } else {
                $imgalt = get_string('completion-alt-' . $completionicon, 'completion', $formattedname);
            }

            if ($isediting || !$istrackeduser || !has_capability('moodle/course:togglecompletion', $mod->context)) {
                // When editing, the icon is just an image.
                $completionpixicon = new pix_icon('i/completion-'.$completionicon, $imgalt, '',
                        array('title' => $imgalt, 'class' => 'iconsmall'));
                $output .= html_writer::tag('span', $this->output->render($completionpixicon),
                        array('class' => 'autocompletion'));
            } else if ($completion == COMPLETION_TRACKING_MANUAL) {
                $newstate =
                    $completiondata->completionstate == COMPLETION_COMPLETE
                    ? COMPLETION_INCOMPLETE
                    : COMPLETION_COMPLETE;
                // In manual mode the icon is a toggle form...

                // If this completion state is used by the
                // conditional activities system, we need to turn
                // off the JS.
                $extraclass = '';
                if (!empty($CFG->enableavailability) &&
                        core_availability\info::completion_value_used($course, $mod->id)) {
                    $extraclass = ' preventjs';
                }
                $output .= html_writer::start_tag('form', array('method' => 'post',
                    'action' => new moodle_url('/course/togglecompletion.php'),
                    'class' => 'togglecompletion'. $extraclass));
                $output .= html_writer::start_tag('div');
                $output .= html_writer::empty_tag('input', array(
                    'type' => 'hidden', 'name' => 'id', 'value' => $mod->id));
                $output .= html_writer::empty_tag('input', array(
                    'type' => 'hidden', 'name' => 'sesskey', 'value' => sesskey()));
                $output .= html_writer::empty_tag('input', array(
                    'type' => 'hidden', 'name' => 'modulename', 'value' => $formattedname));
                $output .= html_writer::empty_tag('input', array(
                    'type' => 'hidden', 'name' => 'completionstate', 'value' => $newstate));
                $output .= html_writer::tag('button',
                    $this->output->pix_icon('i/completion-' . $completionicon, $imgalt),
                        array('class' => 'btn btn-link', 'aria-live' => 'assertive'));
                        $output .= html_writer::tag('span', $displayoptions["duration"],
                                array('style' => 'display: inline-block;
                                                    min-width: 10px;
                                                    padding: 3px 7px;
                                                    font-size: 12px;
                                                    font-weight: 700;
                                                    color: #fff;
                                                    text-align: center;
                                                    white-space: nowrap;
                                                    vertical-align: middle;
                                                    background-color: '.$displayoptions["completioncolor"].';
                                                    border-radius: 10px;'));
                $output .= html_writer::end_tag('div');
                $output .= html_writer::end_tag('form');
                
            } else {
                // In auto mode, the icon is just an image.
                $completionpixicon = new pix_icon('i/completion-'.$completionicon, $imgalt, '',
                        array('title' => $imgalt));
                $output .= html_writer::tag('span', $this->output->render($completionpixicon),
                        array('class' => 'autocompletion'));
                $output .= html_writer::tag('span', $displayoptions["duration"],
                                array('style' => 'display: inline-block;
                                                    min-width: 10px;
                                                    padding: 3px 7px;
                                                    font-size: 12px;
                                                    font-weight: 700;
                                                    color: #fff;
                                                    text-align: center;
                                                    white-space: nowrap;
                                                    vertical-align: middle;
                                                    background-color: '.$displayoptions["completioncolor"].';
                                                    border-radius: 10px;'));
            }
        }
        return $output;
    }
}

