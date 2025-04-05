<select name="ciudad" value="{{old('ciudad')}}" id="select_ciudad" class="form-control" required>
    @foreach ($ciudades as $ciudade)
        <option value="{{$ciudade->id}}">{{$ciudade->name}}</option>
    @endforeach
</select>