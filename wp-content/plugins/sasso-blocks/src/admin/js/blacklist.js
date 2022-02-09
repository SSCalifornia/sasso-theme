wp.domReady( function() {

		for ( var i = 0, max = blacklisted_blocks_vars.length; i < max; i++ ) {
			wp.blocks.unregisterBlockType( blacklisted_blocks_vars[i] );
		}

});