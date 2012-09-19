[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName() . "\n" ?>
 * @author     ##AUTHOR_NAME##
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper {
	public function getUrlForAction($action) {
		return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
	}

	public function linkToNew($params) {
		return link_to('<i class="icon-plus"></i> '.__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('new'), array('class' => 'btn btn-primary'));
	}

	public function linkToEdit($object, $params, $size = 'btn') {
		return link_to('<i class="icon-edit"></i> '.__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('edit'), $object, array('class' => 'btn btn-primary '.$size));
	}

	public function linkToDelete($object, $params, $size = 'btn') {
		if ($object->isNew()) {
			return '';
		}
		
		return link_to('<i class="icon-trash"></i> '.__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'], 'class' => 'btn btn-danger '.$size));
	}

	public function linkToList($params) {
		return link_to(__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('list'), array('class' => 'btn btn-success'));
	}

	public function linkToSave($object, $params) {
		return '<input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" class="btn btn-primary" />';
	}

	public function linkToSaveAndAdd($object, $params) {
		if (!$object->isNew()) {
			return '';
		}
		
		return '<input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="_save_and_add" class="btn btn-primary" />';
	}
}
