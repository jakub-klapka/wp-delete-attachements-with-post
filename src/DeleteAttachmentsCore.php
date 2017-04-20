<?php

namespace JakubKlapka\WpDeleteAttachmentsWithPost;

use JakubKlapka\WpDeleteAttachmentsWithPost\Traits\SingletonTrait;

class DeleteAttachmentsCore {
	use SingletonTrait;

	/**
	 * Hook to WP
	 * @return void
	 */
	public function boot() {

		add_action( 'plugins_loaded', function() {

			add_action( 'before_delete_post', [ $this, 'maybeHandlePostDelete' ] );

		} );

	}

	/**
	 * Find out, if currently deleted posts should have the attachments deleted or not
	 *
	 * @wp-action before_delete_post
	 * @param string|int $post_id
	 * @return void
	 */
	public function maybeHandlePostDelete( $post_id ) {

		/**
		 * Configure affected post types as array
		 *
		 * @param array [] Post types
		 */
		$affected_post_types = apply_filters( 'jk/delete-attachments-with-post/affected-post-types', [ 'page', 'post' ] );

		/*
		 * Apply only to whitelisted post types
		 */
		$post = get_post( $post_id );
		if( ! in_array( $post->post_type, $affected_post_types ) ) return;

		/*
		 * Process the deleting
		 */
		$this->deleteAttachments( $post );

	}

	/**
	 * Delete attachemnts for passed post
	 *
	 * @param \WP_Post $post
	 */
	protected function deleteAttachments( $post ) {

		$attachments = get_posts( [
			'post_type'   => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $post->ID,
		] );

		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				wp_delete_attachment( $attachment->ID, true );
			}
		}

	}

}