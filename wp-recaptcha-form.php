<?php
/*
Plugin Name: wp reCAPTCHA Form
Plugin URI: http://github.com/mattrude/recaptcha-contact-form
Version: 0.1
Author: Matt Rude
Author URI: http://www.mattrude.com
Description: 

 Copyright 2009 Gatt Design  (email : plugins@gattdesign.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// admin sidebar menu option
add_action('admin_menu', 'recaptcha_contact_form_plugin_menu');

// admin plugin menu
function recaptcha_contact_form_plugin_menu() {
	add_options_page('wp reCAPTCHA Form Settings', 'wp reCAPTCHA Form', 8, __FILE__, 'recaptcha_contact_form_plugin_settings');
}

//checks theme colour in db, returns theme colour and admin form option list (selected="selected") status in array
function recaptcha_contact_form_plugin_theme_checka($recaptcha_contact_form_plugin_theme_parameter) {
	$recaptcha_contact_form_plugin_theme_db_entry = get_option('gd_recap_theme');
	$recaptcha_contact_form_plugin_theme_selected = ' selected="selected"';
	
	$recaptcha_contact_form_plugin_theme_postback = array('selected' => '', 'colour' => '');
	
	switch($recaptcha_contact_form_plugin_theme_db_entry) {
		case true:
			switch($recaptcha_contact_form_plugin_theme_parameter) {
				case ($recaptcha_contact_form_plugin_theme_parameter == 'red' || $recaptcha_contact_form_plugin_theme_parameter == 'gd_recap_theme_red'):
					if($recaptcha_contact_form_plugin_theme_db_entry == 'gd_recap_theme_red') {
						$recaptcha_contact_form_plugin_theme_postback['selected'] = $recaptcha_contact_form_plugin_theme_selected;
						$recaptcha_contact_form_plugin_theme_postback['colour'] = 'red';
					}
					
					break;
				
				case ($recaptcha_contact_form_plugin_theme_parameter == 'blackglass' || $recaptcha_contact_form_plugin_theme_parameter == 'gd_recap_theme_blackglass'):
					if($recaptcha_contact_form_plugin_theme_db_entry == 'gd_recap_theme_blackglass') {
						$recaptcha_contact_form_plugin_theme_postback['selected'] = $recaptcha_contact_form_plugin_theme_selected;
						$recaptcha_contact_form_plugin_theme_postback['colour'] = 'blackglass';
					}
					
					break;
				
				case ($recaptcha_contact_form_plugin_theme_parameter == 'clean' || $recaptcha_contact_form_plugin_theme_parameter == 'gd_recap_theme_clean'):
					if($recaptcha_contact_form_plugin_theme_db_entry == 'gd_recap_theme_clean') {
						$recaptcha_contact_form_plugin_theme_postback['selected'] = $recaptcha_contact_form_plugin_theme_selected;
						$recaptcha_contact_form_plugin_theme_postback['colour'] = 'clean';
					}
					
					break;
					
				case ($recaptcha_contact_form_plugin_theme_parameter == 'white' || $recaptcha_contact_form_plugin_theme_parameter == 'gd_recap_theme_white'):
					if($recaptcha_contact_form_plugin_theme_db_entry == 'gd_recap_theme_white') {
						$recaptcha_contact_form_plugin_theme_postback['selected'] = $recaptcha_contact_form_plugin_theme_selected;
						$recaptcha_contact_form_plugin_theme_postback['colour'] = 'white';
					}
					
					break;
			}
			
			break;
			
		default:
			break;
	}
	
	return $recaptcha_contact_form_plugin_theme_postback;
}

// returns theme colour as variable
function recaptcha_contact_form_plugin_theme_colour($recaptcha_contact_form_plugin_theme_colour_parameter) {
	$recaptcha_contact_form_plugin_theme_function = recaptcha_contact_form_plugin_theme_checka($recaptcha_contact_form_plugin_theme_colour_parameter);
	$recaptcha_contact_form_plugin_theme_function = $recaptcha_contact_form_plugin_theme_function['colour'];
	
	return $recaptcha_contact_form_plugin_theme_function;
}

// returns theme colour admin form option list (selected="selected") status
function recaptcha_contact_form_plugin_theme_selected($recaptcha_contact_form_plugin_theme_selected_parameter) {
	$recaptcha_contact_form_plugin_theme_select = recaptcha_contact_form_plugin_theme_checka($recaptcha_contact_form_plugin_theme_selected_parameter);
	$recaptcha_contact_form_plugin_theme_select = $recaptcha_contact_form_plugin_theme_select['selected'];
	
	return $recaptcha_contact_form_plugin_theme_select;
}

//checks language in db, returns admin form option list (selected="selected") status in variable
function recaptcha_contact_form_plugin_language_checka($recaptcha_contact_form_plugin_language_parameter) {
	$recaptcha_contact_form_plugin_language_db_entry = get_option('gd_recap_language');
	$recaptcha_contact_form_plugin_language_selected = ' selected="selected"';
	$recaptcha_contact_form_plugin_language_postback = '';
	
	switch($recaptcha_contact_form_plugin_language_db_entry) {
		case true:
			switch($recaptcha_contact_form_plugin_language_parameter) {
				case 'english':
					if($recaptcha_contact_form_plugin_language_db_entry == 'gd_recap_language_english') $recaptcha_contact_form_plugin_language_postback = $recaptcha_contact_form_plugin_language_selected;
					break;
				
				case 'dutch':
					if($recaptcha_contact_form_plugin_language_db_entry == 'gd_recap_language_dutch') $recaptcha_contact_form_plugin_language_postback = $recaptcha_contact_form_plugin_language_selected;
					break;
				
				case 'french':
					if($recaptcha_contact_form_plugin_language_db_entry == 'gd_recap_language_french') $recaptcha_contact_form_plugin_language_postback = $recaptcha_contact_form_plugin_language_selected;
					break;
				
				case 'german':
					if($recaptcha_contact_form_plugin_language_db_entry == 'gd_recap_language_german') $recaptcha_contact_form_plugin_language_postback = $recaptcha_contact_form_plugin_language_selected;
					break;
				
				case 'portuguese':
					if($recaptcha_contact_form_plugin_language_db_entry == 'gd_recap_language_portuguese') $recaptcha_contact_form_plugin_language_postback = $recaptcha_contact_form_plugin_language_selected;
					break;
				
				case 'russian':
					if($recaptcha_contact_form_plugin_language_db_entry == 'gd_recap_language_russian') $recaptcha_contact_form_plugin_language_postback = $recaptcha_contact_form_plugin_language_selected;
					break;
				
				case 'spanish':
					if($recaptcha_contact_form_plugin_language_db_entry == 'gd_recap_language_spanish') $recaptcha_contact_form_plugin_language_postback = $recaptcha_contact_form_plugin_language_selected;
					break;
				
				case 'turkish':
					if($recaptcha_contact_form_plugin_language_db_entry == 'gd_recap_language_turkish') $recaptcha_contact_form_plugin_language_postback = $recaptcha_contact_form_plugin_language_selected;
					break;	
			}
			
			break;
			
		default:
			break;
	}
	
	return $recaptcha_contact_form_plugin_language_postback;
}

// returns current language, and form fields text as array
function recaptcha_contact_form_plugin_current_language($recaptcha_contact_form_plugin_current_language_parameter) {
	$recaptcha_contact_form_plugin_current_language_postback = array('language' => '', 'client_name' => '', 'client_email' => '', 'client_message' => '', 'submit_button' => '', 'invalid_recaptcha' => '', 'fill_in_fields' => '', 'message_sent' => '', 'message_failed' => '');
	
	switch($recaptcha_contact_form_plugin_current_language_parameter) {
		case 'gd_recap_language_english':
			$recaptcha_contact_form_plugin_current_language_postback['language'] = 'en';
			$recaptcha_contact_form_plugin_current_language_postback['client_name'] = 'Your Name:';
			$recaptcha_contact_form_plugin_current_language_postback['client_email'] = 'Your Email Address:';
			$recaptcha_contact_form_plugin_current_language_postback['client_message'] = 'Your Message:';
			$recaptcha_contact_form_plugin_current_language_postback['submit_button'] = 'Submit';
			$recaptcha_contact_form_plugin_current_language_postback['invalid_recaptcha'] = 'Invalid reCAPTCHA phrase - please try again.';
			$recaptcha_contact_form_plugin_current_language_postback['fill_in_fields'] = 'Please fill in ALL fields.';
			$recaptcha_contact_form_plugin_current_language_postback['message_sent'] = 'Your message has been sent.';
			$recaptcha_contact_form_plugin_current_language_postback['message_failed'] = 'Your message could not be sent at this time.';
			
			break;
			
		case 'gd_recap_language_dutch':
			$recaptcha_contact_form_plugin_current_language_postback['language'] = 'nl';
			$recaptcha_contact_form_plugin_current_language_postback['client_name'] = 'Uw Naam:';
			$recaptcha_contact_form_plugin_current_language_postback['client_email'] = 'Uw Emailadres:';
			$recaptcha_contact_form_plugin_current_language_postback['client_message'] = 'Uw Bericht:';
			$recaptcha_contact_form_plugin_current_language_postback['submit_button'] = 'Verstuur';
			$recaptcha_contact_form_plugin_current_language_postback['invalid_recaptcha'] = 'Incorrecte waarden voor reCAPTCHA.  Probeer het opnieuw.';
			$recaptcha_contact_form_plugin_current_language_postback['fill_in_fields'] = 'Vul alle velden in.';
			$recaptcha_contact_form_plugin_current_language_postback['message_sent'] = 'Uw bericht is verzonden.';
			$recaptcha_contact_form_plugin_current_language_postback['message_failed'] = 'Je bericht kan niet worden verzonden op dit moment.';
			
			break;
			
		case 'gd_recap_language_french':
			$recaptcha_contact_form_plugin_current_language_postback['language'] = 'fr';
			$recaptcha_contact_form_plugin_current_language_postback['client_name'] = 'Votre Nom:';
			$recaptcha_contact_form_plugin_current_language_postback['client_email'] = 'Votre Email:';
			$recaptcha_contact_form_plugin_current_language_postback['client_message'] = 'Votre Message:';
			$recaptcha_contact_form_plugin_current_language_postback['submit_button'] = 'Envoyer';
			$recaptcha_contact_form_plugin_current_language_postback['invalid_recaptcha'] = 'Valeur incorrecte pour reCAPTCHA.  S\'il-vous-pla&icirc;t, essayez de nouveau.';
			$recaptcha_contact_form_plugin_current_language_postback['fill_in_fields'] = 'S\'il vous pla&icirc;t remplir tous les champs.';
			$recaptcha_contact_form_plugin_current_language_postback['message_sent'] = 'Votre message a &eacute;t&eacute; envoy&eacute;.';
			$recaptcha_contact_form_plugin_current_language_postback['message_failed'] = 'Votre message n\'a pas pu &ecirc;tre envoy&eacute; en ce moment.';
			
			break;
			
		case 'gd_recap_language_german':
			$recaptcha_contact_form_plugin_current_language_postback['language'] = 'de';
			$recaptcha_contact_form_plugin_current_language_postback['client_name'] = 'Ihr Name:';
			$recaptcha_contact_form_plugin_current_language_postback['client_email'] = 'Ihre Email-Adresse:';
			$recaptcha_contact_form_plugin_current_language_postback['client_message'] = 'Ihre Nachricht:';
			$recaptcha_contact_form_plugin_current_language_postback['submit_button'] = '&Uuml;bermitteln';
			$recaptcha_contact_form_plugin_current_language_postback['invalid_recaptcha'] = 'Falscher reCAPTCHA Satz - Bitte versuchen Sie es erneut.';
			$recaptcha_contact_form_plugin_current_language_postback['fill_in_fields'] = 'Bitte ALLE Felder ausfüllen.';
			$recaptcha_contact_form_plugin_current_language_postback['message_sent'] = 'Ihre Nachricht wurde verschickt.';
			$recaptcha_contact_form_plugin_current_language_postback['message_failed'] = 'Ihre nachricht konnte nicht abgesendet werden.';
			
			break;
			
		case 'gd_recap_language_portuguese':
			$recaptcha_contact_form_plugin_current_language_postback['language'] = 'pt';
			$recaptcha_contact_form_plugin_current_language_postback['client_name'] = 'O seu Nome:';
			$recaptcha_contact_form_plugin_current_language_postback['client_email'] = 'O seu Endere&ccedil;o de Email:';
			$recaptcha_contact_form_plugin_current_language_postback['client_message'] = 'A Sua Mensagem:';
			$recaptcha_contact_form_plugin_current_language_postback['submit_button'] = 'Enviar';
			$recaptcha_contact_form_plugin_current_language_postback['invalid_recaptcha'] = 'A frase reCAPTCHA inválida - por favor tente novamente.';
			$recaptcha_contact_form_plugin_current_language_postback['fill_in_fields'] = 'Por favor preencha todos os campos.';
			$recaptcha_contact_form_plugin_current_language_postback['message_sent'] = 'A sua mensagem foi enviada.';
			$recaptcha_contact_form_plugin_current_language_postback['message_failed'] = 'A sua mensagem não pode ser enviada neste momento.';
			
			break;
			
		case 'gd_recap_language_russian':
			$recaptcha_contact_form_plugin_current_language_postback['language'] = 'ru';
			$recaptcha_contact_form_plugin_current_language_postback['client_name'] = '???? ???:';
			$recaptcha_contact_form_plugin_current_language_postback['client_email'] = '??? ????? ??????????? ?????:';
			$recaptcha_contact_form_plugin_current_language_postback['client_message'] = '???? ?????????:';
			$recaptcha_contact_form_plugin_current_language_postback['submit_button'] = '?????????';
			$recaptcha_contact_form_plugin_current_language_postback['invalid_recaptcha'] = '???????????? reCAPTCHA ????? - ?????????? ?????????? ??? ???.';
			$recaptcha_contact_form_plugin_current_language_postback['fill_in_fields'] = '?????????? ????????? ??? ????.';
			$recaptcha_contact_form_plugin_current_language_postback['message_sent'] = '???? ????????? ??????????.';
			$recaptcha_contact_form_plugin_current_language_postback['message_failed'] = '???? ????????? ?? ???? ??????????.';
			
			break;
			
		case 'gd_recap_language_spanish':
			$recaptcha_contact_form_plugin_current_language_postback['language'] = 'es';
			$recaptcha_contact_form_plugin_current_language_postback['client_name'] = 'Tu Nombre:';
			$recaptcha_contact_form_plugin_current_language_postback['client_email'] = 'Tu Direcci&oacute;n De Email:';
			$recaptcha_contact_form_plugin_current_language_postback['client_message'] = 'Tu Mensaje:';
			$recaptcha_contact_form_plugin_current_language_postback['submit_button'] = 'Enviar';
			$recaptcha_contact_form_plugin_current_language_postback['invalid_recaptcha'] = 'La frase de reCAPTCHA es incorrecta. Por favor, int&eacute;ntelo de nuevo.';
			$recaptcha_contact_form_plugin_current_language_postback['fill_in_fields'] = 'Por favor, rellene TODOS los campos.';
			$recaptcha_contact_form_plugin_current_language_postback['message_sent'] = 'Tu mensaje se ha enviado.';
			$recaptcha_contact_form_plugin_current_language_postback['message_failed'] = 'Tu mensaje no podría ser enviado en este momento.';
			
			break;
			
		case 'gd_recap_language_turkish':
			$recaptcha_contact_form_plugin_current_language_postback['language'] = 'tr';
			$recaptcha_contact_form_plugin_current_language_postback['client_name'] = 'Isminiz:';
			$recaptcha_contact_form_plugin_current_language_postback['client_email'] = 'Email Adresiniz:';
			$recaptcha_contact_form_plugin_current_language_postback['client_message'] = 'Mesaj&iota;n&iota;z:';
			$recaptcha_contact_form_plugin_current_language_postback['submit_button'] = 'G&ouml;nder';
			$recaptcha_contact_form_plugin_current_language_postback['invalid_recaptcha'] = 'L&uuml;tfen reCAPTCHA (resim)/g&ouml;rd&uuml;&#287;&uuml;n&uuml;z karakterleri aynen giriniz.';
			$recaptcha_contact_form_plugin_current_language_postback['fill_in_fields'] = 'L&uuml;tfen b&uuml;t&uuml;n alanlar&iota; doldurun.';
			$recaptcha_contact_form_plugin_current_language_postback['message_sent'] = 'Mesaj&iota;n&iota;z g&ouml;nderildi.';
			$recaptcha_contact_form_plugin_current_language_postback['message_failed'] = 'Mesaj&iota;n&iota;z g&ouml;nderilemedi.';
			
			break;
	}
	
	return $recaptcha_contact_form_plugin_current_language_postback;
}



// admin plugin functions
function recaptcha_contact_form_plugin_settings() {
	// form submitted
	if(isset($_POST['recaptcha_admin'])) {
		$recaptcha_contact_form_public_checka = false;
		$recaptcha_contact_form_private_checka = false;
		$recaptcha_contact_form_public = get_option('gd_recap_publickey');
		$recaptcha_contact_form_private = get_option('gd_recap_privatekey');

		// public key
		switch($recaptcha_contact_form_public) {
			case false:
				if(add_option('gd_recap_publickey', 'Public Key Goes Here', '', 'no')) {
					$recaptcha_contact_form_public_checka = 'no_key';
				} else {
					update_option('gd_recap_publickey', 'Public Key Goes Here');
					$recaptcha_contact_form_public = get_option('gd_recap_publickey');
					$recaptcha_contact_form_public_checka = 'no_key';
				}
				
				break;
				
			case true:
				$recaptcha_contact_form_opt_pub = $_POST['gd_recap_publickey'];
				
				if($recaptcha_contact_form_opt_pub == 'Public Key Goes Here') {
					$recaptcha_contact_form_public_checka = 'no_key';
				} else {
					if(($recaptcha_contact_form_opt_pub == null) || (empty($recaptcha_contact_form_opt_pub))) {
						update_option('gd_recap_publickey', 'Public Key Goes Here');
						$recaptcha_contact_form_public = get_option('gd_recap_publickey');
						$recaptcha_contact_form_public_checka = 'no_key';						
					} else {
						update_option('gd_recap_publickey', $recaptcha_contact_form_opt_pub);
						$recaptcha_contact_form_public = get_option('gd_recap_publickey');
						$recaptcha_contact_form_public_checka = 'yes_key';
					}
				}
				break;
		}
		
		// private key
		switch($recaptcha_contact_form_private) {
			case false:
				if(add_option('gd_recap_privatekey', 'Private Key Goes Here', '', 'no')) {
					$recaptcha_contact_form_private_checka = 'no_key';
				} else {
					update_option('gd_recap_privatekey', 'Private Key Goes Here');
					$recaptcha_contact_form_private = get_option('gd_recap_privatekey');
					$recaptcha_contact_form_private_checka = 'no_key';
				}
				
				break;
				
			case true:
				$recaptcha_contact_form_opt_pri = $_POST['gd_recap_privatekey'];
				
				if($recaptcha_contact_form_opt_pri == 'Private Key Goes Here') {
					$recaptcha_contact_form_private_checka = 'no_key';
				} else {
					if(($recaptcha_contact_form_opt_pri == null) || (empty($recaptcha_contact_form_opt_pri))) {
						update_option('gd_recap_privatekey', 'Private Key Goes Here');
						$recaptcha_contact_form_private = get_option('gd_recap_privatekey');
						$recaptcha_contact_form_private_checka = 'no_key';						
					} else {
						update_option('gd_recap_privatekey', $recaptcha_contact_form_opt_pri);
						$recaptcha_contact_form_private = get_option('gd_recap_privatekey');
						$recaptcha_contact_form_private_checka = 'yes_key';
					}
				}
				break;
		}
		
		// theme
		$recaptcha_contact_form_opt_theme = $_POST['gd_recap_theme'];
		
		if(add_option('gd_recap_theme', $recaptcha_contact_form_opt_theme, '', 'no')) {
			$recaptcha_contact_form_theme = $recaptcha_contact_form_opt_theme;
		} else {
			update_option('gd_recap_theme', $recaptcha_contact_form_opt_theme);
			$recaptcha_contact_form_theme = $recaptcha_contact_form_opt_theme;
		}
		
		// language
		$recaptcha_contact_form_opt_language = $_POST['gd_recap_language'];
		
		if(add_option('gd_recap_language', $recaptcha_contact_form_opt_language, '', 'no')) {
			$recaptcha_contact_form_language = $recaptcha_contact_form_opt_language;
		} else {
			update_option('gd_recap_language', $recaptcha_contact_form_opt_language);
			$recaptcha_contact_form_language = $recaptcha_contact_form_opt_language;
		}
		
	// form not submitted
	} else {
		$recaptcha_contact_form_public_checka = false;
		$recaptcha_contact_form_private_checka = false;
		$recaptcha_contact_form_public = get_option('gd_recap_publickey');
		$recaptcha_contact_form_private = get_option('gd_recap_privatekey');
		$recaptcha_contact_form_theme = get_option('gd_recap_theme');
		$recaptcha_contact_form_language = get_option('gd_recap_language');

		// public key
		switch($recaptcha_contact_form_public) {
			case false:
				if(add_option('gd_recap_publickey', 'public key', '', 'no')) {
					add_option('gd_recap_publickey', 'Public Key Goes Here', '', 'no');
					$recaptcha_contact_form_public_checka = 'no_key';
				} else {
					update_option('gd_recap_publickey', 'Public Key Goes Here');
					$recaptcha_contact_form_public = get_option('gd_recap_publickey');
					$recaptcha_contact_form_public_checka = 'no_key';
				}
				
				break;
				
			case true:
				if($recaptcha_contact_form_public == 'Public Key Goes Here') {
					$recaptcha_contact_form_public_checka = 'no_key';
				} elseif($recaptcha_contact_form_public == null) {
					update_option('gd_recap_publickey', 'Public Key Goes Here');
					$recaptcha_contact_form_public_checka = 'no_key';
				} else {
					$recaptcha_contact_form_public_checka = 'do_nothing';
				}
				
				break;
		}
		
		// private key
		switch($recaptcha_contact_form_private) {
			case false:
				if(add_option('gd_recap_privatekey', 'Private Key Goes Here', '', 'no')) {
					$recaptcha_contact_form_private_checka = 'no_key';
				} else {
					update_option('gd_recap_privatekey', 'Private Key Goes Here');
					$recaptcha_contact_form_private = get_option('gd_recap_privatekey');
					$recaptcha_contact_form_private_checka = 'no_key';
				}
				
				break;
				
			case true:
				if($recaptcha_contact_form_private == 'Private Key Goes Here') {
					$recaptcha_contact_form_private_checka = 'no_key';
				} elseif($recaptcha_contact_form_private == null) {
					update_option('gd_recap_privatekey', 'Private Key Goes Here');
					$recaptcha_contact_form_private_checka = 'no_key';
				} else {
					$recaptcha_contact_form_private_checka = 'do_nothing';
				}
				
				break;
		}
		
		// theme
		switch($recaptcha_contact_form_theme) {
			case false:
				if(add_option('gd_recap_theme', 'gd_recap_theme_red', '', 'no')) {
					// added option
				} else {
					update_option('gd_recap_theme', 'gd_recap_theme_red');
				}
				
				break;
		}
		
		// language
		switch($recaptcha_contact_form_language) {
			case false:
				if(add_option('gd_recap_language', 'gd_recap_language_english', '', 'no')) {
					// added option
				} else {
					update_option('gd_recap_language', 'gd_recap_language_english');
				}
				
				break;
		}
		
	}
	
	// display appropriate message
	if(($recaptcha_contact_form_private_checka == 'no_key') || ($recaptcha_contact_form_public_checka == 'no_key')){
?>
<div class="error"><p><strong><?php _e('Please populate the required fields.', 'recaptcha_plugin_menu' ); ?></strong></p></div>
<?php	
	} elseif(($recaptcha_contact_form_private_checka == 'do_nothing') && ($recaptcha_contact_form_public_checka == 'do_nothing')) {
		// do nothing
	} else {
?>
<div class="updated"><p><strong><?php _e('Settings updated.', 'recaptcha_plugin_menu' ); ?></strong></p></div>
<?php	
	}
?>
<div class="wrap">
	<h2>wp reCAPTCHA Form</h2>
	<h3>Settings</h3>
	<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<?php wp_nonce_field('update-options'); ?>
		
		<table class="form-table">
			<tr valign="top">
				<th scope="row">reCAPTCHA public key</th>
				<td>
					<input type="text" name="gd_recap_publickey" size="50px" value="<?php echo $recaptcha_contact_form_public; ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">reCAPTCHA private key</th>
				<td>
					<input type="text" name="gd_recap_privatekey" size="50px" value="<?php echo $recaptcha_contact_form_private; ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Theme</th>
				<td>
					<select name="gd_recap_theme">
						<option value="gd_recap_theme_red"<?php echo recaptcha_contact_form_plugin_theme_selected('red'); ?>>Red</option>
						<option value="gd_recap_theme_blackglass"<?php echo recaptcha_contact_form_plugin_theme_selected('blackglass'); ?>>Blackglass</option>
						<option value="gd_recap_theme_clean"<?php echo recaptcha_contact_form_plugin_theme_selected('clean'); ?>>Clean</option>
						<option value="gd_recap_theme_white"<?php echo recaptcha_contact_form_plugin_theme_selected('white'); ?>>White</option>								
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Language</th>
				<td>
					<select name="gd_recap_language">
						<option value="gd_recap_language_english"<?php echo recaptcha_contact_form_plugin_language_checka('english'); ?>>English</option>
						<option value="gd_recap_language_dutch"<?php echo recaptcha_contact_form_plugin_language_checka('dutch'); ?>>Dutch</option>
						<option value="gd_recap_language_french"<?php echo recaptcha_contact_form_plugin_language_checka('french'); ?>>French</option>
						<option value="gd_recap_language_german"<?php echo recaptcha_contact_form_plugin_language_checka('german'); ?>>German</option>
						<option value="gd_recap_language_portuguese"<?php echo recaptcha_contact_form_plugin_language_checka('portuguese'); ?>>Portuguese</option>
						<option value="gd_recap_language_russian"<?php echo recaptcha_contact_form_plugin_language_checka('russian'); ?>>Russian</option>
						<option value="gd_recap_language_spanish"<?php echo recaptcha_contact_form_plugin_language_checka('spanish'); ?>>Spanish</option>
						<option value="gd_recap_language_turkish"<?php echo recaptcha_contact_form_plugin_language_checka('turkish'); ?>>Turkish</option>
					</select>
				</td>
			</tr>
		</table>
		
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="gd_recap_privatekey" />
		<input type="hidden" name="page_options" value="gd_recap_publickey" />
		<input type="hidden" name="page_options" value="gd_recap_theme" />
		<input type="hidden" name="page_options" value="gd_recap_language" />
		<p class="submit"><input type="submit" class="button-primary" name="recaptcha_admin" value="<?php _e('Save Changes') ?>" /></p>
	</form>
	
	<p><b>NOTE:</b> If you haven't already got reCAPTCHA public and private keys, you can get them by visiting the <a href="http://recaptcha.net/whyrecaptcha.html">reCAPTCHA website</a>.</p>

	<h3>Usage</h3>
	<p>Simply use the shortcode <b>[recaptcha_form]</b> in any of your posts or pages.  All emails submitted from the reCAPTCHA forms will be sent to the blog administrator's email address (<a href="mailto:<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a>).</p>

	<h3>Did You Find This Plugin Useful?</h3>
	<p>Stay up to date with the latest plugin developments by visiting the <a href="http://plugins.gattdesign.co.uk">Gatt Design Plugins website</a>.</p>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick" />
		<input type="hidden" name="hosted_button_id" value="5159812" />
		<input type="image" src="https://www.paypal.com/en_GB/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." />
		<img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1" />
	</form>	
	<p>We provide this plugin completely free of charge to the WordPress community, so feel free to drop us a line to say thank you or even make a small donation towards the continued development of this plugin! :-)</p>
</div>
<?php
}

// shortcode and message handling functions
function recaptcha_contact_form_short_code() {
	$recaptcha_contact_form_privkey_checka = get_option('gd_recap_privatekey');
	$recaptcha_contact_form_pubkey_checka = get_option('gd_recap_publickey');
	$recaptcha_contact_form_theme_value = get_option('gd_recap_theme');
	
	$recaptcha_contact_form_language_value = get_option('gd_recap_language');
	$recaptcha_contact_form_language_fields = recaptcha_contact_form_plugin_current_language($recaptcha_contact_form_language_value);
	
	// one or both keys are invalid	
	if(($recaptcha_contact_form_privkey_checka == 'Private Key Goes Here') || ($recaptcha_contact_form_pubkey_checka == 'Public Key Goes Here')) {
		$recaptcha_contact_form_code = '';
	// one or both keys are empty	
	} elseif(($recaptcha_contact_form_privkey_checka == null) || ($recaptcha_contact_form_pubkey_checka == null)) {
		$recaptcha_contact_form_code = '';
	// both keys are valid
	} else {
		// message has been submitted
		if(isset($_POST['recaptcha_client'])) {
			// include reCAPTCHA library (only if it hasn't been declared elsewhere)
			if(!is_callable(recaptcha_check_answer)) require_once('recaptchalib.php');
			
			// check reCAPTCHA response
			$recaptcha_contact_form_response = recaptcha_check_answer ($recaptcha_contact_form_privkey_checka, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
			
			// recaptcha challenge failed, show error message and contact form
			if (!$recaptcha_contact_form_response->is_valid) {
				$recaptcha_contact_form_code = '<!-- start of recaptcha form -->' . "\n";
				$recaptcha_contact_form_code .= '<p style="text-align: left; font-weight: bold; background-color: white; color: red; border: 1px solid black; padding: 10px;">' . $recaptcha_contact_form_language_fields['invalid_recaptcha'] . '</p>' . "\n";
				$recaptcha_contact_form_code .= '<br />' . "\n";
				$recaptcha_contact_form_code .= '<script type="text/javascript">' . "\n";
				$recaptcha_contact_form_code .= 'var RecaptchaOptions = {' . "\n";
				$recaptcha_contact_form_code .= 'theme: \'' . recaptcha_contact_form_plugin_theme_colour($recaptcha_contact_form_theme_value) . '\',' . "\n";
				$recaptcha_contact_form_code .= 'lang: \'' . $recaptcha_contact_form_language_fields['language'] . '\'' . "\n";
				$recaptcha_contact_form_code .= '};' . "\n";
				$recaptcha_contact_form_code .= '</script>' . "\n";
				$recaptcha_contact_form_code .= '<noscript>&nbsp;</noscript>' . "\n";
				$recaptcha_contact_form_code .= '<form method="post" action="' . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . '">' . "\n";
				$recaptcha_contact_form_code .= '<fieldset style="border: 0px; margin: 0px; padding: 0px;">' . "\n";
				$recaptcha_contact_form_code .= '<p style="text-align: left;">' . $recaptcha_contact_form_language_fields['client_name'] . '<br /><label for="recaptcha_form_name"><input type="text" name="recaptcha_form_name" value="" style="width: 300px;" /></label></p>' . "\n";
				$recaptcha_contact_form_code .= '<p style="text-align: left;">' . $recaptcha_contact_form_language_fields['client_email'] . '<br /><label for="recaptcha_form_email"><input type="text" name="recaptcha_form_email" value="" style="width: 300px;" /></label></p>' . "\n";
				$recaptcha_contact_form_code .= '<p style="text-align: left;">' . $recaptcha_contact_form_language_fields['client_message'] . '<br /><label for="recaptcha_form_message"><textarea name="recaptcha_form_message" rows="10" cols="20" style="width: 450px;"></textarea></label></p>' . "\n";
				$recaptcha_contact_form_code .= '<script type="text/javascript" src="http://api.recaptcha.net/challenge?k=' . $recaptcha_contact_form_pubkey_checka . '"></script>' . "\n";
				$recaptcha_contact_form_code .= '<noscript>' . "\n";
				$recaptcha_contact_form_code .= '<div id="recaptcha_contact_form_plugin">' . "\n";
				$recaptcha_contact_form_code .= '<object data="http://api.recaptcha.net/noscript?k=' . $recaptcha_contact_form_pubkey_checka . '" type="text/html" id="recaptcha_contact_form_plugin_object" style="width:500px; height:300px;">' . "\n";
				$recaptcha_contact_form_code .= '<!--[if IE]>' . "\n";
				$recaptcha_contact_form_code .= '<object classid="clsid:235336920-03F9-11CF-8FD0-00AA00686F13" data="http://api.recaptcha.net/noscript?k=' . $recaptcha_contact_form_pubkey_checka . '" type="text/html" id="recaptcha_contact_form_plugin_object" style="overflow:hidden; width:500px; height:300px;">' . "\n";
				$recaptcha_contact_form_code .= '<p>&nbsp;</p>' . "\n";
				$recaptcha_contact_form_code .= '</object>' . "\n";
				$recaptcha_contact_form_code .= '<![endif]-->' . "\n";
				$recaptcha_contact_form_code .= '<p>&nbsp;</p>' . "\n";
				$recaptcha_contact_form_code .= '</object>' . "\n";
				$recaptcha_contact_form_code .= '</div>' . "\n";
				$recaptcha_contact_form_code .= '<br />' . "\n";
				$recaptcha_contact_form_code .= '<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>' . "\n";
				$recaptcha_contact_form_code .= '<input type="hidden" name="recaptcha_response_field" value="manual_challenge" />' . "\n";
				$recaptcha_contact_form_code .= '</noscript>' . "\n";
				$recaptcha_contact_form_code .= '<br />' . "\n";
				$recaptcha_contact_form_code .= '<p style="text-align: left;"><input type="submit" name="recaptcha_client" value="' . $recaptcha_contact_form_language_fields['submit_button'] . '" /></p>' . "\n";
				$recaptcha_contact_form_code .= '</fieldset>' . "\n";
				$recaptcha_contact_form_code .= '</form>' . "\n";
				$recaptcha_contact_form_code .= '<!-- end of recaptcha form -->' . "\n";
			// recaptcha challenge passed
			} else {
				$recaptcha_contact_form_name_field = $_POST['recaptcha_form_name'];
				$recaptcha_contact_form_email_field = $_POST['recaptcha_form_email'];
				$recaptcha_contact_form_email_field = sanitize_email($recaptcha_contact_form_email_field);
				$recaptcha_contact_form_message_field = $_POST['recaptcha_form_message'];
				
				// some fields are empty, show error message and contact form
				if(($recaptcha_contact_form_name_field == null) || ($recaptcha_contact_form_email_field == null) || ($recaptcha_contact_form_message_field == null)) {
					$recaptcha_contact_form_code = '<!-- start of recaptcha form -->' . "\n";
					$recaptcha_contact_form_code .= '<p style="text-align: left; font-weight: bold; background-color: white; color: red; border: 1px solid black; padding: 10px;">' . $recaptcha_contact_form_language_fields['fill_in_fields'] .'</p>' . "\n";
					$recaptcha_contact_form_code .= '<br />' . "\n";
					$recaptcha_contact_form_code .= '<script type="text/javascript">' . "\n";
					$recaptcha_contact_form_code .= 'var RecaptchaOptions = {' . "\n";
					$recaptcha_contact_form_code .= 'theme: \'' . recaptcha_contact_form_plugin_theme_colour($recaptcha_contact_form_theme_value) . '\',' . "\n";
					$recaptcha_contact_form_code .= 'lang: \'' . $recaptcha_contact_form_language_fields['language'] . '\'' . "\n";
					$recaptcha_contact_form_code .= '};' . "\n";
					$recaptcha_contact_form_code .= '</script>' . "\n";
					$recaptcha_contact_form_code .= '<noscript>&nbsp;</noscript>' . "\n";
					$recaptcha_contact_form_code .= '<form method="post" action="' . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . '">' . "\n";
					$recaptcha_contact_form_code .= '<fieldset style="border: 0px; margin: 0px; padding: 0px;">' . "\n";
					$recaptcha_contact_form_code .= '<p style="text-align: left;">' . $recaptcha_contact_form_language_fields['client_name'] . '<br /><label for="recaptcha_form_name"><input type="text" name="recaptcha_form_name" value="" style="width: 300px;" /></label></p>' . "\n";
					$recaptcha_contact_form_code .= '<p style="text-align: left;">' . $recaptcha_contact_form_language_fields['client_email'] . '<br /><label for="recaptcha_form_email"><input type="text" name="recaptcha_form_email" value="" style="width: 300px;" /></label></p>' . "\n";
					$recaptcha_contact_form_code .= '<p style="text-align: left;">' . $recaptcha_contact_form_language_fields['client_message'] . '<br /><label for="recaptcha_form_message"><textarea name="recaptcha_form_message" rows="10" cols="20" style="width: 450px;"></textarea></label></p>' . "\n";
					$recaptcha_contact_form_code .= '<script type="text/javascript" src="http://api.recaptcha.net/challenge?k=' . $recaptcha_contact_form_pubkey_checka . '"></script>' . "\n";
					$recaptcha_contact_form_code .= '<noscript>' . "\n";
					$recaptcha_contact_form_code .= '<div id="recaptcha_contact_form_plugin">' . "\n";
					$recaptcha_contact_form_code .= '<object data="http://api.recaptcha.net/noscript?k=' . $recaptcha_contact_form_pubkey_checka . '" type="text/html" id="recaptcha_contact_form_plugin_object" style="width:500px; height:300px;">' . "\n";
					$recaptcha_contact_form_code .= '<!--[if IE]>' . "\n";
					$recaptcha_contact_form_code .= '<object classid="clsid:235336920-03F9-11CF-8FD0-00AA00686F13" data="http://api.recaptcha.net/noscript?k=' . $recaptcha_contact_form_pubkey_checka . '" type="text/html" id="recaptcha_contact_form_plugin_object" style="overflow:hidden; width:500px; height:300px;">' . "\n";
					$recaptcha_contact_form_code .= '<p>&nbsp;</p>' . "\n";
					$recaptcha_contact_form_code .= '</object>' . "\n";
					$recaptcha_contact_form_code .= '<![endif]-->' . "\n";
					$recaptcha_contact_form_code .= '<p>&nbsp;</p>' . "\n";
					$recaptcha_contact_form_code .= '</object>' . "\n";
					$recaptcha_contact_form_code .= '</div>' . "\n";
					$recaptcha_contact_form_code .= '<br />' . "\n";
					$recaptcha_contact_form_code .= '<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>' . "\n";
					$recaptcha_contact_form_code .= '<input type="hidden" name="recaptcha_response_field" value="manual_challenge" />' . "\n";
					$recaptcha_contact_form_code .= '</noscript>' . "\n";
					$recaptcha_contact_form_code .= '<br />' . "\n";
					$recaptcha_contact_form_code .= '<p style="text-align: left;"><input type="submit" name="recaptcha_client" value="' . $recaptcha_contact_form_language_fields['submit_button'] . '" /></p>' . "\n";
					$recaptcha_contact_form_code .= '</fieldset>' . "\n";
					$recaptcha_contact_form_code .= '</form>' . "\n";
					$recaptcha_contact_form_code .= '<!-- end of recaptcha form -->' . "\n";
				// all fields have input, send email and display confirmation message
				} else {
					// construct mail 
					$recaptcha_contact_form_email_sender = 'From: ' . $recaptcha_contact_form_name_field . ' <' . $recaptcha_contact_form_email_field . '>';
					$recaptcha_contact_form_email_receiver = get_option('blogname') . ' <' . get_option('admin_email') . '>';
					$recaptcha_contact_form_email_body = 'You have received a message from ' . get_option('blogname') . '.  Message details are as follows:' . "\n\n";
					$recaptcha_contact_form_email_body .= 'Date and Time: ' . date("l jS F Y H:i:s") . "\n\n";
					$recaptcha_contact_form_email_body .= 'From: ' . $recaptcha_contact_form_name_field . "\n";
					$recaptcha_contact_form_email_body .= 'Message: ' . $recaptcha_contact_form_message_field . "\n\n";
					$recaptcha_contact_form_email_body .= 'IP address: ' . $_SERVER['REMOTE_ADDR'] . ' (' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ')' . "\n\n";
					
					//mail sent
					if(wp_mail($recaptcha_contact_form_email_receiver, 'New Message From ' . get_option('blogname'), $recaptcha_contact_form_email_body, $recaptcha_contact_form_email_sender)) {
						$recaptcha_contact_form_code = '<!-- start of recaptcha form -->' . "\n";
						$recaptcha_contact_form_code .= '<p style="text-align: left; font-weight: bold; background-color: white; color: green; border: 1px solid black; padding: 10px;">' . $recaptcha_contact_form_language_fields['message_sent'] . '</p>' . "\n";
						$recaptcha_contact_form_code .= '<!-- end of recaptcha form -->' . "\n";
					// problem sending mail
					} else {
						$recaptcha_contact_form_code = '<!-- start of recaptcha form -->' . "\n";
						$recaptcha_contact_form_code .= '<p style="text-align: left; font-weight: bold; background-color: white; color: red; border: 1px solid black; padding: 10px;">' . $recaptcha_contact_form_language_fields['message_failed'] . '</p>' . "\n";
						$recaptcha_contact_form_code .= '<!-- end of recaptcha form -->' . "\n";
					}
				}
			}
		// message hasn't been submitted, display contact form
		} else {
			$recaptcha_contact_form_code = '<!-- start of recaptcha form -->' . "\n";
			$recaptcha_contact_form_code .= '<script type="text/javascript">' . "\n";
			$recaptcha_contact_form_code .= 'var RecaptchaOptions = {' . "\n";
			$recaptcha_contact_form_code .= 'theme: \'' . recaptcha_contact_form_plugin_theme_colour($recaptcha_contact_form_theme_value) . '\',' . "\n";
			$recaptcha_contact_form_code .= 'lang: \'' . $recaptcha_contact_form_language_fields['language'] . '\'' . "\n";
			$recaptcha_contact_form_code .= '};' . "\n";
			$recaptcha_contact_form_code .= '</script>' . "\n";
			$recaptcha_contact_form_code .= '<noscript>&nbsp;</noscript>' . "\n";
			$recaptcha_contact_form_code .= '<form method="post" action="' . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . '">' . "\n";
			$recaptcha_contact_form_code .= '<fieldset style="border: 0px; margin: 0px; padding: 0px;">' . "\n";
			$recaptcha_contact_form_code .= '<p style="text-align: left;">' . $recaptcha_contact_form_language_fields['client_name'] . '<br /><label for="recaptcha_form_name"><input type="text" name="recaptcha_form_name" value="" style="width: 300px;" /></label></p>' . "\n";
			$recaptcha_contact_form_code .= '<p style="text-align: left;">' . $recaptcha_contact_form_language_fields['client_email'] . '<br /><label for="recaptcha_form_email"><input type="text" name="recaptcha_form_email" value="" style="width: 300px;" /></label></p>' . "\n";
			$recaptcha_contact_form_code .= '<p style="text-align: left;">' . $recaptcha_contact_form_language_fields['client_message'] . '<br /><label for="recaptcha_form_message"><textarea name="recaptcha_form_message" rows="10" cols="20" style="width: 450px;"></textarea></label></p>' . "\n";
			$recaptcha_contact_form_code .= '<script type="text/javascript" src="http://api.recaptcha.net/challenge?k=' . $recaptcha_contact_form_pubkey_checka . '"></script>' . "\n";
			$recaptcha_contact_form_code .= '<noscript>' . "\n";
			$recaptcha_contact_form_code .= '<div id="recaptcha_contact_form_plugin">' . "\n";
			$recaptcha_contact_form_code .= '<object data="http://api.recaptcha.net/noscript?k=' . $recaptcha_contact_form_pubkey_checka . '" type="text/html" id="recaptcha_contact_form_plugin_object" style="width:500px; height:300px;">' . "\n";
			$recaptcha_contact_form_code .= '<!--[if IE]>' . "\n";
			$recaptcha_contact_form_code .= '<object classid="clsid:235336920-03F9-11CF-8FD0-00AA00686F13" data="http://api.recaptcha.net/noscript?k=' . $recaptcha_contact_form_pubkey_checka . '" type="text/html" id="recaptcha_contact_form_plugin_object" style="overflow:hidden; width:500px; height:300px;">' . "\n";
			$recaptcha_contact_form_code .= '<p>&nbsp;</p>' . "\n";
			$recaptcha_contact_form_code .= '</object>' . "\n";
			$recaptcha_contact_form_code .= '<![endif]-->' . "\n";
			$recaptcha_contact_form_code .= '<p>&nbsp;</p>' . "\n";
			$recaptcha_contact_form_code .= '</object>' . "\n";
			$recaptcha_contact_form_code .= '</div>' . "\n";
			$recaptcha_contact_form_code .= '<br />' . "\n";
			$recaptcha_contact_form_code .= '<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>' . "\n";
			$recaptcha_contact_form_code .= '<input type="hidden" name="recaptcha_response_field" value="manual_challenge" />' . "\n";
			$recaptcha_contact_form_code .= '</noscript>' . "\n";
			$recaptcha_contact_form_code .= '<br />' . "\n";
			$recaptcha_contact_form_code .= '<p style="text-align: left;"><input type="submit" name="recaptcha_client" value="' . $recaptcha_contact_form_language_fields['submit_button'] . '" /></p>' . "\n";
			$recaptcha_contact_form_code .= '</fieldset>' . "\n";
			$recaptcha_contact_form_code .= '</form>' . "\n";
			$recaptcha_contact_form_code .= '<!-- end of recaptcha form -->' . "\n";
		}
	}
	
	return $recaptcha_contact_form_code;
}

// create the shortcode
add_shortcode('recaptcha_form', 'recaptcha_contact_form_short_code');

?>
