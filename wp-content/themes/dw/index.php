
<?php get_header(); ?>
<main>

    <?php
    // on ouvre la boucle (The loop), la structure de controle de contenu propre à Wordpress
    // quand on veut inserer du contenu WP on met ceci et on termine avec if else ou endif
    if(have_posts()): while( have_posts()): the_post(); ?>

    <h2>
        <?= get_the_title(); // the_title() fait l'echo    get_the_title(); ne l'affiche pas?>
    </h2>
    <div>
        <?= get_the_content(); ?>
    </div>


    <?php
    // on ferme la boucle : the loop
    endwhile; else:  // else car on a p-e pas de post alors else  ou rien à afficher?>
    <p>La page est vide</p>
    <?php endif; ?>


<?php get_footer(); ?>