<?php
/**
 * Class Mlp_Advanced_Translator_View
 *
 * Data model for post translation. Handles inserts of new posts only.
 *
 * @version 2014.03.14
 * @author  Inpsyde GmbH, toscho
 * @license GPL
 */
class Mlp_Advanced_Translator_View {

	/**
	 * @var Mlp_Advanced_Translator_Data_Interface
	 */
	private $data;

	/**
	 * Constructor.
	 *
	 * @param Mlp_Advanced_Translator_Data_Interface $data
	 */
	public function __construct( Mlp_Advanced_Translator_Data_Interface $data ) {
		$this->data = $data;
	}

	/**
	 * Add a button next to the media button to copy the source post.
	 *
	 * @wp-hook media_buttons
	 * @param   string $editor_id
	 * @return  void
	 */
	public function show_copy_button( $editor_id ) {

		$matches = array ();
		preg_match( '~mlp_translation_data_(\d+)_content~', $editor_id, $matches );

		if ( empty ( $matches[ 1 ] ) )
			return;
		?>
		<a href="#" class="mlp_copy_button button"
		   data-blog_id="<?php print $matches[ 1 ]; ?>">
			<?php
			esc_attr_e( 'Copy source post', 'multilingualpress' );
			?>
		</a>
	<?php
	}

	/**
	 * @param WP_Post $source_post
	 * @param int     $remote_blog_id
	 * @param WP_Post $post Remote post
	 * @return void
	 */
	public function show_title( /** @noinspection PhpUnusedParameterInspection */
		WP_Post $source_post, $remote_blog_id, WP_Post $post ) {

		$title       = esc_attr( $post->post_title );
		$placeholder = $this->get_place_holder( $post );
		$name        = $this->get_name( $remote_blog_id, 'title' );
		$id          = $this->get_id( $remote_blog_id, 'title' );

		?>
		<div class="mlp_titlediv">
			<div>
				<input
					class       = "mlp_title"
					type        = "text"
					name        = "<?php print $name; ?>"
					size        = "30"
					placeholder = "<?php print $placeholder ?>"
					value       = "<?php print $title; ?>"
					id          = "<?php print $id; ?>"
					>
			</div>
		</div>
		<?php
	}

	/**
	 * @param WP_Post $source_post
	 * @param int     $remote_blog_id
	 * @param WP_Post $remote_post
	 * @return void
	 */
	public function show_editor( /** @noinspection PhpUnusedParameterInspection */
		WP_Post $source_post, $remote_blog_id, WP_Post $remote_post ) {

		$editor_id   = $this->get_id( $remote_blog_id, 'content' );
		$editor_name = $this->get_name( $remote_blog_id, 'content' );
		$settings    = array (
			'tabindex'      => FALSE,
			'editor_height' => 150,
			'resize'        => TRUE,
			'textarea_name' => $editor_name,
			'media_buttons' => FALSE,
			'tinymce'       => array (
				'resize' => TRUE
			)
		);

		$this->show_copy_button( $editor_id );
		wp_editor( $remote_post->post_content, $editor_id, $settings );
	}

	/**
	 * @param WP_Post $source_post
	 * @param int     $remote_blog_id
	 * @param WP_Post $post
	 * @return void
	 */
	public function show_thumbnail_checkbox( /** @noinspection PhpUnusedParameterInspection */
		WP_Post $source_post, $remote_blog_id, WP_Post $post ) {

		$id   = $this->get_id( $remote_blog_id, 'thumbnail' );
		$name = $this->get_name( $remote_blog_id, 'thumbnail' );
		?>

		<p>
			<label for="<?php print $id; ?>_id">
				<input type="checkbox" name="<?php print $name; ?>"
					   id="<?php print $id; ?>_id" value="1"/>
				<?php _e( 'Copy the featured image of the source post.', 'multilingualpress' ); ?>
				<span class="description"><?php
					_e( 'Overwrites an existing featured image in the target post.', 'multilingualpress' );
				?></span>
			</label>
		</p>
		<?php

	}

	/**
	 * @param WP_Post $source_post
	 * @param int     $remote_blog_id
	 * @param WP_Post $post
	 * @return void
	 */
	public function show_taxonomies( /** @noinspection PhpUnusedParameterInspection */
		WP_Post $source_post, $remote_blog_id, WP_Post $post ) {

		$taxonomies = $this->data->get_taxonomies( $post, $remote_blog_id );

		if ( empty ( $taxonomies )
			or ( empty ( $taxonomies[ 'inclusive' ] ) && empty ( $taxonomies[ 'exclusive' ] ) )
		)
			return;

		$toggle_id = 'tax_toggle_' . $remote_blog_id;

		submit_button(
			esc_attr__( 'Change taxonomies', 'multilingualpress' ),
			'secondary mlp_toggler',
			'toggle_' . $remote_blog_id,
			FALSE,
			array (
				'data-toggle_selector' => "#$toggle_id"
			)
		);

		print "<div id='$toggle_id' class='hidden'>";

		if ( ! empty ( $taxonomies[ 'inclusive' ] ) ) {
			foreach ( $taxonomies[ 'inclusive' ] as $taxonomy => $data )
				$this->list_inclusive_terms( $taxonomy, $data, $remote_blog_id );

			print '<br class="clear">';
		}

		if ( ! empty ( $taxonomies[ 'exclusive' ] ) ) {
			foreach ( $taxonomies[ 'exclusive' ] as $taxonomy => $data )
				$this->list_exclusive_terms( $taxonomy, $data, $remote_blog_id );

			print '<br class="clear">';
		}

		print '</div>';
	}

