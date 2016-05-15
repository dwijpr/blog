<div class="well">
    <h3 class="text-center">
        {{ @$object?'Edit':'New' }}
        Note
    </h3>
    <hr>
    {!! Form::open([
        'url' => @$object?'update':'store',
        'method' => @$object?'patch':'post',
        'class' => 'form-horizontal',
        'role' => 'form',
    ]) !!}
        @if(@$object)
            {!! Form::hidden('key', $object->param) !!}
        @endif
        <div class="form-group{{ $errors->has('datetime') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">DateTime</label>
            <div class="col-md-6">
                {!! Form::text(
                    'datetime'
                    , @$object?$object->getDateTime():date('Y-m-d H:i:s'), [
                    'class' => 'form-control datetimepicker',
                    'readonly' => true,
                ]) !!}
                @if ($errors->has('datetime'))
                    <span class="help-block">
                        <strong>{{ $errors->first('datetime') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Title</label>
            <div class="col-md-6">
                {!! Form::text('title', @$object?$object->getTitle():false, [
                    'class' => 'form-control',
                    'autofocus' => true,
                ]) !!}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    {{ @$object?'Update':'Generate' }}
                </button>
            </div>
        </div>

    {!! Form::close() !!}
</div>
