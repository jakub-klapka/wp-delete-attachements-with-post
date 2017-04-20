# WP Delete attachments with Posts

Simple plugin, which deletes linked attachmens, when you delete post.

By default, it watches for Posts and Pages. You can set up different post types via filter:

```php
add_filter( 'jk/delete-attachments-with-post/affected-post-types', function() {
	return [ 'page', 'custom_post_type' ];
} );
```

## Installation

- Grab git repo
- Run `composer install --no-dev -o`
- Upload contents to *wp-content/plugins/jk-delete-attachements-with-post*
- Activate in WP