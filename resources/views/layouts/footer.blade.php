<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>


<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="{{ asset('js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/dataTables.select.min.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function(){

            // alert box
            $(".alert").fadeTo(5000, 1000).slideUp(2000, function(){
                $(".alert").slideUp(5000);
            });

            $(".remove").click(function(){
                $(this).parent(".pip").remove();
                $('#files').val("");
            });

            /// upload previe file
            $("#UploadedFile").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#imgPreview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            //===== BEGGINNING OF DATATABLES ====//
            let tableIds = "#holidays,#hsalaries,#employees,#fieldleaves,#hqleaves,#fieldsalaries,#hqpayroll,#hqpayslips,#employees,#hqstaff,#fieldstaff,#leaves"

            var table = $(tableIds).DataTable( {
                    dom: 'Bfrtip',
                    lengthChange: false,
                    buttons: ['excel','pdf'],
                    'columnDefs': [
                        {
                            'targets': 0,
                            'checkboxes': {
                               'selectRow': true
                            }

                        }
                    ],
                    select: {
                            style: 'multi',
                                style: 'os', // 'single', 'multi', 'os', 'multi+shift'
                                selector: 'td:first-child',
                            },
                            'order': [[1, 'asc']]
                    });

                 table.buttons().container()
                .appendTo( '#hqpayroll_wrapper .col-md-6:eq(0)' );
           //===== END OF DATATABLES ====//


});

    </script>
    @stack('custom-javascripts')
 </body>
</html>





