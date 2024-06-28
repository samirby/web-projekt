<?php /*
 * Das WordPress Informationen aus Kommentaren übernimmt, haben wir in der style.css schon gesehen.
 * Um Seiten-Vorlagen (Page-Templates) zu erstellen, wird folgender Kommentar geschrieben. Der zugewiesene "Name" ist beliebig wählbar.
 *
 * Template Name: Projekte
 */


get_header(); // WordPress Funktion zum Einbinden der header.php  ?>



    <main id="content" class="container">



        <?php /*
        * Sämtliche Texte die wir in unserer functions.php oder in Templates schreiben und im Frontend oder Backend angezeigt werden, sollten über die Textdomain übersetzbar sein!
        * die Ausgabe im PHP wird in der Funktion als echo "_e('Zu übersetzender Text','TEXTDOMAIN')" oder return "__('Zu übersetzender Text','TEXTDOMAIN')" eingebunden
        * https://developer.wordpress.org/reference/functions/_e/
        * den Namen der Textdomain (wifi) haben wir in der functions.php definiert
        */ ?>


        <h1 class="is-style-headline"><?php _e( 'Projects by Johannes Meier', 'wifi' ); ?></h1>
        <?php /*
        * WordPress Standard Schleife mit geänderten/angepassten Abfrage-Parametern
        * https://developer.wordpress.org/reference/classes/wp_query/
        */

        /*
         * get_query_var('paged') gibt einen Query-Parameter der Seite (Pagination) zurück
         * Bedingung: ist kein Query-Parameter der Seitenzahl gesetzt, setze ihn auf "1"
         */
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        // Argumente
        $args = [
            'post_type'           => 'project', // register_post_type in functions.php
            'ignore_sticky_posts' => true,      // Beitrag "oben halten" wird ignoriert
            'orderby'             => 'rand',    // Zufällige reihenfolge (default ist nach Datum sortiert, aktuelle zuerst)
            'posts_per_page'      => 12,        // Beiträge (Projekte) pro Seite (pagination)
            'paged'               => $paged
        ];



        // Query
        $project_query = new WP_Query( $args );

        // Loop
        if ( $project_query->have_posts() ) : ?>
            <?php
            /* Erstellen des Klassen-Attributs
            * die Funktion wp_is_mobile() prüft ob der Browser auf einem mobilen Endgerät läuft (wird benötigt, um die Projekt-Titel auf mobilen Endgeräten ohne hover einzublenden)
            * https://developer.wordpress.org/reference/functions/wp_is_mobile/
            */
            ?>
            <div class="projects-grid">

                <?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
                    <figure class="project">
                        <?php /*
                            * the_permalink() gibt die URL zum Beitrag (Detailseite) aus
                            * https://developer.wordpress.org/reference/functions/the_permalink/
                            */ ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php /*
                            * Bild von ACF Feld ausgeben – Einstellung für Rückgabewert beim ACF Feld = ID (das bedeutet wir bekommen die Bild-ID als Rückgabewert)
                            * https://www.advancedcustomfields.com/resources/get_field/
                            * https://www.advancedcustomfields.com/resources/image/
                            *
                            * Bedingung: falls kein Bild eingefügt wurde, wird ein Default-Image aus dem /assets/images geladen (Achtung, dass Platzhalterbild sollte gleich groß sein wie die "Attachment-Image-Size - project")
                            */

                            if ( has_post_thumbnail() ) {
                                /*
                                 * wp_get_attachment_image() gibt ein Responsive-Image zurück (komplettes HTML-Element)
                                 * Parameter1 ist die Bild-ID (aus dem ACF-Feld), Parameter2 ist die Bildgröße (default sind WP-Sizes "thumbnail, medium, medium_large, large, full" – "project" haben wir in der functions.php erstellt)
                                 * https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
                                 */
                                the_post_thumbnail();
                            } else {
                                /*
                                 * get_template_directory_uri() gibt den absoluten Pfad zum Theme-Verzeichnis zurück
                                 * https://developer.wordpress.org/reference/functions/get_template_directory_uri/
                                 */
                                echo '<img src="' . get_template_directory_uri() . '/assets/img/placeholder.png" alt="Placeholder">';
                            } ?>
                        </a>
                        <figcaption class="project-caption">
                            <?php
                            /*  Mit the_title() wird der Beitrags-Titel ausgegeben
                              * https://developer.wordpress.org/reference/functions/the_title/
                              *
                              * sprintf — gibt einen formatierten String zurück
                              * https://www.php.net/manual/en/function.sprintf.php
                              *
                              * esc_url prüft URLs und bereinigt diese (z.B.: Codieren von Leerzeichen)
                              * https://developer.wordpress.org/reference/functions/esc_url/
                              *
                              * the_permalink() gibt die URL zum Beitrag (Detailseite) aus
                              * https://developer.wordpress.org/reference/functions/the_permalink/
                              */
                            the_title( sprintf( '<h3 class="project-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        </figcaption>
                    </figure>
                <?php endwhile; ?>

            </div>
        <?php endif; ?>
        <?php // Pagination Function wurde in der functions.php angelegt
        pagination( $paged, $project_query->max_num_pages ); ?>
        <?php /*
        * Restore original Post Data
        */
        wp_reset_postdata(); ?>
    </main>
<?php get_footer(); // WordPress Funktion zum Einbinden der footer.php ?>