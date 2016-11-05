@php
$default = [
'name'        => null,
'information' => null,
'website'     => null,
'address'     => null,
'email'       => null,
'type'        => null,
'phone'       => null,
'user_id'     => null,
'linkedin_id' => null,
'organization_type' => null,
'city'        => null,
'state'       => null
];

if(isset($company)){
$default = array_merge($default, $company->toArray());
}

$company = (object)$default;
@endphp
<div class="row">
  <div class="col-md-6">
    <div class="form-group"><label for="">Name</label>
      <input type="text" required="required" class="form-control" value="{{$company->name}}"
             placeholder="Name" name="company[name]" >
    </div>
    <div class="form-group">
      <label for="information">Information</label>
      <textarea name="company[information]" class="form-control" rows="5" placeholder="Information"
                id="information" required="required">{{$company->information}}</textarea>
    </div>
    <div class="form-group"><label for="website">Website</label>
      <input type="text" required="required" class="form-control" placeholder="Website" id="website"
             value="{{$company->website}}" name="company[website]">
    </div>
    <div class="form-group">
      <label for="">Industry</label>
      <select name="company[industry]" id="" class="form-control" required="required">
        @foreach($fields as $field)
          <option value="{{$field->id}}">{{$field->name}}</option>
        @endforeach
      </select>
      <div class="clearfix">
      </div>
    </div>
    <div class="form-group">
      <label for="">State</label>
      <select class="form-control" id="" name="company[state]" required="required">
        @foreach($states as $code => $state)
          <option value="{{$code}}" @if($company->state == $code) @endif >{{$state}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="comment">Address</label>
      <textarea class="form-control" rows="5" placeholder="Address" id="comment"
                required="required"
                name="company[address]">{{$company->address}}</textarea>
    </div>
    <div class="form-group"><label for="">Email</label>
      <input type="email" required="required" class="form-control" placeholder="Email" name="company[email]"
        value="{{$company->email}}" >
    </div>
    <div class="form-group"><label for="">Phone</label>
      <input type="text" required="required" class="form-control" placeholder="Phone" name="company[phone]"
        value="{{$company->phone}}">
    </div>
    <div class="form-group">
      <label for="">Organization Type</label>

      <div class="clearfix">
        <label for="">&nbsp;<input type="radio" @if($company->organization_type=="start_up")checked="checked" @endif name="company[organization_type]" value="start_up">Startup&nbsp;</label>
        <label for="">&nbsp;<input type="radio" @if($company->organization_type=="mnc")checked="checked" @endif name="company[organization_type]" value="mnc">MNC&nbsp;</label>
        <label for="">&nbsp;<input type="radio" @if($company->organization_type=="non_profit")checked="checked" @endif name="company[organization_type]" value="non_profit">Non Profit</label>
        <label for="">&nbsp;<input type="radio" @if($company->organization_type=="ngo")checked="checked" @endif name="company[organization_type]" value="ngo">NGO</label>
        <label for="">&nbsp;<input type="radio" @if($company->organization_type=="other")checked="checked" @endif name="company[organization_type]" value="other">Other</label>
      </div>
    </div>


    <div class="form-group">
      <label for="">City</label>
      <input type="text" name="company[city]" value="{{$company->city}}" class="form-control"/>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="form-group">
      <input type="file" name="company_logo" class="btn btn-warning">
    </div>
    @if(isset($company) && isset($company->logo) && $company->logo)
      <div class="form-group well">
        <div class="img-responsive">
          <img src="{{asset($company->logo)}}" alt="{{$company->name}}" class="img-responsive img-rounded">
        </div>
      </div>
    @endif
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="btn pull-right">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>