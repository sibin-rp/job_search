@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h3>
        {{$internship->title}}
      </h3>
    </div>
   <div class="internship-program">
     <div class="table-responsive">
       <table class="table table-bordered">
         <tbody>
         <tr>
           <td>Job Title</td>
           <td>{{$internship->title}}</td>
         </tr>
         <tr>
           <td>Company</td>
           <td>{{$internship->company->name}}</td>
         </tr>
         <tr>
           <td>Field</td>
           <td>{{$internship->internship_field->name}}</td>
         </tr>
         <tr>
           <td>Description</td>
           <td>{!! $internship->description !!}</td>
         </tr>
         <tr>
           <td>Stipend</td>
           <td>
             <table class="table table-bordered">
               <thead>
               <tr>
                 <th>Minimum</th>
                 <th>Maximum</th>
               </tr>
               </thead>
              <tbody>
              <tr>
                <td>Rs {{$internship->stipend_from or '0'}}</td>
                <td>Rs {{$internship->stipend_to or '0'}}</td>
              </tr>
              </tbody>
             </table>
           </td>
         </tr>
         <tr>
           <td>Duration</td>
           <td>{{$internship->duration}}</td>
         </tr>
         <tr>
           <td>City</td>
           <td>{{$internship->city}}</td>
         </tr>
         <tr>
           <td>State</td>
           <td>{{$internship->state}}</td>
         </tr>
         <tr>
           <td>Qualification</td>
           <td>
             {{$internship->qualification}}
           </td>
         </tr>
         <tr>
           <td>Eligibilty</td>
           <td>
             <table class="table table-bordered">
               <thead>
               <tr>
                 <th>Minimum Age</th>
                 <th>Maximum Age</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                 <td>{{$internship->eligible_min}}</td>
                 <td>{{$internship->eligible_max}}</td>
               </tr>
               </tbody>
             </table>
           </td>
         </tr>
         </tbody>
       </table>
     </div>
   </div>

  </div>
@stop