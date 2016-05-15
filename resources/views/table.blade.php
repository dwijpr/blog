<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>DateTime</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objects as $o)
                <tr>
                    <td>{{ $o->getDateTime() }}</td>
                    <td>{{ $o->getTitle() }}</td>
                    <td>
                        <div class="btn-group">
                            <a
                                href="javascript:"
                                class="btn btn-default note-delete"
                                data-id="{{ $o->param }}"
                            >
                                <i class="fa fa-remove"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div>
    {!! Form::open([
        'url' => 'delete',
        'method' => 'delete',
        'role' => 'form',
        'id' => 'note-delete',
        'style' => 'display: none;'
    ]) !!}
        {!! Form::text('id', false, [
            'id' => 'note-id',
            'name' => 'key',
        ]) !!}
    {!! Form::close() !!}
</div>

<script>
    $(".note-delete").click(function() {
        if (!confirm('Are You sure?')) {
            return;
        }
        var id = $(this).data('id');
        $("#note-id").val(id);
        $("#note-delete").submit();
    });
</script>
