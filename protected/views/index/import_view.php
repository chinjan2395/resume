<?php

?>

<script>
    $(document).ready(function () {
        $('#import_table').DataTable({
            "bLengthChange": false,
            "pageLength": 15
        })
    });

</script>
</div>
</div>
<div class="section">
    <div class="jumbotron">

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="post_block">
                    <div class="col-md-12">
                        <?php
                        for ($tab = 0; $tab < $sheetCount; $tab++) {
                            ?>
                            <form id="<?php echo $tab ?>" action="import" method="post">
                                <div class="col-md-1" style="float: left">
                                    <?php
                                    echo CHtml::hiddenField(
                                        'sheet_index',
                                        $tab,
                                        array(
                                            'id' => $tab
                                        )
                                    );
                                    echo CHtml::hiddenField(
                                        'filename',
                                        $inputFileName,
                                        array(
                                            'id' => $tab
                                        )
                                    );
                                    if ($sheet_index_test==($tab+1)) {
                                        echo CHtml::submitButton(
                                            'Sheet' . " " . ($tab + 1),
                                            array('class' => 'btn-info btn-lg')
                                        );
                                    }
                                    else {
                                        echo CHtml::submitButton(
                                            'Sheet' . " " . ($tab + 1),
                                            array('class' => 'btn-default btn-lg')
                                        );
                                    }
                                    ?>
                                </div>
                            </form>
                        <?php }
                        ?>

                    </div>
                    <form id="sheet_to_upload" action="importtodb" method="post">
                        <table id="import_table" class="post_block table table-bordered table-hover">
                            <thead class="thead-default">

                            <?php
                            $i = 0;
                            $j = 1;
                            $highestColumm = $sheet_data->getHighestDataColumn();
                            echo CHtml::hiddenField(
                                'highestColumm',
                                PHPExcel_Cell::columnIndexFromString($highestColumm)
                            );
                            for ($j = 1; $j <= 1; $j++) { ?>
                                <tr>
                                    <?php
                                    for ($i = 0; $i < PHPExcel_Cell::columnIndexFromString($highestColumm); $i++) { ?>
                                        <th class="text-left text-uppercase ">
                                            <?php
                                            echo CHtml::hiddenField(
                                                'head_row_' . ($j - 1) . 'col_' . ($i + 1),
                                                $sheet_data->getCellByColumnAndRow($i, $j)->getValue()
                                            );
                                            echo $sheet_data->getCellByColumnAndRow($i, $j); ?>
                                        </th>
                                    <?php } ?>
                                </tr>
                                <?php break;
                            } ?>

                            </thead>
                            <tbody>

                            <?php
                            $i = 0;
                            $j = 2;

                            for ($j = 2; $j <= $sheet_data->getHighestRow(); $j++) { ?>
                                <tr>
                                    <?php
                                    for ($i = 0; $i < PHPExcel_Cell::columnIndexFromString($highestColumm); $i++) { ?>
                                        <td style="width: auto" class="text-left">
                                            <?php
                                            echo CHtml::hiddenField(
                                                'row_' . ($j - 1) . 'col_' . ($i + 1),
                                                $sheet_data->getCellByColumnAndRow($i, $j)->getFormattedValue(),
                                                array(
                                                    'id' => $sheet_data->getCellByColumnAndRow($i, $j)->getFormattedValue()
                                                )
                                            );
                                            echo $sheet_data->getCellByColumnAndRow($i, $j)->getFormattedValue();
                                            ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-1" style="float: right">
                                <?php

                                echo CHtml::hiddenField(
                                    'highestRow',
                                    $j
                                );
                                echo CHtml::submitButton(
                                    'Import',
                                    array('class' => 'btn-default btn-lg')
                                );
                                ?>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>