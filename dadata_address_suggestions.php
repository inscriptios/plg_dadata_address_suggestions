<?php
/**
 * @package	HikaShop for Joomla!
 * @version	1.0.0
 * @author	inscriptios
 * @copyright	(C) 2018 inscriptios. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?><?php
class plgSystemDadata_address_suggestions extends JPlugin
{
  // since Joomla 3.1 only
  // protected $autoloadLanguage = true
  
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}

	public function onBeforeCompileHead()
	{
    $plugin = JPluginHelper::getPlugin('system', 'dadata_address_suggestions');
    $plg_params = new JRegistry();
    $plg_params->loadString($plugin->params);
    $document = JFactory::getDocument();
    $jinput = JFactory::getApplication()->input;

    if($jinput->get('option') == 'com_hikashop' && ($jinput->get('ctrl') == 'checkout' || $jinput->get('ctrl') == 'address'))
    {
      $document->addStyleSheet('https://cdn.jsdelivr.net/npm/suggestions-jquery@18.3.3/dist/css/suggestions.min.css','text/css');
      
      // $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js','text/javascript', true, false);
      // load native jQuery instead
      JHtml::_('jquery.framework');

      ?><!--[if lt IE 10]><?php
        $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js','text/javascript', true, false);
      ?><![endif]--><?php
      
      $document->addScript('https://cdn.jsdelivr.net/npm/suggestions-jquery@18.3.3/dist/js/jquery.suggestions.min.js','text/javascript', true, false);

      $document->addScriptDeclaration('
        function suggest() { 
          function join(arr /*, separator */) {
            var separator = arguments.length > 1 ? arguments[1] : ", ";
            return arr.filter(function(n){return n}).join(separator);
          }

          function makeAddressString(address){
            if ((address.region || address.area) && !address.city && !address.settlement) {
              return "";  
            } else {
              return join([
                address.city_with_type,
                address.settlement_with_type,
                address.street_with_type,
                join([address.house_type, address.house,
                      address.block_type, address.block], " "),
                join([address.flat_type, address.flat], " ")
              ]);
            }
          }
            
          function formatResult(value, currentValue, suggestion, options) {
            var newValue = makeAddressString(suggestion.data) || value;
            suggestion.value = newValue;
            return plugin.formatResult(newValue, currentValue, suggestion, options);
          }

          function formatSelected(suggestion) {
            return makeAddressString(suggestion.data);
          }

          function showPostalCode(suggestion) {
            jQuery("#' . $plg_params->get('post_code_field_id') . '").val(suggestion.data.postal_code);
          }

          function clearPostalCode(suggestion) {
            jQuery("#' . $plg_params->get('post_code_field_id') . '").val("");
          }

          var plugin = jQuery("#' . $plg_params->get('full_address_field_id') . '").suggestions({
            token: "' . $plg_params->get('token') . '",
            type: "ADDRESS",
            geoLocation: true,
            formatResult: formatResult,
            formatSelected: formatSelected,
            onSelect: showPostalCode,
            onSelectNothing: clearPostalCode
          }).suggestions();
        }
      ');
    }

    if($jinput->get('option') == 'com_hikashop' && $jinput->get('ctrl') == 'checkout')
    {
      $document->addScriptDeclaration('
        Oby.registerAjax("checkoutBlockRefresh", suggest);
      ');
    }

    if($jinput->get('option') == 'com_hikashop' && $jinput->get('ctrl') == 'address')
    {
      $document->addScriptDeclaration('
        jQuery(document).ready(function(){
          suggest();
        });
      ');
    }
  }
}
