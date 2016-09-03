@extends('layouts.home')
@section('content')
  <div class="register-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="register">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Personal
                      <span class="pull-right glyphicon glyphicon-user"></span>
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <form action="" method="post">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">First Name</label><input type="text"
                                                                                                       class="form-control" name="first_name" placeholder="First Name">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">Last Name</label><input type="text"
                                                                                                      class="form-control" name="last_name" placeholder="Last Name">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">Date Of Birth</label><input type="text" id="dob"
                                                                                                       class="form-control date-picker" name="dob" placeholder="Data of Birth">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">Gender</label>
                          <div class="clearfix">
                            <div class="form-inline">
                              <label for="gender-male"><input id="gender-male" type="radio" value="1" checked="checked">&nbsp;Male</label>&nbsp;&nbsp;
                              <label for="gender-female"><input id="gender-female" type="radio" value="2">&nbsp;Female</label>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="page-header">
                        <h4>Address</h4>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="address-city" class="control-label"></label><input type="text" id="address-city"
                                                                                                         class="form-control" placeholder="City">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="address-state" class="control-label"></label>
                            <select name="" id="address-state" class="form-control">
                              <option value="">State 1</option>
                              <option value="">State 2</option> 
                            </select>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12">
                          <label for=""><input type="checkbox" id="show-living-address">&nbsp; If you are away from Hometown</label>
                        </div>
                        <div class="col-xs-12">
                          <div id="live-address-fields" class="hidden">
                            <div class="row">
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group"><label for="" class="control-label"></label>
                                  <input type="text" id="living-city" class="form-control" placeholder="Living City">
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group"><label for="" class="control-label"></label>
                                  <select name="" id="living-state" class="form-control">
                                    <option value="">State 1</option>
                                    <option value="">State 2</option>
                                    <option value="">State 3</option>
                                    <option value="">State 4</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label"></label><input type="text" id="phone_no"
                                                                                                       class="form-control" placeholder="Phone number">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label"></label><input type="text" id="alternate_contact"
                                                                                                       class="form-control" placeholder="Alternate Contact">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label"></label><input type="text" id="alternate_email" placeholder="Alternate Email"
                                                                                                      class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="form-group text-right">
                        <button class="btn" type="submit">
                          <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;
                          Continue
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Collapsible Group Item #2
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Collapsible Group Item #3
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop