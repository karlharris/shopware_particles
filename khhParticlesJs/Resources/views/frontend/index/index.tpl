{extends file="parent:frontend/index/index.tpl"}

{* Message if javascript is disabled *}
{block name='frontend_index_no_script_message'}
	<div id="particles-js"></div>
	{$smarty.block.parent}
{/block}