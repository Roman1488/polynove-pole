<div class='thumb audio'>
    <?php if (get_field('start_audio', 'option') != '') : ?>
    <audio id="player_audio" src="<?php echo get_field('start_audio', 'option'); ?>" loop <?php if(is_front_page()) { echo 'autoplay';} ?>></audio>
    <?php endif; ?>
</div>