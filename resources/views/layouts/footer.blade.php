
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
            var start_date = $("#stat_date").val();
            var end_date = $("#end_date").val();
            // console.log(start_date);
            // console.log(end_date);

            var days = daysdifference(start_date, end_date);

            console.log(days);

            function daysdifference(firstDate, secondDate){
                var startDay = new Date(firstDate);
                var endDay = new Date(secondDate);

                var millisBetween = startDay.getTime() - endDay.getTime();
                var days = millisBetween / (1000 * 3600 * 24);

                return Math.round(Math.abs(days));
            }

        });

    </script>



 </body>
</html>