	/**
	 * @param WP_Post $source_post
	 * @param int     $remote_blog_id
	 * @param WP_Post $post
	 * @return void
	 */
	public function blog_id_input( WP_Post $source_post, $remote_blog_id, WP_Post $post ) {

		$input = '<input type="hidden" name="%1$s" value="%2$s">';

		$data = array (
			'source_post_id' => $source_post->ID,
			'remote_post_id' => (int) $post->ID // force dummy post to 0
		);

		foreach ( $data as $key => $value )
			printf( $input, $this->get_name( $remote_blog_id, $key ), $value );
	}

	/**
	 * Get the value for the name attribute.
	 *
	 * @param  int $blog_id
	 * @param  string $name
	 * @return string
	 */
	private function get_name( $blog_id, $name ) {
		return $this->data->get_name_base() . '[' . (int) $blog_id . '][' . $name . ']';
	}

	/**
	 * Get the value for the id attribute.
	 *
	 * @param  int    $blog_id
	 * @param  string $name
	 * @return string
	 */
	private function get_id( $blog_id, $name ) {
		return $this->data->get_name_base() . '_' . (int) $blog_id . '_' . $name;
	}

	/**
	 * Get placeholder attribute text.
	 *
	 * @param WP_Post $post
	 * @return string|void
	 */
	private function get_place_holder( WP_Post $post ) {

		$placeholder = __( 'Enter title here', 'multilingualpress' );
		$placeholder = apply_filters( 'enter_title_here', $placeholder, $post );

		return esc_attr( $placeholder );
	}

	/**
	 * List terms which are mutually exclusive, like post formats.
	 *
	 * @param  string $taxonomy
	 * @param  array  $data
	 * @param  int    $remote_blog_id
	 * @return void
	 */
	private function list_exclusive_terms( $taxonomy, Array $data, $remote_blog_id ) {

		$fields = array ();
		$name   = $this->get_name( $remote_blog_id, 'tax' ) . '[' . $taxonomy . ']';
		$html = '<label for="%2$s_id">
					<input type="radio" name="%1$s[]" id="%2$s_id" value="%3$s"%4$s>
					%5$s
				</label>';

		foreach ( $data['terms'] as $term ) {

			$checked = checked( $term->active, TRUE, FALSE );

			$fields[] = sprintf(
				$html,
				$name,
				$term->slug,
				$term->term_id,
				$checked,
				esc_html( $term->name )
			);
		}

		$this->term_box( $data['properties']->labels->name, join( '<br>', $fields ) );
	}

	/**
	 * List terms which can be combined like categories.
	 *
	 * @param  string $taxonomy
	 * @param  array  $data
	 * @param  int    $remote_blog_id
	 * @return void
	 */
	private function list_inclusive_terms( $taxonomy, $data, $remote_blog_id ) {

		$fields = array ();
		$name   = $this->get_name( $remote_blog_id, 'tax' ) . '[' . $taxonomy . ']';

		foreach ( $data['terms'] as $term ) {

			$checked = checked( $term->active, TRUE, FALSE );

			$fields[] = sprintf(
				'<label for="%2$s_id">
					<input type="checkbox" name="%1$s[]" id="%2$s_id" value="%3$s"%4$s>
					%5$s
				</label>',
				$name,
				$term->slug,
				$term->term_id,
				$checked,
				esc_html( $term->name )
			);
		}

		$this->term_box( $data['properties']->labels->name, join( '<br>', $fields ) );
	}

	/**
	 * Container HTML for term selection.
	 *
	 * @param  string $title Taxonomy name
	 * @param  string $html
	 * @return void
	 */
	private function term_box( $title, $html ) {
		?>
		<fieldset class="mlp_taxonomy_box">
			<legend><?php print $title; ?></legend>
			<?php print $html; ?>
		</fieldset>
		<?php
	}

	/**
	 * Shows a warning message in the metabox
	 * that the remote post is trashed.
	 *
	 * @return void
	 */
	public function show_trashed_message() {
		?>
		<div class="mlp-warning">
			<p><?php _e( 'The remote post is trashed. You are not able to edit it here. If you want to, restore the remote post. Also mind the options below.', 'multilingualpress' ); ?></p>
		</div>
		<?php
	}
}