/* $(function(){
  //var current_page_URL = location.href;
  $( "a" ).each(function(index, value) {
       //var target_URL = $(this).prop("href");
       if ($(this).prop("href") === window.location.href) {
		 // $(".nav-item1 ").find('li').removeClass('active');
          $(this).parent('li').addClass('active');
		  // $(this).addClass("current-page");
          //return true;
     }
  });
}); */
    $(function(){
        $('a').each(function(){
            if ($(this).prop('href') == window.location.href) {
              $(".page-sidebar-menu").find('li').removeClass('active');
                $(this).addClass('active'); 
                $(this).parents('li').addClass('active');
            }
        });
    });

/* $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
}); */