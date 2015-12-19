<?php
use yii\helpers\Url;

$action = $this->context->action->id;
$module = $this->context->module->id;
?>

<ul class="nav nav-tabs" id="selectPostType">
    <li class="active"><a data-type="1" href="javascript:void(0);">Tin thường</a></li>
    <li><a data-type="2" href="javascript:void(0);">Tin ảnh</a></li>
    <li><a data-type="3" href="javascript:void(0);">Tin video</a></li>
</ul>
<br>