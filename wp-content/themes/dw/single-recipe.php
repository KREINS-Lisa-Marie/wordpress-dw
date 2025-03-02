<?php get_header(); ?>
    <style type="text/css">
        /*
        .recipe {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
        }
        */

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
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .sro {
            position: absolute;
            overflow: hidden;
            clip: rect(0 0 0 0);
            height: 1px; width: 1px;
            margin: -1px;
            padding: 0;
            border: 0;
        }
        .recipe__header {       /*damit man titel über Bild machen kann*/
            height: 400px;
            width: 100%;
            position: relative;
        }
        .recipe__back,
        .recipe__back:before,
        .recipe__head {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
        }
        .recipe__back {
            z-index: 0;     /* va s'afficher derrière */
            margin: 0;
            padding: 0;
        }
        .recipe__back:before {      /* ombrage damit text noch visible der drüber kommt kann man auch mit gradient machen = komplizierter */
            content: '';
            display: block;
            background: rgb(100,20,40);
            opacity: 0.75;
        }
        .recipe__cover {        /*toute la largeur*/
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .recipe__head {     /* va s'afficher au dessus */
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .recipe__container {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
        }
        .recipe__rating {
            width: 150px;
            height: 30px;
            display: block;
            position: relative;
            background: url(/wp-content/themes/dw/resources/img/star_empty.svg);
            background-repeat: repeat-x;
            background-position: 0 0;
        }
        .recipe__rating:after {
            content:'';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 0;
            background: url(/wp-content/themes/dw/resources/img/star_filled.svg);
            background-repeat: repeat-x;
            background-position: 0 0;
        }
        .recipe__rating[data-score="1"]:after {
            width: 30px;
        }
        .recipe__rating[data-score="2"]:after {
            width: 60px;
        }
        .recipe__rating[data-score="3"]:after {
            width: 90px;
        }
        .recipe__rating[data-score="4"]:after {
            width: 120px;
        }
        .recipe__rating[data-score="5"]:after {
            width: 100%;
        }
    </style>
    <main>
<?php
// on ouvre la boucle (The loop), la structure de controle de contenu propre à Wordpress
if (have_posts()): while (have_posts()): the_post(); ?>

    <div class="recipe">
        <header class="recipe__header">
            <div class="recipe__head">
                <h2 class="recipe__title"><?= get_the_title(); ?></h2>
                <p class="recipe__excerpt"><?= get_the_excerpt(); ?></p>
                <div class="recipe__rating" data-score="<?= $rating = get_field('rating'); ?>">
                    <p class="sro">Cette recette obtient l'appréciation de <?= $rating; ?> étoiles sur 5</p>
                </div>
                <div class="recipe__dates">
                    <?php
                    $departure = get_field('departure');
                    ?>
                    <p>Recette du
                        <time datetime="<?= date('c', $departure); ?>"><?= date_i18n('d F Y', $departure); ?></time>
                    </p>
                </div>
            </div>
            <figure class="recipe__back">
                <?= get_the_post_thumbnail(size: 'recipe-header', attr: ['class' => 'recipe__cover']); ?>
            </figure>
        </header>

        <h2>
            <?= get_the_title(); ?>
        </h2>

        <p>
            <?= get_the_excerpt(); ?>
        </p>


        <div class="recipe__container">
            <aside class="recipe__ingredients">
                <div>
                    <h3>
                        Ingredients
                    </h3>
                    <div class="wysiwyg">
                        <?= get_field('recipe_keypoints'); ?>
                    </div>
                </div>
                <figure class="recipe__fig">
                    <?= wp_get_attachment_image(get_field('right_image'), 'recipe-side', attr: ['class' => 'recipe__img']); ?>
                </figure>
            </aside>
        </div>


        <section class="recipe__steps">
            <h3>
                Etapes
            </h3>
            <div>
                <?= get_field('steps'); ?>
            </div>
        </section>
    </>


<?php
    // on ferme la boucle : the loop
endwhile;
else: ?>
    <p>Cette recette n'existe pas</p>
<?php endif; ?>


<?php get_footer(); ?>