<?php
/**
 * DokuWiki Default Template 2012
 *
 * @link     http://dokuwiki.org/template:dansaek
 * @author   Sungbin Jeon <clockoon@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

 if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
 ?>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
    <head>
        <meta charset="utf-8" />
        <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
        <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
        <?php tpl_metaheaders() ?>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
        <?php //tpl_includeFile('meta.html') ?>
    </head>

    <body class="<?php echo ($ID==$conf['start'] ? '__front__' : '' ).$INFO['namespace'];?>">
        <div class="container">
            <!-- Header -->
            <?php //include('header.php') ?>
            <!-- boilerplace start: move following section to header.php -->
            <header>
                <div id="title">
                    <h1 style="title">
                        <?php             
                        // display logo and wiki title in a link to the home page
                        tpl_link(
                            wl(),
                            '<span>'.$conf['title'].'</span>',
                            'accesskey="h" title="[H]"'
                        );
                        ?>
                        <a href="/" style="color:#000;text-decoration:underline;">HOME</a> 
                    </h1>
                    <span class="tagline"><?php if ($conf['tagline']): echo $conf['tagline']; endif ?>&#8205;</span>
                    <div class="pageId"><span><?php echo hsc($ID) ?></span></div>
                </div>
                <!-- TOOLS -->
                <div id="tools">
                    <!-- SEARCH TOOLS -->
                    <div id="searchtools">
                        <?php tpl_searchform($ajax=true, $autocomplete=false); ?>
                    </div>
                    <!-- SITE TOOLS -->
                    <div id="sitemenu">
                        <ul>
                            <?php echo (new \dokuwiki\Menu\SiteMenu())->getListItems('action ', true); ?>
                        </ul>
                    </div>
                    <!-- USER ACTIONS -->
                    <div id="usermenu">
                        <ul>
                            <?php echo (new \dokuwiki\Menu\UserMenu())->getListItems('action ', true); ?>
                        </ul>
                    </div>
                </div>
                <!-- BREADCRUMBS -->
                <?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
                    <div class="breadcrumbs">
                        <?php if($conf['youarehere']): ?>
                            <div class="youarehere"><?php tpl_youarehere() ?></div>
                        <?php endif ?>
                        <?php if($conf['breadcrumbs']): ?>
                            <div class="trace"><?php tpl_breadcrumbs() ?></div>
                        <?php endif ?>
                    </div>
                <?php endif ?>
                <?php
                    $translation = plugin_load('helper','translation');
                    if ($translation) echo $translation->showTranslations();
                ?>

            </header>
            <!-- boilerplace end -->
            <main>
                <?php html_msgarea() ?>

                <?php tpl_flush(); ?>
                <section>
                    <!-- wikipage start -->
                    <?php tpl_content('true'); ?>
                    <!-- wikipage stop -->
                </section>

                <div class="docInfo"><?php tpl_pageinfo() ?></div>

                <?php tpl_flush() ?>

                <hr class="a11y" />

            </main><!-- /container -->

            <?php //include('footer.php') ?>
            <!-- boilerplace start: move following section to footer.php -->
            <footer>
                <!-- TOOLS -->
                <div id="tools">
                    <!-- USER INFO -->
                    <div id="userinfo">
                        <?php
                            if (!empty($_SERVER['REMOTE_USER'])) {
                                tpl_userinfo(); /* 'Logged in as ...' */
                            }
                        ?>
                    </div>
                    <!-- PAGE ACTIONS -->
                    <div id="pagemenu">
                        <ul>
                            <?php echo (new \dokuwiki\Menu\PageMenu())->getListItems('action ', true); ?>
                        </ul>
                    </div>
                </div>
            </footer>
            <!-- boilerplace end -->
        </div>

        <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
        <div id="screen__mode" class="no"></div><?php /* helper to detect CSS media query in script.js */ ?>
    </body>
</html>


