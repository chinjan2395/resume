<?php

class IndexController extends Controller
{
    /**
     * Declares class-based actions.
     *
     * @return void
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            //$model = Faldone::model()->findByPk($_POST['manuale']['Id_faldone']);
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     *
     * @return void
     */
    public function actionIndex()
    {
//        $this->redirect(APP_FULL_BASE_URL."/create");
        $model = Blogs::model()->findAll();
        if (!$model) {
            $model = 0;
            $this->redirect('index.php/index/create');
        }
        $this->render(
            'index', array(
                'model' => $model,
            )
        );
    }

    /**
     * Excel
     *
     * @return void
     */
    public function actionInitImport()
    {
        $this->render('import');
    }

    public function actionImport()
    {
        require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';

        if (isset($_POST['sheet_index'])) {
            $sheet_index_test=$_POST['sheet_index']+1;

            $inputFileName = $_POST['filename'];
            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
            $sheetData = $objPHPExcel->setActiveSheetIndex($_POST['sheet_index']);

        } else {
            $target = 'uploads/' . basename($_FILES['filename']['name']);
            move_uploaded_file($_FILES['filename']['tmp_name'], $target);
            $inputFileName = 'uploads/' . $_FILES['filename']['name'];
            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
            $sheetData = $objPHPExcel->setActiveSheetIndex(0);
            $sheet_index_test='1';
        }

        $sheetCount = $objPHPExcel->getSheetCount();
        $highestColumm = $sheetData->getHighestDataColumn();

        $this->render(
            'import_view',
            array(
                'inputFileName' => $inputFileName,
                'sheet_data' => $sheetData,
                'sheetCount' => $sheetCount,
                'sheet_index_test'=>$sheet_index_test,
                'highestColumm' => $highestColumm
            )
        );
    }

    /**
     *Import excel data to database
     *
     * @return void
     */
    public function actionImportToDB()
    {
        /* $sqlQuery = "CREATE TABLE IF NOT EXISTS test_table (name VARCHAR(20), owner VARCHAR(20))";
         $sqlCommand = Yii::app()->db->createCommand($sqlQuery);
         echo $sqlCommand->execute()."<pre>";*/
        $i = 1;
        $j = 2;

        for ($j = 2; $j < $_POST['highestRow']; $j++) {

//            $test = new Timesheet();

            for ($i = 1; $i <= $_POST['highestColumm']; $i++) {

                $arr_head[$j - 2][$i] = $_POST['head_row_0' . 'col_' . $i];
                $arr[$j - 2][$i] = $_POST['row_' . ($j - 1) . 'col_' . $i];
//                $test->$_POST['head_row_0' . 'col_' . $i] = $arr[$j - 2][$i];

            }

//            $test->save();
//            $string = "INSERT INTO test_table (". $arr_head[$j-2][$i-1].") VALUES ". $arr;

//                echo "<br>".$string;

            /* $sqlQuery = "INSERT INTO test_table (name,owner) VALUES ('.".$arr[$j - 2][$i].".','.".$arr[$j - 2][$i].".')";
             $sqlCommand = Yii::app()->db->createCommand($sqlQuery);
             echo $sqlCommand->execute();*/
//            $string = "'INSERT INTO test_table (".$arr_head[$j - 2][$i].") VALUES (nome) ";
//            echo "<br>".$string;
        }
        echo "<pre>";
//        print_r($arr_head);

        foreach ($arr_head as $head){

//            print_r(array_keys($head));
            $head_keys []= array_keys($head);
            break;
        }

//        print_r($head_keys);
        $temp_string = '';
        for ($i=1; $i<9; $i++)
        {
            $temp_string .= $arr_head[0][$i];
        }

        echo "INSERT INTO test_table ".$temp_string ."VALUES " ;
        print_r($arr);
        /*echo $_POST['highestColumm'];
        echo "j::: ".$j." i::".$i;
        echo "<pre>";
        print_r($arr);

        for ($k=0;$k<($_POST['highestRow']-2);$k++) {
            for ($l = 0; $l < ($_POST['highestColumm'] - 2); $l++) {
            }
        }
        print_r($arr);
        echo $sqlQuery = "INSERT INTO test_table (name,owner) VALUES ('asd','owner')"."<pre>";*/

    }

