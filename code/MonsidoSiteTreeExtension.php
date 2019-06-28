<?php

namespace Monsido\SilverstripeExtension;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Control\Director;

class MonsidoSiteTreeExtension extends extension {
	public function updateCMSFields(FieldList $fields) {
		$siteURL = ($this->owner->URLSegment != 'home') ? Director::absoluteURL(rtrim($this->owner->Link(), '/')) : Director::absoluteBaseURL();
		$fields->push(new LiteralField('MonsidoSiteLink', '<script>window.postMessage({ type: "monsidoExtension", fn: "overrideUrl", data: ["'.$siteURL.'"] });</script>'));
	}
	public function MetaTags(&$tags) {
		$tags .= "\n<meta name=\"mon-cms-edit-link\" content=\"" . $this->owner->CMSEditLink() . "\" />";
	}
}