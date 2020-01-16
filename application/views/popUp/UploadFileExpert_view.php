<?php
/*
 * Visheshagya
 */
?>
<!-- to display the File Sharing pop up -->
<div id="UploadFileExpert" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <fieldset>
                    <legend>Upload File Details</legend>
                    <form class="form-horizontal" method="POST" action="<?php echo base_url() . 'Ajaxcalls/uploadExpertDocument'; ?>" id="uploadExpertDocumentForm" name="uploadExpertDocumentForm" onsubmit="return uploadExpertDocument()" enctype="multipart/form-data">
                        <fieldset>                                            
                            <div id="professionalDataTab">
                                <div class="col-md-12 col-md-offset-1 frm-bdr">                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="selectmultiple">Select Folder</label>
                                        <div class="col-md-7" >
                                            <select class="form-control" name="folderName" id="folderName" onchange="getSubFolderList(this.value);">
                                                <?php
                                                if (!empty($foldersList)) {
                                                    foreach ($foldersList as $key => $folders) {
                                                        $folderName = rtrim($key, " \\");
                                                        //$key = strtoupper(rtrim($key, " \\"));
                                                        $key = rtrim($key, " \\");
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
                                    <div class="form-group" id="subFolderDiv">
                                        <label class="col-md-3 control-label" for="selectmultiple">Select Subfolder</label>
                                        <div class="col-md-7" >
                                            <select class="form-control" id="subfolderName" name="subfolderName">
                                                
                                                        <option value="NoSubfolder">No SubFolder</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textinput">File Name</label>  
                                        <div class="col-md-7">
                                            <input id="fileName" name="fileName[]"  type="file" placeholder="" class="form-control input-md" multiple>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center form-group">								 
                                        <button class="btn btn-sm btn-primary" onclick="shareExpertDocument()">Upload File</button>								  
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
<script>
    var flag=1;
    function getSubFolderList(value)
            {
                 $("#subFolderDiv").show();
                 var subfolderName = $("#subfolderName");
                subfolderName.find('option').remove();
                 $.ajax({
                                url: '<?php echo base_url() ."Ajaxcalls/getSubFolderList"; ?>',
                                type: 'POST',
                                data: {FolderName: value},
                                success: function (response) {
                                 console.log(response);
                                subfolderName.append('<option value="NoSubfolder">Select Subfolder</option>');
                                
                                   for (var i = 0; i < response.length; i++)
                                    {
                                        
                                         subfolderName.append('<option value="' + response[i].subfolder + '">'+response[i].subfolder+'</option>');
                                    }
             
                                }
                            });
                
               
            }
</script>    
<!--End -->