// rearange elements
jQuery( document ).ready( function( $ ) {
    // move struct output under title
    $("main>section>div#plugin__struct_output").insertAfter("main>section>h1");
    // move TOC under title
    $("main>section>div#dw__toc").insertAfter("main>section>h1");
    // move PageID under title
    $("main>div.pageId").insertAfter("main>section>h1");
    // hide qsearch__out
    $("header div#searchtools>form div#qsearch__out").hide();
    // replace editbutton range
    //$("form.btn_secedit>div.no>input[name=range]").val("1-2");
} );