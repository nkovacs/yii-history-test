<?php

$this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'enableHistory' => true,
	'itemView' => '_view',
));
