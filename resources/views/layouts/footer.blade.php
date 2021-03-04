 <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>

    {{-- <script src="{{ asset('js/tableExport.min.min.js') }}"></script> --}} --}}

{{-- <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script> --}}
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/extensions/export/bootstrap-table-export.min.js"></script>

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
        $("#selectall,#selecthq").click(function () {
            $('.name').attr('checked', this.checked);
        });

        // if all checkbox are selected, then check the select all checkbox
        // and viceversa
        $(".name").click(function () {
            if ($(".name").length == $(".name:checked").length) {
                $("#selectall").attr("checked", "checked");
            } else {
                $("#selectall").removeAttr("checked");
            }
        });


        $(function() {
                $table = $('#hqpayroll,#hqsalary,#hqpayslips').bootstrapTable({
                    search: true,
                    showColumns: true,
                    exportTypes: ['csv', 'excel']
            });
        });



    });
    </script>
     @livewireScripts
 </body>
</html>





