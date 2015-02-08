<?php

/**
 * Remove an Items
 */
class SendexItemRemoveProcessor extends modObjectProcessor {
	public $objectType = 'SendexItem';
	public $classKey = 'SendexItem';
	public $languageTopics = array('sendex');
	//public $permission = 'remove';


	/**
	 * @return array|string
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->failure($this->modx->lexicon('sendex_item_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var SendexItem $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('sendex_item_err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}

return 'SendexItemRemoveProcessor';