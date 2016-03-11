<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wp_mulheresdaterra4');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=(Z*w1hj[{Wx4#hd~ZZj,g--*mo,uoFfM1[s>s` iG<Ll--PVZDY<&3ltnHl3I |');
define('SECURE_AUTH_KEY',  'CW?9@-,BTUE+l@tLSDQy;G@TY&S3ed{U.w$<Mz&.]J< E%M=rP1dyE;U1)I,PZr@');
define('LOGGED_IN_KEY',    '(S_MUE}t#OT-uvF*8PHpg|7+L@_sN~WE354?-0;slC 2e{+O7043(4bp:5L_+~,@');
define('NONCE_KEY',        'u<jjPu!JWy|-2Xy#YP8jg*fhupw$jO[6M];{e:q5Np)W!s-jjW5i~M5bd%7`QS/-');
define('AUTH_SALT',        'Vg%ke+X/G><kC?Mt|z$}w(oIcPY]=MuV?t&/BxD4,Xi!kWVC`4NB2 Mdsm83!@&l');
define('SECURE_AUTH_SALT', 'EBf]4r}9R;Y.&hwnet:OR2+LLP^|BY1T9MYvkLq%7UrTg5I39$S{2)aj-Ho6#M)%');
define('LOGGED_IN_SALT',   '_ju}a<,aR:=N2wn2-s3)XeBQJ;Y3+$$3NYm4d|>aEStf7Pcz4%4`9&),%dkJ04i=');
define('NONCE_SALT',       'b=^7R7C ~|5v0@Qzbk/ZXF7XvdsHT70N{EEXAty&.7Z#Lf}Ejxa%+~YyBX+3LkHF');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
