<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dompdf/autoload.inc.php';

$model_id = $_GET['id'];

$site_url = site_url();


$logo_url = $site_url."/wp-content/themes/plastische-demokratie/source/img/PD_Logo_5.png";

$heading = get_the_title($model_id);

$sub_heading = get_field('intro', $model_id);

// image
$image = get_field('thumbnail',$model_id);
$image_url = wp_get_attachment_image_src($image['id']);
$image_url=$image_url[0];

$tag_name = "";
$tags = get_the_terms( $model_id, 'models-tags' );
foreach( $tags as $tag ) {
	$tag_name .= " # " . $tag->name;
}

$model_number = $model_id;
$year = get_field('year__jahr', $model_id);
$duration = get_field('duration__dauer', $model_id);
$ort_location = get_field('place__ort', $model_id);


$country = "";
$terms = get_field('land__country', $model_id);
if ($terms) {
	foreach ($terms as $term) {
		$term1 = get_term_by( 'id', $term, 'models-regions' );
		$country .= " " . $term1->name;
	}
}

$area = "";
$terms = get_field('area', $model_id);
if ($terms) {
	foreach ($terms as $term) {
		$term1 = get_term_by( 'id', $term, 'models-areas' );
		$area .= " " . $term1->name;
	}
}

$location = get_field('location', $model_id);


$zielgruppe = '';
$tags = get_the_terms( $model_id, 'models-groups' );
foreach( $tags as $tag ) {
	$zielgruppe .= " " . $tag->name;
}


$initiators = get_field('initiators__initiatorinnen', $model_id);
$maintained_by = get_field('verantwortliche__maintained', $model_id);
$description = get_field('description__beschreibung', $model_id);

$img_section = '';

	if(get_field('youtube',$model_id) ):

		$youtube = get_field("youtube",$model_id);

		preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $youtube, $match);	

		$img_section .= '<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
											Video: '.$match[0][0].'
									</div><br/><br/>';	
	endif;


	if(get_field('bild_1',$model_id) ):

	 	$image_1 = get_field('bild_1',$model_id);
		$image_url_1 = wp_get_attachment_image_src($image_1['id']);
		$image_url_1=$image_url_1[0];

		$caption_1 = get_field('caption_1',$model_id);

		$img_section .= '<div class="mx-auto  w-11/12 sm:w-3/5 mt-8 narrow">
			<div class="lang-de">
				IMAGES / BILDER
			</div><br/><br/>
			</div>

			<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
				<img src="'.$image_url_1.'">		
			</div>
			<div class="mx-auto  w-11/12 sm:w-3/5 very-small-text pt-2">
				'.$caption_1.'
			</div>';
	endif;


	if(get_field('bild_2',$model_id) ):

			$image_2 = get_field('bild_2',$model_id);
			$image_url_2 = wp_get_attachment_image_src($image_2['id']);
			$image_url_2=$image_url_2[0];

			$caption_2 = get_field('caption_2',$model_id);

			$img_section .='<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">

			<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
				<img src="'.$image_url_2.'">
			</div>
			<div class="mx-auto  w-11/12 sm:w-3/5 very-small-text pt-2">
				'.$caption_2.'
			</div>';	

	
	endif;


	if(get_field('bild_3',$model_id) ):

			$image_3 = get_field('bild_3',$model_id);
			$image_url_3 = wp_get_attachment_image_src($image_3['id']);
			$image_url_3=$image_url_3[0];

			$caption_3 = get_field('caption_3',$model_id);

			$img_section .='<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">

			<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
				<img src="'.$image_url_3.'">
			</div>
			<div class="mx-auto  w-11/12 sm:w-3/5 very-small-text pt-2">
				'.$caption_3.'
			</div>';	

	
	endif;

	if(get_field('bild_4',$model_id) ):

			$image_4 = get_field('bild_4',$model_id);
			$image_url_4 = wp_get_attachment_image_src($image_4['id']);
			$image_url_4=$image_url_4[0];

			$caption_4 = get_field('caption_4',$model_id);

			$img_section .='<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">

			<div class="mx-auto  w-11/12 sm:w-3/5 mt-8">
				<img src="'.$image_url_4.'">
			</div>
			<div class="mx-auto  w-11/12 sm:w-3/5 very-small-text pt-2">
				'.$caption_4.'
			</div>';	

	
	endif;

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return strtolower($slug);
}
$slug =  create_slug($heading);

$render_html = <<<EOT

<link rel="stylesheet" href="$site_url/wp-content/themes/plastische-demokratie/pdf.css" type="text/css"/>

<div class="logo">
  <img src="$logo_url" alt="logo">
</div>

<div class="wrapper">
<header>
  <h1> $heading</h1>
  <h3> $sub_heading </h3>
</header>

<div class="header-img">
  <img src="$image_url" alt="logo">
</div>


<b class="tag">TAG: $tag_name </b> <br/>

<b>MODELLNUMMER / MODEL NUMBER: </b> $model_number <br/>

<b>JAHR / YEAR: </b> $year <br/>
 
<b>DAUER / DURATION:</b> $duration <br/>

<b>ORT / LOCATION: </b> $ort_location <br/>

<b>LAND / COUNTRY:</b> $country <br/>

<b>REGION / AREA: </b> $area <br/>

<b>LOCATION: </b> $location <br/>

<b>ZIELGRUPPE:</b> $zielgruppe <br/>

<b>INITATOR*IN / INITIATOR(S): </b> $initiators <br/>

<b>VERANTWORTLICHE / MAINTAINED BY: </b> $maintained_by <br/><br/>

<b>BESCHREIGUNG / DESCRIPTION:</b> <br/>
$description<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div class="image_section">$img_section</div><br/><br/>

</div>
EOT;

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

$dompdf->loadHtml($render_html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($slug);