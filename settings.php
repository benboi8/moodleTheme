<?php

// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// This is used for performance, we don't need to know about these settings on every page in Moodle, only when
// we are looking at the admin settings pages.
if ($ADMIN->fulltree) {

    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingben', get_string('configtitle', 'theme_ben'));

    // Each page is a tab - the first is the "General" tab.
    $page = new admin_settingpage('theme_ben_general', get_string('generalsettings', 'theme_ben'));

    // Variable $brand-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_ben/brandcolor';
    $title = get_string('brandcolor', 'theme_ben');
    $description = get_string('brandcolor_desc', 'theme_ben');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Must add the page after definiting all the settings!
    $settings->add($page);

    // Advanced settings.
    $page = new admin_settingpage('theme_ben_advanced', get_string('advancedsettings', 'theme_ben'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_configtextarea('theme_ben/scsspre',
        get_string('rawscsspre', 'theme_ben'), get_string('rawscsspre_desc', 'theme_ben'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_configtextarea('theme_ben/scss', get_string('rawscss', 'theme_ben'),
        get_string('rawscss_desc', 'theme_ben'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}