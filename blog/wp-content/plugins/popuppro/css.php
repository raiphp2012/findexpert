<style>
#ppmask {
  position:absolute;
  left:0;
  top:0;
  z-index:9999;
  background-color:#000;
  display:none;
}
  
#boxes .window {
 
 position:absolute;
  left:0;
  top:0;
  width:auto;
  height:auto;
  display:none;
  z-index:9999;
  padding:20px;
  <?php if ( popuppro_get_option('rounded_corner') == '1'){?>
  	border-radius: 5px;
  	-moz-border-radius: 5px;
  	-webkit-border-radius: 5px;
  <?php } ?>
  box-shadow: 0 0 18px rgba(0, 0, 0, 0.4);
}

#boxes #dialog {
  max-width:800px; 
  height:auto;
  _width:0;
  white-space:normal;
  overflow:visible;
  padding:10px;
  background-color:#FFFCFC;
  border:1px solid #170304 ;
  font-family:Georgia !important;
  font-size:15px !important;
  color:#2a1720;
 
  
}

*html #boxes .window {
    position: absolute;
}

#boxes .window .close
{
	 
background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: url(<?php echo plugins_url('images/close.png',__FILE__ );?>);
background-origin: padding-box;
background-position: 0% 0%;
background-repeat: no-repeat;
background-size: auto;
height: 36px;
right: -19px;
margin:0px 0px 0px 0px;
padding:0px 0px 0px 0px;
position: absolute;
top: -19px;
width: 36px;
 
}
</style>
