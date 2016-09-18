@extends('layouts.home')
@section('content')
  <div class="about-us-wrapper faq-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="about-us faq">
            <div class="page-header">
              <h2># FAQs</h2>
            </div>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#question-one" aria-expanded="true" aria-controls="collapseOne">
                      <span class="glyphicon glyphicon-question-sign"></span>
                      Do you directly get the internship for me after I fill the form?
                    </a>
                  </h4>
                </div>
                <div id="question-one" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    No, as per their choice, the recruiter can decide to conduct a personal interview (over the phone or in person) or make you give a test or do a sample project. It is completely at the employer’s discretion. Although all these details would be available to you before you say yes or no to the internship.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#question-two" aria-expanded="false" aria-controls="collapseTwo">
                      <span class="glyphicon glyphicon-question-sign"></span>
                      What are the advantages of using your platform?
                    </a>
                  </h4>
                </div>
                <div id="question-two" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    We get the best internships of the lot for you, making sure that you will not have to browse any website for internships every single day (after all it’s not facebook).Moreover there are more than 20 websites pertaining to internships, we bring most of these internships under one platform. In addition to this we also save you the time of writing an answer to some clichéd questions like “Why should I hire you?” or “Why are you the best for this job?” which essentially never comprehends your ability to do the necessary work but only makes the recruiter apprehend your skills to persuade people to hire you.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#question-three" aria-expanded="false" aria-controls="collapseThree">
                      <span class="glyphicon glyphicon-question-sign"></span>
                      What is the complete procedure from filling the form to getting an internship?
                    </a>
                  </h4>
                </div>
                <div id="question-three" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    After filling the form we will organize your data and group it with other people having nearly the          same qualifications and skills. Then we will find a suitable internship for you weighing both yours and the recruiter’s interests equally. Upon finding the right opportunity we will communicate with you informing about the opening and provide you with the subsequent details. Only after your validation will we forward your resume to the recruiter after which there will either be an interaction between you and the recruiter (like an interview) or not but this will then decide whether you finally bag the internship or not.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#question-four" aria-expanded="false" aria-controls="collapseThree">
                      <span class="glyphicon glyphicon-question-sign"></span>
                      Are there any registration charges?
                    </a>
                  </h4>
                </div>
                <div id="question-four" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <label for="">No, none at all.</label>
                    We do not take any registration fees either from Students or from Recruiters.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#question-five" aria-expanded="false" aria-controls="collapseThree">
                      <span class="glyphicon glyphicon-question-sign"></span>
                      What do you charge and from whom?
                    </a>
                  </h4>
                </div>
                <div id="question-five" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <p>
                      We charge a very small amount of money from the interns for this service. We do not charge the recruiters any amount of money. Only after the intern receives his/her stipend is he/she supposed to pay us 1% of the total stipend.
                    </p>
                    <div class="alert alert-info">
                      Ex. If the internship offers a stipend of Rs.5000 per month, and lasts for a month then we take 1% off it only, which is NOT Rs.500 but actually only Rs.50.If the duration of the internship is 2 months, then the amount payable to us becomes Rs.100 as the total stipend paid to you becomes Rs.10,000.
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#question-six" aria-expanded="false" aria-controls="collapseThree">
                      <span class="glyphicon glyphicon-question-sign"></span>
                      Are there any registration charges?
                    </a>
                  </h4>
                </div>
                <div id="question-six" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    You are supposed to pay us through the payment gateway on the website.
                    We understand the financial situation a college student is in at all times, and so we ask you to pay only when you get paid yourselves. The payments are to be done every time you receive your stipend.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#question-seven" aria-expanded="false" aria-controls="collapseThree">
                      <span class="glyphicon glyphicon-question-sign"></span>
                      Do you also charge for internship with no stipend?
                    </a>
                  </h4>
                </div>
                <div id="question-seven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    As you read we charge 1% of the amount you earn and 1% of zero is zero. We will always only earn if the interns themselves earn first.
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#question-eight" aria-expanded="false" aria-controls="collapseThree">
                      <span class="glyphicon glyphicon-question-sign"></span>
                      How can we know that we will get worthy internship opportunities?
                    </a>
                  </h4>
                </div>
                <div id="question-eight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    The platform is helpful towards recruiters as well and we save a lot of time and effort for them making them attracted towards our platform. This gives us more internship opportunities than most of the other websites. Moreover, you will be given information regarding the internship offered as well as the company offering the job, giving you the power to make your own choice including any internship you wish to take or leave.
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#question-nine" aria-expanded="false" aria-controls="collapseThree">
                      <span class="glyphicon glyphicon-question-sign"></span>
                      Are there specific number of internship opportunities that you offer to everyone who has signed up?
                    </a>
                  </h4>
                </div>
                <div id="question-nine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    We do not offer specific number of internships to everyone and it’s only your qualifications, experience and availability of the right internship that can land you one. We do not say that everyone who signs up will necessarily get an internship but looking on the upside, if you do your job well and get good recommendations you can end up doing them by the dozens. Regardless, you will surely have a better chance with us and that too without having to worry or do anything about it every day.
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