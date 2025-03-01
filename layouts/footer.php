<!--**********************************
Footer start
***********************************-->
<div class="footer">
  <div class="copyright">
    <p>&copy; 2022 Implementado para <a href="https://sciesc.com">Sciesc</a>,
      Desarrollado por <a href="https://316studio.com.mx">316Studio.</a></p>
  </div>
</div>
<!--**********************************
Footer end
***********************************-->
</div>
<!--**********************************
Main wrapper end
***********************************-->

<!--**********************************
Scripts
***********************************-->
<script src="assets/plugins/common/common.min.js"></script>
<script src="assets/js/custom.min.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/gleek.js"></script>
<script src="assets/js/styleSwitcher.js"></script>
<script src="assets/plugins/dropzone/js/dropzone.min.js"></script>
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>
<script src="assets/plugins/chartjs-plugin-streaming/chartjs-plugin-streaming.min.js"></script>
<script src="assets/js/dashboard/dashboard-10.js"></script>
<script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins-init/datatables.init.js"></script>
</body>
<script>
  function fA(i) {
    var p = "&i=" + i.toString();
    $.ajax({
      type: "POST",
      url: "./eliminar_alerta.php",
      data: p,
      success: function(datos) {
        if (datos.startsWith("Error"))
          alert(datos);
        else if ($(".dropdown-notfication ul li").length == 1)
          $(".mdi-bell").next().removeClass("pulse-css");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert("Error al eliminar la notificación.");
      }
    });
  }
</script>

<?php if (isset($db)) {
  $db->db_disconnect();
} ?>