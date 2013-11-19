jQuery(document).ready( function($) {

	if($('#_revision_post_format').val() != 'project'){
		$('#p2p-from-pedia_to_pedia').hide();
	} else {
		$('#p2p-from-pedia_to_pedia').show();
		$('#p2p-from-pedia_to_pedia h3.hndle span').html('Módulos envolvidos');
	}

	$('h2.nav-tabwrapper').on('click', 'a', function(){
		if(!$(this).hasClass('project')){
			$('#p2p-from-pedia_to_pedia').hide();
		} else {
			$('#p2p-from-pedia_to_pedia').show();
			$('#p2p-from-pedia_to_pedia h3.hndle span').html('Módulos envolvidos');
		}	
	});
});