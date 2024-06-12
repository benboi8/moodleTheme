<?php

// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// This is used for performance, we don't need to know about these settings on every page in Moodle, only when
// we are looking at the admin settings pages.
if ($ADMIN->fulltree) {

    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingben', get_string('configtitle', 'theme_ben'));

    $page = new admin_settingpage('theme_ben_general', get_string('generalsettings', 'theme_ben'));

    $colorpicker = new admin_setting_configcolourpicker(
        'theme_ben/brandcolor',
        get_string('brandcolor','theme_ben'),
        get_string('brandcolor_desc', 'theme_ben'),
        ''
    );

    $colorpicker->set_updatedcallback('theme_purge_used_in_context_caches');
    $page->add($colorpicker);

    $settings->add($page);
}