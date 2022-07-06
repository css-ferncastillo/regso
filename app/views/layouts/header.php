<!doctype html>
<html lang="en">

   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width,initial-scale=1.0" />
      <title>
         <?= APP_NAME ?> | <?= isset($title_page) ? $title_page : '' ?>
      </title>
      <link rel="shortcut icon" href="<?= APP_URI ?>public/assets/media/favicons/favicon.png" type="image/x-icon">   
      <link rel="stylesheet" href="<?= APP_URI ?>public/assets/fonts/simple-line-icon/css/simple-line-icon.css" />
      <link rel="stylesheet" href="<?= APP_URI ?>public/assets/fonts/fontawesome/css/all.css" />
      <link rel="stylesheet" href="<?= APP_URI ?>public/assets/css/oneui.min-5.2.css" />
      <link rel="stylesheet" href="<?= APP_URI ?>public/assets/css/animate.min.css" />
      <link rel="stylesheet" href="<?= APP_URI ?>public/assets/js/plugins/datatables/jquery.dataTables.css" />
      <link rel="stylesheet" href="<?= APP_URI ?>public/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" />
      <link rel="stylesheet" href="<?= APP_URI ?>public/assets/js/plugins/datatables/jquery.dataTables.css" />

      <script src="<?= APP_URI ?>public/assets/js/lib/jquery.min.js"></script>
      <script src="<?= APP_URI ?>public/assets/js/main.js"></script>
      <script type="text/javascript">
         const url = "<?= APP_URI ?>";
      </script>
   </head>
   <?php \Helpers\Usrflash::render_all() ?>