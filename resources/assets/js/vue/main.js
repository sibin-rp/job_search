$(document).ready(function(){
  var VueDatetimePicker = Vue.extend({
    props:['name','vid'],
    template:"<input class='form-control' name='internship[{{vid}}][{{name}}]' placeholder='Date Picker'/>",
    created: function(){
    },
    ready: function(){
      console.log(this)
      $(this.$el).datetimepicker({
        format:'YYYY-MM-DD'
      })
    }
  });

  new Vue({
    el:'#vue-js-form-field',
    created: function(){
      /* Datetime picker initilization */
      // $(this.$el).find('.date-picker-vue').datetimepicker({
      //   format:'YYYY-MM-DD'
      // });
      /* end d p t*/
    },
    ready: function(){
      /* Datetime picker initilization */
      $(this.$el).find('.date-picker-vue').datetimepicker({
        format:'YYYY-MM-DD'
      });
      /* end d p t*/
    },
    data:{
      internships:[]
    },
    components:{
      'vue-datetime-picker':VueDatetimePicker
    },
    methods:{
      insertDataToField: function(event){
        var element = $(event.target);
        var idValue = element.val();
        var nameValue = element.children('option:selected').text();
        var skillSet = [];
        /* Get Skills Set */
        $.ajax({
          async: false,
          url:"/api/get-skills-by-id",
          data:{
            id:idValue
          },
          success: function(result){
            if(result.status == 200){
              skillSet = result.data
            }
          }
        });
        /* Eof Skills Set */
        if(this.internships.length <5){
          this.internships.push({
            id: idValue,
            name: nameValue,
            skills: skillSet,
            mySkills:[]
          });
        }else{
          toastr.warning("Maximum upto 5 fields")
        }
      },
      removeFromList: function(internship,event){
        event.stopPropagation();
        this.internships = _.without(this.internship,internship.id)
      },
      onStartDatetimeChanged: function(newStart) {
        var endPicker = this.$.endPicker.control;
        endPicker.minDate(newStart);
      },
      onEndDatetimeChanged: function(newEnd) {
        var startPicker = this.$.startPicker.control;
        startPicker.maxDate(newEnd);
      },
      addSkillToField: function(skill,pIndex,event){
        var element = $(event.target);
        var mySkills = this.internships[pIndex]['mySkills'] || [];
        if(element.prop('checked')){
          if(!_.contains(mySkills,skill)){
            mySkills.push(skill)
          }
        }else{
            mySkills = _.reject(mySkills, function(value){
              return value.id == skill.id
            })
            if(mySkills.length == 0){
              mySkills = []
            }
        }
        this.internships[pIndex]['mySkills'] = mySkills
      }
    },
    computed:{
      internshipExist: function(){
        return this.internships.length > 0
      }
    }
  });

  /** QUALIFICATION SECTION STUDENT REGISTER */
  var academic = new Vue({
    el:'#vue-academic-section',
    data:{
     academics:[1]
    },
    methods:{
      addMore: function(event,array){
        event.preventDefault();
        if(array.length == 0  || this.academics.length == 0){
          this.academics = [1]
        }else{
          this.academics.push((_.last(array)+1));
        }

      },
      remove: function(index){
        this.academics = _.without(this.academics,index)
      }
    }
  });
  var sports = new Vue({
    el:'#vue-sports-section',
    data:{
      sports:[1]
    },
    methods:{
      addMore: function(event,array){
        event.preventDefault();
        if(array.length == 0  || this.sports.length == 0){
          this.sports = [1]
        }else{
          this.sports.push((_.last(array)+1));
        }

      },
      remove: function(index){
        this.sports = _.without(this.sports,index)
      }
    }
  });
  var arts = new Vue({
    el:'#vue-arts-section',
    data:{
      arts:[1]
    },
    methods:{
      addMore: function(event,array){
        event.preventDefault();
        if(array.length == 0  || this.arts.length == 0){
          this.arts = [1]
        }else{
          this.arts.push((_.last(array)+1));
        }

      },
      remove: function(index){
        this.arts = _.without(this.arts,index)
      }
    }
  });
  var others = new Vue({
    el:'#vue-others-section',
    data:{
      others:[1]
    },
    methods:{
      addMore: function(event,array){
        event.preventDefault();
        if(array.length == 0  || this.others.length == 0){
          this.others = [1]
        }else{
          this.others.push((_.last(array)+1));
        }

      },
      remove: function(index){
        this.others = _.without(this.others,index)
      }
    }
  });
  /** EOF QUALIFICATION SECTION */
});