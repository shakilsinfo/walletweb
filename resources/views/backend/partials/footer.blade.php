                </div>
                </div>
                </div>
                </div>

                <!-- <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script> -->
                <script type="text/javascript" src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
                
                <script type="text/javascript" src="{{asset('backend/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
                <!-- jquery slimscroll js -->
                <script type="text/javascript" src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
                <!-- modernizr js -->
                <script type="text/javascript" src="{{asset('backend/bower_components/modernizr/modernizr.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/assets/pages/advance-elements/select2-custom.js')}}"></script>

                <!-- Switch component js -->

                <script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('backend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
                <script src=" {{asset('backend/assets/pages/data-table/js/jszip.min.js')}}"></script>
                <script src="{{asset('backend/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
                <script src="{{asset('backend/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
                <script src="{{asset('backend/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
                <script src="{{asset('backend/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
                <script src="{{asset('backend/assets/pages/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
                <script src=" {{asset('backend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
                <script src="{{asset('backend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

                <script type="text/javascript" src="{{asset('backend/assets/pages/data-table/extensions/row-reorder/js/dataTables.rowReorder.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/assets/pages/data-table/extensions/row-reorder/js/row-reorder-custom.js')}}"></script>
                <!-- <script type="text/javascript" src="{{ asset('backend/assets/pages/advance-elements/swithces.js') }}"></script> -->
                <script src="{{asset('backend/js/custom.js')}}"></script>

                <!--     <script type="text/javascript" src="{{ asset('backend/bower_components/spectrum/spectrum.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/bower_components/jscolor/jscolor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/bower_components/jquery-minicolors/jquery.minicolors.min.js') }}"></script> -->


                <!-- Chart js -->
                <script type="text/javascript" src="{{asset('backend/bower_components/chart.js/dist/Chart.js')}}"></script>
                <!-- amchart js -->

                <script type="text/javascript" src="{{ asset('backend/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
                <!-- Max-length js -->
                <script type="text/javascript" src="{{ asset('backend/bower_components/bootstrap-maxlength/src/bootstrap-maxlength.js') }}"></script>
                <!-- i18next.min.js -->
                <script type="text/javascript" src="{{ asset('backend/bower_components/i18next/i18next.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('backend/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('backend/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('backend/bower_components/jquery-i18next/jquery-i18next.min.js')  }}"></script>



                <script src="{{asset('backend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
                <script src="{{asset('backend/js/pcoded.min.js')}}"></script>
                <!-- custom js -->
                <script src="{{asset('backend/js/vartical-layout.min.js')}}"></script>

                <script type="text/javascript" src="{{asset('backend/js/script.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/assets/js/sweetalert.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/assets/pages/ckeditor/ckeditor.js')}}"></script>
                <script type="text/javascript" src="{{asset('backend/assets/pages/ckeditor/ckeditor-custom.js')}}"></script>
               
                <script type="text/javascript" src="{{asset('backend/assets/js/chartjs-custom.js')}}"></script>
                <script type="text/javascript" src="{{asset('js/ebs-common.js')}}"></script>
                <script type="text/javascript" src="{{asset('js/spartan-multi-image-picker-min.js')}}"></script>
                <script type="text/javascript" src="{{asset('js/custom-script.js')}}"></script>
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


                @toastr_js
                @toastr_render
                @yield('scripts')
                </body>

                </html>