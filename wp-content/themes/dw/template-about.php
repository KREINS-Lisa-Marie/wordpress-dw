<?php /* Template Name: Page "A propros" */ ?> <!--commentaire pour dire à WP que c'est un fichier template -->
<?php get_header(); ?>
    <main>
    <aside>
        <h2>
            A propros de moi
        </h2>
    </aside>
<?php
    // on ouvre la boucle (The loop), la structure de controle de contenu propre à Wordpress
    if(have_posts()): while( have_posts()): the_post(); ?>
        <div>
            <?= get_the_content(); ?>
        </div>


    <?php
        // on ferme la boucle : the loop
    endwhile; else: ?>
        <p>La page est vide</p>
    <?php endif; ?>


<?php get_footer(); ?>