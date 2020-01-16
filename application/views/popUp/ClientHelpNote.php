<script type="text/javascript">
    $(document).ready(function () {
        $("#noteHelp").click(function () {
            $("#noteHelpModal").modal('show');
        });
    });

</script>
<!-- to display the pop up -->
<div id="noteHelpModal" class="modal fade sucess-modal" style="height: 100%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" id="closeHeader"class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            
            <div class="modal-body note-body">
                <fieldset>
                    <legend>Note</legend>
                    <p>Personal notes for client & expert, they both can share such notes. Although it's not mandatory.</p>
                    <p>Click on add note</p>
                    <p>Write a note</p>
                    <p><b>Hidden</b>: It is personal </p>
                    <p><b>Published</b>: This note is used for interaction between client and expert.</p>
                </fieldset>
            </div>
        </div>
    </div>
</div>

