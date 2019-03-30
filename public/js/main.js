
$(document).ready(function() {
    $('#club-table').DataTable({
        "columnDefs": [
        { "orderable": false, "targets": 4 },
        { "orderable": false, "targets": 2 }
        ],
        "language": {
            "lengthMenu": "Hiển thị _MENU_ đội bóng/trang",
            "zeroRecords": "Không có đội bóng nào",
            "info": "Trang _PAGE_ trên _PAGES_",
            "infoEmpty": "Không có đội nào phù hợp",
            "infoFiltered": "(lọc ra từ tất cả _MAX_ đội)",
            "search": "Tìm kiếm:",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Tiếp",
                "previous": "Trước"
            },
        }
    });
    $('#match-table').DataTable({
        "columnDefs": [
        { "orderable": false, "targets": 11 }
        ],
        "language": {
            "lengthMenu": "Hiển thị _MENU_ trận đấu/trang",
            "zeroRecords": "Không có trận đấu nào",
            "info": "Trang _PAGE_ trên _PAGES_",
            "infoEmpty": "Không có trận đấu nào phù hợp",
            "infoFiltered": "(lọc ra từ tất cả _MAX_ đội)",
            "search": "Tìm kiếm:",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Tiếp",
                "previous": "Trước"
            },
        }
    });
    $('#bet-table').DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ vé cược/trang",
            "zeroRecords": "Không có vé cược nào",
            "info": "Trang _PAGE_ trên _PAGES_",
            "infoEmpty": "Không có vé cược nào phù hợp",
            "infoFiltered": "(lọc ra từ tất cả _MAX_ vé)",
            "search": "Tìm kiếm:",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Tiếp",
                "previous": "Trước"
            },
        }
    });
    $('#user-table').DataTable({
        "columnDefs": [
        { "orderable": false, "targets": 4 }
        ],
        "language": {
            "lengthMenu": "Hiển thị _MENU_ khách hàng/trang",
            "zeroRecords": "Không có khách hàng nào",
            "info": "Trang _PAGE_ trên _PAGES_",
            "infoEmpty": "Không có khách hàng nào phù hợp",
            "infoFiltered": "(lọc ra từ tất cả _MAX_ vé)",
            "search": "Tìm kiếm:",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Tiếp",
                "previous": "Trước"
            },
        }
    });
    $('#bets-in-one-match-table').DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ vé cược/trang",
            "zeroRecords": "Không có vé cược nào",
            "info": "Trang _PAGE_ trên _PAGES_",
            "infoEmpty": "Không có vé cược nào phù hợp",
            "infoFiltered": "(lọc ra từ tất cả _MAX_ vé)",
            "search": "Tìm kiếm:",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Tiếp",
                "previous": "Trước"
            },
        }
    });
    $('#bets-user').DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ vé cược/trang",
            "zeroRecords": "Không có vé cược nào",
            "info": "Trang _PAGE_ trên _PAGES_",
            "infoEmpty": "Không có vé cược nào phù hợp",
            "infoFiltered": "(lọc ra từ tất cả _MAX_ vé)",
            "search": "Tìm kiếm:",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Tiếp",
                "previous": "Trước"
            },
        }
    });
    $('#home-table').DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ trận đấu/trang",
            "zeroRecords": "Không có trận đấu nào",
            "info": "Trang _PAGE_ trên _PAGES_",
            "infoEmpty": "Không có trận đấu nào phù hợp",
            "infoFiltered": "(lọc ra từ tất cả _MAX_ đội)",
            "search": "Tìm kiếm:",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Tiếp",
                "previous": "Trước"
            },
        }
    });
});

function startTime() {
    var datetimevar = document.getElementById('datetime-label');
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    datetimevar.innerHTML = h + ':' + m + ':' + s +
    '  ' + today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
startTime();



$(".form-deleted").on("submit", function(){
        return confirm("Bạn có muốn xoá không?");
});