<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $dataProvider,
	'enableHistory' => true,
	'filter' => $filterForm,
));
