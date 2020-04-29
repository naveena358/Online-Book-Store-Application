<!-- Start Search Popup -->
<div class="box-search-content search_active block-bg close__top">
  <form  class="minisearch" action="#">
    <div class="field__search">
      <input type="text" name="search_key" id="search_key" placeholder="Search entire book store here...">
      <div class="action">
        <a href="javascript:void(0)" class="search_but"><i class="zmdi zmdi-search"></i></a>
      </div>
    </div>
  </form>
  <div class="close__wrap">
    <span>close</span>
  </div>
</div>
<!-- End Search Popup -->
 
  <script src="js/popper.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/active.js"></script>
  

<script>

$(document).ready(function(){

    $(".search_but").click(function(){
      var search_key = $('#search_key').val();
      window.location = 'search_results.php?keyword=' + search_key;
    });

  $( ".minisearch" ).submit(function( event ) {
    event.preventDefault();
    var search_key = $('#search_key').val();
    window.location = 'search_results.php?keyword=' + search_key;
  });

});



</script>
