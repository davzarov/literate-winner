<!-- custom fonts -->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css"
    integrity="sha256-zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0="
    crossorigin="anonymous"
/>
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet"
/>
<!-- custom styles -->
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/assets/css/sb-admin-2.min.css">
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/assets/css/custom.css">
<!-- JQuery -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"
></script>
<!-- dataTables styles -->
<link 
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css"
    integrity="sha256-F+DaKAClQut87heMIC6oThARMuWne8+WzxIDT7jXuPA=" crossorigin="anonymous" />

<?php
    // si nos ubicamos en la página indice de un controlador cargar dataTables
    // if (isset($_GET["a"]) && $_GET["a"] === "index")
    //     echo("<link
    //     rel='stylesheet'
    //     href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css'
    //     integrity='sha256-F+DaKAClQut87heMIC6oThARMuWne8+WzxIDT7jXuPA=' crossorigin='anonymous' />");
?>