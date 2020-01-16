<?php
/*
 * Visheshagya
 */
?>
<!-- to display the File upload  pop up -->
<div id="UploadFileClient" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <fieldset>
                    <legend>Upload File Details</legend>
                    <form class="form-horizontal" method="POST" action="<?php echo base_url() . 'Ajaxcalls/uploadClientDocument'; ?>" id="uploadExpertDocumentForm" name="uploadExpertDocumentForm" onsubmit="return uploadExpertDocument()" enctype="multipart/form-data">
                        <fieldset>                                            
                            <div id="professionalDataTab">
                                <div class="col-md-12 col-md-offset-1 frm-bdr">                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="selectmultiple">Select Folder</label>
                                        <div class="col-md-7" >
                                            <select class="form-control" name="folderName">
                                                <?php
                                                if (!empty($foldersList)) {
                                                    foreach ($foldersList as $key => $folders) {
                                                        $folderName = rtrim($key, " \\");
                                                        $key = strtoupper(rtrim($key, " \\"));
                                                        echo "<br/><b>$key</b><br/>";
                                                        ?>
                                                        <option value="<?php echo $folderName; ?>"><?php echo $key; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>                                                   
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textinput">File Name</label>  
                                        <div class="col-md-7">
                                            <input id="fileName" name="fileName" value="" type="file" placeholder="" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center form-group">								 
                                        <button class="btn btn-sm btn-primary" onclick="shareClientDocument()">Upload File</button>								  
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!--End -->