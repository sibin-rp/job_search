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
        var mySkills = this.internships[pIndex]['mySkills'] || [];
        mySkills.push(skill);
        this.internships[pIndex]['mySkills'] = mySkills
      }
    },
    computed:{
      internshipExist: function(){
        return this.internships.length > 0
      }
    }
  })
})