<?php get_header(); ?>
    <?php
    //  // on ouvre la boucle (The loop), la structure de controle de contenu propre à Wordpress
    // quand on veut inserer du contenu WP on met ceci et on termine avec if else ou endif
    // On ouvre "la boucle" (The Loop), la structure de contrôle
    // de contenu propre à Wordpress:
    if(have_posts()): while(have_posts()): the_post(); ?>

        <h2><?= get_the_title(); // the_title() fait l'echo    get_the_title(); ne l'affiche pas?>?></h2>

        <div><?= get_the_content(); ?></div>

    <?php
    // On ferme "la boucle" (The Loop):
    endwhile; else: // else car on a p-e pas de post alors else  ou rien à afficher?>?>
    <p>La page est vide.</p>
    <?php endif; ?>
<?php get_footer(); ?>








