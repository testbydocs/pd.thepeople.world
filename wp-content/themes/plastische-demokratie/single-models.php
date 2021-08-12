<?php get_header(); ?>
<?php $mod_id= get_the_ID(); ?>

<plugin-all-stones model-path="/wp-content/themes/plastische-demokratie/assets/libs/models/"></plugin-all-stones>

<div class="single-model">
	<div class="flex justify-center mt-4">
		<a href="/modelle" class="link-box mj-text-blue">
			Modell Übersicht
		</a>
	</div>

	<div class="huge-text  text-center mt-16">
		<?php the_title() ?>
	</div>

	<div class="narrow mt-8 mx-auto text-center w-11/12 sm:w-3/5">
		<?php the_field('intro') ?>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 mt-4">
		<?php include( locate_template( 'includes/post-types/models/model.php', false, false ) ); ?>
	</div>

	<div class="flex justify-center mt-20">
		<!-- <div class="print-page ">
			<?php include_button(regular_button_category(), "Download This Project PDF", "white bg-blue no-stroke") ?>
		</div> -->

		<?php $site_url = site_url(); ?>

		<a href='javascript:void(0)' onClick = 'pdfDownload(this);' data-url="<?= $site_url ?>/wp-content/themes/plastische-demokratie/pdfCreate.php?id=<?= $mod_id ?>" class="download_btn">Download This Project PDF</a>


	</div>	

	<div class="mx-auto  w-11/12 sm:w-3/5 mt-6">
		<div class="tags-normal flex">
			<div class="mr-2">
				TAG:
			</div>

			<div class="flex">
				<?php
				$tags = get_the_terms( $post->ID, 'models-tags' );
				foreach( $tags as $tag ) {
					$tag_id = $tag->term_id;
					$tag_name = $tag->name;
					$tag_slug = $tag->slug;
					?>

				<div class="mr-2">
					#<?php echo $tag_name ?>
				</div>

				<?php
				}
				?>
			</div>
		</div>

		<!-- <?php if(get_field('year__jahr') ): ?>
			<div class="flex">
				<div class="narrow mr-2">
					<div class="lang-en">
						Year:
					</div>
					<div class="lang-de">
						Jahr:
					</div>
				</div>

				<div class="very-super-normal-text">
					<?php the_field('year__jahr') ?>
				</div>
			</div>
		<?php endif; ?> -->

		<?php if(get_field('duration__dauer') ): ?>
		<div class="flex">
			<div class="mr-2 narrow">
				<div class="lang-en">
					Time period:
				</div>
				<div class="lang-de">
					Zeitraum:
				</div>
			</div>

			<div class="very-super-normal-text">
				<?php the_field('duration__dauer') ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if(get_field('place__ort') ): ?>
		<div class="flex">
			<div class="mr-2 narrow">
				<div class="lang-en">
					Place:
				</div>
				<div class="lang-de">
					Ort:
				</div>
			</div>

			<div class="very-super-normal-text">
				<?php the_field('place__ort') ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if(get_field('area') ): ?>
		<div class="flex">
			<div class="mr-2 narrow">
				<div class="lang-en">
					Regions:
				</div>
				<div class="lang-de">
				Regionen:
				</div>
			</div>

			<div class="very-super-normal-text">
				<?php 
				$terms = get_field('area');
				if( $terms ): ?>
				<?php foreach( $terms as $term ): ?>
				<?php
						$term1 = get_term_by( 'id', $term, 'models-areas' );
						echo $term1->name;
						?>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if(get_field('land__country') ): ?>
		<div class="flex">
			<div class="mr-2 narrow">
				<div class="lang-en">
					Country:
				</div>
				<div class="lang-de">
					Land:
				</div>
			</div>

			<div class="very-super-normal-text">

				<?php 
				$terms = get_field('land__country');
				if( $terms ): ?>
				<?php foreach( $terms as $term ): ?>
				<?php
						$term1 = get_term_by( 'id', $term, 'models-regions' );
						echo $term1->name;
						?>
				<?php endforeach; ?>
				<?php endif; ?>

			</div>
		</div>
		<?php endif; ?>

		<?php if(get_field('location') ): ?>
		<div class="flex">
			<div class="mr-2 narrow">
				<div class="lang-en">
					Location:
				</div>
				<div class="lang-de">
					Location:
				</div>
			</div>

			<div class="very-super-normal-text">
				<?php the_field('location') ?>
			</div>
		</div>
		<?php endif; ?>

		<div class="flex">
			<div class="mr-2 narrow">
				<div class="lang-en">
					Target Group:
				</div>
				<div class="lang-de">
					Zielgruppe:
				</div>
			</div>

			<div class=" very-super-normal-text">
				<?php
				$tags = get_the_terms( $post->ID, 'models-groups' );
				foreach( $tags as $tag ) {
					$tag_id = $tag->term_id;
					$tag_name = $tag->name;
					$tag_slug = $tag->slug;
					?>

				<div class="mr-2">
					<?php echo $tag_name ?>
				</div>

				<?php
				}
				?>
			</div>
		</div>
	</div>

	<?php if(get_field('description__beschreibung') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 narrow mt-8">
		<div class="lang-en">
			Description
		</div>
		<div class="lang-de">
			Beschreibung
		</div>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-super-normal-text">
		<?php the_field('description__beschreibung') ?>
	</div>
	<?php endif; ?>

	<?php if(get_field('goals__ziele') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 narrow mt-8">
		<div class="lang-en">
			Goals
		</div>
		<div class="lang-de">
			Ziele
		</div>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-super-normal-text">
		<?php the_field('goals__ziele') ?>
	</div>
	<?php endif; ?>

	<?php if(get_field('beneficial_outcomes__vorteilhafte_ergebnisse') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 narrow mt-8">
		<div class="lang-en">
			Beneficial Outcomes
		</div>
		<div class="lang-de">
			Ergebnisse
		</div>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-super-normal-text">
		<?php the_field('beneficial_outcomes__vorteilhafte_ergebnisse') ?>
	</div>
	<?php endif; ?>

	<?php if(get_field('initiators__initiatorinnen') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 narrow mt-8">
		<div class="lang-en">
			Initiators
		</div>
		<div class="lang-de">
			Initiator:innen
		</div>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-super-normal-text">
		<?php the_field('initiators__initiatorinnen') ?>
	</div>
	<?php endif; ?>

	<?php if(get_field('verantwortliche__maintained') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 narrow mt-8">
		<div class="lang-en">
			Responsible
		</div>
		<div class="lang-de">
			Verantwortliche
		</div>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-super-normal-text">
		<?php the_field('verantwortliche__maintained') ?>
	</div>
	<?php endif; ?>

	<?php if(get_field('further_links__weitere_links') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 narrow mt-8">
		<div class="lang-en">
			Further informations
		</div>
		<div class="lang-de">
			Weitere Informationen
		</div>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-super-normal-text">
		<?php the_field('further_links__weitere_links') ?>
	</div>
	<?php endif; ?>

	
	<?php if(get_field('youtube') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
		<?php the_field('youtube') ?>
	</div>
	<?php endif; ?>

	<?php if(get_field('bild_1') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 mt-8 narrow">
		<div class="lang-en">
			Images
		</div>
		<div class="lang-de">
			Bilder
		</div>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
		<?php 
		$image = get_field('bild_1');
		echo wp_get_attachment_image( $image['id'], '_1024', '', array('class' => '', 'alt' => $image['title'] )) 
		?>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-small-text pt-2">
		<?php the_field('caption_1') ?>
	</div>
	<?php endif; ?>

	<?php if(get_field('bild_2') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
		<?php 
		$image = get_field('bild_2');
		echo wp_get_attachment_image( $image['id'], '_1024', '', array('class' => '', 'alt' => $image['title'] )) 
		?>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-small-text pt-2">
		<?php the_field('caption_2') ?>
	</div>
	<?php endif; ?>

	<?php if(get_field('bild_3') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
		<?php 
		$image = get_field('bild_3');
		echo wp_get_attachment_image( $image['id'], '_1024', '', array('class' => '', 'alt' => $image['title'] )) 
		?>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-small-text pt-2">
		<?php the_field('caption_3') ?>
	</div>
	<?php endif; ?>

	<?php if(get_field('bild_4') ): ?>
	<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
		<?php 
		$image = get_field('bild_4');
		echo wp_get_attachment_image( $image['id'], '_1024', '', array('class' => '', 'alt' => $image['title'] )) 
		?>
	</div>

	<div class="mx-auto  w-11/12 sm:w-3/5 very-small-text pt-2">
		<?php the_field('caption_4') ?>
	</div>
	<?php endif; ?>
		

	<div class="flex justify-center pt-8">
		<div class="flex justify-center mx-4">
			<a href="/neues-modell">
				<?php include_button("curvy", 'Neues Modell Anlegen', "white bg-green"); ?>
			</a>
		</div>

		<div class="flex justify-center mx-4">
			<div class="link-box mj-text-pink">
				<?php next_post_link( '%link', 'Nächstes Modell' ) ?>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">

	function pdfDownload(link){

		var model_link = jQuery(link).attr("data-url");
		window.location.replace(model_link);
	}
</script>
<?php get_footer(); ?>