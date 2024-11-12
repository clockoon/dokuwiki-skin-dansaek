<?php
/**
 * DokuWiki Default Template 2012
 *
 * @link     http://dokuwiki.org/template:dansaek
 * @author   Sungbin Jeon <clockoon@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */
?>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
  <head>
	  <!-- Google tag (gtag.js) -->
	  <script async src="https://www.googletagmanager.com/gtag/js?id=G-RV08W94V95"></script>
			
		<script>
		  window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'G-RV08W94V95');
		</script>
			
    <meta charset="utf-8" />
			<?php $full_title=tpl_pagetitle(null,true).' ['.strip_tags($conf['title']).']'; ?>

		<title><?php echo $full_title;?></title>
			
		<script>
	    (function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)
		</script>
			
    <?php tpl_metaheaders(); ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')); ?>
    <?php //tpl_includeFile('meta.html') ?>
    <!-- Open Graph -->
    <meta property="og:url" content="<?php echo 'https://'.$_SERVER['HTTP_HOST'].wl($ID); ?>"/>
    <meta property="og:title" content="<?php echo $full_title; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <!-- twitter card -->
    <meta property="twitter:card" content="summary" />
  </head>

  <body class="<?php echo ($ID==$conf['start'] ? '__front__' : '' ).explode(':', $INFO['namespace'])[0];?>">
			
    <div class="container dokuwiki">
      <!-- Header -->
      <?php //include('header.php') ?>
      <!-- boilerplace start: move following section to header.php -->
      <header>
        <div id="title">
          <h1 style="title">
            <?php
              // get logo either out of the template images folder or data/media folder
              $logoSize = [];
						  $logo = tpl_getMediaFile([
								':wiki:logo.svg', ':logo.svg',
								':wiki:logo.png', ':logo.png',
								'images/logo.svg', 'images/logo.png'
							], false, $logoSize);
              // display logo and wiki title in a link to the home page
              tpl_link(
                wl(),
                //'<span>'.$conf['title'].'</span>',
                '<img src="' . $logo . '" ' . ($logoSize ? $logoSize[3] : '') . ' alt="" />' ,
                'accesskey="h" title="[H]"'
              );
            ?>
            <a href="/<?php echo ($ID==$conf['start'] ? '/' : explode(':', $INFO['namespace'])[0].':start'); ?>" class="homelink"><?php echo ($ID==$conf['start'] ? 'MAIN' : strtoupper(explode(':', $INFO['namespace'])[0])); ?></a> 
          </h1>
          <span class="tagline">
            <?php 
              if ($ID==$conf['start']) {
                echo 'SEOUL';
              } else if ($conf['tagline']) {
                echo $conf['tagline'];
              } ?>&#8205;</span>
          <div class="pageId">
            <span>
              <?php 
                if ($ID==$conf['start']) { echo date("Y"); }
                else { echo (strlen(hsc($ID)) > 20) ? substr(hsc($ID), 0, 20) . '...' : hsc($ID); } ?>
            </span>
          </div>
        </div>
				<!-- TOP BAR -->
			  <div id="topbar">
					<?php tpl_include_page($conf['sidebar'], 1, 1) /* includes the nearest sidebar page */ 
					?>
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
    <div id="screen__mode" class="no"></div>
  	<?php /* helper to detect CSS media query in script.js */ ?>
  </body>
</html>
