@props(['name' => '', 'options' => [], 'default' => '', 'cls' => ''])

<select name="" id="" class="form-control form-select {{$cls}}">
    <option value="{{$default}}">$default</option>
    @foreach ($options as $option)
    <option value="{{$option}}">$option</option>
    @endforeach
</select>
