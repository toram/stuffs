<?php

  $base = base_url();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Blog codeigniter</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=$base?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=$base?>public/css/blog.css" rel="stylesheet">

    <link href="<?=$base?>public/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--<link href="<?=$base?>public/css/dataTables.bootstrap.css" rel="stylesheet">--> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="<?=base_url()?>blog/index">Home</a>          
          <a class="blog-nav-item" href="<?=base_url()?>admin">Admin</a>
          <a class="blog-nav-item" href="<?=base_url()?>admin/logout">Logout</a>
        </nav>
      </div>
    </div>

    <div class="container">    
      
      <div class="row">
        <div class="col-sm-12 grid">
          <?php echo $this->table->generate(); ?>
        </div>
      </div>
    </div>


      </div>
    </div>
  </div>

    <footer class="blog-footer">
      <p>Blog test.</p>
    </footer>

    <script src="<?=$base?>public/js/jquery.js"></script>
    <script src="<?=$base?>public/js/bootstrap.min.js"></script>      
    <script src="<?=$base?>public/js/jquery.dataTables.min.js"></script>      
    <script src="<?=$base?>public/js/dataTables.bootstrap.js"></script>      
    <script type="text/javascript">

      var traduccionesGrid = {
        processing:   "Procesando...",
        search:       "Filtrar:",
        info:         "Mostrando del registro _START_ al _END_ de _TOTAL_ registros.",
        loadingRecords: "Cargando...",
        emptyTable:     "Sin datos.",
        paginate: { 
          first:    "Primera",
          previous:   "Anterior",
          next:       "Siguiente",
          last:       "Último"
        }
      };

      function render_checkbox( data, type, row )
      {
        return ( type = 'display') ? "<input type='checkbox' class='editor-active'>" : data;
      }

      function grid_rowCallback(row, data)
      {
        $("input.editor-active", row).prop("checked", data.visible==1 );
      }


      var columnasGrid = [
        { "bSortable": true, "bVisible": "true", "width": "15%", data: "id" },
        { "bSortable": true, "bVisible": "true", "width": "50%", data: "title" },
        { "bSortable": true, "bVisible": "true", "width": "20%", data: "date_published" },
        { "bSortable": true, "bVisible": "true", "width": "15%", data: "visible", render: render_checkbox, "sClass": "center" },
      ]

      function update_visible(item_id, status)
      {
        if (item_id != null)
        {
          $.ajax({ type: "GET", url: "<?=$base?>/admin/update/"+item_id+"/"+status, dataType: "json"});
        }
      }


      $(document).ready(function()
      {
          var dtGrid = $("#listado").DataTable({
            "LengthChange": true,
            "paging": false,
            "processing": true,
            "pageLength": 50,
            "stateSave": true,
            "searching": true,
            "autoWidth": true,
            "scrollCollapse": false,
            "dom": '<"toolbar">frtpi',
            "ajax": { "url": "<?=$base?>admin/datatable" },
            "language": traduccionesGrid,
            "columns": columnasGrid,
            "rowCallback": grid_rowCallback
          });

          $("#listado").on("change", "input.editor-active", function() {
              var elem_id = $(this).closest("tr").children("td").first();
              var item_id = $(elem_id).text();
              var status = $(this).prop("checked") ? 1 : 0;
              update_visible(item_id, status);
          })

      });


    </script>

  </body>
</html>