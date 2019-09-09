<script>
  
   function loadModal(url) {
        var baseUrl = '<?php echo URL::to(''); ?>';
        var p =  $("#body-content").load(baseUrl + "/" + url);
       //console.log(p);
    }

    function loadModalEdit(url,id)
    {
      var baseUrl = '<?php echo URL::to(''); ?>';
      var p = $("#body-content").load(baseUrl + "/" + url + "/" + id);
      //console.log(p);
    }
</script>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <h3></h3>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="body-content">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary pull-right btn-submit-action ">Save</button>
      </div>
    </div>
  </div>
</div>