// $Id: xmlsitemap_node.js,v 1.1.2.1 2009/12/17 02:45:38 davereid Exp $

Drupal.verticalTabs = Drupal.verticalTabs || {};

Drupal.verticalTabs.xmlsitemap = function() {
  var vals = [];

  // Inclusion select field.
  var status = $('#edit-xmlsitemap-node-status option:selected').text();
  vals.push(Drupal.t('Inclusion: @value', { '@value': status }));

  // Priority select field.
  var priority = $('#edit-xmlsitemap-node-priority option:selected').text();
  vals.push(Drupal.t('Priority: @value', { '@value': priority }));

  return vals.join('<br />');
}
