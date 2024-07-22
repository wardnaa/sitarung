@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Data Pola Ruang') }}</div>
    <div class="card-body">              
        <table class="table" id="polaruang-table" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Parent</th>
                    <th>File Json</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#polaruang-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("admin/polaruang/show") }}',
            autoWidth: false,
            scrollX: true,
            columns: [
                { data: 'id'},
                { data: 'nama'},
                { data: 'parent'},
                { data: 'jsonfile'},
                { data: 'category'},
                { data: 'id'}
            ],
            columnDefs: [{
                targets: [5],
                mRender: function(data, type, row) {
                    return "<center><div class='btn-group-xs' role='group'><a class='btn btn-sm btn-warning btn-icon hedit' onclick='editData(\"" + data + "\")'>Edit</a></div></center>";
                }
            }]
        });
    });

    function editData(id) {
        window.location.href = '{{ url("admin/polaruang/") }}/' + id + '/edit';
    }
</script>
@endsection