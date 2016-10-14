@extends('layouts.user')
@section('content')
    <div class="col-xs-12 col-sm-8">
        <div class="page-header">
            <h3>Company Information</h3>
        </div>
    <div class="company-info">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group"><label for="">id</label>
                    <input type="text" required="required" class="form-control" placeholder="id" name="text">
                </div>
                <div class="form-group">
                    <label for="comment">Information</label>
                    <textarea class="form-control" rows="5" placeholder="Information" id="comment"></textarea>
                </div>
                <div class="form-group"><label for="">Website</label>
                    <input type="text" required="required" class="form-control" placeholder="Site" name="text">
                </div>
                <div class="form-group">
                    <label for="">Industry</label>

                    <div class="clearfix">
                        <label for="">&nbsp; <input type="radio" value="">Startup&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">MNC&nbsp;</label>

                    </div>
                </div>
                <div class="form-group"><label for="">linkedin_id</label>
                    <input type="text" required="required" class="form-control" placeholder="id" name="text">
                </div>
                <div class="form-group">
                    <label for="">State</label>
                    <select class="form-control" id="sel1">
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group"><label for="">Name</label>
                    <input type="text" required="required" class="form-control" placeholder="Name" name="text">
                </div>
                <div class="form-group">
                    <label for="comment">Address</label>
                    <textarea class="form-control" rows="5" placeholder="Address" id="comment"></textarea>
                </div>
                <div class="form-group"><label for="">Email</label>
                    <input type="email" required="required" class="form-control" placeholder="Email" name="text">
                </div>
                <div class="form-group"><label for="">Phone</label>
                    <input type="text" required="required" class="form-control" placeholder="Phone" name="text">
                </div>
                <div class="form-group">
                    <label for="">Organization Type</label>
                    <div class="clearfix">
                        <label for="">&nbsp; <input type="checkbox" value="">MNC&nbsp;</label>
                        <label for="">&nbsp; <input type="checkbox" value="">Startup&nbsp;</label>
                    </div>
                </div>



            <div class="form-group">
                <label for="">City</label>
                <select class="form-control" id="sel1">
                    <option></option>
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>

        </div>
            <div class="btn pull-right">
                <button type="button " class="btn btn-primary">Submit</button>
            </div>
    </div>
    </div>

@stop