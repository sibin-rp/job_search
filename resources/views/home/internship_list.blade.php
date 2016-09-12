@extends('layouts.home')
@section('content')
  <div class="intern_wrapper">
  <div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-4 col-lg-3">
    <div class="row">
    <h3>Internship field</h3>
    <select  class="select-2-internlist form-control">
      <option value="AL">Ruby</option>
      <option value="WY">Jquery</option>
      <option value="WY">Javascript</option>
      <option value="WY">Rails</option>
      <option value="WY">Middleman</option>
      <option value="WY">Html</option>
      <option value="AL">Ruby</option>
      <option value="WY">Jquery</option>
      <option value="WY">Javascript</option>
      <option value="WY">Rails</option>
      <option value="WY">Middleman</option>
      <option value="WY">Html</option>
      <option value="AL">Ruby</option>
      <option value="WY">Jquery</option>
      <option value="WY">Javascript</option>
      <option value="WY">Rails</option>
      <option value="WY">Middleman</option>
      <option value="WY">Html</option>
    </select>
    </div>

    <div class="row">

      <h3>Internship type</h3>
      <input type="checkbox" name="type" value="full" checked>Any<br>
      <input type="checkbox" name="type" value="full" >Full time office<br>
      <input type="checkbox" name="type" value="part" > Part time office<br>
      <input type="checkbox" name="type" value="full">Full time home<br>
      <input type="checkbox" name="type" value="part"> Part time home<br>


  </div>
    <div class="row">

      <h3>Internship Duration</h3>
      <input type="checkbox" name="type" value="full" checked>one month<br>
      <input type="checkbox" name="type" value="part" > two month<br>
      <input type="checkbox" name="type" value="full">three month<br>
      <input type="checkbox" name="type" value="part"> four month<br>
      <input type="checkbox" name="type" value="part"> five month<br>
      <input type="checkbox" name="type" value="part"> six month<br>
    </div>
    <div class="row">

      <h3>Internship Salary</h3>

      <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/>

    </div>
    <div class="row">

      <h3>State</h3>
      <select class="js-placeholder-multiple form-control">
        <option value="AL">Kerala</option>
        <option value="WY">andra</option>
        <option value="WY">tn</option>
        <option value="WY">up</option>
        <option value="WY">karnataka</option>
        <option value="WY">mp</option>
        <option value="AL">Kerala</option>
        <option value="WY">andra</option>
        <option value="WY">tn</option>
        <option value="WY">up</option>
        <option value="WY">karnataka</option>
        <option value="WY">mp</option>
        </select>
    </div>
  </div>
  <div class="col-xs-8">
    <h1>RedPanthers Internship</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
  </div>



  </div>
  </div>
  </div>
@stop