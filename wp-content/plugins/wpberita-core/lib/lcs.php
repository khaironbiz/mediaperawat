<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(!function_exists("\167\160\x62\x65\x72\151\164\141\x5f\x63\157\162\x65\137\x67\x65\x74\x5f\150\157\x6d\x65")){function wpberita_core_get_home(){$e4Dc3=array("\150\164\x74\x70\72\x2f\57","\150\x74\164\160\163\x3a\57\57","\x68\x74\164\x70\x3a\57\57\x77\x77\167\56","\x68\x74\164\x70\163\x3a\x2f\57\x77\167\x77\56","\167\x77\x77\56");return str_replace($e4Dc3,'',home_url());}}if(!function_exists("\x77\x70\x62\145\162\151\x74\x61\x5f\x63\x6f\x72\x65\137\x6c\x69\x63\145\x6e\x73\145\x5f\155\x65\x6e\165")){function wpberita_core_license_menu(){add_plugins_page(__("\x57\x70\x62\x65\x72\x69\x74\141\40\x4c\151\143\145\156\x73\x65","\167\x70\x62\x65\162\151\x74\x61\x2d\143\x6f\x72\145"),__("\127\160\142\145\x72\151\x74\x61\40\x4c\x69\x63\145\156\x73\145","\167\x70\x62\x65\162\151\x74\141\x2d\x63\x6f\x72\145"),"\x6d\141\156\141\x67\x65\137\157\160\x74\151\157\156\163",WPBERITA_PLUGIN_LICENSE_PAGE,"\x77\x70\x62\145\x72\x69\164\x61\137\x63\157\162\x65\x5f\x6c\151\x63\x65\156\163\145\137\160\141\x67\x65");}}add_action("\x61\x64\x6d\x69\156\x5f\x6d\145\156\x75","\167\x70\142\x65\x72\151\x74\x61\137\x63\x6f\x72\x65\x5f\x6c\151\x63\145\156\163\145\137\x6d\x65\x6e\165");if(!function_exists("\167\x70\x62\x65\x72\x69\164\x61\137\143\x6f\x72\145\x5f\x6c\x69\143\x65\156\x73\145\x5f\x70\141\147\145")){function wpberita_core_license_page(){$LXyPo=md5(wpberita_core_get_home());$hpRFd=trim(get_option("\x77\160\x62\145\162\151\164\x61\x5f\143\157\162\x65\x5f\154\151\x63\145\156\x73\x65\137\x73\x74\x61\164\165\163".$LXyPo));echo "\11\11\x3c\x64\x69\x76\40\143\154\141\x73\163\x3d\x22\x77\x72\x61\160\x22\x3e\12\x9\x9\x9\x3c\150\x32\x3e";esc_attr_e("\x57\160\142\145\162\x69\164\141\x20\x4c\151\x63\x65\156\163\x65\x20\117\160\x74\151\157\156\163","\167\x70\x62\145\162\x69\x74\141\55\x63\x6f\x72\145");echo "\x3c\57\150\x32\76\12\11\11\11\x3c\146\157\x72\155\40\155\x65\x74\x68\x6f\x64\x3d\x22\160\x6f\x73\x74\42\x20\x61\143\164\151\157\156\75\x22\x6f\160\164\151\x6f\x6e\x73\x2e\x70\x68\x70\42\76\xa\11\x9\x9\11";settings_fields("\x77\160\142\x65\x72\151\x74\141\x5f\x63\x6f\162\145\x5f\x6c\151\x63\145\x6e\x73\x65");echo "\x9\x9\x9\11\x3c\164\x61\142\154\145\x20\x63\154\141\x73\x73\x3d\42\x66\157\162\155\x2d\x74\x61\142\154\145\42\x3e\12\x9\11\11\11\11\74\164\x62\x6f\x64\x79\76\xa\11\11\x9\x9\11\x9\74\164\x72\40\x76\141\x6c\x69\x67\156\75\42\x74\x6f\x70\x22\76\12\11\x9\11\11\11\11\11\x3c\164\150\40\x73\143\x6f\160\145\75\42\162\x6f\x77\x22\40\x76\x61\154\x69\x67\x6e\75\x22\164\x6f\x70\42\76\xa\11\x9\11\x9\x9\x9\11\x9";esc_attr_e("\114\x69\143\x65\156\163\x65\40\x4b\145\x79","\x77\x70\x62\x65\x72\151\164\x61\55\143\x6f\x72\x65");echo "\x9\11\x9\x9\x9\x9\11\x3c\x2f\x74\150\x3e\12\11\11\x9\x9\x9\x9\11\74\x74\144\x3e\12\11\x9\11\x9\x9\x9\11\11\74\151\156\160\165\164\x20\151\144\x3d\42\x77\x70\142\x65\162\x69\x74\x61\137\x63\x6f\162\x65\137\154\151\x63\145\x6e\x73\145\x5f\x6b\145\x79\42\40\x6e\141\155\x65\x3d\x22\x77\x70\x62\145\x72\151\x74\141\137\x63\157\x72\x65\x5f\154\x69\143\145\x6e\163\145\x5f\153\145\x79\42\40\x74\171\160\x65\75\x22\x74\x65\170\164\x22\40\x70\x6c\x61\143\x65\x68\157\154\144\145\x72\75\x22\130\x58\130\130\130\137\x78\170\170\170\170\170\x78\x78\170\x78\x78\170\170\170\x78\42\x20\x63\x6c\x61\163\163\x3d\42\x72\145\x67\165\x6c\141\162\55\x74\x65\170\x74\x22\x20\x2f\x3e\x3c\x62\x72\40\x2f\x3e\xa\x9\x9\11\x9\11\x9\x9\x9\x3c\x6c\x61\142\145\x6c\x20\x63\154\141\x73\x73\x3d\42\x64\x65\163\x63\162\151\x70\164\x69\x6f\156\42\x20\146\157\162\75\x22\167\x70\142\145\162\x69\164\141\137\x63\157\x72\x65\x5f\154\151\x63\x65\x6e\163\145\x5f\x6b\145\171\x22\76";esc_attr_e("\105\156\x74\145\x72\40\x79\x6f\x75\162\40\x6c\151\x63\x65\156\x73\x65\x20\153\145\x79\40\150\x65\162\x65","\167\160\142\x65\x72\151\164\141\x2d\143\x6f\162\145");echo "\74\57\154\141\x62\x65\154\x3e\xa\11\x9\x9\11\x9\x9\11\x3c\57\x74\x64\x3e\12\11\11\11\x9\x9\11\74\x2f\164\162\x3e\12\12\11\x9\11\x9\x9\x9\74\164\162\x20\166\x61\x6c\151\147\x6e\75\x22\x74\x6f\x70\42\x3e\xa\11\x9\11\x9\11\11\x9\74\164\150\40\x73\143\157\x70\x65\x3d\42\162\x6f\167\42\40\166\x61\x6c\151\147\x6e\x3d\x22\x74\157\x70\x22\76\xa\x9\11\x9\x9\11\11\x9\x9";esc_attr_e("\x41\x63\164\x69\166\141\x74\145\x20\x4c\x69\143\145\x6e\x73\x65","\x77\x70\x62\x65\162\151\x74\x61\55\143\157\x72\x65");echo "\11\x9\x9\x9\11\11\x9\x3c\57\x74\x68\x3e\12\xa\x9\x9\11\x9\11\x9\x9\74\x74\144\76\xa\11\11\x9\11\x9\x9\x9\x9";if(!empty($hpRFd)&&"\x6f\153"===$hpRFd){goto af0EG;}wp_nonce_field("\167\x70\x62\x65\162\151\x74\141\137\143\157\162\145\x5f\x6c\x69\143\x65\x6e\163\145\137\156\157\156\143\145","\167\x70\142\145\162\x69\x74\141\x5f\x63\x6f\x72\145\x5f\x6c\151\143\145\156\163\145\137\x6e\157\x6e\x63\145");echo "\x9\11\11\x9\x9\11\11\x9\x9\74\x69\156\x70\165\164\40\164\171\160\x65\x3d\x22\163\x75\x62\x6d\x69\164\x22\x20\143\154\141\163\x73\75\x22\x62\x75\164\164\x6f\156\x2d\163\145\143\157\156\x64\x61\162\171\42\40\156\x61\155\145\75\42\167\x70\x62\x65\x72\x69\x74\141\137\x63\x6f\x72\145\x5f\154\x69\x63\x65\x6e\163\x65\x5f\x61\x63\x74\151\166\141\164\x65\x22\x20\166\x61\154\x75\x65\x3d\42";esc_attr_e("\x41\x63\164\151\166\x61\164\145\x20\x4c\151\x63\145\156\x73\145","\167\160\x62\x65\x72\151\x74\x61\55\143\x6f\x72\x65");echo "\x22\57\x3e\xa\11\11\11\x9\11\x9\11\11";goto oFziW;af0EG:echo "\x9\x9\11\11\x9\11\11\x9\x9\x3c\151\156\x70\165\x74\40\164\x79\x70\145\x3d\x22\x73\x75\x62\x6d\x69\x74\42\x20\163\164\x79\x6c\x65\x3d\x22\142\x61\143\x6b\x67\x72\157\x75\x6e\144\72\x20\43\144\146\x66\60\144\70\x20\x21\x69\155\160\x6f\x72\164\141\156\164\73\x63\x6f\x6c\157\x72\72\x20\43\63\x63\67\66\63\x64\40\41\151\x6d\160\157\162\164\x61\x6e\x74\73\x74\145\170\164\55\163\x68\x61\x64\157\167\72\x20\x6e\x6f\156\145\x20\41\151\155\160\157\162\x74\x61\x6e\164\x3b\42\x20\x63\154\141\163\163\75\42\142\165\x74\x74\x6f\x6e\x2d\163\145\143\x6f\x6e\x64\x61\x72\x79\42\x20\156\141\155\x65\75\42\42\x20\144\x69\163\141\142\154\x65\x64\x20\x76\141\x6c\165\145\x3d\x22";esc_attr_e("\114\x69\143\x65\156\163\145\x20\x41\x63\x74\x69\166\145","\167\x70\x62\145\162\151\x74\x61\55\143\157\x72\145");echo "\x22\x2f\x3e\12\x9\11\11\11\x9\x9\11\11\11";wp_nonce_field("\x77\x70\x62\145\162\151\x74\141\137\x63\157\162\145\137\x6c\x69\x63\x65\x6e\x73\x65\137\156\157\156\143\x65","\167\160\x62\x65\x72\x69\x74\x61\137\143\157\x72\145\x5f\154\151\x63\145\156\x73\145\x5f\156\x6f\156\x63\145");echo "\x9\11\11\x9\11\11\x9\x9\11\x3c\151\156\160\x75\x74\x20\x74\171\x70\145\x3d\42\163\x75\x62\x6d\x69\164\42\40\x63\154\x61\x73\x73\75\42\142\x75\x74\x74\157\x6e\x2d\x73\145\143\x6f\x6e\144\141\162\x79\42\40\156\141\155\145\x3d\42\x77\x70\142\x65\x72\x69\x74\x61\x5f\x63\x6f\x72\145\x5f\x6c\x69\143\145\x6e\x73\145\137\144\x65\141\x63\x74\151\166\141\x74\x65\x22\x20\x76\141\x6c\x75\145\75\x22";esc_attr_e("\x44\145\141\x63\x74\x69\166\x61\x74\145\40\114\x69\143\145\x6e\x73\145","\167\x70\142\145\162\x69\164\141\x2d\x63\157\x72\145");echo "\42\x2f\76\12\11\x9\x9\11\x9\x9\11\x9\11\x3c\x6c\x61\142\x65\154\40\x63\x6c\x61\163\163\x3d\x22\x64\x65\163\x63\162\151\160\x74\151\157\156\42\x20\x66\x6f\162\x3d\42\167\160\142\145\162\151\x74\x61\137\143\157\162\x65\x5f\x6c\151\143\x65\x6e\x73\145\x5f\x6b\x65\171\x22\76\74\142\x72\40\57\x3e\xa\x9\11\x9\11\x9\x9\x9\11\11\x9";esc_html_e("\103\x6f\x6e\x67\162\141\164\165\x6c\x61\164\151\157\156\x73\x2c\x20\x79\157\x75\162\x20\x6c\x69\x63\x65\x6e\163\145\x20\151\163\40\141\143\x74\x69\166\145\x2e","\x77\160\x62\145\162\151\x74\141\x2d\143\x6f\x72\x65");echo "\x3c\x62\162\x20\x2f\x3e\xa\x9\11\x9\11\x9\x9\x9\11\x9\11";esc_html_e("\x59\x6f\165\40\143\141\156\x20\x64\x69\x73\141\x62\154\x65\40\x6c\151\x63\145\x6e\x73\145\40\x66\157\162\40\x74\x68\151\163\x20\x64\157\x6d\x61\x69\156\40\142\x79\x20\145\x6e\164\x65\x72\x69\156\x67\40\x74\x68\x65\40\154\151\x63\145\156\x73\x65\40\153\x65\x79\40\164\x6f\40\164\x68\145\x20\x66\x6f\162\155\40\141\x6e\144\40\143\x6c\x69\143\153\151\x6e\x67\40\104\x65\141\143\164\x69\166\141\164\x65\40\114\x69\143\x65\x6e\163\x65","\x77\x70\x62\145\162\151\164\x61\x2d\143\x6f\162\145");echo "\74\x2f\154\x61\x62\145\154\76\xa\11\11\11\x9\11\x9\x9\x9\x9\x9";wpberita_core_check_license();echo "\11\11\x9\11\11\11\x9\11\11";oFziW:echo "\x9\11\11\x9\x9\x9\11\74\57\164\x64\76\xa\x9\11\11\x9\x9\11\74\x2f\164\162\x3e\12\x9\x9\11\11\x9\74\57\164\142\157\144\x79\x3e\12\11\11\x9\x9\74\x2f\164\141\142\154\145\x3e\12\11\11\x9\74\57\146\x6f\162\155\76\xa\11\11\74\x2f\144\151\x76\76\xa\11\x9";}}if(!function_exists("\167\160\142\x65\x72\x69\164\141\137\143\x6f\x72\x65\137\162\x65\147\x69\x73\x74\145\162\137\x6f\x70\x74\151\157\x6e")){function wpberita_core_register_option(){$LXyPo=md5(wpberita_core_get_home());register_setting("\167\x70\142\145\162\151\164\141\137\x63\157\162\145\x5f\x6c\151\143\x65\156\x73\x65","\x77\160\x62\x65\162\x69\164\141\x5f\143\157\162\x65\x5f\154\x69\143\x65\156\163\x65\137\153\x65\x79".$LXyPo,"\163\141\156\x69\164\x69\x7a\145\137\164\145\170\164\137\x66\151\x65\154\144");register_setting("\167\x70\142\x65\162\x69\164\x61\137\x63\157\162\145\137\x6c\151\x63\x65\x6e\163\145","\167\160\x62\x65\162\x69\164\141\137\143\x6f\x72\x65\137\x6c\x69\x63\145\x6e\163\145\x5f\x73\164\141\x74\165\x73".$LXyPo,"\x73\x61\x6e\151\164\x69\172\145\137\164\x65\x78\164\x5f\x66\151\x65\x6c\x64");}}add_action("\x61\144\155\151\x6e\x5f\x69\x6e\151\164","\x77\x70\x62\145\162\151\x74\141\x5f\x63\157\162\145\x5f\162\145\147\151\163\x74\x65\162\x5f\157\x70\x74\151\x6f\x6e");if(!function_exists("\167\x70\x62\145\162\x69\164\x61\137\x63\x6f\x72\145\x5f\143\x6f\x6e\156\145\143\x74\x5f\146\163")){function wpberita_core_connect_fs(){global $wp_filesystem;if(!(false===($XXYr7=request_filesystem_credentials('')))){goto xAjp7;}return false;xAjp7:if(WP_Filesystem($XXYr7)){goto Fei0j;}request_filesystem_credentials('');return false;Fei0j:return true;}}if(!function_exists("\167\160\x62\x65\x72\151\164\x61\x5f\143\x6f\x72\x65\137\x64\145\137\154\151\x63\x65\156\x73\145")){function wpberita_core_de_license($CeUkx,$b0OVJ,$pcbgM="\152\163\150\113\x6a\163\156\152\x48\146\142\103\x36\152\152\x6a"){$C1xdn=false;$le5WG="\x41\105\x53\x2d\62\x35\66\55\103\x42\x43";$NAr2F=$pcbgM;$q4k6D="\x58\152\x73\153\x53\152\110\x53\153\x6b\153\112\x73\x74";$w0A23=hash("\163\150\x61\62\x35\x36",$NAr2F);$I0lJz=substr(hash("\163\150\141\62\x35\x36",$q4k6D),0,16);if("\145"===$CeUkx){goto t0Ktm;}if("\x64"===$CeUkx){goto bBQ7f;}goto OoK3U;t0Ktm:$C1xdn=openssl_encrypt($b0OVJ,$le5WG,$w0A23,0,$I0lJz);$C1xdn=base64_encode($C1xdn);goto OoK3U;bBQ7f:$C1xdn=openssl_decrypt(base64_decode($b0OVJ),$le5WG,$w0A23,0,$I0lJz);OoK3U:return $C1xdn;}}if(!function_exists("\x77\160\x62\x65\162\151\x74\x61\x5f\x63\157\x72\x65\x5f\x72\x65\x6d\x6f\164\x65\x5f\147\145\x74")){function wpberita_core_remote_get($NZ3Fd="\143\x68\x65\x63\x6b",$eu5w8=''){if("\x63\150\x65\143\153"===$NZ3Fd){goto Mevi0;}if("\x61\x63\164\x69\166\x61\x74\x65\144"===$NZ3Fd){goto hygoC;}$Niwpx=esc_url_raw(add_query_arg($eu5w8,WPBERITA_API_URL_DEACTIVATED));goto SRNhz;Mevi0:$Niwpx=esc_url_raw(add_query_arg($eu5w8,WPBERITA_API_URL_CHECK));goto SRNhz;hygoC:$Niwpx=esc_url_raw(add_query_arg($eu5w8,WPBERITA_API_URL));SRNhz:$LdmXN=wp_remote_get($Niwpx,array("\x74\151\155\x65\x6f\x75\x74"=>20,"\x73\163\154\x76\x65\162\151\146\171"=>false));$T4qA5='';if(is_wp_error($LdmXN)||200!==wp_remote_retrieve_response_code($LdmXN)){goto okCZ1;}$TSfu4=json_decode(wp_remote_retrieve_body($LdmXN));if(is_wp_error($TSfu4)){goto FWoRA;}if(!("\x6f\153"!==$TSfu4->code)){goto gbBbs;}switch($TSfu4->code){case "\154\x69\143\145\156\163\x65\x5f\145\155\160\164\x79":$T4qA5=__("\105\x6d\x70\x74\171\40\157\162\x20\x69\x6e\x76\x61\154\151\x64\x20\154\151\143\145\156\x73\145\40\x6b\145\171\x20\x73\x75\x62\x6d\151\x74\164\x65\144\x2e","\167\x70\142\x65\162\x69\164\141\x2d\143\x6f\162\145");goto jfwQi;case "\154\x69\143\x65\156\163\x65\x5f\x6e\157\164\x5f\146\157\x75\x6e\x64":$T4qA5=__("\114\x69\x63\x65\x6e\163\x65\x20\x6b\x65\171\40\156\x6f\x74\x20\146\x6f\x75\156\144\x20\x6f\x6e\40\157\x75\162\40\163\x65\162\166\x65\x72\56","\167\x70\x62\x65\162\151\x74\x61\x2d\143\157\x72\145");goto jfwQi;case "\154\151\143\145\x6e\163\145\x5f\x64\151\163\141\x62\x6c\x65\x64":$T4qA5=__("\114\151\x63\145\x6e\163\145\40\153\145\171\40\x68\141\x73\x20\x62\145\x65\156\x20\144\151\163\141\142\x6c\x65\144\56","\167\x70\142\x65\x72\x69\164\141\x2d\143\x6f\x72\145");goto jfwQi;case "\x6c\x69\x63\145\156\163\x65\x5f\x65\170\x70\151\162\x65\144":$T4qA5=__("\131\x6f\x75\x72\40\x6c\x69\x63\145\x6e\x73\x65\40\153\x65\171\40\145\170\160\151\x72\x65\x64\40\x6f\x6e","\x77\160\142\x65\x72\x69\x74\141\55\143\157\x72\145")."\40".date_i18n(get_option("\144\141\x74\x65\x5f\x66\x6f\x72\155\x61\x74"),strtotime($TSfu4->expires,current_time("\164\x69\155\145\163\164\x61\155\x70")));goto jfwQi;case "\141\143\x74\x69\x76\x61\x74\x69\157\156\x5f\163\x65\162\166\145\x72\137\x65\x72\162\x6f\x72":$T4qA5=__("\x41\143\x74\151\x76\x61\x74\151\157\156\40\x73\145\x72\166\x65\162\40\x65\x72\162\x6f\162\x2e","\x77\160\x62\x65\162\151\x74\141\55\x63\x6f\x72\x65");goto jfwQi;case "\x69\156\x76\x61\x6c\151\144\x5f\x69\x6e\x70\x75\164":$T4qA5=__("\x41\143\x74\151\166\141\164\x69\157\x6e\x20\146\x61\151\x6c\x65\144\x3a\40\151\x6e\x76\x61\x6c\151\x64\x20\x69\x6e\160\165\164\56","\167\160\x62\x65\162\151\x74\141\55\x63\157\x72\x65");goto jfwQi;case "\x6e\157\x5f\163\160\x61\162\x65\137\x61\143\x74\x69\166\141\164\151\x6f\156\163":$T4qA5=__("\116\157\x20\155\157\162\145\x20\141\x63\164\x69\x76\141\164\x69\x6f\x6e\x73\40\141\x6c\x6c\157\x77\x65\x64\56\x20\131\x6f\x75\x20\155\165\163\164\x20\x62\x75\x79\x20\x6e\x65\167\40\x6c\x69\143\145\x6e\x73\145\40\153\x65\x79\56","\x77\160\x62\145\x72\x69\164\x61\x2d\x63\157\162\x65");goto jfwQi;case "\156\x6f\137\x61\x63\x74\151\x76\x61\x74\151\x6f\x6e\137\146\x6f\165\x6e\144":$T4qA5=__("\x4e\157\x20\141\143\164\151\x76\141\x74\151\157\156\x20\146\x6f\165\156\144\40\146\157\x72\40\x74\x68\x69\163\x20\151\156\163\x74\141\154\x6c\141\164\151\157\x6e\56","\x77\160\142\145\162\151\164\141\55\143\157\x72\145");goto jfwQi;case "\x6e\x6f\137\x72\x65\141\x63\x74\x69\166\141\x74\x69\x6f\156\137\141\154\154\157\x77\x65\x64":$T4qA5=__("\122\x65\55\x61\143\164\x69\166\141\x74\x69\157\156\40\x69\163\40\x6e\x6f\164\40\x61\154\154\x6f\x77\x65\x64\x2e","\x77\160\x62\145\x72\151\x74\x61\55\143\157\x72\145");goto jfwQi;case "\157\164\150\x65\x72\x5f\145\x72\162\157\x72":$T4qA5=__("\x45\162\162\x6f\162\40\162\x65\164\165\162\156\145\x64\x20\146\162\157\x6d\x20\141\143\164\151\x76\141\x74\151\x6f\156\x20\163\x65\x72\166\145\162\x2e","\x77\x70\x62\145\162\x69\164\x61\55\x63\x6f\162\145");goto jfwQi;case "\157\164\x68\x65\x72\137\x65\162\162\x6f\x72":$T4qA5=__("\x45\x72\x72\x6f\x72\x20\162\x65\164\165\x72\156\145\144\x20\x66\x72\157\155\x20\x61\x63\x74\151\166\141\x74\x69\x6f\x6e\x20\163\145\x72\x76\x65\162\x2e","\167\160\142\145\x72\151\x74\x61\x2d\143\157\x72\x65");goto jfwQi;default:$T4qA5=__("\x4f\x74\x68\145\162\40\105\x72\162\157\162\x2e","\167\x70\x62\x65\162\151\x74\141\55\143\x6f\162\x65");goto jfwQi;}XWAiL:jfwQi:gbBbs:if(!("\x6f\153"===$TSfu4->code)){goto J3WmA;}if(!("\x32\x37"!==$TSfu4->scheme_id&&"\62\x38"!==$TSfu4->scheme_id&&"\x32\71"!==$TSfu4->scheme_id&&"\63\60"!==$TSfu4->scheme_id)){goto MK6v3;}$T4qA5=__("\x54\150\151\163\40\x6c\151\x63\145\156\163\x65\40\156\x6f\164\40\x66\157\162\x20\x74\x68\x69\163\x20\160\x72\157\x64\x75\143\x74\x2e","\167\x70\x62\145\162\151\164\141\x2d\x63\157\162\x65");MK6v3:J3WmA:goto iXERr;FWoRA:$T4qA5=$TSfu4->get_error_message();iXERr:goto kiXF9;okCZ1:if(is_wp_error($LdmXN)){goto aHAXd;}$T4qA5=__("\x41\156\40\x65\x72\162\x6f\x72\x20\157\x63\x63\165\x72\x72\145\x64\54\40\160\154\x65\x61\x73\x65\x20\164\162\x79\40\141\x67\x61\151\x6e\56","\x77\x70\x62\x65\162\x69\164\141\55\143\157\162\145");goto M5sAZ;aHAXd:$T4qA5=$LdmXN->get_error_message();M5sAZ:kiXF9:return $T4qA5;}}if(!function_exists("\167\160\x62\x65\162\x69\164\141\137\x63\157\162\145\x5f\141\143\164\x69\x76\141\x74\x65\137\154\151\x63\145\156\163\145")){function wpberita_core_activate_license(){global $wp_filesystem;if(!isset($_POST["\x77\x70\x62\145\162\x69\x74\x61\x5f\x63\x6f\x72\145\137\x6c\x69\x63\145\156\x73\x65\137\141\143\x74\x69\166\x61\164\145"])){goto WaqAs;}$yEXI4=!empty($_POST["\167\x70\x62\x65\162\x69\x74\141\x5f\x63\157\162\x65\137\154\151\143\145\x6e\163\145\137\153\x65\171"])?sanitize_text_field(wp_unslash($_POST["\167\x70\142\x65\x72\x69\164\x61\137\x63\x6f\162\145\x5f\x6c\x69\x63\x65\x6e\x73\145\137\153\x65\171"])):'';$z_OYP=wpberita_core_get_home();if(check_admin_referer("\x77\160\142\145\162\x69\164\x61\137\143\x6f\x72\145\x5f\x6c\x69\143\145\x6e\163\x65\137\x6e\x6f\156\143\x65","\167\x70\142\x65\x72\151\164\x61\x5f\x63\157\162\145\137\154\x69\x63\x65\x6e\x73\145\x5f\x6e\x6f\x6e\x63\x65")){goto k4IM5;}return;k4IM5:$eu5w8=array("\x6b\145\x79"=>$yEXI4);$T4qA5=wpberita_core_remote_get("\143\150\x65\x63\x6b",$eu5w8);if(empty($T4qA5)){goto jrEj2;}$base_url=admin_url("\160\154\165\147\151\x6e\163\x2e\160\150\160\x3f\x70\141\x67\145\x3d".WPBERITA_PLUGIN_LICENSE_PAGE);$npuAT=add_query_arg(array("\167\x70\142\x65\x72\x69\x74\x61\x5f\x63\x6f\162\x65\x5f\x61\143\x74\151\x76\141\164\151\x6f\156"=>"\x66\x61\x6c\x73\145","\x6d\x65\x73\163\141\x67\145"=>rawurlencode($T4qA5)),$base_url);wp_safe_redirect($npuAT);exit;goto boJ2y;jrEj2:$eu5w8=array("\153\145\x79"=>$yEXI4,"\x72\x65\161\x75\145\163\x74\133\x75\x72\154\x5d"=>esc_url($z_OYP));$T4qA5=wpberita_core_remote_get("\141\143\x74\151\166\x61\x74\145\144",$eu5w8);if(empty($T4qA5)){goto Q7ncc;}$base_url=admin_url("\160\x6c\x75\x67\151\156\163\x2e\x70\x68\x70\77\x70\x61\147\145\75".WPBERITA_PLUGIN_LICENSE_PAGE);$npuAT=add_query_arg(array("\x77\160\x62\145\x72\x69\x74\x61\137\143\x6f\x72\145\x5f\141\143\164\151\166\141\x74\151\x6f\156"=>"\x66\x61\x6c\x73\x65","\x6d\145\x73\163\141\x67\145"=>rawurlencode($T4qA5)),$base_url);wp_safe_redirect($npuAT);exit;goto VBg5k;Q7ncc:$LXyPo=md5(wpberita_core_get_home());$VcYJB=wpberita_core_de_license("\x65",$yEXI4,$LXyPo);update_option("\167\160\x62\x65\162\x69\x74\141\x5f\143\x6f\162\145\x5f\x6c\151\x63\145\156\x73\145\137\153\145\171".$LXyPo,$VcYJB);update_option("\x77\x70\x62\145\x72\x69\x74\x61\x5f\x63\x6f\162\145\137\x6c\151\143\x65\156\x73\145\137\163\x74\x61\164\x75\x73".$LXyPo,"\157\x6b");$FJVCE=[];$VCtw_["\x73\x74\163"]="\157\153";$FJVCE[]=$VCtw_;$k6RSx=wp_upload_dir();if(empty($k6RSx["\142\141\x73\x65\144\151\x72"])){goto mIYvT;}if(!wpberita_core_connect_fs()){goto L5pS6;}$Jd5Mn=$k6RSx["\142\x61\163\x65\144\151\x72"]."\57".$LXyPo;$Tu2Cf=$k6RSx["\x62\x61\x73\145\144\x69\162"]."\x2f".$LXyPo."\x2f".$VcYJB."\x2e\x6a\x73\x6f\x6e";if($wp_filesystem->is_dir($Jd5Mn)){goto SHO5U;}$bu81a=defined("\106\123\137\103\110\115\x4f\104\137\104\x49\122")?FS_CHMOD_DIR:fileperms(WP_CONTENT_DIR)&0777|0755;if($wp_filesystem->mkdir($Jd5Mn,$bu81a)){goto H9Drz;}exit("\103\x61\x6e\x27\164\40\x63\x72\x65\x61\x74\145\x20\x63\141\143\x68\145\40\x64\151\x72\x65\143\x74\157\162\171\56\x20\120\154\145\x61\x73\x65\x20\x63\150\145\x63\153\x20\171\x6f\x75\x72\x20\x66\157\x6c\x64\x65\162\40\x70\x65\x72\x6d\x69\163\163\x69\157\156\x2e");H9Drz:SHO5U:$wp_filesystem->put_contents($Tu2Cf,json_encode($FJVCE,JSON_PRETTY_PRINT));L5pS6:mIYvT:wp_safe_redirect(admin_url("\160\154\165\147\151\x6e\163\56\x70\150\160\77\160\x61\147\145\x3d".WPBERITA_PLUGIN_LICENSE_PAGE));exit;VBg5k:boJ2y:WaqAs:}}add_action("\141\144\155\x69\x6e\137\x69\x6e\151\164","\167\x70\142\145\x72\151\x74\141\137\143\157\x72\145\x5f\141\x63\164\151\x76\141\x74\x65\x5f\154\151\143\145\156\x73\x65");if(!function_exists("\167\x70\142\x65\162\x69\164\x61\x5f\x63\x6f\162\145\137\x64\x65\141\143\164\151\x76\141\164\x65\137\x6c\x69\x63\x65\156\x73\x65")){function wpberita_core_deactivate_license(){global $wp_filesystem;if(!isset($_POST["\167\x70\142\x65\x72\x69\x74\141\x5f\x63\x6f\x72\145\x5f\154\x69\143\x65\x6e\x73\x65\137\144\145\x61\x63\x74\x69\166\141\x74\145"])){goto lI2R_;}$yEXI4=!empty($_POST["\x77\160\x62\x65\x72\151\164\x61\x5f\x63\157\162\145\x5f\x6c\x69\143\x65\156\163\145\x5f\153\145\x79"])?sanitize_text_field(wp_unslash($_POST["\x77\160\x62\x65\162\x69\x74\141\137\x63\x6f\x72\x65\137\x6c\x69\143\x65\156\x73\x65\x5f\153\145\x79"])):'';$z_OYP=wpberita_core_get_home();if(check_admin_referer("\167\160\x62\145\162\x69\164\141\x5f\x63\157\x72\x65\x5f\154\151\143\x65\x6e\x73\145\137\x6e\157\x6e\143\145","\167\x70\142\145\x72\x69\164\141\x5f\143\x6f\x72\x65\x5f\154\x69\143\x65\156\163\x65\x5f\x6e\157\x6e\143\145")){goto EXVgG;}return;EXVgG:$eu5w8=array("\153\145\171"=>$yEXI4);$T4qA5=wpberita_core_remote_get("\x63\x68\x65\x63\153",$eu5w8);if(empty($T4qA5)){goto xonty;}$base_url=admin_url("\160\154\x75\147\151\x6e\x73\56\x70\x68\160\x3f\x70\141\x67\x65\75".WPBERITA_PLUGIN_LICENSE_PAGE);$npuAT=add_query_arg(array("\x77\160\x62\x65\x72\151\164\x61\137\x63\157\162\145\137\x61\143\x74\151\x76\x61\164\151\157\x6e"=>"\146\x61\154\163\x65","\155\145\x73\x73\141\x67\145"=>rawurlencode($T4qA5)),$base_url);wp_safe_redirect($npuAT);exit;goto QVgOm;xonty:$eu5w8=array("\x6b\x65\171"=>$yEXI4,"\162\x65\161\x75\x65\x73\x74\133\x75\162\x6c\135"=>esc_url($z_OYP));wpberita_core_remote_get("\144\x65\x61\x63\x74\151\166\x61\x74\x65\144",$eu5w8);$LXyPo=md5(wpberita_core_get_home());$VcYJB=wpberita_core_de_license("\x65",$yEXI4,$LXyPo);update_option("\x77\160\142\x65\x72\151\164\141\137\143\157\x72\x65\137\154\151\x63\x65\x6e\x73\x65\x5f\153\x65\171".$LXyPo,'');update_option("\x77\160\x62\145\x72\151\164\141\x5f\x63\x6f\x72\x65\137\x6c\151\x63\x65\x6e\x73\145\137\163\164\x61\x74\x75\x73".$LXyPo,'');$k6RSx=wp_upload_dir();if(empty($k6RSx["\142\x61\163\x65\144\x69\x72"])){goto LgKZ5;}if(!wpberita_core_connect_fs()){goto Dvaq1;}$Jd5Mn=$k6RSx["\x62\141\x73\145\x64\x69\162"]."\x2f".$LXyPo;if(!$wp_filesystem->exists($Jd5Mn)){goto Nkje8;}$Tu2Cf=$k6RSx["\x62\141\x73\145\x64\x69\162"]."\57".$LXyPo."\57".$VcYJB."\56\152\163\x6f\156";if(!$wp_filesystem->exists($Tu2Cf)){goto JoKuv;}$wp_filesystem->delete($Tu2Cf,false,"\x66");JoKuv:Nkje8:Dvaq1:LgKZ5:wp_safe_redirect(admin_url("\160\x6c\165\x67\151\156\163\x2e\x70\x68\x70\77\160\141\147\x65\75".WPBERITA_PLUGIN_LICENSE_PAGE));exit;QVgOm:lI2R_:}}add_action("\141\x64\155\151\x6e\137\x69\x6e\x69\164","\167\160\142\145\162\x69\x74\141\x5f\x63\x6f\162\x65\137\x64\145\141\143\x74\151\166\141\x74\145\137\x6c\151\143\x65\156\x73\145");if(!function_exists("\x77\x70\142\145\162\151\x74\x61\137\x63\x6f\162\x65\x5f\x63\150\145\x63\153\137\x6c\151\x63\x65\156\x73\145")){function wpberita_core_check_license(){if(!(false===get_transient("\167\160\142\x65\x72\151\164\141\143\157\162\145\x6c\x69\x63\145\x6e\x73\x65\x5f\164\162\x61\x6e\x73\x69\145\156\x74"))){goto HVV0_;}global $wp_filesystem;$LXyPo=md5(wpberita_core_get_home());$yEXI4=trim(get_option("\x77\160\x62\x65\162\x69\x74\x61\x5f\x63\x6f\162\x65\x5f\154\x69\x63\145\x6e\x73\x65\137\153\x65\171".$LXyPo));$VcYJB=wpberita_core_de_license("\145",$yEXI4,$LXyPo);$Ikh2B=wpberita_core_de_license("\x64",$yEXI4,$LXyPo);$eu5w8=array("\x6b\145\171"=>$Ikh2B);$Niwpx=esc_url_raw(add_query_arg($eu5w8,WPBERITA_API_URL_CHECK));$LdmXN=wp_remote_get($Niwpx,array("\164\151\155\x65\x6f\165\x74"=>20,"\163\163\154\166\x65\162\x69\146\x79"=>false));if(is_wp_error($LdmXN)||200!==wp_remote_retrieve_response_code($LdmXN)){goto Z2nCL;}$TSfu4=json_decode(wp_remote_retrieve_body($LdmXN));if(is_wp_error($TSfu4)){goto CXZnv;}set_transient("\167\160\142\145\x72\x69\x74\x61\143\x6f\x72\x65\154\151\143\x65\156\x73\145\137\164\x72\x61\x6e\x73\x69\145\156\164","\x68\x61\x73\x68\x63\x61\143\150\x65",7*24*HOUR_IN_SECONDS);if(!("\157\153"!==$TSfu4->code)){goto XCRG8;}switch($TSfu4->code){case "\x6c\x69\x63\145\156\163\x65\x5f\x65\155\160\x74\171":update_option("\167\160\142\x65\162\151\164\141\137\x63\157\x72\145\137\x6c\151\x63\x65\156\163\145\137\153\145\x79".$LXyPo,'');update_option("\167\160\142\145\x72\151\x74\141\137\143\x6f\162\x65\x5f\x6c\x69\143\x65\156\163\145\137\x73\x74\x61\x74\165\163".$LXyPo,'');$k6RSx=wp_upload_dir();if(empty($k6RSx["\142\x61\163\x65\x64\x69\162"])){goto k3h27;}if(!wpberita_core_connect_fs()){goto pl8en;}$Jd5Mn=$k6RSx["\x62\x61\163\x65\x64\x69\162"]."\x2f".$LXyPo;if(!$wp_filesystem->exists($Jd5Mn)){goto d8cat;}$Tu2Cf=$k6RSx["\x62\141\163\145\144\x69\162"]."\x2f".$LXyPo."\x2f".$VcYJB."\x2e\x6a\x73\157\156";if(!$wp_filesystem->exists($Tu2Cf)){goto MefqG;}$wp_filesystem->delete($Tu2Cf,false,"\x66");MefqG:d8cat:pl8en:k3h27:goto gKp6Y;case "\x6c\151\x63\145\x6e\163\x65\x5f\156\157\164\137\x66\x6f\165\x6e\144":$LXyPo=md5(wpberita_core_get_home());update_option("\x77\160\142\145\162\151\164\x61\x5f\x63\157\x72\145\x5f\x6c\x69\143\145\x6e\x73\x65\x5f\x6b\145\x79".$LXyPo,'');update_option("\x77\160\x62\145\162\151\164\141\x5f\x63\x6f\x72\x65\x5f\x6c\151\x63\145\156\163\x65\137\x73\x74\141\x74\165\163".$LXyPo,'');$k6RSx=wp_upload_dir();if(empty($k6RSx["\142\x61\163\x65\x64\151\162"])){goto yFQZG;}if(!wpberita_core_connect_fs()){goto muTnC;}$Jd5Mn=$k6RSx["\x62\x61\x73\145\x64\151\x72"]."\57".$LXyPo;if(!$wp_filesystem->exists($Jd5Mn)){goto pazWz;}$Tu2Cf=$k6RSx["\x62\141\x73\145\x64\151\162"]."\x2f".$LXyPo."\x2f".$VcYJB."\x2e\x6a\x73\x6f\x6e";if(!$wp_filesystem->exists($Tu2Cf)){goto EA_LO;}$wp_filesystem->delete($Tu2Cf,false,"\146");EA_LO:pazWz:muTnC:yFQZG:goto gKp6Y;case "\x6c\151\143\x65\x6e\163\x65\137\x64\151\163\x61\x62\x6c\145\144":$LXyPo=md5(wpberita_core_get_home());update_option("\x77\160\142\145\162\x69\164\x61\137\143\x6f\162\x65\x5f\x6c\151\143\x65\x6e\x73\x65\137\153\145\171".$LXyPo,'');update_option("\x77\x70\142\145\162\151\164\x61\x5f\x63\157\x72\145\137\154\x69\143\145\x6e\163\145\x5f\x73\x74\141\164\x75\x73".$LXyPo,'');$k6RSx=wp_upload_dir();if(empty($k6RSx["\142\x61\x73\145\144\x69\162"])){goto AIyBa;}if(!wpberita_core_connect_fs()){goto LcigV;}$Jd5Mn=$k6RSx["\142\x61\x73\x65\x64\x69\162"]."\57".$LXyPo;if(!$wp_filesystem->exists($Jd5Mn)){goto ttmbs;}$Tu2Cf=$k6RSx["\142\141\163\145\144\151\x72"]."\57".$LXyPo."\57".$VcYJB."\x2e\x6a\163\x6f\x6e";if(!$wp_filesystem->exists($Tu2Cf)){goto f98tQ;}$wp_filesystem->delete($Tu2Cf,false,"\x66");f98tQ:ttmbs:LcigV:AIyBa:goto gKp6Y;}Myoih:gKp6Y:XCRG8:goto LicAz;CXZnv:$T4qA5=$TSfu4->get_error_message();LicAz:goto SydqB;Z2nCL:if(is_wp_error($LdmXN)){goto oKYAV;}$T4qA5=__("\101\x6e\x20\x65\x72\x72\157\162\x20\157\143\x63\x75\162\x72\145\x64\54\x20\x70\154\x65\x61\163\145\x20\164\x72\x79\x20\x61\147\141\x69\156\x2e","\167\x70\142\145\162\151\164\141\55\143\157\162\x65");goto L3mH0;oKYAV:$T4qA5=$LdmXN->get_error_message();L3mH0:SydqB:HVV0_:}}if(!function_exists("\167\160\142\145\x72\x69\164\x61\x5f\143\157\x72\x65\x5f\x61\144\155\151\156\x5f\156\157\x74\x69\143\145\163")){function wpberita_core_admin_notices(){if(!(isset($_GET["\167\x70\142\145\162\151\x74\x61\137\x63\157\162\145\x5f\141\x63\x74\151\x76\141\x74\151\157\156"])&&!empty($_GET["\x6d\x65\163\x73\141\147\x65"]))){goto KGrpJ;}switch($_GET["\x77\x70\x62\145\162\151\164\141\137\143\157\x72\145\137\141\x63\164\x69\x76\x61\x74\x69\x6f\156"]){case "\146\141\154\x73\145":$T4qA5=rawurldecode(sanitize_text_field(wp_unslash($_GET["\155\145\163\x73\141\x67\x65"])));echo "\x9\x9\x9\x9\x9\x3c\144\x69\166\x20\x63\154\x61\163\163\75\42\145\162\x72\157\x72\x22\76\12\11\x9\11\11\x9\x9\74\160\x3e";echo esc_html($T4qA5);echo "\x3c\57\160\x3e\12\11\11\11\11\11\74\x2f\x64\151\166\76\xa\11\11\x9\x9\11";goto pA2RS;case "\164\x72\x75\145":default:echo "\11\x9\x9\x9\11\x3c\144\x69\x76\x20\x63\x6c\x61\163\163\x3d\x22\x73\x75\x63\x63\x65\x73\163\42\x3e\xa\x9\11\11\x9\11\x9\x3c\160\76";echo esc_html_e("\x53\x75\x63\x63\145\x73\x73\56","\x77\x70\x62\145\162\151\x74\x61\x2d\x63\x6f\x72\145");echo "\74\x2f\x70\76\12\x9\11\11\11\x9\74\x2f\x64\151\166\x3e\xa\11\x9\x9\x9\11";goto pA2RS;}sTl6l:pA2RS:KGrpJ:}}add_action("\x61\x64\x6d\x69\156\137\156\157\164\151\143\x65\x73","\167\x70\x62\x65\162\x69\x74\x61\137\x63\x6f\x72\x65\x5f\141\x64\155\151\x6e\137\x6e\157\x74\151\143\x65\163");