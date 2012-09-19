$().ready(function (){
  $('.bc').jCrumb({
    maxCrumbs: 6,
    maxMemory: 50,
    seperator: "<span class=\"divider\">/</span>"
  }); 
  $('.bc ul').addClass('breadcrumb');
});
