<?php
class MonsidoSiteTreeExtension extends extension {
	public function updateCMSFields(FieldList $fields) {
		$siteURL = ($this->owner->URLSegment != 'home') ? Director::absoluteURL($this->owner->URLSegment) : Director::absoluteBaseURL();
		$fields->push(new LiteralField('MonsidoURLComment', "<!-- Monsido: public_urls['".$siteURL."'] --><script>window.postMessage({ type: 'monsidoExtension', fn: 'forceRefresh' });console.log('bingo');</script>"));
	}
}