        <footer class="main-footer">
<!--            <div class="footer-left">-->
<!--                Copyright &copy; 2018-->
<!--                <div class="bullet"></div>-->
<!--                Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>-->
<!--            </div>-->
<!--            <div class="footer-right">-->
<!--                2.3.0-->
<!--            </div>-->
        </footer>

    </div>
</div>

        <!-- Template JS File -->
        <script src="<?php echo base_url('resources/back_end/assets/js/scripts.js'); ?>"></script>
        <script src="<?php echo base_url('resources/back_end/assets/js/custom.js'); ?>"></script>

        <!-- Page Specific JS File -->
        <script src="<?php echo base_url('resources/back_end/assets/js/page/index-0.js'); ?>"></script>

        <!-- Custom JS -->
        <script>
            $(document).ready(function() {
                $('#ssmDataTable').dataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'copy',
                            text: '<i class="far fa-copy"></i> Copy',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'csv',
                            text: '<i class="fas fa-file-csv"></i> CSV',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'excel',
                            text: '<i class="far fa-file-excel"></i> Excel',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="far fa-file-pdf"></i> PDF',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'print',
                            text: '<i class="fas fa-print"></i> Print',
                            className: 'btn btn-primary'
                        }
                    ]
                });
            });
		</script>

</body>
</html>