    /**
     *Display excel data to page
     *
     * @return void
     */
    public function actionImportView()
    {
        set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

        include 'PHPExcel/IOFactory.php';

        $inputFileType = 'Excel5';

        $inputFileName = 'YiiExcel.xls';

        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

        $sheetData = $objPHPExcel->getActiveSheet();

        $highestColumm = $sheetData->getHighestDataColumn();

        $this->render(
            'import_view',
            array(
                'sheet_data' => $sheetData,
                'highestColumm' => $highestColumm
            )
        );
    }

    /**
     *Export from database
     *
     * @return void
     */
//    public function actionExport()
//    {
//
//        /*set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');
//        include 'PHPExcel.php';*/
//////        PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
////
////
////        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
////        header('Content-Disposition: attachment;filename="graph.xlsx"');
////        header('Cache-Control: max-age=0');
////
////        include_once 'PHPExcel.php';
////        $phpexcel = new PHPExcel();
////
////        $phpexcel->setActiveSheetIndex(0);
////        $sheet = $phpexcel->getActiveSheet();
////
////        $data = array('20', '31', '50', '80', '105', '139', '180', 'k', '256', '308','359','405','449','491','516');
////        $row = 1;
////        foreach($data as $point) {
////            $sheet->setCellValueByColumnAndRow(1, $row++, $point);
////        }
////
////        $data = array('20', '31', '50', '80', '105', '139', '180', '219', '256', '308','359','405','449','491','516');
////        $row = 1;
////        foreach($data as $point) {
////            $sheet->setCellValueByColumnAndRow(0, $row++, $point);
////        }
////
////        $values = new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$1:$B$10');
////        $categories = new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$1:$A$10');
////
////        $series = new PHPExcel_Chart_DataSeries(
////            PHPExcel_Chart_DataSeries::TYPE_AREACHART,       // plotType
////            PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,  // plotGrouping
////            array(0),                                       // plotOrder
////            array(),                                        // plotLabel
////            array($categories),                             // plotCategory
////            array($values)                                  // plotValues
////        );
////        $series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_VERTICAL);
////
////        $layout = new PHPExcel_Chart_Layout();
////        $plotarea = new PHPExcel_Chart_PlotArea($layout, array($series));
////        $xTitle = new PHPExcel_Chart_Title('xAxisLabel');
////        $yTitle = new PHPExcel_Chart_Title('yAxisLabel');
////
////        $chart = new PHPExcel_Chart('sample', null, null, $plotarea, true,0,$xTitle,$yTitle);
////
////        $chart->setTopLeftPosition('C1');
////        $chart->setBottomRightPosition('J15');
////
////        $sheet->addChart($chart);
////
////        $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
////        $writer->setIncludeCharts(TRUE);
////        $writer->save('php://output');
//
//        $model = Timesheet::model()->findAll();
//        $objPHPExcel = new PHPExcel();
//
//        // Set document properties
//        $objPHPExcel->getProperties()->setCreator("K'iin Balam")
//            ->setLastModifiedBy("K'iin Balam")
//            ->setTitle("YiiExcel Test Document")
//            ->setSubject("YiiExcel Test Document")
//            ->setDescription("Test document for YiiExcel, generated using PHP classes.")
//            ->setKeywords("office PHPExcel php YiiExcel UPNFM")
//            ->setCategory("Test result file");
//
//        $sheetData = $objPHPExcel->setActiveSheetIndex(0);
//
//
//        $objPHPExcel->setActiveSheetIndex(0)
//            ->setCellValue('A1', 'date')
//            ->setCellValue('B1', 'developer')
//            ->setCellValue('C1', 'tracking')
//            ->setCellValue('D1', 'project')
//            ->setCellValue('E1', 'activity')
//            ->setCellValue('F1', 'description')
//            ->setCellValue('G1', 'bugfix');
//
//        $i = 2;
//
//        foreach ($model as $timesheet) {
//            $objPHPExcel->setActiveSheetIndex(0)
//                ->setCellValue('A' . $i, $timesheet->date)
//                ->setCellValue('B' . $i, $timesheet->developer)
//                ->setCellValue('C' . $i, $timesheet->tracking)
//                ->setCellValue('D' . $i, $timesheet->project)
//                ->setCellValue('E' . $i, $timesheet->activity)
//                ->setCellValue('F' . $i, $timesheet->description)
//                ->setCellValue('G' . $i, $timesheet->bugfix);
//            $i++;
//        }
//
//        // To get highest column
//        /*$highestColumm = $sheetData->getHighestDataColumn();
//        $highestColumm_tostring = PHPExcel_Cell::columnIndexFromString($highestColumm);*/
//
//
//        // Rename worksheet
//        $objPHPExcel->getActiveSheet()->setTitle('YiiExcel');
//
//        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
//        $objPHPExcel->setActiveSheetIndex(0);
//
//        // Save a xls file
//        $filename = 'YiiExcel'.$i;
//        header('Content-Type: application/vnd.ms-excel');
//        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx');
//        header('Cache-Control: max-age=0');
//
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//
//        $objWriter->save('php://output');
//
//        unset($this->objWriter);
//        unset($this->objWorksheet);
//        unset($this->objReader);
//        unset($this->objPHPExcel);
//        exit();
//    }
    public function actionExport()
    {

        set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');
        include 'PHPExcel.php';
        $phpexcel = new PHPExcel();

        $phpexcel->setActiveSheetIndex(0);
        $sheet = $phpexcel->getActiveSheet();

        $data = array('20', '31', '50', '80', '105', '139', '180', '160', '256', '308','359','405','449','491','516');
        $row = 1;
        foreach($data as $point) {
            $sheet->setCellValueByColumnAndRow(1, $row++, $point);
        }

        $data = array('20', '31', '50', '80', '105', '139', '180', '219', '256', '308','359','405','449','491','516');
        $row = 1;
        foreach($data as $point) {
            $sheet->setCellValueByColumnAndRow(0, $row++, $point);
        }

        $values = new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$1:$B$10');
        $categories = new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$1:$A$10');

        $series = new PHPExcel_Chart_DataSeries(
            PHPExcel_Chart_DataSeries::TYPE_AREACHART,       // plotType
            PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,  // plotGrouping
            array(0),                                       // plotOrder
            array(),                                        // plotLabel
            array($categories),                             // plotCategory
            array($values)                                  // plotValues
        );
        $series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_VERTICAL);

