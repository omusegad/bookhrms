
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>


    <!-- Bootstrap Core JS -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

    {{-- <script src="{{ asset('js/datatables.min.js') }}"></script> --}}


    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            $('#start_date, #end_date').change(function(){
                var start_date = new Date($("#start_date").val());
                var end_date = new Date($("#end_date").val());
                console.log(start_date,end_date);
                var days = 1000*60*60*24; //  days
                var daysdifference = end_date - start_date;
                var number_of_days = Math.floor(daysdifference/days);
                document.getElementById('days').value = number_of_days;
                console.log(number_of_days + ' days');
            });

        $(".alert").fadeTo(3000, 1000).slideUp(1000, function(){
            $(".alert").slideUp(1000);
        });

       // select all checkbox
       $("#selectAll").click(function(){
          $("input[type=userID").prop('checked', $(this).prop('checked'));
        });



        $("#employeesTable, #jobgroup, #leaves, #salaries, #regions, #lcc, #dcc").DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf']
         } );




    });

    </script>

   @livewireScripts
 </body>
</html>


