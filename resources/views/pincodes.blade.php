<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('js/tws-pagination.js') }}"></script>
</head>
<body>

<div class="container">
    <h2>PinCodes</h2>
    <table id='pinTable' class='display dataTable table table-striped'>
        <thead>
        <tr>
            <th>id</th>
            <th>Office Name</th>
            <th>Pin code</th>
            <th>Office type</th>
            <th>Delivery status</th>
            <th>Division</th>
            <th>Region</th>
            <th>Circle</th>
            <th>Taluk</th>
            <th>District</th>
            <th>State</th>
        </tr>
        </thead>
        <tbody id="pincodes">

        </tbody>
    </table>
    <ul class="pagination" id="pagination" >

    </ul>

</div>
<script>

    var isInitial = false;
    $(document).ready(function () {

        getAndSetPinCodes(1);
        $('.pageLink').on('click', function () {
            pageNo = $(this).attr("data-page");
            getAndSetPinCodes(pageNo);
        });
    });

    function getAndSetPinCodes(pageNo) {

        $.ajax({
            url: "<?=  url('/api/pincodes/') ?>?page=" + pageNo,
            success: function (result) {
                pinCodes = []
                if (result.status == 1) {
                    pinCodes = result.data;
                }
                setPinCodeData(pinCodes);
                if(pageNo == 1){
                    isInitial = true;
                    createPaginationLink(result.total_pages , 15)
                }
            },

        });
    }

    function setPinCodeData(pincodes) {
        console.log(pincodes)
        row = "";
        $.each(pincodes, function (index, value) {
            row += '<tr>' +
                '<td>' + value.id + '</td>' +
                '<td>' + value.office_name + '</td>' +
                '<td>' + value.pin_code + '</td>' +
                '<td>' + value.office_type + '</td>' +
                '<td>' + value.delivery_status + '</td>' +
                '<td>' + value.division + '</td>' +
                '<td>' + value.region + '</td>' +
                '<td>' + value.circle + '</td>' +
                '<td>' + value.taluk + '</td>' +
                '<td>' + value.district + '</td>' +
                '<td>' + value.state + '</td>' +
                '</tr>';
        });

        if (row == "") {
            row = "<tr><td colspan='11'></td></tr>"
        }


        $('#pinTable tbody').html(row);

    }

    function createPaginationLink(totalPages , perpage){

        $('#pagination').twbsPagination({
            totalPages: totalPages,
            visiblePages: perpage,
            onPageClick: function (event, page) {
                if (!isInitial){
                    getAndSetPinCodes(page);
                }
                isInitial = false;
            }
        });
    }

</script>
</body>
</html>
