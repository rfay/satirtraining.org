// $Id: xmlsitemap.js,v 1.1.2.1 2010/01/08 21:40:30 davereid Exp $

Drupal.verticalTabs = Drupal.verticalTabs || {};

Drupal.verticalTabs.xmlsitemap = function() {
  var vals = [];

  // Inclusion select field.
  var status = $('#edit-xmlsitemap-status option:selected').text();
  vals.push(Drupal.t('Inclusion: @value', { '@value': status }));

  // Priority select field.
  var priority = $('#edit-xmlsitemap-priority option:selected').text();
  vals.push(Drupal.t('Priority: @value', { '@value': priority }));

  return vals.join('<br />');
}
