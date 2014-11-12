rcmail.addEventListener('init', function(evt) {
	if (rcmail.task == 'mail') {
		rcmail.addEventListener('plugin.callback_autocomplete_adresse', callback_autocomplete);
		$('#contactsearchbox').on('click', search_query_adresses);
		$('#contactsearchbox').autocomplete({
			minLength: 0,
			source: [],
			select: function(event,ui) {
				$('#contactsearchbox').val(ui.item.value);
				rcmail.command('search'); 
				return false;
			}
		});
		
	}
	else 
	{
		rcmail.removeEventListener('plugin.callback_autocomplete', callback_autocomplete);
	}
});


function callback_autocomplete (response) {
	$('#contactsearchbox').autocomplete('option', 'source', response);
	$( "#contactsearchbox" ).autocomplete( "search", "");
}

function search_query_adresses() {
	rcmail.http_post('plugin.autocomplete-get-mails-x', "");
}