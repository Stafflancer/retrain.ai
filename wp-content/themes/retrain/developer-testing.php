<?php /* Template Name: Developer Testing */
get_header(); ?>
</br>
</br>

<div class="parallax-window" data-parallax="scroll" data-image-src="https://dev-retrainai.pantheonsite.io/wp-content/uploads/2022/05/img1.png"></div>


<style>
.parallax-window {
    min-height: 400px;
    background: transparent;
}
</style>
<script>
	jQuery(document).ready(function($) {
  var parallax = $('.parallax-window').attr("data-image-src");
 $('.parallax-window').parallax({imageSrc: parallax});

  
});
</script>
<?php
get_footer(); ?>