        $layout = new PHPExcel_Chart_Layout();
        $plotarea = new PHPExcel_Chart_PlotArea($layout, array($series));
        $xTitle = new PHPExcel_Chart_Title('xAxisLabel');
        $yTitle = new PHPExcel_Chart_Title('yAxisLabel');

        $chart = new PHPExcel_Chart('sample', null, null, $plotarea, true,0,$xTitle,$yTitle);

        $chart->setTopLeftPosition('C1');
        $chart->setBottomRightPosition('J15');

        $sheet->addChart($chart);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="graph.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
        $writer->setIncludeCharts(TRUE);
        $writer->save('php://output');

    }

    /**
     *To Create and Update
     *
     * @return void
     */
    public function actionUpdate()
    {
        $_POST['date'] = date("Y-m-d", strtotime($_POST['date']));

        if ($_POST['id'] == 0) {

            $command = Yii::app()->db->createCommand();
            echo $command->insert('blogs', $_POST);
        } else {
            Blogs::model()->updateByPk($_POST['id'], $_POST);
        }
    }

    /**
     *To Delete
     *
     * @return void
     */
    public function actionDelete()
    {
        Blogs::model()->deleteByPk($_POST['id']);
    }

    /**
     *This is the action to handle external exceptions.
     *
     * @return void
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

    /**
     *Displays the contact page
     *
     * @return void
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-Type: text/plain; charset=UTF-8";

                mail(
                    Yii::app()->params['adminEmail'],
                    $subject,
                    $model->body,
                    $headers
                );
                Yii::app()->user->setFlash(
                    'contact',
                    'Thank you for contacting us. We will respond to you as soon as possible.'
                );
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     *Displays the login page
     *
     * @return void
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     *Logs out the current user and redirect to homepage.
     *
     * @return void
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     *To Insert Blog
     *
     * @return void
     */
    public function actionInsert()
    {
        $model = 0;
        $this->render('create_blog', array('model' => $model));
    }

    /**
     *To Create Blog
     *
     * @return void
     */
    public function actionCreate()
    {
        $model = Blogs::model()->findAll();
        $this->render('create_blog', array('model' => $model));
    }
}