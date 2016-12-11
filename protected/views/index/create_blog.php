<?php
/**
 * @var $this SiteController
 */
$this->pageTitle = Yii::app()->name . ' - Blog';
$this->breadcrumbs = array(
    'Create Blog',
);
?>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if (!$model) {?>
        swal({
            title: 'No blogs found',
            type: 'info',
            html:
            'Try adding new one',
            showCloseButton: false,
            showCancelButton: false,
            confirmButtonText:
                '<i class="fa fa-thumbs-up"></i> Ok'
        });
        <?php }?>
    });
    function insert() {
        var title   = $('#title').val();
        var text    = $('#text').val();
        var date = new Date();

        $.ajax({
            url     : 'update',
            type    : 'POST',
            dataType: 'json',
            data    : {
                id      :   '0',
                title   :   title,
                date    :   date,
                text    :   text
            },
            success :   function (data) {
                console.log(data);
                window.location.reload()
            },
            error   :   function (data) {
            }
        });

    }
    function update(id) {

        var title   = $('#title'+id).val();
        var text    = $('#text'+id).val();
        var date = new Date();
        $.ajax({
            url     : 'update',
            type    : 'POST',
            dataType: 'json',
            data    : {
                id      :   id,
                title   :   title,
                date    :   date,
                text    :   text
            },
            success :   function (data) {
                console.log(data);
                window.location.reload()
            },
            error   :   function (data) {

            }
        });
    }

    function remove_blog(id) {

        swal({
            title: 'Blog has been deleted',
            type: 'warning',
            showCloseButton: false,
            showCancelButton: false,
            showConfirmButton: false,
            timer:1000
        });

        $.ajax({
            url     : 'delete',
            type    : 'POST',
            dataType: 'json',
            data    : {
                id      :   id
            },
            success :   function (data) {
                console.log(data);
                window.location.reload()
            },
            error   :   function (data) {
                alert(id);
            }
        });


    }

</script>
    <?php if (!$model) {?>
    <?php } else { ?>
        <?php foreach ($model as $test) {
            ?>
            <div class="insert_block">
                <?php $form = $this->beginWidget(
                    'CActiveForm', array('enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'))
                ); ?>
                <?php echo CHtml::label('Title', false)?>
                <?php echo CHtml::textField('title' . $test->id, $test->title); ?>
                <?php echo CHtml::label('Text', false)?>
                <?php echo CHtml::textArea('text' . $test->id, $test->text, array('rows'=>3)); ?>
                <?php echo CHtml::button(
                    'Update',
                    array(
                    'class' => 'btn btn-success',
                    'onclick' => 'update(' . $test->id . ')'
                    )
                ) ?>
                <?php echo CHtml::button(
                    'Delete',
                    array(
                    'class' => 'btn btn-danger',
                    'onclick' => 'remove_blog('. $test->id .')'
                    )
                ) ?>
                <?php echo CHtml::button(
                    $test->date,
                    array(
                        'class' => 'btn btn-default',
                        'style'=>'float:right',
                        'disabled'=>true
                    )
                ) ?>
                <?php $this->endWidget();
                ?>
            </div>
        <?php }
    }
    ?>
        <div class="insert_block">
            <?php $form = $this->beginWidget(
                'CActiveForm',
                array(
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    )
            );
            echo CHtml::textField(
                'title',
                'A flash message'
            );
            echo CHtml::textArea(
                'text',
                'A flash message is used in order to keep a message in session through one or several requests of the same user. By default, it is removed from session after it has been displayed to the user.'
            );
            echo CHtml::fileField('image');
            echo CHtml::button(
                'Insert',
                array(
                    'class' => 'btn btn-success',
                    'onclick' => 'insert()'
                )
            );
            $this->endWidget();
            ?>
        </div>

