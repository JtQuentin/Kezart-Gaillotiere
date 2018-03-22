<?php
/*
Template Name: Mentions légales
*/
?>
<?php get_header(); ?>

<?php $blog_title = get_bloginfo( 'name' ); ?>

<section class="mentions-legales">
	<div class="container">
		<h1>Mentions légales</h1>
		<div class="row mentions-legales">
			<div class="col-12">
				<p>Merci de lire avec attention les différentes modalités d’utilisation du présent site avant d’y parcourir ses pages. En vous connectant sur ce site, vous acceptez sans réserves les présentes modalités. Aussi, conformément à l’article n°6 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l’économie numérique, les responsables du présent site internet <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a> sont :</p>
			</div>
			<div class="col-md-4">
				<h2>Editeur :</h2>
				<p><?php the_field('entreprise_nom', 'option'); ?><br>
				<?php the_field('entreprise_adresse', 'option'); ?><br>
				<?php the_field('entreprise_code_postal', 'option'); ?> <?php the_field('entreprise_adresse', 'option'); ?> - <?php the_field('entreprise_pays', 'option'); ?><br>
				Numéro de SIRET : <?php the_field('entreprise_siret', 'option'); ?><br>
				Téléphone : <?php the_field('entreprise_telephone', 'option'); ?><br>
				<?php $entreprise_email =  antispambot( get_field('entreprise_email', 'option') ); ?>
				Email : <a href="mailto:<?php echo $entreprise_email; ?>"><?php echo $entreprise_email; ?></a><br>
				Site Web : <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a></p>

				<p>Responsable éditorial :
					<?php if( get_field('responsable_de_publication', 'option') == 'self') :
							the_field('entreprise_nom', 'option');
						else :
							the_field('responsable_publication_nom', 'option');
							$responsable_publication_email =  antispambot( get_field('responsable_publication_email', 'option') );
							echo " <<a href=$responsable_publication_email>$responsable_publication_email</a>>";
					endif; ?><br>
				Webmaster :
					<?php if( get_field('webmaster', 'option') == 'self') :
							the_field('entreprise_nom', 'option');
						else :
							the_field('webmaster_nom', 'option');
							$webmaster_email =  antispambot( get_field('webmaster_email', 'option') );
							echo " <<a href=$webmaster_email>$webmaster_email</a>>";
					endif; ?></p>
			</div>
			<div class="col-md-4">
				<h2>Hébergement :</h2>
				<p>Hébergeur : <?php the_field('hebergeur_nom', 'option'); ?><br>
				<?php the_field('hebergeur_adresse', 'option'); ?></p>
			</div>
			<div class="col-md-4">
				<h2>Créateur :</h2>
				<p>Société : Kézart<br>
				1 avenue Christian Doppler, bâtiment 3<br>
				77700 Serris - France<br>
				Site Web : <a href="http://kezart.com">www.kezart.com</a></p>
			</div>
			<div class="col-12">
				<h2 class="pt-4">Conditions d’utilisation :</h2>
				<p>Ce site (<a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a>) est proposé en différents langages web (HTML, HTML5, Javascript, CSS, etc…) pour un meilleur confort d’utilisation et un graphisme plus agréable, nous vous recommandons de recourir à des navigateurs modernes comme Internet explorer, Safari, Firefox, Google Chrome, etc…</p>

				<p><?php the_field('entreprise_nom', 'option'); ?> met en œuvre tous les moyens dont elle dispose, pour assurer une information fiable et une mise à jour fiable de son site internet. Toutefois, des erreurs ou omissions peuvent survenir. L’internaute devra donc s’assurer de l’exactitude des informations auprès de <?php the_field('entreprise_nom', 'option'); ?>, et signaler toutes modifications du site qu’il jugerait utile. <?php the_field('entreprise_nom', 'option'); ?> n’est en aucun cas responsable de l’utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.</p>

				<p><strong>Cookies :</strong> Le site <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a> peut-être amené à vous demander l’acceptation des cookies pour des besoins de statistiques et d’affichage. Un cookies est une information déposée sur votre disque dur par le serveur du site que vous visitez. Il contient plusieurs données qui sont stockées sur votre ordinateur dans un simple fichier texte auquel un serveur accède pour lire et enregistrer des informations . Certaines parties de ce site ne peuvent être fonctionnelles sans l’acceptation de cookies.</p>

				<p><strong>Liens hypertextes :</strong> Le site internet peut offrir des liens vers d’autres sites internet ou d’autres ressources disponibles sur Internet. <?php the_field('entreprise_nom', 'option'); ?> ne dispose d’aucun moyen pour contrôler les sites en connexion avec le site internet et ne répond pas de la disponibilité de tels sites et sources externes, ni ne la garantit. Elle ne peut être tenue pour responsable de tout dommage, de quelque nature que ce soit, résultant du contenu de ces sites ou sources externes, et notamment des informations, produits ou services qu’ils proposent, ou de tout usage qui peut être fait de ces éléments. Les risques liés à cette utilisation incombent pleinement à l’internaute, qui doit se conformer à leurs conditions d’utilisation.
				Les utilisateurs, les abonnés et les visiteurs des sites internet  ne peuvent pas mettre en place un hyperlien en direction de ce site sans l’autorisation expresse et préalable de <?php the_field('entreprise_nom', 'option'); ?>.<br>
				Dans l’hypothèse où un utilisateur ou visiteur souhaiterait mettre en place un hyperlien en direction d’un des sites internet de <?php the_field('entreprise_nom', 'option'); ?>, il lui appartiendra d’adresser un email accessible sur le site afin de formuler sa demande de mise en place d’un hyperlien. <?php the_field('entreprise_nom', 'option'); ?> se réserve le droit d’accepter ou de refuser un hyperlien sans avoir à en justifier sa décision.</p>

				<h2 class="pt-4">Services fournis :</h2>
				<p>L’ensemble des activités de la société ainsi que ses informations sont présentés sur notre site <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a>.</p>

				<p><?php the_field('entreprise_nom', 'option'); ?> s’efforce de fournir sur le site <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a> des informations aussi précises que possible. les renseignements figurant sur le site <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a> ne sont pas exhaustifs et les photos non contractuelles. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne. Par ailleurs, tous les informations indiquées sur le site <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a> sont données à titre indicatif, et sont susceptibles de changer ou d’évoluer sans préavis.</p>

				<h2 class="pt-4">Limitation contractuelles sur les données :</h2>
				<p>Les informations contenues sur ce site sont aussi précises que possible et le site remis à jour à différentes périodes de l’année, mais peut toutefois contenir des inexactitudes ou des omissions. Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien vouloir le signaler par email, à l’adresse <a href="mailto:<?php echo $entreprise_email; ?>"><?php echo $entreprise_email; ?></a>, en décrivant le problème de la manière la plus précise possible (page posant problème, type d’ordinateur et de navigateur utilisé, …).</p>

				<p>Tout contenu téléchargé se fait aux risques et périls de l’utilisateur et sous sa seule responsabilité. En conséquence, ne saurait être tenu responsable d’un quelconque dommage subi par l’ordinateur de l’utilisateur ou d’une quelconque perte de données consécutives au téléchargement. De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour.</p>

				<p>Les liens hypertextes mis en place dans le cadre du présent site internet en direction d’autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de <?php the_field('entreprise_nom', 'option'); ?>.</p>

				<h2 class="pt-4">Propriété intellectuelle :</h2>
				<p>Tout le contenu du présent site <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a> réalisé, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de la société à l’exception des marques, logos ou contenus appartenant à d’autres sociétés partenaires ou auteurs.</p>

				<p>Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l’accord exprès par écrit de <?php the_field('entreprise_nom', 'option'); ?>. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre.</p>

				<h2 class="pt-4">Déclaration à la CNIL :</h2>
				<p>Conformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l’égard des traitements de données à caractère personnel) relative à l’informatique, aux fichiers et aux libertés, ce site a fait l’objet d’une déclaration 1656629 auprès de la Commission nationale de l’informatique et des libertés (<a href="https://www.cnil.fr/" target="_blank">www.cnil.fr</a>).</p>

				<h2 class="pt-4">Litiges :</h2>
				<p>Les présentes conditions du site <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a> sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l’interprétation ou de l’exécution de celles-ci seront de la compétence exclusive des tribunaux dont dépend le siège social de la société. La langue de référence, pour le règlement de contentieux éventuels, est le français.</p>

				<h2 class="pt-4">Données personnelles :</h2>
				<p>De manière générale, vous n’êtes pas tenu de nous communiquer vos données personnelles lorsque vous visitez notre site Internet <a href="<?php echo get_site_url(); ?>"><?php echo $blog_title ?></a>.</p>

				<p>Cependant, ce principe comporte certaines exceptions. En effet, pour certains services proposés par notre site, vous pouvez être amenés à nous communiquer certaines données telles que : votre nom, votre fonction, le nom de votre société, votre adresse électronique, et votre numéro de téléphone. Tel est le cas lorsque vous remplissez le formulaire qui vous est proposé en ligne, dans la rubrique « contact ». Dans tous les cas, vous pouvez refuser de fournir vos données personnelles. Dans ce cas, vous ne pourrez pas utiliser les services du site, notamment celui de solliciter des renseignements sur notre société, ou de recevoir les lettres d’information.</p>

				<p>Enfin, nous pouvons collecter de manière automatique certaines informations vous concernant lors d’une simple navigation sur notre site Internet, notamment : des informations concernant l’utilisation de notre site, comme les zones que vous visitez et les services auxquels vous accédez, votre adresse IP, le type de votre navigateur, vos temps d’accès. De telles informations sont utilisées exclusivement à des fins de statistiques internes, de manière à améliorer la qualité des services qui vous sont proposés. Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
