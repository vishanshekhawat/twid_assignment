<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>
<body>

<div class="container">
    <h2>PinCodes</h2>
    <table id='empTable' class='display dataTable table table-striped'>
        <thead>
        <tr>
            <th>id</th>
            <th>office_name</th>
            <th>pin_code</th>
            <th>office_type</th>
            <th>delivery_status</th>
            <th>division</th>
            <th>region</th>
            <th>circle</th>
            <th>taluk</th>
            <th>district</th>
            <th>state</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        $('#empTable').DataTable({
            'processing': true,
            'ordering': false,
            'searching':false,
            'select': true,
            'serverSide': true,
            'serverMethod': 'get',
            'ajax': {

                'url':'<?=  url('/api/pincodes') ?>'
            },
            'columns': [
                { data: 'id' },
                { data: 'office_name' },
                { data: 'pin_code' },
                { data: 'office_type' },
                { data: 'delivery_status' },
                { data: 'division' },
                { data: 'region' },
                { data: 'circle' },
                { data: 'taluk' },
                { data: 'district' },
                { data: 'state' }

            ]
        });
    });
</script>
</body>
</html>
