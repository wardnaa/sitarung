@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Edit Data Pengguna') }}</div>
    <div class="card-body">
        <!-- Button Add right position -->
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ url('admin/pengguna/create') }}" class="btn btn-primary btn-icon icon-left">Add Data</a>
            </div>
        </div>          
        <table class="table" id="pengguna-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#pengguna-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("admin/pengguna/show") }}',
            columns: [
                { data: 'id'},
                { data: 'name'},
                { data: 'email'},
                { data: 'created_at'},
                { data: 'updated_at'},
                { data: 'id'}
            ],
            columnDefs: [{
                targets: [5],
                mRender: function(data, type, row) {
                    return "<center><div class='btn-group-xs' role='group'><a class='btn btn-sm btn-warning btn-icon hedit' onclick='editData(\"" + data + "\")'>Edit</a> <a class='btn btn-sm btn-danger btn-icon hedit' onclick='delData(\"" + data + "\")'>Delete</a></div></center>";
                }
            }]
        });
    });

    function editData(id) {
        window.location.href = '{{ url("admin/pengguna/") }}/' + id + '/edit';
    }

    function delData(id) {
        if (confirm("Anda yakin ingin menghapus data ini?")) {
            $.ajax({
                url: '{{ url("admin/pengguna/") }}/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    $('#pengguna-table').DataTable().ajax.reload();
                }
            });
        }
    }
</script>
@endsection