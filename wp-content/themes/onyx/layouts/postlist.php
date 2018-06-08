<?php

	/**
	 * POSTLIST
	 */

?>

	<section class="page-container wrapper">

		<?php

			if(onyx_get_page_layout() == "page-layout-masonry"){
				get_template_part('layouts/postlist-masonry');
			}else{
				get_template_part('layouts/postlist-standard');
			}

			if(onyx_get_page_layout() == "page-layout-standard" && have_posts()){
				get_template_part('sidebar');
			}

		?>

		<div class="clear"></div>
	</section>
