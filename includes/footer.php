
<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>
<script src="assets/js/matchHeight.min.js"></script>
<script src="js/ckeditor/ckeditor.js"></script>

<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
        });
    });
    $(function () {
        $("#datepicker1").datepicker({
            dateFormat: 'yy-mm-dd',
        });
    });
    $(function () {
        $("#datepicker2").datepicker({
            dateFormat: 'yy-mm-dd',
        });
    });

    $(function () {
        $("#datepicker3").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
        });
    });
    $(function () {
        $("#datepicker4").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
        });
    });

    $(document).ready(function () {
        $(".content .info-section").matchHeight({
            byRow: false,
            property: 'min-height'
        });
    });

</script>

</body>
</html>
