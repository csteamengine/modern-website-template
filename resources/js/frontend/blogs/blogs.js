$(document).ready(function() {
    var table = $('#blogsTable').DataTable({
        rowReorder: {
            selector: 'td:first-child'
        },
        columnDefs: [
            {targets: 2, visible: false}
        ]
    });
});
