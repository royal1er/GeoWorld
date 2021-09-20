<?php
include("C:\wamp64\www\PPE4\controleurs\c_rssflux.php");
?>
<a href="#" id="openModal" class="float openModal" data-toggle="modal" data-target="#exampleModalLong">
  <i class="fa fa-plus my-float"></i>
</a>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span><a class="nav-link selected" href="#content_1">France <span class="sr-only">(current)</span></a></span>
        <span><a class="nav-link" href="#content_2">Europe <span class="sr-only">(current)</a></span>
        <span><a class="nav-link" href="#content_3">Amérique <span class="sr-only">(current)</a></span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="mainContent">
            <div id="content_1">
                <?php getFeed("https://www.courrierinternational.com/feed/category/6260/rss.xml"); ?>
            </div><!--end content 1-->

            <div id="content_2">
                <?php getFeed("https://www.courrierinternational.com/feed/category/6261/rss.xml"); ?>
            </div><!--end content 2-->

            <div id="content_3">
                <?php getFeed("https://www.courrierinternational.com/feed/category/6262/rss.xml"); ?>
            </div><!--end content 3-->

</div><!--end main content -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
