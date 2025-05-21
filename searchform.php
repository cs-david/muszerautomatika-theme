<form method="GET" action="<?php echo home_url('/'); ?>">
    <i class="fa-solid fa-magnifying-glass"></i>
    <label class="screen-reader-text" for="searchinput"><?php _e('Search', 'muszerautomatika-theme'); ?></label>
    <input id="searchinput" placeholder="<?php _e('Kulcsszó + ENTER', 'muszerautomatika-theme'); ?>" name="s" type="text" class="search-field"/>
</form>