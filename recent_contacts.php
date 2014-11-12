<?php

/**
 * Sample plugin to try out some hooks.
 * This performs an automatic login if accessed from localhost
 *
 * @license Master 1
 * @author Anthony TRIELLI. Yasmine SAIFI. Norhane KHALED
 */
class recent_contacts extends rcube_plugin
{
	public $task = 'mail';
	private $rc;

    function init()
	{
		$this->rc = rcmail::get_instance();
		$this->register_action('plugin.autocomplete-get-mails-x', array($this, 'autocomplete_get_adresses'));

		if($this->rc->action == 'compose') 
		{
			$this->require_plugin('jqueryui');
			$this->include_script('auto_completion_adresse.js');
		}
  }

  function autocomplete_get_adresses() {

			$sort_column = rcmail_sort_column();
			$search_str =  'HEADER TO *';

			$set= $this->rc->storage->list_messages('Sent', 1, 'DATE', 'DESC');

			$array=array();

			for ( $i = 0 ; $i < 3 ; ++$i)
			{
				$chars = preg_split('/,/', $set[$i]->get('to', true), -1, PREG_SPLIT_NO_EMPTY);
				$nb_element = count($chars);
				for ($j=0 ; $j < $nb_element ; ++$j)
				{
					$array[]=$chars[$j];
				}
				if($nb_element > 1) $i = $nb_element -1;
			}
			$this->rc->output->command('plugin.callback_autocomplete_adresse', $array);
			$this->rc->output->send();

	}

}
