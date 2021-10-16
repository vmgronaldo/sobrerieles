@extends('layouts.app')

@section('title', trans('import.title', ['type' => trans_choice($namespace . 'general.' . $type, 2)]))

@section('content')
    <div class="card">
        <form method="POST" action="{{url($path . '/import')}}" enctype="multipart/form-data" role="form"
              class="form-loading-button">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-important">
                            {!! trans('import.message', ['link' => url('public/files/import/' . $type . '.xlsx')]) !!}
                        </div>
                    </div>
                </div>

                <div class="dropzone dropzone-single" data-toggle="dropzone" data-dropzone-url="#">
                    <div class="fallback">
                        <div class="custom-file">
                            <input type="file" name="import" class="" id="projectCoverUploads">
                            <label class=""
                                   for="projectCoverUploads">{{ trans('general.form.no_file_selected') }}</label>
                        </div>
                    </div>
                    {!! $errors->first('import', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="card-footer">
                <div class="row save-buttons">
                    <div class="col-xs-12 col-sm-12">
                        <a href="{{ url($path) }}" class="btn btn-outline-secondary header-button-top"><span
                                class="fa fa-times"></span> &nbsp;{{ trans('general.cancel') }}</a>
                        <button type="submit" class="btn btn-success header-button-top">{{ trans('import.import')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
