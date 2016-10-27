@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h3>
        {{$internship->title}}

        <small class="pull-right">
          <a href="{{route('internships_program.edit',['internship_program'=> $internship,
          'company_user'=> $user])}}" class="btn btn-xs btn-primary">Edit</a>
        </small>
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
           <td>{{$internship->duration_type}}</td>
         </tr>
         <tr>
           <td>Work Type</td>
           <td>{{$internship->work_type_option}}</td>
         </tr>
         <tr>
           <td>Validity</td>
           <td>{{$internship->validity}}</td>
         </tr>
         <tr>
           <td>City</td>
           <td>{{$internship->city}}</td>
         </tr>
         <tr>
           <td>State</td>
           <td>{{$internship->state_name}}</td>
         </tr>
         <tr>
           <td>Qualification</td>
           <td>
             <table class="table table-bordered">
               <tbody>
               <tr>
                 <td>Qualification</td>
                 <td>
                   @if(isset($internship->qualification))
                    {{$internship->qualification->qualification_name}}
                   @else
                    Any
                   @endif
                 </td>
               </tr>
               @if(isset($internship->qualification))
               <tr>
                 <td>Mark</td>
                 <td>
                    {{$internship->qualification->mark}} ({{$internship->qualification->mark_type_name}})
                 </td>
               </tr>
               @if($internship->qualification->degree)
               <tr>
                 <td>Degree</td>
                 <td>{{$internship->qualification->degree}}</td>
               </tr>
                @endif
               @if($internship->qualification->stream)
               <tr>
                 <td>Stream</td>
                 <td>{{$internship->qualification->stream}}</td>
               </tr>
               @endif
               @endif
               </tbody>
             </table>
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
         <tr>
           <td>
             Skills
           </td>
           <td>
             <table class="table table-bordered">
               <thead>
               <tr>
                 <td>Skill</td>
                 <td>Level</td>
               </tr>
               </thead>
               <tbody>
               @foreach($internship->skills()->get() as $skill)
                <tr>
                  <td>{{$skill->name}}</td>
                  <td>{{$skill->pivot->expertise_level}}</td>
                </tr>
               @endforeach
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