    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

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

        // add multiple select / deselect functionality
        $("#selectall").click(function () {
            $('.name').attr('checked', this.checked);
        });

        // if all checkbox are selected, then check the select all checkbox
        $(".name").click(function () {

            if ($(".name").length == $(".name:checked").length) {
                $("#selectall").attr("checked", "checked");
            } else {
                $("#selectall").removeAttr("checked");
            }

        });


        $("#payrollA, #payrollB, #payrollC, #payrollD").DataTable( {
                dom: 'Bfrtip',
                buttons: [
                'excel', 'pdf', 'print']
         } );
    });

    </script>



   @livewireScripts

 </body>

</html>





