<?php if(comments_open()): ?>
    <section class="comments">
    
        <h1><?php echo total_comments() . pluralise(total_comments(), ' comment'); ?> <a href="#comment" title="Participez !">Ajoutez votre commentaire</a></h1>
    
        <?php if(has_comments()): ?>
        <ul class="commentlist">
            <?php while(comments()): ?>
            <li class="comment" id="comment-<?php echo comment_id(); ?>">
                <h2><?php echo comment_name(); ?></h2>
                <time><?php echo relative_time(comment_time()); ?></time> 
                
                <div class="content">
                    <?php echo comment_text(); ?>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        
        <form id="comment" class="commentform" method="post" action="<?php echo current_url(); ?>#comment">
            <legend>Donnez votre avis !</legend>
            
            <?php echo comment_form_notifications(); ?>
            
            <p class="name">
                <label for="name">Votre nom :</label>
                <?php echo comment_form_input_name(); ?>
            </p>
            
            <p class="email">
                <label for="email">Votre adresse e-mail :</label>
                <em>Will never be published.</em>
                <?php echo comment_form_input_email(); ?>                
            </p>
            
            <p class="textarea">
                <label for="text">Ce que vous avez à dire :</label>
                <?php echo comment_form_input_text(); ?>
            </p>
            
            <p class="submit">
                <?php echo comment_form_button(); ?>
            </p>
        </form>
    
    </section>
<?php endif; ?>
