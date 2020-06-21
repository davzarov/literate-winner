<!-- bootstrap -->
<script 
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"
    integrity="sha256-fzFFyH01cBVPYzl16KT40wqjhgPtq6FFUB6ckN2+GGw="
    crossorigin="anonymous"
></script>
<!-- core javascript plugin -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"
    integrity="sha256-H3cjtrm/ztDeuhCN9I4yh4iN2Ybx/y1RM7rMmAesA0k="
    crossorigin="anonymous"
></script>
<!-- custom scripts -->
<script src="<?php echo URL_ROOT; ?>/assets/js/sb-admin-2.min.js"></script>
<!-- charts -->
<!-- <script
    src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js'
    integrity='sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw='
    crossorigin='anonymous'
></script> -->
<!-- dataTables scripts -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"
    integrity="sha256-t5ZQTZsbQi8NxszC10CseKjJ5QeMw5NINtOXQrESGSU="
    crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js"
    integrity="sha256-hJ44ymhBmRPJKIaKRf3DSX5uiFEZ9xB/qx8cNbJvIMU="
    crossorigin="anonymous"></script>
<script src="<?php echo URL_ROOT; ?>/assets/js/init-datatables.js"></script>

<?php
    // si nos ubicamos en la página indice de un controlador cargar dataTables
    // if (isset($_GET["a"]) && $_GET["a"] === "index")
    //     echo("<script
    //         src='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js'
    //         integrity='sha256-t5ZQTZsbQi8NxszC10CseKjJ5QeMw5NINtOXQrESGSU='
    //         crossorigin='anonymous'></script>
    //     <script
    //         src='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js'
    //         integrity='sha256-hJ44ymhBmRPJKIaKRf3DSX5uiFEZ9xB/qx8cNbJvIMU='
    //         crossorigin='anonymous'></script>
    //     <script src='assets/js/init-datatables.js'></script>");
?>