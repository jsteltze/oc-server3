<?php
/****************************************************************************
 * ./lang/de/ocstyle/main.tpl.php
 * -------------------
 * begin                : Mon June 14 2004
 *
 * For license information see LICENSE.md
 ****************************************************************************/

/****************************************************************************
 *
 *
 * german main template
 *
 * template replacement(s):
 *
 * title          HTML page title
 * lang           language
 * style          style
 * htmlheaders    additional HTML headers
 * loginbox       login status (login form or username)
 * functionsbox   available function on this site
 * template       template to display
 * runtime        computing time
 * @codingStandardsIgnoreStart
 ****************************************************************************/

    //Menü laden
    global $mnu_bgcolor, $mnu_selmenuitem, $develWarning, $tpl_subtitle, $opt, $rootpath, $usr;

    require_once $stylepath . '/lib/menu.php';
    if (function_exists('post_config')) {
        post_config();
    }

    $parts = parse_url($_SERVER['REQUEST_URI']);
    $langUrl = $parts['path'];
    if (isset($parts['query'])) {
        parse_str($parts['query'], $params);
    }
    $params['locale'] = '';
    $langUrl .= '?' . http_build_query($params);

    require_once __DIR__ . '/../src/OcLegacy/SmartyPlugins/function.season.php';

    $sUserCountry = getUserCountry();

    $pageidx = mnu_MainMenuIndexFromPageId($menu, $tplname);

    $mnu_bgcolor = '#D5D9FF';
    if (isset($menu[$pageidx]['navicolor'])) {
        $mnu_bgcolor = $menu[$pageidx]['navicolor'];
    }

    if ($tplname != 'start') {
        $tpl_subtitle .= htmlspecialchars($mnu_selmenuitem['title'], ENT_COMPAT, 'UTF-8');
    }
    $tpl_subtitle .= ' - ' . htmlspecialchars($opt['locale'][$locale]['page']['subtitle1'], ENT_COMPAT, 'UTF-8');
    $meta_keywords = htmlspecialchars($opt['page']['meta']['keywords'], ENT_COMPAT, 'UTF-8');
    $meta_description = htmlspecialchars($opt['page']['meta']['description'], ENT_COMPAT, 'UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $tpl_subtitle; ?></title>
        <meta name="keywords" content="<?php echo $meta_keywords; ?>" />
        <meta name="description" content="<?php echo $meta_description; ?>" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="Content-Language" content="{lang}" />
        <meta http-equiv="gallerimg" content="no" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <link rel="SHORTCUT ICON" href="favicon.ico" />
        <link rel="apple-touch-icon" href="resource2/{style}/images/oclogo/apple-touch-icon-iphone.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="resource2/{style}/images/oclogo/apple-touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="resource2/{style}/images/oclogo/apple-touch-icon-iphone-retina.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="resource2/{style}/images/oclogo/apple-touch-icon-ipad-retina.png" />
        <link rel="stylesheet" type="text/css" media="screen,projection" href="resource2/{style}/css/style_screen.css?ft={screen_css_time}" />
        <!--[if lt IE 9]>
            <link rel="stylesheet" type="text/css" media="screen,projection" href="resource2/{style}/css/style_screen_msie.css?ft={screen_msie_css_time}" />
        <![endif]-->
      <script type="text/javascript">
                <!--
<?php
$seasons = [
    'winter' => 'resource2/ocstyle/css/seasons/style_winter.css',
    'spring' => 'resource2/ocstyle/css/seasons/style_spring.css',
    'summer' => 'resource2/ocstyle/css/seasons/style_summer.css',
    'autumn' => 'resource2/ocstyle/css/seasons/style_autumn.css'
];

$seasons_stripe = [
    'winter' => 'resource2/ocstyle/css/seasons/style_langstripe_winter.css',
    'spring' => 'resource2/ocstyle/css/seasons/style_langstripe_spring.css',
    'summer' => 'resource2/ocstyle/css/seasons/style_langstripe_summer.css',
    'autumn' => 'resource2/ocstyle/css/seasons/style_langstripe_autumn.css'
];
$smarty_dummy = 0;
?>
                    var nWindowWidth = 9999;
                    if (window.innerWidth)
                        nWindowWidth = window.innerWidth;
                    else if (screen.availWidth)
                        nWindowWidth = screen.availWidth;
                    if (nWindowWidth > 970)
                        document.writeln('<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo smarty_function_season($seasons, $smarty_dummy); ?>" />');
                    document.writeln('<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo smarty_function_season($seasons_stripe, $smarty_dummy); ?>" />');

                    function usercountry_change()
                    {
                        var sCurrentOption = "<?php echo $sUserCountry; ?>";
                        var oUserCountryCombo = document.getElementById('usercountry');

                        if (sCurrentOption!=oUserCountryCombo.value)
                        {
                            document.getElementById('language_switcher').submit();
                        }
                    }

                function submitbutton(bname)
                {
                    document.getElementsByName(bname)[0].className = "formbutton_active";
                }

                function resetbutton(bname)
                {
                    document.getElementsByName(bname)[0].className = "formbutton"
                }

                function flashbutton(bname)
                {
                    document.getElementsByName(bname)[0].className = "formbutton_active";
                    window.setTimeout('resetbutton(\'' + bname + '\')', 350);
                }
                //-->
      </script>
        <link rel="stylesheet" type="text/css" media="print" href="resource2/{style}/css/style_print.css?ft={print_css_time}" />
        <script type="text/javascript" src="resource2/{style}/js/enlargeit/enlargeit.js"></script>
        {htmlheaders}
    </head>

    <body style="{bodystyle}">
        <div id="overall">
            <div id="langstripe">

                <!-- Navigation Level 1 -->
                <table class="nav1" cellspacing=0>
                    <tr>
                        <td width="100%">
                            &nbsp; {loginbox}
                        </td>
                        <td><strong>{t}Language:{/t}&nbsp;</strong></td>
                        <td>
<?php
foreach ($opt['template']['locales'] as $k => $lang) {
    if ($lang['status'] == OC_LOCALE_ACTIVE) {
        echo '<a style="text-decoration: none;" href="'.$langUrl . $k . '"><img src="' . $lang['flag'] .
            '" alt="' . $lang['name'] . '" title="' . $lang['name'] . '" width="24px" height="18px" /></a> ';
    }
}
                            ?>
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>{t}Country:{/t}&nbsp;</strong></td>
                        <td style="padding-top:5px; height:11px;">
                            <form action="index.php" method="get" id="language_switcher">
                                <select id="usercountry" name="usercountry" onchange="usercountry_change();">
<?php
                                    global $tpl_usercountries;
                                    $nLastGroup = 0;
                                    $maxUserCountries = count($tpl_usercountries);
                                    for ($i = 0; $i < $maxUserCountries; $i++) {
                                        if ($nLastGroup != $tpl_usercountries[$i]['group']) {
                                            echo '<option disabled="disabled">';
                                            if ($tpl_usercountries[$i]['group'] == 1) {
                                                echo '- ' . t('This OC node') . ' -';
                                            } elseif ($tpl_usercountries[$i]['group'] == 2) {
                                                echo '- ' . t('Other OC nodes') . ' -';
                                            } elseif ($tpl_usercountries[$i]['group'] == 3) {
                                                echo '- ' . t('Others') . ' -';
                                            } else {
                                                echo '-';
                                            }
                                            echo '</option>';
                                        }
                                        $nLastGroup = $tpl_usercountries[$i]['group'];

                                        echo '<option value="' . htmlspecialchars($tpl_usercountries[$i]['country'], ENT_COMPAT, 'UTF-8') . '"' . (($sUserCountry==$tpl_usercountries[$i]['country']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($tpl_usercountries[$i]['name'], ENT_COMPAT, 'UTF-8') . '</option>';
                                    }
?>
                                </select>
                            </form>&nbsp;
            </td>
                    </tr>
                </table>
            </div> <!-- langstripe -->

          <div class="page-container-1" style="position: relative;">
                {backgroundimage}

              <!-- HEADER -->
                <?php echo isset($develWarning) ? $develWarning : '' ?>

                <!-- Header banner -->
                <div class="header">
                    <div class="headerimage">
                        <img src="resource2/{style}/images/head/rotator.php?path=<?php echo $opt['page']['headimagepath']; ?>" class="headerimagecontent" />
                    </div>
                    <div class="headerlogo">
                        <img src="resource2/{style}/images/oclogo/<?php echo $opt['page']['headoverlay']; ?>.png" class="headerimagecontent" />
                    </div>
                </div>

                <!-- Navigation Level 2 -->
                <div class="nav2">
                    <ul>
<?php
                        // $pageidx is -1 e.g. when calling newcache.php as logged-off-user (-> login.tpl.php)
                        if ($pageidx >= 0) {
                            mnu_EchoMainMenu($menu[$pageidx]['siteid']);
                        } else {
                            mnu_EchoMainMenu(-1);
                        }
                        ?>
                    </ul>
                </div>

                <!-- Breadcrumb & waypoint search -->
                <div class="buffer" style="height: 30px; width:100%;">
                    <div id="breadcrumb">
                        <?php mnu_EchoBreadCrumb($tplname, $pageidx); ?>
                    </div>
                    <div id="suchbox">
                        <form action="searchplugin.php" method="post" style="display:inline;"><b>{t}Waypoint search:{/t}</b>&nbsp;<input type="hidden" name="sourceid" value="waypoint-search" /> <input type="text" name="userinput" size="10" /> <input type="submit" name="wpsearch" class="formbutton" style="width:auto" value="&nbsp;{t}Go{/t}&nbsp;" onclick="submitbutton('wpsearch')" /></form>
                    </div>
                </div>

                <!-- NAVIGATION -->
                <!-- Navigation Level 3 -->
                <div class="nav3">
<?php
                    //SubNavigation
                    if (isset($menu[$pageidx]['submenu'])) {
                        ?>
                        <ul>
                            <li class="title">{t}Main menu{/t}</li>
<?php
                            mnu_EchoSubMenu($menu[$pageidx]['submenu'], $tplname, 1, false); ?>
                        </ul>
<?php

                    }
?>
                    <!-- Länderknoten -->
                    <p class="sidebar-maintitle">{t}Country sites{/t}</p>
                    <div style="text-align: center;" class="nodeflags">
                        <a href="http://www.opencaching.cz" target="_blank"><img src="resource2/ocstyle/images/nodes/oc-cz.png" width="100" height="22" /></a><br />
                        <a href="https://www.opencaching.de" target="_blank"><img src="resource2/ocstyle/images/nodes/oc-de.png" width="100" height="22" /></a><br />
                        <a href="http://www.opencaching.nl" target="_blank"><img src="resource2/ocstyle/images/nodes/oc-nl.png" width="100" height="22" /></a><br />
                        <a href="https://opencaching.pl" target="_blank"><img src="resource2/ocstyle/images/nodes/oc-pl.png" width="100" height="22" /></a><br />
                        <a href="http://www.opencaching.ro" target="_blank"><img src="resource2/ocstyle/images/nodes/oc-ro.png" width="100" height="22" /></a><br />
                        <a href="https://opencache.uk" target="_blank"><img src="resource2/ocstyle/images/nodes/oc-org-uk.png" width="100" height="22" /></a><br />
                        <a href="http://www.opencaching.us" target="_blank"><img src="resource2/ocstyle/images/nodes/oc-us.png" width="100" height="22" /></a>
                    </div>

                    <!-- Paypalbutton -->
<?php
                    if (isset($opt['page']['showdonations']) && $opt['page']['showdonations']) {
                        ?>
                        <p class="sidebar-maintitle">{t}Donations{/t}</p>
                        <div style="margin-top:16px;width:100%;text-align:center;">
                            <a href="articles.php?page=donations">
                            <img src="resource2/ocstyle/images/misc/donate.gif" alt="{t}Donations{/t}" style="border:0px;" />
                            </a><br />
                            &nbsp;
                        </div>
<?php

                    }
?>

                    <!-- Social Media -->
<?php
                    if (isset($opt['page']['showsocialmedia']) && $opt['page']['showsocialmedia']) {
                        ?>
                    <p class="sidebar-maintitle">{t}Social media{/t}</p>
                    <div style="margin-top: 10px; margin-bottom: 14px; margin-left: auto; margin-right: auto; text-align: center">
                        <table style="margin-left: auto; margin-right: auto;">
                            <tr>
                                <td class="mediumsmalltext">{t}Follow us:{/t}</td>
                                <td><a href="http://blog.opencaching.de/feed"><img src="resource2/{style}/images/media/16x16-feed.png" width="16" height="16" /></a></td>
                                <td><a href="https://twitter.com/opencaching"><img src="resource2/{style}/images/media/16x16-twitter.png" width="16" height="16"  /></a></td>
                                <td><a href="https://www.facebook.com/opencaching.de"><img src="resource2/{style}/images/media/16x16-facebook.png" width="16" height="16"  /></a></td>
                            </tr>
                            <tr>
                                <td class="mediumsmalltext" colspan="5" style="padding-top:0.6em; text-align:left">{t}Join discussions:{/t}</td>
                            </tr>
                        </table>
                        <table style="margin-left: auto; margin-right: auto;">
                            <tr>
                                <td>
                                    <a href="http://forum.opencaching.de/">
                                        <img src="resource2/{style}/images/oclogo/16x16-oc_logo.png"/>
                                    </a>
                                </td>
                                <td style="text-align: left">
                                    <a href="http://forum.opencaching.de/">
                                        {t}Opencaching Forum{/t}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="https://www.facebook.com/groups/198752500146032/">
                                        <img src="resource2/{style}/images/media/16x16-facebook.png"/>
                                    </a>
                                </td>
                                <td style="text-align: left">
                                    <a href="https://www.facebook.com/groups/198752500146032/">
                                        {t}Facebook Group{/t}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="https://github.com/OpencachingDeutschland/oc-server3">
                                        <img src="resource2/{style}/images/media/16x16-github.png"/>
                                    </a>
                                </td>
                                <td style="text-align: left">
                                    <a href="https://github.com/OpencachingDeutschland/oc-server3">GitHub</a>
                                </td>
                            </tr>
                        </table>
                    </div>
<?php

                    }
?>

                    <!-- Datalicense -->
                    {license_disclaimer}

                    <!-- page statistics -->
                    <div class="sidebar-txtbox-noshade">
                        <p class="content-txtbox-noshade-size5">
                            <small>
                                {t}Page performance:{/t} {scripttime} {t}sec{/t}<br />
                                {t}Page creation:{/t} <?php $bTemplateBuild->Stop(); echo sprintf('%1.3f', $bTemplateBuild->Diff()); ?> {t}sec{/t}
                            </small>
                        </p>
                    </div>

                </div> <!-- nav3 -->

              <!-- CONTENT -->
                <div class="content2">
                    <div class="tplhelp">
                        <?php mnu_EchoHelpLink($tplname); ?>
                    <!--[if IE]><div></div><![endif]-->
                    </div>

                    <div id="ocmain">
                        {template}
                    </div>
                </div> <!-- content2 -->

                <!-- FOOTER -->
                <div class="footer">
                    <p><a onClick="klaro.show();return false;" style="cursor: pointer;">{t}Cookie settings{/t}</a></p>
                    <p><a href="/page/datenschutzerklaerung">{t}Privacy statement{/t}</a> | <a href="articles.php?page=impressum">{t}Terms of use and legal information{/t}</a> | <a href="articles.php?page=contact">{t}Contact{/t}</a> | <a href="articles.php?page=changelog">{t}Changelog{/t}</a> | <a href="sitemap.php">{t}Sitemap{/t}</a></p>
                    <p><strong>{sponsorbottom}</strong></p>
                </div>

            </div> <!-- page-container-1 -->

        </div> <!-- overall -->
        <?php if($opt['tracking']['googleAnalytics']) { ?>
            <script type="text/javascript">
                // Set to the same value as the web property used on the site
                var gaProperty = '<?= $opt['tracking']['googleAnalytics']; ?>';

                // Disable tracking if the opt-out cookie exists.
                var disableStr = 'ga-disable-' + gaProperty;
                if (document.cookie.indexOf(disableStr + '=true') > -1) {
                    window[disableStr] = true;
                }

                // Opt-out function
                function gaOptout() {
                    document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
                    window[disableStr] = true;
                    if (document.cookie.indexOf(disableStr + '=true') > -1) {
                        alert('Google Analytics is now deactivated!');
                    }
                }
            </script>

            <?php if (!isset($_SERVER['HTTP_DNT']) || !$_SERVER['HTTP_DNT']) { ?>
            <script type="text/plain" data-type="text/javascript" data-name="googleAnalytics">
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                ga('create', gaProperty, 'auto');
                ga('set', 'anonymizeIp', true);
                ga('send', 'pageview');
            </script>
        <?php
            }
        }
        ?>
    </body>
</html>
