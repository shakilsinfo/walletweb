$(document).ready(function() {

    $('#userTable').DataTable();
    $('#rsmListAssignTable').DataTable();
    $('#asmListAssignTable').DataTable();
    $('#tsmListAssignTable').DataTable();
    $('#regionListTable').DataTable();
    $('#subRegionTable').DataTable();
    $('#areaListtable').DataTable();
    $('#productModeltable').DataTable();
    $('#distributorListDatatable').DataTable({
        pageLength: 25,
        lengthMenu: [[25,50,100,250,500,-1], [25,50,100,250,500,"All"]],
    });

    $('#distributor-datatable').DataTable();
    $('#latest_orderlist').DataTable();

    // Toastr js Options-------------
    toastr.options = {
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing", 
    }

})