<?php
/**
 * The template for displaying single questions
 *
 * This is the template that displays the content of a single question.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Three
 * @since Twenty Twenty Three 1.0
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php

// Get the flexible content field
$flexible_content = get_field('answers');

#var_dump($flexible_content);

// Check if there are any rows in the field
if ($flexible_content) {

  // Loop through each row
  foreach ($flexible_content as $row) {
    #var_dump($row['acf_fc_layout']);
    // Check the layout of the row and output its contents accordingly
   # if ($row['acf_fc_layout'] == 'layout_63e0cdb5e07e0') {

      // Loop through each subfield in the row and output its value
      #foreach ($row['answer_1'] as $subfield) {
        echo $row['test_fied'];
        // Output any additional subfields in the same way
     # }
    #}

    // Add additional conditions for other layouts in the same way

  }
}

?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php endwhile; ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
