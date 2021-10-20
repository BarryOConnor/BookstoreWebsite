<!-- 
///////////////////////////////////////////////////////////////////////////////////////////////////////

START Popup containing Selectable Images

///////////////////////////////////////////////////////////////////////////////////////////////////////
-->
<div id="<?php echo isset($modal_name)? $modal_name : "image-modal"; ?>" class="modal" aria-hidden="true">
	<div class="modal-size" tabindex="-1" data-micromodal-close="">
		<div role="dialog" class="modal-container" aria-modal="true" aria-labelledby="event-modal-title">

			<header>
				<h2 id="<?php echo isset($modal_name)? $modal_name : "image-modal"; ?>-title">Select an Image</h2>

				<button aria-label="Close modal" class="modal-close far fa-window-close" data-micromodal-close=""></button>
			</header>

      		<div id="<?php echo isset($modal_name)? $modal_name : "image-modal"; ?>-content">
	        <?php
	            $currdir = str_replace("admin\\","",getcwd()."\\");
	            $dirname = $currdir."images\\" . $image_type ."\\";
	            
	            $images = glob($dirname."*.{jpg,png,gif}", GLOB_BRACE);
	            foreach($images as $image) {
	                $image = str_replace($currdir,"",$image);
	                $image = str_replace("\\","/",$image);?>
	                <img src="../<?php echo $image; ?>" onclick="<?php echo isset($handler)? $handler: "updateImageName(this);"; ?>" data-src="<?php echo $image; ?>" />
	                <?php
	            }
	        ?>
        
      		</div>

		</div>
	</div>
</div>
<!-- 
///////////////////////////////////////////////////////////////////////////////////////////////////////

END Popup containing Selectable Images

///////////////////////////////////////////////////////////////////////////////////////////////////////
-->