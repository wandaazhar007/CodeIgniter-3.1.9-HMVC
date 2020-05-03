<!DOCTYPE html>
<html>

<?php $this->load->view('templates/header') ?>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('templates/navbar') ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('templates/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php echo $title ?>
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><?php echo $breadcumb ?></li>
        </ol>
      </section>

      <!-- Main content -->
      <?php $this->load->view($contents) ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('templates/footer') ?>
</body>

</html>