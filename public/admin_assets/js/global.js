$(document).ready(function () {
	$.extend( true, $.fn.dataTable.defaults, {
        "language": {
            "responsive":     true,
            "searchPlaceholder": 'Tìm kiếm ...',
            "emptyTable":     'Không có bản ghi nào',
            "search":         "",
            "info":           'Hiển thị từ bản ghi số _START_ đến _END_ trong _TOTAL_ bản ghi',
            "infoEmpty":      'Hiển thị 0 đến 0 trong 0 bản ghi',
            "zeroRecords":    'Không tìm thấy bản ghi nào',
            "loadingRecords": 'Đang tải ...',
            "lengthMenu": '<label><select class="form-control input-inline">'+
                '<option value="30" selected>30</option>'+
                '<option value="50">50</option>'+
                '<option value="100">100</option>'+
                '<option value="200">200</option>'+
                '<option value="500">500</option>'+
                '</select></label> ' + 'Bản ghi',
            "paginate": {
                "first":      'Trang đầu',
                "last":       'Trang cuối',
                "next":       'Trang tiếp',
                "previous":   'Trang trước',
            },
            "processing": 'Đang tải ...'
        },
        "pageLength": "30",
        "info": true,
        'paging': true,
        "ordering" : false
    });
})