@isset($models)
@foreach($models as $model)
<option>{{ $model->model }}</option>
@endforeach
@endisset