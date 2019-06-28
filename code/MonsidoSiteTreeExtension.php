<?php
class MonsidoSiteTreeExtension extends extension {
	public function updateCMSFields(FieldList $fields) {
		$siteURL = ($this->owner->URLSegment != 'home') ? Director::absoluteURL(rtrim($this->owner->Link(), '/')) : Director::absoluteBaseURL();
		$fields->push(new LiteralField('MonsidoSiteLink', '<script>window.postMessage({ type: "monsidoExtension", fn: "overrideUrl", data: ["'.$siteURL.'"] });</script>'));
	}
	public function MetaTags(&$tags) {
		$tags .= "<meta name=\"mon-cms-edit-link\" content=\"" . Director::absoluteURL($this->owner->CMSEditLink()) . "\" />";
	}
}