# WP Delete attachments with Posts

Simple plugin, which deletes linked attachmens, when you delete post.

By default, it watches for Posts and Pages. You can set up different post types via filter:

```php
add_filter( 'jk/delete-attachments-with-post/affected-post-types', function() {
	return [ 'page', 'custom_post_type' ];
} );
```