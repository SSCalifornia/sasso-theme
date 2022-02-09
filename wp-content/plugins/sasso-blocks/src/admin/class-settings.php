<?php
/**
 * Settings Page
 *
 *
 * Globs all selected Block assets into one, saves into /content/assets/
 *
 */

namespace SASSO_BLOCKS\Admin;

defined( 'ABSPATH' ) or die( 'File cannot be accessed directly' );

class Settings {
	private $options;
	private $blocks;

	public function __construct() {

	}


	// return all blocks, based on their created directories
	private function get_blocks() {
		// absolute path to /src/blocks/ in plugin dir
		$path = str_replace( 'admin', 'blocks', __DIR__ );

		// array of all files & folders within path
		$dirs = scandir( $path );

		$blocks = array_values( array_filter( $dirs, function( $elm ) {
			if ( $elm !== '.' && $elm !== '..' && $elm !== '.DS_Store' && $elm !== '_scss' ) {
				return $elm;
			}
		} ) );

		return $blocks;
	}


	private function create_block_assets( $array ) {
		$css = '';
		$js = '';

		foreach( $array as $block => $value ) {
			$css .= $this->get_concat_asset( 'css', $block );
			$js .= $this->get_concat_asset( 'js', $block );
		}

		// write files to /content/assets/
		if ( ! empty( $css ) ) {
			$this->write_to_file( 'css', $css );
		}

		if ( ! empty( $js ) ) {
			$this->write_to_file( 'js', $js );
		}
	}

	/**
	 * grabs asset files, returns concatenated string
	 * @param string $type : css or js
	 * @param string $block : Gutenberg Block for which we are grabbing asset files
	 *
	 * @return string : concatenated string of all assets
	 */
	private function get_concat_asset( $type, $block ){
		// absolute path to block directory
		$abs_path = str_replace( 'admin', 'blocks/' . $block, __DIR__ );
		$dir_path = $abs_path . '/' . $type;
		$regex = '/^.*[a-zA-Z0-9]\.' . $type . '$/';
		$concat_file = '';

		// if path exists, grab relevant css/js files
		if( file_exists( $dir_path ) && is_dir( $dir_path ) ) {
			$files = $this->get_files( $dir_path, $regex );
		}

		// concatenate files
		if ( isset( $files ) ) {
			foreach( $files as $file ) {
				$file_content = file_get_contents( $dir_path . '/' .$file );
				if ( $file_content ) {
					$concat_file .= $file_content;
				}
			}
		}

		return $concat_file;
	}

	/**
	 * return matching filenames, based on passed $path and $regex
	 * @param string $path : path to search
	 * @param string $regex : regex to compare filenames against
	 *
	 * @return array : array of all file names that match regex
	 */
	private function get_files( $path, $regex ) {
		$array = [];
		$files = scandir( $path );

		foreach( $files as $file ) {
			if ( preg_match($regex, $file) ) {
				$array[] = $file;
			}
		}

		return $array;
	}

	/**
	 * @param $type : type of file to write
	 * @param $concat_string : string to write
	 */
	private function write_to_file( $type, $concat_string ) {
		$asset_path = str_replace( 'admin', 'content/assets', __DIR__ );
		$asset_filename = $asset_path .'/block.' . $type;

		// if directory does not exist, create it
		if ( ! file_exists( $asset_path ) ) {
			mkdir( $asset_path );
		}

		$asset_file = fopen( $asset_filename, 'w' ) or die( 'Unable to open file!' );
		fwrite( $asset_file, $concat_string );
		fclose( $asset_file );
	}

}
