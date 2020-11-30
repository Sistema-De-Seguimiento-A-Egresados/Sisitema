$.fn.collapseRow = function() {
	var el = $('.panel-body',this);
	var btn = $('.panel .tools .fa-chevron-down',this);
	$(btn).removeClass("fa-chevron-down").addClass("fa-chevron-up");
    el.slideUp(200);
};

$.fn.expandRow = function() {
	var el = $('.panel-body',this);
	var btn = $('.panel .tools .fa-chevron-up',this);
	$(btn).removeClass("fa-chevron-up").addClass("fa-chevron-down");
    el.slideDown(200);
};
/*
$.fn.toggleRow = function(){
    var el = jQuery(".panel-body",this);
    var btn = jQuery('.panel .tools .icon-chevron-down',this);
    if (btn) {
        jQuery(btn).removeClass("icon-chevron-down").addClass("icon-chevron-up");
        el.slideUp(200);
    } else {
        jQuery(this).removeClass("icon-chevron-up").addClass("icon-chevron-down");
        el.slideDown(200);
    }
}
*/
