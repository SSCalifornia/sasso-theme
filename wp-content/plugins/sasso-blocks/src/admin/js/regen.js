// ajax action for Regenerate Assets
(function() {
	var btn = document.getElementById( 'regenerate-block-assets' );
	var span = document.getElementById( 'regen-status' );

	btn.addEventListener( 'click', function() {
		var xhr = new XMLHttpRequest;
		xhr.open( 'POST', ajaxObj.url );
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send( 'action=regenerate_block_assets' );

		span.innerHTML = 'Running... please wait...';

		xhr.addEventListener( 'load', function() {
			span.innerHTML = '';

			if ( this.readyState === 4 && this.status === 200 ) {
				span.innerHTML = 'Successfully created asset files!';
			} else {
				span.innerHTML = 'Something failed. Asset files were not regenerated.';
			}
		});

	});
})();