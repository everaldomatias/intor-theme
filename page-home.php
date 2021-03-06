<?php
// Template Name: Home
get_header(); ?>

<div id="conteudo">
        
	<div id="conteudo-esquerdo">
		<div id="introducao">
			<?php $intro = get_page_by_title( 'Intro Site' ); ?>
        	<?php echo apply_filters('the_content', $intro->post_content); ?>
		</div><!-- #introducao -->
	</div><!-- #conteudo-esquerdo -->
    <div id="conteudo-direito">
		<a href="<?php echo home_url('parar-de-fumar'); ?>">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner-campanha-anti-tabaco.gif" />
		</a>
    </div><!-- #conteudo-direito -->
    
</div><!-- #conteudo -->

<div id="segundo-conteudo">
    <div id="esquerda-segundo-conteudo">
        <h2>Cirurgia Tor&aacute;cica</h2>
        <?php $cirurgia = get_page_by_title( 'O Que e Cirurgia Toracica?' ); ?>
        <?php echo apply_filters('the_excerpt', $cirurgia->post_excerpt); ?>
    </div><!-- #esquerda-segundo-conteudo -->
    <div id="meio-segundo-conteudo">
		<a class="a-btn-home" href="<?php echo home_url('temas'); ?>">Temas</a>
        <a class="a-btn-home" href="<?php echo home_url('procedimentos'); ?>">Procedimentos</a>
        <a class="a-btn-home" href="<?php echo home_url('anatomia'); ?>">Anatomia</a>
    </div><!-- #meio-segundo-conteudo -->
    <div id="direita-segundo-conteudo">
		<div class="titulo-direita-segundo-conteudo">
			<h2>Voc&ecirc; Sabia?</h2>
		</div><!-- .titulo-direita-segundo-conteudo -->
				<div id="slider-single">
                
                    <div class="list_carousel">
                        <ul id="foo2">
							<?php $loop = new WP_Query( array( 'post_type' => 'vocesabia', 'posts_per_page' => 10, 'orderby' => 'rand' ) ); ?>
							<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li>
								<b><?php the_title(); ?></b>
								<?php the_content(); ?>
                            </li>

							<?php endwhile; ?>
                        </ul>

                        <div class="clearfix"></div>
                        <a class="prev" id="prev2" href="#"><span>ante</span></a>
                        <a class="next" id="next2" href="#"><span>segui</span></a>
                    </div>
                
				</div><!-- #slider-single -->

    </div><!-- #direita-segundo-conteudo -->
</div><!-- #segundo-conteudo -->

<div id="noticias-home">

<h2 class="titulo-home-noticias"><a href="<?php echo home_url('noticias'); ?>">Not&iacute;cias <span>Ver todas>></span></a></h2>

<?php

$loop_noticias = get_posts( array(
    'post_type' => 'posts',
    'posts_per_page' => 3,
));

if( $loop_noticias ) :
    
    foreach( $loop_noticias as $post ) : setup_postdata( $post );
    
    $count++;

    $class_noticias = 'cada-noticia-home';

    if ( $count % 3 == 0 ) {
        $class_noticias = 'ultima-cada-noticia-home';
    }

?>

	<div class="<?php echo $class_noticias; ?>">
    	<div <?php thumbnail_bg( 'noticias-home' ); ?> class="thumb-cada-noticia-home">
        </div><!-- .thumb-cada-noticia-home -->
        
        <div class="titulo-cada-noticia-home">
        	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div><!-- .titulo-cada-noticia-home -->
    	<div class="content-cada-noticia-home">
        	<?php the_excerpt(); ?>
        </div><!-- .content-cada-noticia-home -->
    </div><!-- .<?php echo $class_noticias; ?> -->

<?php

    endforeach;

    wp_reset_postdata();

endif;

?>

</div><!-- #noticias-home -->

<?php get_footer(); ?>
