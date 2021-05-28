<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


{{-- <script src="{{ asset('js/jquery-3.5.1.js') }}"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
{{-- <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/dataTables.select.min.js') }}"></script> --}}

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>


<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/extensions/export/bootstrap-table-export.min.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
            $('#start_date, #end_date').change(function(){
                var startLeaveSDate =  new Date($("#start_date").val()) ;
                var endLeaveSDate =  new Date($("#end_date").val()) ;
                if(startLeaveSDate.getDay() == 6){
                    var start_date = new Date(startLeaveSDate.setDate(startLeaveSDate.getDate()+2));
                    document.getElementById('start_date').value = moment(start_date, 'DD-MM-YYYY').format('YYYY-MM-DD');
                }else if(startLeaveSDate.getDay() == 0){
                     start_date = new Date (startLeaveSDate.setDate(startLeaveSDate.getDate()+1));
                     document.getElementById('start_date').value = moment(start_date, 'DD-MM-YYYY').format('YYYY-MM-DD');

                }else{
                     start_date =  new Date($("#start_date").val()) ;
                     document.getElementById('start_date').value = moment(start_date, 'DD-MM-YYYY').format('YYYY-MM-DD');
                }

                if(endLeaveSDate.getDay() == 6){
                    var end_date = new Date(endLeaveSDate.setDate(endLeaveSDate.getDate()+2));
                    document.getElementById('end_date').value = moment(end_date, 'DD-MM-YYYY').format('YYYY-MM-DD');
                    //console.log(end_date);
                }else if(endLeaveSDate.getDay() == 0){
                    end_date = new Date(endLeaveSDate.setDate(endLeaveSDate.getDate()+1));
                    document.getElementById('end_date').value = moment(end_date, 'DD-MM-YYYY').format('YYYY-MM-DD');

                    //console.log(end_date);
                }else{
                    end_date =  new Date($("#end_date").val()) ;
                    document.getElementById('end_date').value = moment(end_date, 'DD-MM-YYYY').format('YYYY-MM-DD');

                }

                let get_days = 1000*60*60*24; //  days
                let daysdifference = end_date - start_date;
                if(daysdifference > 0){
                    let number_of_days = Math.floor(daysdifference/get_days);
                    document.getElementById('days').value = number_of_days;
                   // console.log(moment(end_date).format('YYYY-MM-DD'));
                    console.log(number_of_days + ' days');
               }else{
                document.getElementById('days').value = 0;
               }

            });

            // alert box
            $(".alert").fadeTo(5000, 1000).slideUp(2000, function(){
                $(".alert").slideUp(5000);
            });

            $(".remove").click(function(){
                $(this).parent(".pip").remove();
                $('#files').val("");
            });

          //  check box on tables
            var $tblChkBox = $(".allusers");
                $("#selectall").on("click", function () {
                $($tblChkBox).prop('checked', $(this).prop('checked'));
            });

            // add multiple select / deselect functionality
            $("#selectall,#selecthq").click(function () {
                $('.name').attr('checked', this.checked);
            });


            $(function() {
                    $table = $('#hqsalary,#users,#hqusers,#fieldusers').bootstrapTable({
                        search: true,
                        showColumns: true,
                        exportTypes: [' ','csv']
                    });
           });

           // Table search
           $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
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
            var table = $('#hqpayroll,#hqpayslips,#employees,#hqstaff,#fieldstaff,#leaves').DataTable( {
                    dom: 'Bfrtip',
                    lengthChange: false,
                    buttons: ['excel','print'],
                    select: {
                                style : "multi"
                            }

                } );

                table.buttons().container()
                .appendTo( '#hqpayroll_wrapper .col-md-6:eq(0)' );
           //===== END OF DATATABLES ====//


    });

    </script>
        @stack('custom-javascripts')
 </body>
</html>





