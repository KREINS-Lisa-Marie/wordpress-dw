<?php get_header(); ?>
    <style type="text/css">
        .recipe {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
        }
        .recipe__ingredients {
            width: 320px;
            padding: 20px;
            background: #f1f1f1;
            display: flex;
            flex-direction: column-reverse;
        }
        .recipe__fig {
            display: block;
            position: relative;
            width: 100%;
            height: 0;
            padding-top: 100%;
            margin: 0;
        }
        .recipe__img {
            display: block;
            position: absolute;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <main>
<?php
// on ouvre la boucle (The loop), la structure de controle de contenu propre à Wordpress
if(have_posts()): while( have_posts()): the_post(); ?>

<h2>
        <?= get_the_title(); ?>
</h2>

<p>
    <?= get_the_excerpt(); ?>
</p>


<div class="recipe">
    <aside class="recipe__ingredients">
        <div>
            <h3>
                Ingredients
            </h3>
            <p>
                A completer
            </p>
        </div>
        <figure class="recipe__fig">
            <?= get_the_post_thumbnail( size: 'large', attr: ['class' => 'recipe__img']); ?>
        </figure>
    </aside>
</div>




    <section class="recipe__steps">
        <h3>
            Etapes
        </h3>
        <div>
            <?= get_the_content(); ?>
        </div>
    </section>




<?php
    // on ferme la boucle : the loop
endwhile; else: ?>
    <p>Cette recette n'existe pas</p>
<?php endif; ?>


<?php get_footer(); ?>