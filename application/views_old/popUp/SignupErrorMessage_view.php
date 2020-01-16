<div id="signupErrorMessage" class="modal fade error-popup" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" data-dismiss="modal" aria-hidden="true"> <i class="fa fa-times-circle-o"></i></button>
            </div>                    
            <div class="modal-body">
                <fieldset>
                    <legend>Sorry !</legend>
                   
                    <p><?php echo $this->session->userdata('clientLoginError'); ?></p>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!--End -->