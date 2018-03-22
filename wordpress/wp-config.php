<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wp_gaillotiere');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'kezart');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'kezart');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', '10.0.4.42:3307');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xf*V9Zzk4v:G242:rVR~_SB0s5)yWUI{d_~]oROL-AsW8R[{rT@k|L|Q4u9vH(kQ');
define('SECURE_AUTH_KEY',  'P3)@KRX_43i6q;UEXz_UKw|I;w18N:s9krRsMsAe$=1 /R!SGKtax52WT81M9UQ.');
define('LOGGED_IN_KEY',    '+AC+pNe=Y($3^%t6zw*]+_HxS1G2qMK0s8|* FS+AxGij^|^;ZH;&s 2d1dWTpCL');
define('NONCE_KEY',        'NWfdLEZw&gGhI@_E ?=~*y}7eJbkWPyfzSjlD8J>p#HUG;y[m9okT|+J}.^4up|6');
define('AUTH_SALT',        'w/Ak W4)rG(t<QG7lhA8>I9zq6;*_Y)&t=<N;vk8ct#%VC x8^`^O:6_deO8qobJ');
define('SECURE_AUTH_SALT', '|,Yv6h<PcfLnn8kK=;v,%R<bBu6W_%ZM,1<AdpPRs2y750#Ir)/j]t&e+r~{wU.U');
define('LOGGED_IN_SALT',   '/X;EzfBP6]HXOx`~=}ruHUDk%BjEsBaZi8]+.~#!5/gzXc*MXPri7(SnB: eB7OJ');
define('NONCE_SALT',       'pRt#esS24JWV3ae-@r0TVXrSUX35=Vp2,%}3fCdyya88NF0,_Ovw(Gz^v2 >=:X;');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
