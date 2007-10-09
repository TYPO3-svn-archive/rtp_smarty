<?php

########################################################################
# Extension Manager/Repository config file for ext: "rtp_smarty"
#
# Auto generated 15-09-2007 09:43
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'TYPO3 is Smarter',
	'description' => 'Smarty Integration and API for Extension Developers',
	'category' => 'be',
	'shy' => 0,
	'version' => '0.9.3',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => 'typo3temp/smarty_cache,typo3temp/smarty_compile',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Rueegg Tuck Partner',
	'author_email' => 't3@rtpartner.ch',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:125:{s:9:"ChangeLog";s:4:"f187";s:6:"README";s:4:"ee2d";s:24:"class.smarty.wrapper.php";s:4:"c5f9";s:22:"class.tx_rtpsmarty.php";s:4:"215f";s:21:"ext_conf_template.txt";s:4:"610e";s:12:"ext_icon.gif";s:4:"214a";s:17:"ext_localconf.php";s:4:"6875";s:28:"ext_typoscript_constants.txt";s:4:"d41d";s:24:"ext_typoscript_setup.txt";s:4:"314b";s:8:"todo.txt";s:4:"b59b";s:14:"doc/manual.sxw";s:4:"8e27";s:11:"smarty/BUGS";s:4:"fd67";s:18:"smarty/COPYING.lib";s:4:"68ad";s:16:"smarty/ChangeLog";s:4:"20fc";s:10:"smarty/FAQ";s:4:"7f0e";s:14:"smarty/INSTALL";s:4:"26e2";s:11:"smarty/NEWS";s:4:"23f1";s:18:"smarty/QUICK_START";s:4:"e9e7";s:13:"smarty/README";s:4:"1a3f";s:20:"smarty/RELEASE_NOTES";s:4:"d664";s:11:"smarty/TODO";s:4:"7e8a";s:21:"smarty/demo/index.php";s:4:"2e48";s:29:"smarty/demo/configs/test.conf";s:4:"2f99";s:32:"smarty/demo/templates/footer.tpl";s:4:"c1fc";s:32:"smarty/demo/templates/header.tpl";s:4:"78ba";s:31:"smarty/demo/templates/index.tpl";s:4:"a72e";s:33:"smarty/libs/Config_File.class.php";s:4:"a6ed";s:28:"smarty/libs/Smarty.class.php";s:4:"e56c";s:37:"smarty/libs/Smarty_Compiler.class.php";s:4:"e9a2";s:21:"smarty/libs/debug.tpl";s:4:"def6";s:55:"smarty/libs/internals/core.assemble_plugin_filepath.php";s:4:"c988";s:54:"smarty/libs/internals/core.assign_smarty_interface.php";s:4:"4c2d";s:51:"smarty/libs/internals/core.create_dir_structure.php";s:4:"a12f";s:52:"smarty/libs/internals/core.display_debug_console.php";s:4:"297b";s:47:"smarty/libs/internals/core.get_include_path.php";s:4:"ba78";s:44:"smarty/libs/internals/core.get_microtime.php";s:4:"72eb";s:47:"smarty/libs/internals/core.get_php_resource.php";s:4:"e0fc";s:40:"smarty/libs/internals/core.is_secure.php";s:4:"7ea8";s:41:"smarty/libs/internals/core.is_trusted.php";s:4:"83e2";s:43:"smarty/libs/internals/core.load_plugins.php";s:4:"d600";s:51:"smarty/libs/internals/core.load_resource_plugin.php";s:4:"08d5";s:53:"smarty/libs/internals/core.process_cached_inserts.php";s:4:"2a84";s:55:"smarty/libs/internals/core.process_compiled_include.php";s:4:"6da8";s:46:"smarty/libs/internals/core.read_cache_file.php";s:4:"e7de";s:38:"smarty/libs/internals/core.rm_auto.php";s:4:"8834";s:36:"smarty/libs/internals/core.rmdir.php";s:4:"0820";s:49:"smarty/libs/internals/core.run_insert_handler.php";s:4:"f645";s:49:"smarty/libs/internals/core.smarty_include_php.php";s:4:"0d87";s:47:"smarty/libs/internals/core.write_cache_file.php";s:4:"6e0c";s:53:"smarty/libs/internals/core.write_compiled_include.php";s:4:"ff79";s:54:"smarty/libs/internals/core.write_compiled_resource.php";s:4:"caa7";s:41:"smarty/libs/internals/core.write_file.php";s:4:"23f9";s:40:"smarty/libs/plugins/block.textformat.php";s:4:"f4e1";s:39:"smarty/libs/plugins/compiler.assign.php";s:4:"6c3a";s:50:"smarty/libs/plugins/function.assign_debug_info.php";s:4:"0abd";s:44:"smarty/libs/plugins/function.config_load.php";s:4:"fa64";s:40:"smarty/libs/plugins/function.counter.php";s:4:"9531";s:38:"smarty/libs/plugins/function.cycle.php";s:4:"db7b";s:38:"smarty/libs/plugins/function.debug.php";s:4:"4963";s:37:"smarty/libs/plugins/function.eval.php";s:4:"3fed";s:38:"smarty/libs/plugins/function.fetch.php";s:4:"5125";s:48:"smarty/libs/plugins/function.html_checkboxes.php";s:4:"a054";s:43:"smarty/libs/plugins/function.html_image.php";s:4:"de11";s:45:"smarty/libs/plugins/function.html_options.php";s:4:"b634";s:44:"smarty/libs/plugins/function.html_radios.php";s:4:"6a00";s:49:"smarty/libs/plugins/function.html_select_date.php";s:4:"ad1d";s:49:"smarty/libs/plugins/function.html_select_time.php";s:4:"ac7c";s:43:"smarty/libs/plugins/function.html_table.php";s:4:"d7ad";s:39:"smarty/libs/plugins/function.mailto.php";s:4:"03b5";s:37:"smarty/libs/plugins/function.math.php";s:4:"0b33";s:38:"smarty/libs/plugins/function.popup.php";s:4:"1e8b";s:43:"smarty/libs/plugins/function.popup_init.php";s:4:"b235";s:43:"smarty/libs/plugins/modifier.capitalize.php";s:4:"70f5";s:36:"smarty/libs/plugins/modifier.cat.php";s:4:"9dbc";s:49:"smarty/libs/plugins/modifier.count_characters.php";s:4:"9169";s:49:"smarty/libs/plugins/modifier.count_paragraphs.php";s:4:"c64e";s:48:"smarty/libs/plugins/modifier.count_sentences.php";s:4:"c22e";s:44:"smarty/libs/plugins/modifier.count_words.php";s:4:"0734";s:44:"smarty/libs/plugins/modifier.date_format.php";s:4:"5d57";s:48:"smarty/libs/plugins/modifier.debug_print_var.php";s:4:"0839";s:40:"smarty/libs/plugins/modifier.default.php";s:4:"11c1";s:39:"smarty/libs/plugins/modifier.escape.php";s:4:"3bd0";s:39:"smarty/libs/plugins/modifier.indent.php";s:4:"ea1f";s:38:"smarty/libs/plugins/modifier.lower.php";s:4:"5520";s:38:"smarty/libs/plugins/modifier.nl2br.php";s:4:"1d16";s:46:"smarty/libs/plugins/modifier.regex_replace.php";s:4:"d4e8";s:40:"smarty/libs/plugins/modifier.replace.php";s:4:"b7d1";s:40:"smarty/libs/plugins/modifier.spacify.php";s:4:"6699";s:46:"smarty/libs/plugins/modifier.string_format.php";s:4:"4010";s:38:"smarty/libs/plugins/modifier.strip.php";s:4:"b128";s:43:"smarty/libs/plugins/modifier.strip_tags.php";s:4:"4811";s:41:"smarty/libs/plugins/modifier.truncate.php";s:4:"da35";s:38:"smarty/libs/plugins/modifier.upper.php";s:4:"0ef0";s:41:"smarty/libs/plugins/modifier.wordwrap.php";s:4:"b80b";s:51:"smarty/libs/plugins/outputfilter.trimwhitespace.php";s:4:"6535";s:51:"smarty/libs/plugins/shared.escape_special_chars.php";s:4:"2f72";s:45:"smarty/libs/plugins/shared.make_timestamp.php";s:4:"29ff";s:30:"smarty/misc/smarty_icon.README";s:4:"f718";s:27:"smarty/misc/smarty_icon.gif";s:4:"3c85";s:23:"smarty/unit_test/README";s:4:"78b0";s:27:"smarty/unit_test/config.php";s:4:"5811";s:37:"smarty/unit_test/smarty_unit_test.php";s:4:"2420";s:41:"smarty/unit_test/smarty_unit_test_gui.php";s:4:"756c";s:31:"smarty/unit_test/test_cases.php";s:4:"d622";s:51:"smarty/unit_test/configs/globals_double_quotes.conf";s:4:"ed23";s:51:"smarty/unit_test/configs/globals_single_quotes.conf";s:4:"246d";s:41:"smarty/unit_test/templates/assign_var.tpl";s:4:"379d";s:39:"smarty/unit_test/templates/constant.tpl";s:4:"47bd";s:36:"smarty/unit_test/templates/index.tpl";s:4:"5f67";s:41:"smarty/unit_test/templates/parse_math.tpl";s:4:"7d8f";s:45:"smarty/unit_test/templates/parse_obj_meth.tpl";s:4:"04c2";s:27:"typo3_plugins/block.LLL.php";s:4:"0f13";s:29:"typo3_plugins/block.getLL.php";s:4:"9aaf";s:32:"typo3_plugins/block.nl2space.php";s:4:"0ac2";s:30:"typo3_plugins/block.noShow.php";s:4:"f081";s:34:"typo3_plugins/block.strip_tags.php";s:4:"4642";s:32:"typo3_plugins/block.typolink.php";s:4:"9fa6";s:37:"typo3_plugins/function.TSconstant.php";s:4:"e387";s:34:"typo3_plugins/function.cObject.php";s:4:"1f62";s:34:"typo3_plugins/function.getText.php";s:4:"b21c";s:38:"typo3_plugins/function.typolinkURL.php";s:4:"f38c";s:40:"typo3_plugins/prefilter.TSconditions.php";s:4:"72e5";s:36:"typo3_plugins/prefilter.TSparams.php";s:4:"2212";s:30:"typo3_plugins/resource.EXT.php";s:4:"245f";s:33:"typo3_plugins/resource.string.php";s:4:"a4b1";}',
	'suggests' => array(
	),
);

?>