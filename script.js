// rearange elements
jQuery( document ).ready( function( $ ) {
    // move TOC under title
    $("main>section>div#dw__toc").insertAfter("main>section>h1");
    // move PageID under title
    $("main>div.pageId").insertAfter("main>section>h1");

} );