<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

define('WP_ALLOW_MULTISITE', true);

define('WP_RELOCATE',true);
define('RELOCATE',true);


define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'kecms.dev');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);


define('WP_SITEURL','http://'.$_SERVER['HTTP_HOST'].'/app/article');
define('WP_HOME','http://'.$_SERVER['HTTP_HOST']);

define('WP_CONTENT_DIR',__DIR__);
define('WP_CONTENT_URL', '/app');

define('WP_PLUGIN_DIR', WP_CONTENT_DIR);
define('WP_PLUGIN_URL', WP_CONTENT_URL);

define('COOKIEPATH',  '/');


/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'ycms');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', '');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8mb4');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');


/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3K2Zj*A~o3 8?-x;gCp-J}LC+;mB/ngl:@~?R=RgIEuNH07K;}8-5=`|VqKjYh.!');
define('SECURE_AUTH_KEY',  '0M,-1]ef(kB4wf$@BF`pirc;FP&AMRg{6SC4Ghl::a%kRH:Y-ecrQ&eiVMgM|pdU');
define('LOGGED_IN_KEY',    'kYcLB+4tj>hbCwN!K%?i`-0P8$e==JPcd:rbLR!P6[ sN-2G7i@O_#M-4dgR~0|{');
define('NONCE_KEY',        'Ml-u8XyuDs-II Kw0*ZSCAs7$RSJi/CdkZ`8.- UA3#})M+`7CE-7Tq>ZJGB;3PO');
define('AUTH_SALT',        'i@rveK0mA>2bQ&HS:+O{pT1;LvvoNrJpwg0]Su5^nAeKG&Rv-0[%k|gpe|N`I+j|');
define('SECURE_AUTH_SALT', 'f{nAKRDG>1L{WP.IClu9ZVo_kN?RJS2Os!d|o9 O)y&7-y~h+$/5=!YQf@Kdjr?Z');
define('LOGGED_IN_SALT',   ')Om9A[LFMQt#!|)<=]SX]=*.GI/bZ.{IQdtG1aK|2)Pu4?zXKy=|OGf)d+D&u_6Z');
define('NONCE_SALT',       'cARrdYhaB]u?gOFXpSa9yr0vdzZu|qm+0fN-%.y&oBWd^awCiR2! M[Rk6?KK=ef');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', true);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
