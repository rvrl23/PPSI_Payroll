@foreach($select as $sel)

<div class="addEmpspace" id="ShowAccount">
    

  <div class="addEmpspace">
    <label><h4> Email</h4></label>
    <input type="email" class="form-control" name="email" id="email" value="{{$sel->username)}}" required>
  </div>

  <div class="addEmpspace">
    <label><h4> Password</h4></label>
    <input type="password" class="form-control" name="password" value="{{$sel->password)}}" required>
  </div>

</div>

@endforeach