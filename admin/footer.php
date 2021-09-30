    <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer d-none d-sm-none d-md-block"> © 2019 SiDakgi (Aplikasi Diagnosa Karies Gigi) by Martin </footer>
        <footer class="footer d-block d-sm-block d-md-none"> © 2019 SiDakgi by Martin</footer>


        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->


</div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
        
    <script src="../assets/assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/main/js/jquery.slimscroll.js"></script>
    <script src="../assets/main/js/waves.js"></script>
    <script src="../assets/main/js/sidebarmenu.js"></script>
    <script src="../assets/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/main/js/custom.min.js"></script>

    <script src="../assets/assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="../assets/assets/plugins/wizard/jquery.validate.min.js"></script>

    <!-- <script src="../assets/main/js/validation.js"></script> -->
    <script src="../assets/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="../assets/assets/plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="../assets/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="../assets/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- <script src="../assets/assets/plugins/wizard/steps.js"></script> -->

    <script type="text/javascript">
      $('#myTable').DataTable();
      $('.select2').select2();
    </script>

    <script type="text/javascript">
        function inputAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            // alert(charCode);
            if (charCode > 31 && (charCode < 46 || charCode > 57))

            return false;
            return true;
        }
    </script>

    <script type="text/javascript">
        var form = $(".valid-wizard").show();

        $(".valid-wizard").steps({
            headerTag: "h6"
            , bodyTag: "section"
            , transitionEffect: "fade"
            , titleTemplate: '<span class="step">#index#</span> #title#'
            , labels: {
                finish: "Submit"
            }
            , onStepChanging: function (event, currentIndex, newIndex) {
                return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
            }
            , onFinishing: function (event, currentIndex) {
                return form.validate().settings.ignore = ":disabled", form.valid()
            }
            , onFinished: function (event, currentIndex) {
                 // swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                form.submit();  
            }
        }), $(".valid-wizard").validate({
            ignore: "input[type=hidden]"
            , errorClass: "text-danger"
            , successClass: "text-success"
            , highlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            }
            , unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            }
            , errorPlacement: function (error, element) {
                error.insertAfter(element)
            }
            , rules: {
                email: {
                    email: !0
                }
            }
        })
    </script>

</body>

</html>